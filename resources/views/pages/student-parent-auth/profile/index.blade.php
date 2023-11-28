@extends('layouts.student.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body" style="background-color: none; border: none;">
                <form id="" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="text-align: left;">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $userData['first_name'] }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $userData['middle_name'] }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $userData['last_name'] }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $userData['email'] }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="phone">Contact Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $userData['phone'] }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $userData['birthdate'] }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" id="address" rows="3" readonly>{{ $userData['address'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Parent/Guardian Information -->
                            <div class="form-group">
                                <label for="parent_name">Parent's / Guardian's Name</label>
                                <input type="text" class="form-control" id="parent_name" name="parent_name" value="{{ $userData['parent_name'] }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="parent_contact">Parent's / Guardian's Contact Number</label>
                                <input type="text" class="form-control" id="parent_contact" name="parent_contact" value="{{ $userData['parent_contact'] }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="batch_year">Batch Year</label>
                                <input type="number" class="form-control" id="batch_year" name="batch_year" value="{{ $userData['batch_year'] }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="joined">Date Joined</label>
                                <input type="date" class="form-control" id="joined" name="joined" value="{{ $userData['joined'] }}" readonly />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
