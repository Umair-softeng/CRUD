@extends('layouts/contentLayoutMaster')

@section('title', 'Order Index')
@section('page-style')
    <style>
        .toast-message{
            color: black;
            font-weight: bold;
            font-size: 15px;
            font-family: Montserrat;
        }
        .toast-message a, .toast-message label {
            color: black;
            font-weight: bold;
            font-family: Montserrat;
        }
        .toast-message a:hover {
            color: black;
            font-weight: bold;
            font-family: Montserrat;
            text-decoration: none
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper ">
        <div class="content-body">
            <section class="invoice-list-wrapper">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Order Search</h4>
                    </div>
                    <div class="card-body mt-2">
                        <form class="dt_adv_search" method="POST">
                            <div class="row g-1 mb-md-1">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                    <label class="form-label">Order No:</label>
                                    <input type="text" class="form-control dt-input dt-full-name" data-column="0" placeholder="Search By Order ID" data-column-index="0">
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                    <label class="form-label">Product Name:</label>
                                    <input type="text" class="form-control dt-input" data-column="1" placeholder="Search By Product Name" data-column-index="1">
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                    <label class="form-label">Date:</label>
                                    <input type="text" class="form-control dt-input" data-column="2" placeholder="Search By Date" data-column-index="2">
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="card-datatable table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <table class="invoice-list-table table dataTable no-footer dtr-column"
                                           id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 46px;" aria-label="Order No: activate to sort column ascending" aria-sort="descending">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-label="Product Name: activate to sort column ascending">Product Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-label="Product Price: activate to sort column ascending">Product Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-label="Category Name: activate to sort column ascending">Category Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-label="Quantity: activate to sort column ascending">Quantity</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-label="Date: activate to sort column ascending">Date</th>
                                            <th class="cell-fit sorting_disabled" rowspan="1" colspan="1" style="width: 80px;"
                                                aria-label="Actions">Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script>
    <script>
        var msg = "{{ Session::get('message') }}";
        var exist = "{{ Session::has('message') }}";
        if (exist) {
            if(msg === "Order Added Successfully!!"){
                toastr.success(msg);
            }else if(msg === "Order Deleted Successfully!!"){
                toastr.error(msg);
            }else if(msg === "Order Updated Successfully!!"){
                toastr.info(msg);
            }
        }
        function filterColumn(i, val) {
            if (i == 4) {
                $('.invoice-list-table').dataTable().fnDraw();
            } else {
                $('.invoice-list-table').DataTable().column(i).search(val, false, true).draw();
            }
        }
        $('input.dt-input').on('keyup', function () {
            filterColumn($(this).attr('data-column'), $(this).val());
        });

        function deleteFunction(){
            return confirm('Are you sure you want to delete this?');
        }

        $(function () {
            'use strict';

            var category = $('.invoice-list-table');
            // datatable
            if (category.length) {
                category.DataTable({
                    ajax: "{{route('order.index')}}", // JSON file to add data
                    autoWidth: false,
                    columns: [
                        // columns according to JSON
                        { data: 'orderID' },
                        { data: 'productID'},
                        { data: 'productPrice'},
                        { data: 'categoryName'},
                        { data: 'quantity'},
                        { data: 'date'},
                        { data: 'actions' }
                    ],
                    columnDefs: [
                        {
                            // Bill ID
                            targets: 0,
                            width: '46px',
                            render: function (data, type, full, meta) {
                                var orderID = full['orderID'];
                                // Creates full output for row
                                var $rowOutput = '<a class="fw-bold" href="order/show/' + orderID + '"> #' + orderID + '</a>';
                                return $rowOutput;
                            }
                        },

                    ],
                    dom:
                        '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
                        '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
                        '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
                        '>t' +
                        '<"d-flex justify-content-between mx-2 row mb-1"' +
                        '<"col-sm-12 col-md-6"i>' +
                        '<"col-sm-12 col-md-6"p>' +
                        '>',
                    language: {
                        sLengthMenu: 'Show _MENU_',
                        search: 'Search',
                        searchPlaceholder: 'Search',
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    },
                    buttons: [
                        {
                            text: 'Add Order',
                            className: 'add-new btn btn-primary',
                            action: function (){
                                window.location = '{{route('order.create')}}'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        }
                    ],

                    drawCallback: function () {
                        $(document).find('[data-bs-toggle="tooltip"]').tooltip();
                    }
                });
            }
        });
    </script>
@endsection


