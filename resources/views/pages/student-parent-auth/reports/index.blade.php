@extends('layouts.student.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="color: #1f3c88; text-align: left;">Reports</h1><br>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="grades-tab" data-toggle="tab" href="#grades">Grades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="reports-tab" data-toggle="tab" href="#reports">Disciplinary Records</a>
                    </li>
                </ul>
                <div class="tab-content" style="padding: 3% 2%; background-color: #fff;">
                    <!-- Grades Tab Content -->
                    <div class="tab-pane fade show active" id="grades">
                        <h4>CERTIFICATE IN COMPUTER TECHNOLOGY</h4>
                        <p class="text-disp"><i>Effective SY: {{ $userJoinedYearInt }} - {{ $userJoinedEffectiveYear }} </i>
                        </p>
                        <p class="text-disp">{{ $userFname }} {{ $userLname }}</p>
                        <br>
                        <p class="text-disp"><b>General Point Average Per Semester</b></p>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Course</th>
                                        <th>First Sem 1st Year</th>
                                        <th>Second Sem 1st Year</th>
                                        <th>Fisrt Sem 2nd Year</th>
                                        <th>Second Sem 2nd Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($gradeReports)
                                        @forelse ($gradeReports as $gradeReport)
                                            <tr class="table-row">
                                                <td>{{ $gradeReport->course_code }}</td>
                                                <td>{{ $gradeReport->first_sem_1st_year }}</td>
                                                <td>{{ $gradeReport->second_sem_1st_year }}</td>
                                                <td>{{ $gradeReport->first_sem_2nd_year }}</td>
                                                <td>{{ $gradeReport->second_sem_2nd_year }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No records found.</td>
                                            </tr>
                                        @endforelse
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <p class="text-disp" style="font-size: 12px"><i>Note:</i> This record presents only the general
                            point average per semester and your general weighted average. For further details, please open
                            your <a href="https://ismis.usc.edu.ph/Account/Login?ReturnUrl=%2F"
                                style="text-decoration: #1f3c88" title="USC-ISMIS Link">ISMIS</a> account.</p>
                        <p class="text-disp"><b>General Weighted Average:</b> {{ $totalGPA }}</p>
                        <hr>
                    </div>
                    <!-- Reports Tab Content -->
                    <div class="tab-pane fade" id="reports">
                        <h2 style="text-align: left; color: #1f3c88">{{ $userFname }} {{ $userLname }}</h2>
                        <p class="text-disp" style="text-align: left">Student</p>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background-color: #1f3c88; color: #fff;">
                                    <tr>
                                        <th>Disciplinary Record Title</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($disciplinaryRecords)
                                        @forelse ($disciplinaryRecords as $disciplinaryRecord)
                                            <tr class="table-row">
                                                <td class="dcpl-records">Formal Verbal Warning</td>
                                                <td>{{ $disciplinaryRecord->verbal_warning_date }}</td>
                                                <td>{{ $disciplinaryRecord->verbal_warning_description }}</td>
                                            </tr>
                                            <tr class="table-row">
                                                <td class="dcpl-records">Written Warning</td>
                                                <td>{{ $disciplinaryRecord->written_warning_date }}</td>
                                                <td>{{ $disciplinaryRecord->written_warning_description }}</td>
                                            </tr>
                                            <tr class="table-row">
                                                <td class="dcpl-records">Probationary</td>
                                                <td>{{ $disciplinaryRecord->provisionary_description }}</td>
                                                <td>{{ $disciplinaryRecord->provisionary_date }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">No records found.</td>
                                            </tr>
                                        @endforelse
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
