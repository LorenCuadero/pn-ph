@extends('layouts.admin.app')
@section('content')
    <section class="content">
        <h1 class="card-title mb-3 mb-md-0" style="color:#1f3c88;"><b>Admin Account Information: Add Form</b></h1>
        <br>
        <div class="card">
            <div class="card-body" style="background-color: none; border: none;">

                @if ($errors->has('msg'))
                    {{ $errors->first('msg') }}
                @endif

                <form id="add-admin-form" enctype="multipart/form-data" method="POST" action="{{ route('admin.storeAdminAccount') }}">
                    @csrf
                    @if (session('success'))
                        <script>
                            toastr.success('{{ session('success') }}');
                        </script>
                    @endif
                    <div class="row" style="text-align: left;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name_admin" name="admin_name"
                                    required />
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name_admin" name="middle_name"
                                    required />
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name_admin" name="last_name" required />
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email_admin" name="email" required />
                            </div>
                            <div class="form-group">
                                <label for="phone">Password</label>
                                <input type="text" class="form-control" id="password_admin" name="password" />
                            </div>
                            <div class="form-group">
                                <label for="parent_contact">Contact Number</label>
                                <input type="number" class="form-control" id="contact_number_admin"
                                    name="contact_number" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" id="address_admin" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="parent_name">Gender</label>
                                <input type="text" class="form-control" id="gender_admin" name="gender" required />
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Department</label>
                                <input type="date" class="form-control" id="department_admin" name="department"
                                    required />
                            </div>
                            <div class="form-group">
                                <label for="batch_year">Civil Status</label>
                                <select name="civil_status" id="civil_status_admin" class="form-control">
                                    <option value="0">Single</option>
                                    <option value="1">Married</option>
                                    <option value="2">Widow</option>
                                    <option value="3">Separated</option>
                                    <option value="4">Divorced</option>
                                </select>
                            </div>
                            <div class="form-group" style="float: right;">
                                <button type="submit" class="btn btn-primary mr-2">Add</button>
                              <a href="{{ route('admin.admin-accounts') }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                @include('assets.asst-loading-spinner')
            </div>
        </div>
    </section>
@endsection
