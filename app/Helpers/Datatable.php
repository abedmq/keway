<?php

namespace App\Helpers;

use App\Http\Resources\DefaultResource;
use App\User;
use http\Url;
use Illuminate\Support\Facades\DB;

trait Datatable {


    function scopeDatatable($items, $resourceClass = null)
    {
        $request = request();
        $draw    = $request->get('draw');


        $pagination = $request->get('pagination');
        $page       = $pagination['page'] ?? 1;
        $perpage    = $pagination['perpage'] ?? 10;


        $start  = $perpage * ($page - 1);
        $length = $perpage;


        $recordsFiltered = $total_members = $items->count();

        $sort = $request->get('sort');


        $orderColumn = $sort['field'] ?? 'id';
        if ($orderColumn == 'RecordID')
            $orderColumn = 'id';
        $items->orderBy($orderColumn, $sort['sort'] ?? 'desc');
        $items = $items->skip($start)->take($length)->get();


        $data = [
            'draw'            => $draw,
            'recordsTotal'    => $total_members,
            'recordsFiltered' => $recordsFiltered,
            "meta"            => [
                "page"    => $page,
                "pages"   => ceil($total_members / $perpage),
                "perpage" => $perpage,
                "total"   => $total_members,
                "sort"    => $sort['sort'] ?? 'desc',
                "field"   => "ShipDate",
            ],
            'data'            => $items,
        ];

        return response($data);
    }


}
