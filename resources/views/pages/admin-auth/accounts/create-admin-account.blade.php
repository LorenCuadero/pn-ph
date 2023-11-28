@extends('layouts.admin.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="table">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center justify-content-between"
                            style="background-color: #ffff; color: #1f3c88">
                            <p class="card-title mb-3 mb-md-0" style="color:#1f3c88; padding-left:0%; font-size: 22px">
                                <b>Admin Accounts</b>
                            </p>
                            <div class="d-flex flex-wrap align-items-center ml-auto">
                                <form class="form-inline mr-auto mr-md-0 mb-2 mb-md-0"
                                    style="display: flex; align-items: center;">
                                    <div class="nav-item btn btn-sm p-0" style="display: flex; align-items:center;">
                                        <a href="#" class="nav-link align-items-center btn"
                                            style="color:#ffffff; background-color:#1f3c88">Add</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="" enctype="multipart/form-data" method="POST" action="">
                                    <div class="row" style="text-align: left;">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first_name">Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="middle_name">Email</label>
                                                <input type="text" class="form-control" id="middle_name" name="middle_name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Password</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" required />
                                            </div>
                                            <div class="form-group" style="float: right;">
                                                <button type="submit" class="btn btn-primary mr-2">Add</button>
                                                <a href="{{ route('students.index') }}"
                                                    onclick="window.location.href = '{{ route('students.index') }}'; return false;"
                                                    style="text-decoration: none; color: #fff;">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Back
                                                    </button></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
