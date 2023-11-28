@extends('layouts.common.app')
@section('content')
@section('has-vue', '')
<div class="flex-container-row">
    @foreach ($jobTitles as $jobTitle)
    <script>
        window.jobTitles = window.jobTitles || [];
        window.jobTitles.push(@json($jobTitle->getAttributes()));
    </script>
    @endforeach
    <script>
        window.employeeId = @json($data->id);
    </script>
    <add-employee-jobtitle-modal></add-employee-jobtitle-modal>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('words.CurrentJobTitle') }}</h3>
                </div>
                <div class="card-body table-responsive p-0 job-title-tb-container">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('words.JobTitle') }}</th>
                                <th>{{ __('words.DateStarted') }}</th>
                                <th>{{ __('words.DateEnded') }}</th>
                                <th>{{ __('words.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->employeeJobTitles as $index => $jobTitle)
                            <tr>
                                <td>{{ (int)$index + 1 }}</td>
                                <td>{{ $jobTitle->jobTitle->job_title_name }}</td>
                                <td>{{ $jobTitle->start_date }}</td>
                                <td>{{ $jobTitle->end_date }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <a href="/employee-job-title/{{ $jobTitle['id'] }}">
                                            <button class="btn btn-info btn-sm edit-jobtitle" type="button">
                                                <i class="fas fa-pencil-alt"></i>
                                                {{ __('words.Edit') }}
                                            </button>
                                        </a>&nbsp;
                                        <a>
                                            <button class="btn btn-danger btn-sm delete-jobtitle-btn" type="button" data-employee-jobtitle-id="{{ $jobTitle['id'] }}">
                                                <i class="fas fa-trash"></i>
                                                {{ __('words.Delete') }}
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-container-row grow-1 profile-buttons-wrapper justify-content-start">
        <a href="{{route('employee.management')}}" class="btn btn-info btn-rounded btn-fw update-password profile-cancel-button" type="button">{{ __('words.Back') }}</a>
    </div>
</div>
@include('modals.common.edit-jobtitle')
@include('modals.common.delete-confirmation')
@endsection
