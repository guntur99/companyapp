{{-- @extends('layouts.dashboard.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('atmos1/light/assets/vendor/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('atmos1/light/assets/vendor/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')


    <section class="admin-content ">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-6 text-white p-b-30">
                        <div class="media">
                            <div class="avatar avatar mr-3">
                                <div class="avatar-title bg-success rounded-circle mdi mdi-currency-usd  ">

                                </div>
                            </div>
                            <div class="media-body">
                                <h1>Laporan ({{ $role_name }})</h1>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5 text-center m-b-30 ml-auto">
                        <div class="rounded text-white bg-white-translucent">
                            <div class="p-all-15">
                                <div class="row">
                                    <div class="col-md-6 my-2 m-md-0">
                                        <div class="text-overline    opacity-75">amount received</div>
                                        <h3 class="m-0 text-success">-</h3>
                                    </div>
                                    <div class="col-md-6 my-2 m-md-0">

                                        <div class="text-overline    opacity-75">amount pending</div>
                                        <h3 class="m-0 text-danger">-</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="pull-up">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-20">
                                    <div class="col-md-6 my-auto">
                                        <h4 class="m-0">Summary</h4>
                                    </div>
                                    <div class="col-md-6 text-right my-auto">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-white shadow-none js-datepicker"><i
                                                        class="mdi mdi-calendar"></i> Pick Date
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12 p-0">
                                        <div class="table-responsive">
                                            <table id="report-table" class="table table-hover"style="width:100%">
                                                <thead class="">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Order Number</th>
                                                    <th scope="col">Created By</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $item)
                                                        <tr>
                                                            <td class="align-middle">
                                                                <div class="avatar avatar-xs ">
                                                                    <span class="avatar-title bg-danger rounded-circle">{{ $item->id }}</span>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle">{{ $item->created_at }}</td>
                                                            <td class="align-middle">{{ $item->no_pesanan }}</td>
                                                            <td class="align-middle">{{ $item->created_by == 1 ? 'Kasir' : 'Pelayan' }}</td>
                                                            <td class="align-middle"><span class=" text-{{ $item->status == 'paid' ? 'success' : 'danger' }}"><i
                                                                            class="mdi mdi-check-circle "></i> {{ $item->status == 'paid' ? 'Paid' : 'Unpaid' }}</span></td>
                                                            <td class="align-middle"><h6 class=" m-0">Rp.{{ $item->total_bayar }}</h6></td>
                                                            <td class="align-middle">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend">
                                                                        <a href="#" class="btn btn-white">View
                                                                            Invoice</a>
                                                                        <button type="button" disabled
                                                                                class="btn btn-white dropdown-toggle dropdown-toggle-split rounded-right"
                                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                            <span class="sr-only">Toggle Dropdown</span>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else
                                                                                here</a>
                                                                            <div role="separator"
                                                                                class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#">Separated link</a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-auto ml-auto">
                                        <div>
                                            <nav class="">
                                                <ul class="pagination">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item ">
                                                        <a class="page-link" href="#">2 <span
                                                                    class="sr-only">(current)</span></a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>


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
</script>
@endsection --}}
