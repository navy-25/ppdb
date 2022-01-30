@include('includes.alertaction')
@include('includes.alert')

<script src="{{ asset('/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('/assets/vendors/core/core.js') }}"></script>
<script src="{{ asset('/assets/js/template.js') }}"></script>

@yield('script')
<script src="{{ asset('/assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('/assets/js/select2.js') }}"></script>

<script>
    $(document).ready(function() {$('.select2-single').select2();});
</script>

{{-- <script src="{{ asset('/assets/js/data-table.js') }}"></script>
<script src="{{ asset('/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('/assets/js/data-table.js') }}"></script> --}}
{{-- <script src="{{ asset('/assets/vendors/prismjs/prism.js') }}"></script> --}}
{{-- <script src="{{ asset('/assets/vendors/clipboard/clipboard.min.js') }}"></script> --}}
