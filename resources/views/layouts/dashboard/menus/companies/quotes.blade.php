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
                           Quote List
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

                                <button type="button" onclick="refreshButton()" class="btn m-b-15 ml-2 mr-2 btn-primary">Refresh</button>
                                <table id="quotes-table" class="table" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>Q</th>
                                        <th>A</th>
                                        <th>C</th>
                                        <th>H</th>
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

@endsection

@section('custom_script')
<script src="{{ asset('atmos/light/assets/vendor/DataTables/datatables.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>
    var dataTable = $('#quotes-table').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        "searchDelay": 350,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: '{{route("fetch.quotes")}}',
        },
        "columns": [
            { "name": "q", "data": "q" },
            { "name": "a", "data": "a" },
            { "name": "c", "data": "c" },
            { "name": "h", "data": "h" },
        ],
        "order" :[[ 0, 'asc' ]],
    });

    function refreshButton(){
        dataTable.draw();
    }
</script>
@endsection
