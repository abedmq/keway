<?php

namespace App\Models;

use App\Helpers\Datatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Contact extends Model {

    use Datatable;

    protected $guarded = [];
    protected $appends = ['mobile', 'username', 'country'];

    function getMobileAttribute()
    {
        return $this->getMobile();
    }

    function getUsernameAttribute()
    {
        return $this->name ?: $this->getMobile();
    }

    function getCountryAttribute()
    {
        return __('countries.' . $this->country_code);
    }

    function users()
    {
        return $this->belongsToMany(User::class, "contact_user");
    }

    function tags()
    {
        return $this->belongsToMany(Tag::class, "contact_tag");
    }


    function groups()
    {
        return $this->belongsToMany(Group::class, "contact_group");
    }


    function scopeIsNew($q)
    {
        $q->whereNull('image')->orWhere('image', '')->orWhere('image', 'default')->orWhere('updated_at', '<', Carbon::now()->subDays(10));
    }

    static function checkAndAdd($remoteId, $user = 0)
    {
        $contact = self::where('remote_id', $remoteId)->first();
        if (!$contact)
        {
            $mobileAndType = explode("@", $remoteId);
            $contact       = self::create(['remote_id' => $remoteId, 'mobile' => $mobileAndType[0], "country_code" => substr($mobileAndType[0], 0, 3)]);
        }
        if ($user)
            try
            {
                $contact->users()->attach($user->id);
            } catch (\Exception $e)
            {
                da($e->getMessage());
            }

        return $contact;
    }

    function getImage()
    {
        if (!$this->image || $this->updated_at->diffInDays(Carbon::now()) > 2)
        {
//            $this->getInfoRequest();
        }
        return $this->image && $this->image != 'default' ? "storage/" . $this->image : "front/media/default_contact.svg";
    }

    function getMobile()
    {
        return explode('@', $this->remote_id)[0];
    }

    function scopeSearch($q){
        $search = request('query')['query']??'';
        if($search){
            $q->where('id',$search)
                ->orWhere('mobile','like',"%$search%")
                ->orWhere('name','like',"%$search%")
                ->orWhere('status','like',"%$search%");
        }
        $groups_id = request('query')['group_id']??[];
        if(sizeof($groups_id))
            $q->whereHas('groups',function ($q) use($groups_id){
                $q->whereIn('id',$groups_id) ;
            });
        $tag_id = request('query')['tag_id']??[];
        if(sizeof($tag_id))
            $q->whereHas('tags',function ($q) use($tag_id){
                $q->whereIn('id',$tag_id) ;
            });

    }

    function getInfoRequest()
    {
        foreach ($this->users as $user)
        {
            try
            {
                $response = Http::timeout(5)->withHeaders(['X-Session-Token' => env('GO_TOKEN'), 'user_id' => $user->id, "remote_id" => $this->remote_id])->post('http://' . env('GO_URL') . "/api/get-contact-info");
                $profile  = json_decode($response->object()->profile);
                if (!(isset($profile->status) && $profile->status))
                {
                    $this->updateData($response);
                    break;
                }

            } catch
            (\Exception $e)
            {
                \Log::error("import contact error", [
                    'id'  => $this->id,
                    'msg' => $e->getMessage()]);
            }
        }
        $this->update(['updated_at' => Carbon::now()]);
    }

    function updateData($response)
    {
        $profile = json_decode($response->object()->profile);

        $name = "images/" . get_image_name($profile->eurl);
        Storage::put('public/' . $name, file_get_contents($profile->eurl));
        $data['image'] = $name;

        $status = json_decode($response->object()->status);;
        if (isset($status->status))
            $data['status'] = $status->status;

        $exist = json_decode($response->object()->exist);;


        $data['exits'] = $exist->status ?? '404';
        $this->update($data);
    }
}