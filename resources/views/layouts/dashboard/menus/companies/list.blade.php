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
                                <table id="companies-table" class="table" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Action</th>
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
                        <input id="company_id" hidden>
                        <h5 class="modal-title">Company Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div class=" w-100 p-3">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="website">Logo</label>
                                        <div id="logo"></div>
                                    </div>
                                </div>
                                <div id="update-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade "   id="modalConfirmation" data-backdrop="static"  tabindex="-1" role="dialog"
            aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="px-3 pt-3 text-center">
                        <div class="event-type warning">
                            <div class="event-indicator ">
                                <i class="mdi mdi-exclamation text-white" style="font-size: 60px"></i>
                            </div>
                        </div>
                        <h3 class="pt-3">Are you sure?</h3>

                    </div>
                </div>
                <div class="modal-footer ">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" >cancel</a>
                    <div id="delete-button"></div>
                </div>
            </div>
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
            { "name": "id", "data": "id" },
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
            { "name": "website", "data":
                function(data){
                    var res = `
                        <a href="https://`+data.website+`" target="__blank">`+data.website+`</a>
                    `;

                    return res;
                }
            },
            { "name": "created_at", "data":
                function(data){
                    var res = moment(data.created_at).format('LL');

                    return res;
                }
            },
        ],
        "order" :[[ 0, 'asc' ]],
        "columnDefs": [
                {
                    "targets": -1,
                    "data": "action",
                    "render": function (date, type, data) {
                        var res =
                        `
                            <a class='btn btn-warning text-white mx-1' onclick=\'editCompany(`+JSON.stringify(data)+`)\'> Edit</a>
                            <a class='btn btn-danger text-white mx-1' onclick=\'deleteComfirmation(`+data.id+`)\'> Delete</a>
                        `;
                        return res;
                    }
                }
            ],
    });

    function editCompany(data){

        var el = $('#detailCompanyList');

        $('#name').val(data.name);
        $('#email').val(data.email);
        $('#website').val(data.website);
        $('#logo').html(`
            <div class="card-media">
                            <img class="card-img-top" src="{{ asset('storage/logos') }}/`+data.logo+`" style="width: 250px;">
                        </div>
        `);
        $('#update-button').html(`
            <button type="button" id="update-company-data" onclick="updateCompany(`+data.id+`)" class="w-100 btn btn-dark mt-3">Update Company Data</button>
        `);

        el.modal('show');
    };

    function updateCompany(id){

        var formData = new FormData();
        formData.append('company_id', id);
        formData.append('name', $('#name').val());
        formData.append('email', $('#email').val());
        formData.append('website', $('#website').val());

        axios.post('{{route("update.company")}}', formData).then((res) => {
            alert('Update Success!');
            location.reload();
        }).catch((err) => {
            return 'error';
        });
    }

    function deleteComfirmation(id){
        $('#delete-button').html(`<a href="#" class="btn btn-danger" data-dismiss="modal" onclick=\'deleteCompany(`+id+`)\'>Okay</a>`);
        $('#modalConfirmation').modal('show');
    }

    function deleteCompany(id){
        var formData = new FormData();
        formData.append('company_id', id);

        axios.post('{{route("delete.company")}}', formData).then((res) => {
            alert('Delete Success!');
            location.reload();
        }).catch((err) => {
            return 'error';
        });
    }
</script>
@endsection
