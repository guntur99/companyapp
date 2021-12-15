@extends('layouts.dashboard.app')

@section('content')

    <section class="admin-content" id="menu-search">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4>Create New Employee</h4>
                    </div>
                </div>
            </div>
        </div>
        <section class="pull-up">
            <div class="container">

                <form method="POST" action="{{ route('create.employee') }}" enctype="multipart/form-data">
                @csrf

                    <div class="card m-b-30">
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

                            <div class="form-group">
                                <label class="font-secondary" for="company">Company</label>
                                <select id="company" name="company" class="form-control js-select2">
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" id="add-new-employee" class="w-100 btn btn-dark">Add New Employee</button>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </section>

@endsection
