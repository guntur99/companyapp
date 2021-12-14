{{-- @extends('layouts.dashboard.app')

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
                           History Pesanan ({{ $role_name }})
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
                                <table id="orders-table" class="table   " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No Pesanan</th>
                                        <th>No Meja</th>
                                        <th>Menu Pesanan</th>
                                        <th>Status</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Total Pembayaran</th>
                                        <th>Dibuat Tanggal</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>
    var dataTable = $('#orders-table').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        "searchDelay": 350,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: '{{route("historyOrder.datatable.kasir")}}',
            // dataSrc: '',
            // draw: 'original.draw'
        },
        "columns": [
            // { "name": "id", "data": "id", "visible": false},
            { "name": "no_pesanan", "data": "no_pesanan" },
            { "name": "no_meja", "data": "no_meja" },
            { "name": "menu_pesanan", "data": "menu_pesanan" },
            { "name": "status", "data": "status" },
            { "name": "created_by", "data":
                function(data){
                    var res = 'Kasir';
                    if(data.created_by === 2){
                        res = 'Pelayan';
                    }
                    return res;
                }
            },
            { "name": "total_bayar", "data":
                function(data){
                    return 'Rp.' + numeral(data.total_bayar).format('0,0');
                }
            },
            { "name": "created_at", "data": "created_at" },
        ],
        "order" :[[ 0, 'desc' ]]
    });
</script>
@endsection --}}
