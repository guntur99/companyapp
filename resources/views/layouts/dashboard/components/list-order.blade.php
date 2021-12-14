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
                           Daftar Pesanan ({{ $role_name }})
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
                                        <th>Total Pembayaran</th>
                                        <th>Status</th>
                                        <th>Dibuat Oleh</th>
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


    <!---Modal-->
    <div class="modal fade bd-example-modal-lg" id="detailListOrder" data-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form id="clientInvoice" class="w-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <!--card begins-->
                        <div class=" w-100 p-3">
                            <div class="col-md-12 mb-10" id="">
                                <div class="row w-100 pt-3">
                                    <p id="order_id" hidden></p>
                                    <div class="col-md-12 col-sm-12 px-0 table-responsive">
                                        <table class="table table-hover w-100" id="orders-product-table" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No Pesanan</th>
                                                    <th>No Meja</th>
                                                    <th>Menu Pesanan</th>
                                                    <th>Total Pembayaran</th>
                                                    <th>Status</th>
                                                    <th>Dibuat Oleh</th>
                                                    <th>Dibuat Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody id="product_list"></tbody>
                                        </table>
                                    </div>
                                <a href="#" id="bayar-pesanan" class="w-100 btn btn-dark">Bayar Pesanan</a>
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
            url: '{{route("listOrder.datatable.kasir")}}',
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

    $('.dataTable').on('click', 'tbody tr', function() {
        var el      = $('#detailListOrder'),
            data    = dataTable.row(this).data();

        $('#order_id').val(data.id);
        axios.get('{{url("kasir/detail-order-datatable")}}/'+data.id).then((res) => {

            products = res.data;

            $('#product_list').append(`
                <tr>
                    <td>`+products.no_pesanan+`</td>
                    <td>`+products.no_meja+`</td>
                    <td>`+products.menu_pesanan+`</td>
                    <td>`+'Rp.' + numeral(products.total_bayar).format('0,0')+`</td>
                    <td>`+products.status+`</td>
                    <td>`+(products.created_by === 1 ? 'Kasir' : 'Pelayan')+`</td>
                    <td>`+moment(products.created_at).format('DD MMM YYYY')+`</td>
                </tr>`
            );

        }).catch((err) => {
            // hideLoader();
        });
        el.modal('show');
    });

    $('#bayar-pesanan').click(()=>{
        var formData    = new FormData();
        formData.append('order_id', $('#order_id').val());

        axios.post('{{route("paidOrder.kasir")}}', formData).then((res) => {
            alert('Berhasil Dibayar!');
            location.reload();
        }).catch((err) => {
            return 'error';
        });
    })
</script>
@endsection --}}
