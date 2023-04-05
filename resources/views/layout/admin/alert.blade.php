<script>
    @if(session()->has('msg'))
    toastr.success('{{session()->get('msg')}}');
    @endif
    @if(session()->has('error'))
    toastr.error('{{session()->get('error')}}');
    @endif
</script>
