@extends('layouts.common.app')
@section('has-vue', '')
@push('css')
    <link rel="stylesheet" href="{{ rspr::vers('css/page/person.css') }}">
@endpush
@push('js')
    <script src="{{ rspr::vers('js/page/person.js') }}" defer></script>
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" id="table">
                <div class="card">
                    <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                        <h4 class="card-title mb-3 mb-md-0">{{ __('words.PersonManagementTable') }}</h4>
                        <div class="d-flex flex-wrap align-items-center ml-auto">
                            <form class="form-inline mr-auto mr-md-0 mb-2 mb-md-0">
                                <input id="searchInput" class="form-control mr-sm-1" type="search" placeholder="Search record here" aria-label="Search">
                                <a id="add-btn" class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#addModal" alt="Add person">
                                    <i class="fas fa-user-plus"></i> {{ __('words.Add') }}
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="vertical-text">{{ __('words.Id') }}</th>
                                        <th class="vertical-text">{{ __('words.FirstName') }}</th>
                                        <th class="vertical-text">{{ __('words.LastName') }}</th>
                                        <th class="vertical-text">{{ __('words.MiddleName') }}</th>
                                        <th class="vertical-text">{{ __('words.Email') }}</th>
                                        <th class="vertical-text">{{ __('words.Phone') }}</th>
                                        <th class="vertical-text">{{ __('words.BirthDate') }}</th>
                                        <th class="vertical-text">{{ __('words.CivilStatus') }}</th>
                                        <th class="vertical-text">{{ __('words.Address') }}</th>
                                        <th class="vertical-text">{{ __('words.ProfileImage') }}</th>
                                        @if ($persons->isNotEmpty())
                                        <th class="vertical-text">{{ __('words.View') }}</th>
                                        <th class="vertical-text">{{ __('words.Actions') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($persons as $person)
                                    <tr data-search="{{ $person->id }} {{ $person->first_name }} {{ $person->middle_name }} {{ $person->last_name }} {{ $person->email }} {{ $person->phone }} {{ $person->birthdate }} {{ $person->civil_status }} {{ $person->address }}">
                                        <td>{{ $person->id }}</td>
                                        <td>{{ $person->first_name }}</td>
                                        <td>{{ $person->last_name }}</td>
                                        <td>{{ $person->middle_name }}</td>
                                        <td>{{ $person->email }}</td>
                                        <td>{{ $person->phone }}</td>
                                        <td>{{ $person->birthdate }}</td>
                                        <td>{{ $person->civil_status }}</td>
                                        <td>{{ $person->address }}</td>
                                        <td><img class="prof-image" src="{{ $person->profileImage }}" alt="Profile Image"></td>
                                        <td>
                                            <a href="#" class="btn view-btn" data-toggle="modal" data-target="#viewModal" data-person-id="{{ $person->id }}" data-person-first-name="{{ $person->first_name }}" data-person-last-name="{{ $person->last_name }}" data-person-middle-name="{{ $person->middle_name }}" data-person-email="{{ $person->email }}" data-person-phone="{{ $person->phone }}" data-person-birthdate="{{ $person->birthdate }}" data-person-civil-status="{{ $person->civil_status }}" data-person-address="{{ $person->address }}" data-person-profile-image="{{ $person->profileImage }}" data-edit-url="{{ route('person.show', ['person' => '__person_id__']) }}">
                                                <i class="fas fa-folder"></i> {{ __('words.View') }}
                                            </a>
                                        </td>
                                        <td class="project-actions text-right">
                                            <a id="edt-btn" href="#" class="btn btn-info edit-btn" data-toggle="modal" data-target="#editModal" data-person-id="{{ $person->id }}" data-person-firstname="{{ $person->first_name }}" data-person-lastname="{{ $person->last_name }}" data-person-middlename="{{ $person->middle_name }}" data-person-email="{{ $person->email }}" data-person-phone="{{ $person->phone }}" data-person-birthdate="{{ $person->birthdate }}" data-person-civilstatus="{{ $person->civil_status }}" data-person-address="{{ $person->address }}" data-person-profileimage="{{ $person->profile_image }}" data-edit-url="{{ route('person.update', ['person' => '__person_id__']) }}">
                                                <i class="fas fa-user-edit"></i> {{ __('words.Edit') }}
                                            </a>
                                            <form method="POST" action="{{ route('person.destroy', ['person' => $person]) }}" onsubmit="return confirm('Are you sure you want to delete this person?');">
                                                @csrf
                                                @method('DELETE')
                                                <button id="del-btn" type="submit" class="btn btn-danger btn-sm"><i class="fas fa-user-minus"></i>
                                                    {{ __('words.Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="11">{{ __('words.NoRecordsFound' )}}</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $persons->links('assets.element.common.asset-el-pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('modals.common.mdl-view-person')
@include('modals.common.mdl-edit-person')
<add-person-mdl></add-person-mdl>
@endsection
