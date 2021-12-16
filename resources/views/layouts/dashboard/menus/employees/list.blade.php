@extends('layouts.dashboard.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
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
                                <table id="employees-table" class="table" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Company</th>
                                        <th>Created At</th>
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
    <div class="modal fade bd-example-modal-lg" id="detailEmployeeList" data-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form id="clientInvoice" class="w-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <input id="employee_id" hidden>
                        <h5 id="full_name" class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div class=" w-100 p-3">
                            <div class="card-body">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div id="update-employee-data"></div>
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
    var dataTable = $('#employees-table').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        "searchDelay": 350,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: '{{route("list.datatable.employee")}}',
        },
        "columns": [
            { "name": "id", "data": "id" },
            { "name": "full_name", "data": "full_name" },
            { "name": "email", "data": "email" },
            { "name": "phone", "data": "phone" },
            { "name": "company_name", "data": "company_name" },
            { "name": "created_at", "data":
                function(data){
                    var res = moment(data.created_at).format('LL');

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
                            <a class='btn btn-warning text-white mx-1' onclick=\'editEmployee(`+JSON.stringify(data)+`)\'> Edit</a>
                            <a class='btn btn-danger text-white mx-1' onclick=\'deleteComfirmation(`+data.id+`)\'> Delete</a>
                        `;
                        return res;
                    }
                }
            ],
    });

    function editEmployee(data){

        var el = $('#detailEmployeeList');

        $('#full_name').html(data.full_name + " | " + data.company_name);
        $('#first_name').val(data.first_name);
        $('#last_name').val(data.last_name);
        $('#email').val(data.email);
        $('#phone').val(data.phone);
        $('#update-employee-data').html(`
            <button type="button" id="update-employee-data" onclick="updateEmployee(`+data.id+`)" class="w-100 btn btn-dark mt-3">Update Employee Data</button>
        `);

        el.modal('show');
    };

    function updateEmployee(id){

        var formData = new FormData();
        formData.append('employee_id', id);
        formData.append('first_name', $('#first_name').val());
        formData.append('last_name', $('#last_name').val());
        formData.append('email', $('#email').val());
        formData.append('phone', $('#phone').val());

        axios.post('{{route("update.employee")}}', formData).then((res) => {
            alert('Update Success!');
            location.reload();
        }).catch((err) => {
            return 'error';
        });
    }

    function deleteComfirmation(id){
        $('#delete-button').html(`<a href="#" class="btn btn-danger" data-dismiss="modal" onclick=\'deleteEmployee(`+id+`)\'>Okay</a>`);
        $('#modalConfirmation').modal('show');
    }

    function deleteEmployee(id){

        var formData = new FormData();
        formData.append('employee_id', id);

        axios.post('{{route("delete.employee")}}', formData).then((res) => {
            alert('Delete Success!');
            location.reload();
        }).catch((err) => {
            return 'error';
        });
    }

</script>
@endsection
