@extends('layouts.dashboard.app')

@section('content')

    <section class="admin-content" id="menu-search">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4>Create New Company</h4>
                    </div>
                </div>
            </div>
        </div>
        <section class="pull-up">
            <div class="container">

                <form method="POST" action="{{ route('create.company') }}" enctype="multipart/form-data">
                @csrf

                    <div class="card m-b-30">
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

                                <div class="input-group mb-3 col-md-6">
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="logo" name="logo">
                                            <label class="custom-file-label" for="logo"
                                                    >Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="buat-baru" class="w-100 btn btn-dark">Buat Baru</button>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </section>

@endsection
