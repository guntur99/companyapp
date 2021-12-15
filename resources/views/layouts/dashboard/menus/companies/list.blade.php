@extends('layouts.dashboard.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
    <style>
        .pointer {cursor: pointer;}
    </style>
@endsection

@section('content')

    <section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4 class="">
                           Company List
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="container  pull-up">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive p-t-10">
                                <table id="companies-table" class="table" style="width:100%; cursor:pointer;">
                                    <thead>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Created At</th>
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
        </div>
    </section>


    <!---Modal-->
    <div class="modal fade bd-example-modal-lg" id="detailCompanyList" data-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form id="clientInvoice" class="w-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Company Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div class=" w-100 p-3">
                            <div class="col-md-12 mb-10" id="">
                                <div class="row w-100 pt-3">
                                    <p id="order_id" hidden></p>
                                    <div class="col-md-12 col-sm-12 px-0 table-responsive">
                                        <table class="table table-hover w-100" id="company-detail-table" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Website</th>
                                                    <th>Logo</th>
                                                    <th>Dibuat Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody id="detail_list"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('custom_script')
<script src="{{ asset('atmos/light/assets/vendor/DataTables/datatables.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>
    var dataTable = $('#companies-table').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        "searchDelay": 350,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: '{{route("list.datatable.company")}}',
        },
        "columns": [
            { "name": "logo", "data":
                function(data){
                    var res = `
                        <div class="card-media">
                            <img class="card-img-top" src="{{ asset('storage/logos') }}/`+data.logo+`" style="width: 150px;">
                        </div>
                    `;

                    return res;
                }
            },
            { "name": "name", "data": "name" },
            { "name": "email", "data": "email" },
            { "name": "website", "data": "website" },
            { "name": "created_at", "data":
                function(data){
                    var res = moment(data.created_at).format('LL');

                    return res;
                }
            },
        ],
        "order" :[[ 0, 'desc' ]]
    });

    $('.dataTable').on('click', 'tbody tr', function() {
        var el      = $('#detailCompanyList'),
            company = dataTable.row(this).data();

            $('#detail_list').append(`
                <tr>
                    <td>
                        <div class="card-media">
                            <img class="card-img-top" src="{{ asset('storage/logos') }}/`+company.logo+`" style="width: 150px;">
                        </div>
                    </td>
                    <td>`+company.name+`</td>
                    <td>`+company.email+`</td>
                    <td>`+company.website+`</td>
                    <td>`+moment(company.created_at).format('DD MMM YYYY')+`</td>
                </tr>`
            );

        el.modal('show');
    });
</script>
@endsection
