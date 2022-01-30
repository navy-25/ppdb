<style>
    .html{
        font-family: 'Poppins' !important;
    }

    .bg-primary-gradient{
        background: linear-gradient(153.85deg, #5E50F9 0%, #9150f9 98.59%) !important;
    }
    .bg-info-gradient{
        background: linear-gradient(153.85deg, #66d1d1 0%, #3eb99a 98.59%) !important;
    }
    .card-member{
        height:150px;
        border: 1px solid #727cf5;
    }
    .image-profile{
        width: 100%;
        height: 100px;
        background-image: url("../../../assets/images/login-banner.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 5px;
    }
    .b-none{
        border:none !important;
    }

    .auth-page .auth-left-wrapper {
        width: 100%;
        height: 100%;
        background-image: url("../../../assets/images/login-banner.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .bg-img-vote{
        min-height: 100px;
        width: 100%;
        height: 100%;
        background-image: url("../../../assets/images/login-banner.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 15px;
    }

    .swal2-popup { width: 20em; border-radius: 15px; }
    .alert,.card{ border-radius: 10px; }
    .modal-content{ border-radius: 15px !important; }
    .text-gray{ color: #979797; }
    select.form-control, select, .email-compose-fields .select2-container--default select.select2-selection--multiple, .select2-container--default select.select2-selection--single, .select2-container--default .select2-selection--single select.select2-search__field, select.typeahead, select.tt-query, select.tt-hint { border-radius: 15px; }
    .form-control-sm { border-radius: 15px; }
    .swal2-modal .swal2-actions button.swal2-cancel:focus,.btn-danger:not(:disabled):not(.disabled):active:focus, .swal2-modal .swal2-actions button.swal2-cancel:not(:disabled):not(.disabled):active:focus, .btn-danger:not(:disabled):not(.disabled).active:focus, .swal2-modal .swal2-actions button.swal2-cancel:not(:disabled):not(.disabled).active:focus, .show > .btn-danger.dropdown-toggle:focus, .swal2-modal .swal2-actions .show > button.dropdown-toggle.swal2-cancel:focus {box-shadow: 0 0 0 0.2rem rgb(255 255 255 / 0%);}
    .swal2-modal .swal2-actions button.swal2-confirm:focus,.btn-primary:not(:disabled):not(.disabled):active:focus, .swal2-modal .swal2-actions button.swal2-confirm:not(:disabled):not(.disabled):active:focus, .wizard > .actions a:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus, .swal2-modal .swal2-actions button.swal2-confirm:not(:disabled):not(.disabled).active:focus, .wizard > .actions a:not(:disabled):not(.disabled).active:focus, .show > .btn-primary.dropdown-toggle:focus, .swal2-modal .swal2-actions .show > button.dropdown-toggle.swal2-confirm:focus, .wizard > .actions .show > a.dropdown-toggle:focus {box-shadow: 0 0 0 0.2rem rgb(255 255 255 / 0%);}
    .btn-primary, .swal2-modal .swal2-actions button.swal2-confirm, .wizard > .actions a, .wizard > .actions a:hover {border-color: #ffffff00 !important;}
    .border-danger, .swal2-modal .swal2-actions button.swal2-cancel {border-color: #ffffff00 !important;}

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #727cf5 !important;
        border-color: transparent !important;
        margin:0px 10px;
        border-radius: 10px;
    }

    .page-link:focus {box-shadow: 0 0 0 0.2rem rgb(255 255 255 / 25%);}
    .page-link {border-radius: 10px;}

    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        cursor: auto;
        background-color: #fff;
        border-color: #ffffff00;
    }
    .table-stabilo{background-color: rgba(145, 255, 198, 0.09) ;}
    .mt-3, .dataTables_wrapper div.dataTables_paginate ul.pagination, .my-3 { margin-top: 1rem !important; margin-bottom: 2rem !important; }
    .page-link {
        padding: 0.5rem;
        color: #6c757d;
        border: 1px solid #dee2e600;
        border-radius: 10px;
    }
    .page-item:first-child .page-link { border-radius: 10px !important; margin-right: 10px !important;}
    .page-item:last-child .page-link { border-radius: 10px !important; margin-left: 10px !important; }
    .select2-container--default .select2-selection--single{
        padding: 0rem 0rem !important;
    }
    .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b::before { content: ""; }
    .select2-container--default .select2-selection--single .select2-selection__arrow b::before { content: ""; }

    .select2-container--default .select2-selection--single {background-color: #fff;border: 1px solid rgb(238, 238, 238);border-radius: 10px;}
    .select2-container .select2-selection--single .select2-selection__rendered {padding-left: 15px;}
    @media (max-width: 767px){
        .dataTables_wrapper.dt-bootstrap4 .dataTables_filter {
            text-align: left;
            margin-left: 0px;
        }
        .dataTables_wrapper.dt-bootstrap4 .dataTables_length {
            text-align: left;
        }
        .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col, .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm, .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md, .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg, .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl, .col-xl-auto {
            position: relative;
            width: 100%;
        }
        .dataTables_wrapper.dt-bootstrap4 .dataTables_length select {
            margin-left: 18px;
            margin-right: 10px;
        }
        .bg-img-vote{
            border-radius: 10px;
        }
        .text-status{
            display: none;
        }
    }
</style>
