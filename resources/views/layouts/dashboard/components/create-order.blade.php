{{-- @extends('layouts.dashboard.app')

@section('custom_css')
@endsection

@section('content')

    <section class="admin-content" id="menu-search">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4>Buat Pesanan ({{ $role_name }})</h4>
                    </div>
                </div>
            </div>
        </div>
        <section class="pull-up">
            <div class="container">

                <!--widget card begin-->
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="form-group ">
                                <label  class="font-secondary">Nomor Meja </label>
                                <select id="nomor_meja"  class="form-control js-select2">
                                    <option selected value="001">Meja 01</option>
                                    <option value="002">Meja 02</option>
                                    <option value="003">Meja 03</option>
                                    <option value="004">Meja 04</option>
                                    <option value="005">Meja 05</option>
                                    <option value="006">Meja 06</option>
                                    <option value="007">Meja 07</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label class="font-secondary">Pilih Menu </label>
                                <select id="menus" multiple class="form-control js-select2">
                                    <option selected value="Apple Pie">Apple Pie</option>
                                    <option value="Cup Cake">Cup Cake</option>
                                    <option value="Donut">Donut</option>
                                    <option value="Eclair">Eclair</option>
                                    <option value="Froyo">Froyo</option>
                                    <option value="GingerBread">GingerBread</option>
                                    <option value="HoneyComb">HoneyComb</option>
                                    <option value="Ice Cream Sandwich">Ice Cream Sandwich</option>
                                    <option value="Jellybean">Jellybean</option>
                                    <option value="Kitkat">Kitkat</option>
                                    <option value="Lollipop">Lollipop</option>
                                    <option value="Marshmallow">Marshmallow</option>
                                    <option value="Nougat">Nougat</option>
                                    <option value="Oreo">Oreo</option>
                                </select>
                            </div>
                                <a href="#" id="buat-baru" class="w-100 btn btn-dark">Buat Baru</a>
                        </div>
                    </div>
                    <!--widget card ends-->
            </div>

        </section>
    </section>

@endsection

@section('custom_script')
<script>

    $('#buat-baru').click(()=>{
        var formData    = new FormData(),
            count       = $("#menus :selected").length;

        formData.append('nomor_meja', $('#nomor_meja').val());
        formData.append('pilih_menu', $('#menus').val());
        formData.append('total_bayar', count*100000);

        axios.post('{{route("createOrder.kasir")}}', formData).then((res) => {
            alert('Berhasil Dipesan!');
            location.reload();
        }).catch((err) => {
            return 'error';
        });
    })
</script>
@endsection --}}
