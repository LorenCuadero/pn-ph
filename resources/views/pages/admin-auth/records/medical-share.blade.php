@extends('layouts.admin.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="table">
                    <div class="card">
                        @include('assets.asst-table-headers-with-add-ms-records')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover data-table text-center">
                                    <thead style="background-color: #ffff; color: #1f3c88">
                                        <tr>
                                            <th>Name</th>
                                            <th>Batch Year</th>
                                            <th>Total Share Due</th>
                                            <th>Total Share Paid</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        @forelse ($student_ms_records as $student)
                                            <tr>
                                                <td>
                                                    {{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}
                                                </td>
                                                <td>
                                                    {{ $student->batch_year }}
                                                </td>
                                                <td>
                                                    @if (isset($totalAmounts[$student->id]))
                                                        {{ $totalAmounts[$student->id]['amount_due'] }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (isset($totalAmounts[$student->id]))
                                                        {{ $totalAmounts[$student->id]['amount_paid'] }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $totalDue = isset($totalAmounts[$student->id]) ? $totalAmounts[$student->id]['amount_due'] : 0;
                                                        $totalPaid = isset($totalAmounts[$student->id]) ? $totalAmounts[$student->id]['amount_paid'] : 0;

                                                        if ($totalPaid == 0) {
                                                            $status = 'Unpaid';
                                                        } elseif ($totalPaid < $totalDue) {
                                                            $status = 'Not Fully Paid';
                                                        } else {
                                                            $status = 'Fully Paid';
                                                        }
                                                    @endphp
                                                    {{ $status }}
                                                </td>
                                                <td><button class="btn btn-sm view-button-medical"
                                                        style="background-color: #1f3c88; color: #ffff; width:70%; border-radius: 20px"
                                                        data-student-id="{{ $student->id }}">View</button></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('modals.admin.mdl-student-selection-for-medical')
@endsection
