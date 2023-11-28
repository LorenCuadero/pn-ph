@extends('layouts.student.app')

@section('content')
    <div class="container-fluid">
        <div class="" style="text-align: left">
            <h1 style="color: #1f3c88">Payable Records</h1>
            <br>
            <div style="color:#1f3c88">
                <p><b>Hello, {{ $userName }}!</b></p>
                <p>Have a nice day!</p>
            </div>
            <div class="left-content" style="text-align: left; color:rgb(255, 255, 255)">
                <div class="flex-container align-middle">
                    <div class="left-column">
                        <div class="left-content" style="background-color: #1f3c88;">
                            <p class="text-disp">Total Amount Unpaid</p>
                            <p class="text-disp">Counterpart: ₱ {{ $totalCounterpart }}</p>
                            <p class="text-disp">Medical (15%): ₱ {{ $totalMedical }}</p>
                            <p class="text-disp">Personal cash advance: ₱ {{ $totalPersonalCashAdvance }}</p>
                            <p class="text-disp">Graduation fee: ₱ {{ $totalGraduationFee }}</p>
                        </div>
                    </div>
                    <div class="right-column" style="text-align: center">
                        <div class="right-content" style="border: none">
                            <h1 style="font-size: 50px">₱ {{ $totalPayables }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="flex-container align-middle" style="background-color: none;">
            <div class="right-column">
                <div class="right-content" style="border: none">
                    <p>UNPAID COUNTERPART</p>
                    <div class="flex-container d-flex"
                        style="font-size: 13px; display: flex; align-items: center; text-align: center;">
                        <div class="left-column" style="display: flex; align-items: center;">
                            <div class="left-content1">
                                <div class="arrow">
                                    <span><i class="fas fa-arrow-down"></i> <i class="fas fa-arrow-up"></i> Latest to
                                        Oldest</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-column1" style="display: flex; align-items: center; text-align:center">
                            <div class="right-content1">
                                <div class="arrow" style="text-align: center">
                                    <span>View All</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left-column" style="background-color: none;">
                        <div class="left-content1">
                            <div class="scrollable-content" style="max-height: 200px; overflow: auto;">
                                <!-- Content for "UNpaid Counterpart" -->
                                @if (count($unpaidCounterpartRecords) > 0)
                                    @foreach ($unpaidCounterpartRecords as $record)
                                        <div class="flex-container align-middle"
                                            style="background-color: rgb(255, 255, 255); border-radius: 10px; padding: 2%;">
                                            <div class="left-column" style="padding: 2%;">
                                                <div class="left-content1">
                                                    <p style="margin: 1%">
                                                        {{ date('F', mktime(0, 0, 0, $record->month, 1)) }}</p>
                                                    <p>{{ $record->created_at->format('M d, Y') }}</p>
                                                </div>
                                            </div>
                                            <div class="right-column" style="padding: 2%;">
                                                <div class="right-content" style="border: none">
                                                    <p>₱ {{ number_format($record->amount_due - $record->amount_paid, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                @else
                                    <p>No unpaid counterpart records found.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-column">
                <div class="right-content" style="border: none">
                    <p>UNPAID MEDICAL SHARE</p>
                    <div class="flex-container"
                        style="font-size: 13px; display: flex; align-items: center; text-align: center;">
                        <div class="left-column" style="display: flex; align-items: center;">
                            <div class="left-content1">
                                <div class="arrow">
                                    <span><i class="fas fa-arrow-down"></i> <i class="fas fa-arrow-up"></i> Latest to
                                        Oldest</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-column1" style="display: flex; align-items: center; text-align:center">
                            <div class="right-content1">
                                <div class="arrow" style="text-align: center">
                                    <span>View All</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left-column" style="background-color: none;">
                        <div class="left-content1">
                            <div class="scrollable-content" style="max-height: 200px; overflow: auto;">
                                <!-- Content for "UNpaid Counterpart" -->
                                @if (count($unpaidMedicalRecords) > 0)
                                    @foreach ($unpaidMedicalRecords as $record)
                                        <div class="flex-container align-middle"
                                            style="background-color: rgb(255, 255, 255); border-radius: 10px; padding: 2%;">
                                            <div class="left-column" style="padding: 2%;">
                                                <div class="left-content1">
                                                    <p style="margin: 1%">
                                                        {{ date('F', mktime(0, 0, 0, $record->month, 1)) }}</p>
                                                    <p>{{ $record->created_at->format('M d, Y') }}</p>
                                                </div>
                                            </div>
                                            <div class="right-column" style="padding: 2%;">
                                                <div class="right-content" style="border: none">
                                                    <p>₱ {{ number_format($record->total_cost * 0.15 - $record->amount_paid, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                @else
                                    <div class="flex-container align-middle"
                                        style="background-color: rgb(255, 255, 255); border-radius: 10px; padding: 2%;">
                                        <p>No unpaid medical share records found.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-column">
                <div class="right-content" style="border: none">
                    <p>UNPAID PERSONAL CA</p>
                    <div class="flex-container"
                        style="font-size: 13px; display: flex; align-items: center; text-align: center;">
                        <div class="left-column" style="display: flex; align-items: center;">
                            <div class="left-content1">
                                <div class="arrow">
                                    <span><i class="fas fa-arrow-down"></i> <i class="fas fa-arrow-up"></i> Latest to
                                        Oldest</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-column1" style="display: flex; align-items: center; text-align:center">
                            <div class="right-content1">
                                <div class="arrow" style="text-align: center">
                                    <span>View All</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left-column" style="background-color: none;">
                        <div class="left-content1">
                            <div class="scrollable-content" style="max-height: 200px; overflow: auto;">
                                <!-- Content for "UNpaid Counterpart" -->
                                @if (count($unpaidPersonalCARecords) > 0)
                                    @foreach ($unpaidPersonalCARecords as $record)
                                        <div class="flex-container align-middle"
                                            style="background-color: rgb(255, 255, 255); border-radius: 10px; padding: 2%;">
                                            <div class="left-column" style="padding: 2%;">
                                                <div class="left-content1">
                                                    <p style="margin: 1%">
                                                        {{ date('F', mktime(0, 0, 0, $record->month, 1)) }}</p>
                                                    <p>{{ $record->created_at->format('M d, Y') }}</p>
                                                </div>
                                            </div>
                                            <div class="right-column" style="padding: 2%;">
                                                <div class="right-content" style="border: none">
                                                    <p>₱ {{ number_format($record->amount_due - $record->amount_paid, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                @else
                                    <div class="flex-container align-middle"
                                        style="background-color: rgb(255, 255, 255); border-radius: 10px; padding: 2%;">
                                        <p>No unpaid personal cash advance records found.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-column">
                <div class="right-content" style="border: none">
                    <p>UNPAID GRADUATION FEE</p>
                    <div class="flex-container"
                        style="font-size: 13px; display: flex; align-items: center; text-align: center;">
                        <div class="left-column" style="display: flex; align-items: center;">
                            <div class="left-content1">
                                <div class="arrow">
                                    <span><i class="fas fa-arrow-down"></i> <i class="fas fa-arrow-up"></i> Latest to
                                        Oldest</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-column1" style="display: flex; align-items: center; text-align:center">
                            <div class="right-content1">
                                <div class="arrow" style="text-align: center">
                                    <span>View All</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left-column" style="background-color: none;">
                        <div class="left-content1">
                            <div class="scrollable-content" style="max-height: 200px; overflow: auto;">
                                <!-- Content for "UNpaid Counterpart" -->
                                @if (count($unpaidGraduationFeeRecords) > 0)
                                    @foreach ($unpaidGraduationFeeRecords as $record)
                                        <div class="flex-container align-middle"
                                            style="background-color: rgb(255, 255, 255); border-radius: 10px; padding: 2%;">
                                            <div class="left-column" style="padding: 2%;">
                                                <div class="left-content1">
                                                    <p style="margin: 1%">
                                                        {{ date('F', mktime(0, 0, 0, $record->month, 1)) }}</p>
                                                    <p>{{ $record->created_at->format('M d, Y') }}</p>
                                                </div>
                                            </div>
                                            <div class="right-column" style="padding: 2%;">
                                                <div class="right-content" style="border: none">
                                                    <p>₱ {{ number_format($record->amount_due - $record->amount_paid, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                @else
                                    <div class="flex-container align-middle"
                                        style="background-color: rgb(255, 255, 255); border-radius: 10px; padding: 2%;">
                                        <p>No unpaid graduation fee records found.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
