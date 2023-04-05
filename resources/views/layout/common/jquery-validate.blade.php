@push('scripts')
    <style>
        label.error {
            color: red
        }
    </style>
    <script src="plugins/added/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/added/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/added/jquery-validation/localization/messages_ar.min.js"></script>
    <script>
        $('.form-validate').validate();
    </script>
@endpush