@extends('layouts.staff.app')
@section('content')
    <section class="content">
        <h1 class="card-title mb-3 mb-md-0" style="color:#1f3c88;"><b>Student Information: Edit Form</b></h1>
        <br>
        <div class="card">
            <div class="card-body" style="background-color: none; border: none;">
                <form id="edit-student-info-form" enctype="multipart/form-data" method="POST"
                    action="{{ route('students-info.updateStudent', ['id' => $student->id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" name="id" value="{{ $student->id }}" />
                    <div class="row" style="text-align: left;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $student->first_name }}" required />
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name"
                                    value="{{ $student->middle_name }}" required />
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ $student->last_name }}" required />
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $student->email }}" required />
                            </div>
                            <div class="form-group">
                                <label for="phone">Contact Number</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $student->phone }}" required />
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate"
                                    value="{{ $student->birthdate }}" required />
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" id="address" rows="3" required>{{ $student->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parent_name">Parent's / Guardian's Name</label>
                                <input type="text" class="form-control" id="parent_name" name="parent_name"
                                    value="{{ $student->parent_name }}" required />
                            </div>
                            <div class="form-group">
                                <label for="parent_contact">Parent's / Guardian's Contact Number</label>
                                <input type="text" class="form-control" id="parent_contact" name="parent_contact"
                                    value="{{ $student->parent_contact }}" required />
                            </div>
                            <div class="form-group">
                                <label for="batch_year">Batch Year</label>
                                <input type="number" class="form-control" id="batch_year" name="batch_year"
                                    value="{{ $student->batch_year }}" required />
                            </div>
                            <div class="form-group">
                                <label for="joined">Date Joined</label>
                                <input type="date" class="form-control" id="joined" name="joined"
                                    value="{{ $student->joined }}" required />
                            </div>
                            <div class="form-group" style="float: right;">
                                <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                                <a href="{{ route('students-info.index') }}"
                                    onclick="window.location.href = '{{ route('students.index') }}'; return false;"
                                    style="text-decoration: none; color: #fff;">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Back
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </form>
                @include('assets.asst-loading-spinner')
            </div>
        </div>
    </section>
@endsection
