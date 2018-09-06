@extends('layouts.admin_layouts.design')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_matrix/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_matrix/libs/jquery-minicolors/jquery.minicolors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_matrix/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_matrix/libs/quill/dist/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_matrix/extra-libs/multicheck/multicheck.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_matrix/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
   <style>
       .datepicker {
           z-index: 9999 !important;
       }
   </style>
@endsection

@section('content')

<div class="container-fluid">
    @yield('form_loket')
</div>

@endsection

@section('js')
     <!-- This Page JS -->
    <script src="{{ asset('assets_matrix/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('dist_matrix/js/pages/mask/mask.init.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/jquery-asColor/dist/jquery-asColor.min.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Tables -->
    <script src="{{ asset('assets_matrix/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('assets_matrix/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('assets_matrix/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    <!-- End Tables -->
    
    <!-- Text Area Functions (like tinyMCE) -->
    <!-- <script src="{{ asset('assets_matrix/libs/quill/dist/quill.min.js') }}"></script> --> 
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        $(function () {

            $('.mydatepicker').datepicker();
            $('#datepicker-autoclose').datepicker({
                autoclose: true,
                todayHighlight: true,
                dateFormat: "dd-mm-yy h:i:s"
            });
            $('#datepicker-autoclose-two').datetimepicker({
                // pick12HourFormat: true
            });
        
        });
    </script>
@endsection