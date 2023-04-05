<div class="image-input image-input-empty image-input-outline" id="kt_image_5"
     style="background-image: url({{@$iValue?:"media/users/blank.png"}})">
    <div class="image-input-wrapper"></div>

    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change"
           data-toggle="tooltip" title="" data-original-title="Change avatar">
        <i class="fa fa-pen icon-sm text-muted"></i>
        <input type="file" name="{{$key=isset($key)?$key:"image"}}"/>
        <input type="hidden" name="profile_avatar_remove"/>
    </label>

    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel"
          data-toggle="tooltip" title="Cancel avatar">
  <i class="ki ki-bold-close icon-xs text-muted"></i>
 </span>

    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove"
          data-toggle="tooltip" title="Remove avatar">
  <i class="ki ki-bold-close icon-xs text-muted"></i>
 </span>
    @if($errors->has($key))
        <label for="" class="error">{{$errors->first($key)}}</label>
    @endif
</div>

@push('scripts')
    <script>
        var avatar5 = new KTImageInput('kt_image_5');

        avatar5.on('cancel', function (imageInput) {

        });

        avatar5.on('change', function (imageInput) {

        });

    </script>
@endpush