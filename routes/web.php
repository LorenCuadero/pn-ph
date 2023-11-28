<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CounterpartController;
use App\Http\Controllers\DisciplinaryController;
use App\Http\Controllers\GraduationFeeController;
use App\Http\Controllers\MedicalShareController;
use App\Http\Controllers\PersonalCashAdvanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentParentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinancialReportController;
use App\Http\Controllers\ClosingOfAccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [AuthController::class, 'loginPage']);

Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify_otp');

Route::prefix('/login')->group(function () {
    Route::get('/', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/', [AuthController::class, 'login'])->name('login');
});

Route::prefix('/forgot-password')->group(function () {
    Route::get('/', [AuthController::class, 'forgotPassword']);
    Route::post('/', [AuthController::class, 'postRecover'])->name('recover');
});

Route::prefix('/reset-password')->group(function () {
    Route::post('/', [AuthController::class, 'recoverOTP'])->name('recover-submit');
});

Route::prefix('/submit-reset')->group(function () {
    Route::get('/', [AuthController::class, 'submitReset'])->name('submit-reset');
    Route::post('/', [AuthController::class, 'confirm_changes'])->name('confirm-changes');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [AuthController::class, 'authorizedRedirect']);
    Route::get('/pn-portal', [StudentParentController::class, 'indexStudent'])->name('payable.index');
    Route::get('/dashboard', [AdminController::class, 'indexAdmin'])->name('dashboard.index');
    Route::post('/view-all-status', [AdminController::class, 'getTotals'])->name('admin.getTotals');
    Route::get('/allBatchTotalCount', [AdminController::class, 'allBatchTotalCount'])->name('admin.allBatchTotalCount');
    Route::post('/perYearViewMonthlyAcquisition', [AdminController::class, 'perYearViewMonthlyAcquisition'])->name('admin.perYearViewMonthlyAcquisition');
    Route::post('/validate-from-current-password', [AuthController::class, 'validate_from_current_pass'])->name('validate_from_current_pass');

    Route::prefix('/students')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('students.index');
        Route::get('/{id}', [StudentController::class, 'getStudent'])->name('students.getStudent');
        Route::post('/', [StudentController::class, 'store'])->name('students.store');
        Route::put('/{id}', [StudentController::class, 'update'])->name('students.update');
        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    });

    Route::get('/student-add', [StudentController::class, 'addStudentPage'])->name('students.addStudentPage');

    Route::prefix('/reports-acd')->group(function () {
        Route::get('/', [StudentController::class, 'indexAcdRpt'])->name('rpt.acd.index');
        Route::get('/{id}', [StudentController::class, 'getStudentGradeReport'])->name('rpt.acd.getStudentGradeReport');
        Route::put('/{id}', [StudentController::class, 'updateStudentGradeReport'])->name('rpt.acd.updateStudentGradeReport');
        Route::post('/{id}', [StudentController::class, 'addStudentGradeReport'])->name('rpt.acd.addStudentGradeReport');
    });

    Route::prefix('/reports-dcpl')->group(function () {
        Route::get('/', [StudentController::class, 'indexStudsList'])->name('rpt.dcpl.index');
        Route::get('/{id}', [DisciplinaryController::class, 'showDisciplinaryRecordsForStudent'])->name('rpt.dcpl.showDisciplinaryRecordsForStudent');
        Route::post('/', [DisciplinaryController::class, 'store'])->name('rpt.dcpl.store');
        Route::put('/{id}', [DisciplinaryController::class, 'update'])->name('rpt.dcpl.update');
    });

    Route::prefix('/students-info')->group(function () {
        Route::get('/', [StudentController::class, 'indexStudent'])->name('students-info.index');
        Route::get('/{id}', [StudentController::class, 'getStudentInfo'])->name('students-info.getStudentInfo');
        Route::put('/{id}', [StudentController::class, 'updateStudent'])->name('students-info.updateStudent');
    });

    Route::prefix('/student-portal')->group(function () {
        Route::get('/', [StudentParentController::class, 'index'])->name('student.parent.index');
    });

    Route::prefix('/student-reports')->group(function () {
        Route::get('/', [StudentParentController::class, 'indexReports'])->name('student.reports.index');
    });

    Route::prefix('/student-payments')->group(function () {
        Route::get('/', [StudentParentController::class, 'indexPayment'])->name('student.payments.index');
    });

    Route::prefix('/student-profile')->group(function () {
        Route::get('/', [StudentParentController::class, 'indexProfile'])->name('student.profile.index');
    });

    Route::prefix('/email')->group(function () {
        Route::get('/', [AdminController::class, 'email'])->name('admin.email');
        Route::post('/', [AdminController::class, 'sendEmail'])->name('admin.sendEmail');
    });

    Route::prefix('/closing-of-accounts-letter')->group(function () {
        Route::get('/', [AdminController::class, 'coa'])->name('admin.coa');
        Route::post('/', [AdminController::class, 'sendCoa'])->name('admin.sendCoa');
    });

    Route::prefix('/counterpart-records')->group(function () {
        Route::get('/', [CounterpartController::class, 'counterpartRecords'])->name('admin.counterpartRecords');
        Route::get('/{id}', [CounterpartController::class, 'studentPageCounterpartRecords'])->name('admin.studentPageCounterpartRecords');
        Route::post('/{id}', [CounterpartController::class, 'storeCounterpart'])->name('admin.storeCounterpart');
        Route::put('/{id}', [CounterpartController::class, 'updateCounterpart'])->name('admin.updateCounterpart');
        Route::delete('/{id}', [CounterpartController::class, 'deleteCounterpart'])->name('admin.deleteCounterpart');
    });

    Route::prefix('/customize-email')->group(function () {
        Route::get('/', [AdminController::class, 'customizedEmail'])->name('admin.customizedEmail');
        Route::post('/', [AdminController::class, 'sendCustomized'])->name('admin.sendCustomized');
    });

    Route::prefix('/medical-share-records')->group(function () {
        Route::get('/', [MedicalShareController::class, 'medicalShare'])->name('admin.medicalShare');
        Route::get('/{id}', [MedicalShareController::class, 'studentMedicalShareRecords'])->name('admin.studentMedicalShareRecords');
        Route::post('/{id}', [MedicalShareController::class, 'storeMedicalShare'])->name('admin.storeMedicalShare');
        Route::put('/{id}', [MedicalShareController::class, 'updateMedicalShare'])->name('admin.updateMedicalShare');
        Route::delete('/{id}', [MedicalShareController::class, 'deleteMedicalShare'])->name('admin.deleteMedicalShare');
    });

    Route::prefix('/personal-cash-advance-records')->group(function () {
        Route::get('/', [PersonalCashAdvanceController::class, 'personalCA'])->name('admin.personalCA');
        Route::get('/{id}', [PersonalCashAdvanceController::class, 'studentPersonalCARecords'])->name('admin.studentPersonalCARecords');
        Route::post('/{id}', [PersonalCashAdvanceController::class, 'storePersonalCA'])->name('admin.storePersonalCA');
        Route::put('/{id}', [PersonalCashAdvanceController::class, 'updatePersonalCA'])->name('admin.updatePersonalCA');
        Route::delete('/{id}', [PersonalCashAdvanceController::class, 'deletePersonalCA'])->name('admin.deletePersonalCA');
    });

    Route::prefix('/graduation-fees-records')->group(function () {
        Route::get('/', [GraduationFeeController::class, 'graduationFees'])->name('admin.graduationFees');
        Route::get('/{id}', [GraduationFeeController::class, 'studentGraduationFeeRecords'])->name('admin.studentGraduationFeeRecords');
        Route::post('/{id}', [GraduationFeeController::class, 'storeGraduationFee'])->name('admin.storeGraduationFee');
        Route::put('/{id}', [GraduationFeeController::class, 'updateGraduationFee'])->name('admin.updateGraduationFee');
    });

    Route::prefix('/financial-reports')->group(function () {
        Route::get('/', [FinancialReportController::class, 'index'])->name('admin.financialReports');
        Route::post('/', [FinancialReportController::class, 'viewFinancialReportByDateFromAndTo'])->name('admin.viewFinancialReportByDateFromAndTo');
    });

    Route::prefix('/closing-of-accounts')->group(function () {
        Route::get('/', [ClosingOfAccountController::class, 'index'])->name('admin.closingOfAccounts');
    });

    Route::get('/create-admin-account', [AccountController::class, 'createAdminAccount'])->name('admin.createAdminAccount');

    Route::prefix('/admin-accounts')->group(function () {
        Route::get('/', [AccountController::class, 'indexAdminAccounts'])->name('admin.admin-accounts');
        Route::get('/{id}', [AccountController::class, 'getAdminAccount'])->name('admin.getAdminAccount');
        Route::put('/{id}', [AccountController::class, 'updateAdminAccount'])->name('admin.updateAdminAccount');
        Route::delete('/{id}', [AccountController::class, 'deleteAdminAccount'])->name('admin.deleteAdminAccount');
        Route::post('/', [AccountController::class, 'storeAdminAccount'])->name('admin.storeAdminAccount');
    });

    Route::prefix('/student-accounts')->group(function () {
        Route::get('/', [AccountController::class, 'indexStudentsAccounts'])->name('admin.student-accounts');
        Route::get('/{id}', [AccountController::class, 'getStudentAccount'])->name('admin.getStudentAccount');
        Route::put('/{id}', [AccountController::class, 'updateStudentAccount'])->name('admin.updateStudentAccount');
        Route::delete('/{id}', [AccountController::class, 'deleteStudentAccount'])->name('admin.deleteStudentAccount');
        Route::post('/', [AccountController::class, 'storeStudentAccount'])->name('admin.storeStudentAccount');
    });

    Route::prefix('/staff-accounts')->group(function () {
        Route::get('/', [AccountController::class, 'indexStaffAccounts'])->name('admin.staff-accounts');
        Route::get('/{id}', [AccountController::class, 'getStaffAccount'])->name('admin.getStaffAccount');
        Route::put('/{id}', [AccountController::class, 'updateStaffAccount'])->name('admin.updateStaffAccount');
        Route::delete('/{id}', [AccountController::class, 'deleteStaffAccount'])->name('admin.deleteStaffAccount');
        Route::post('/', [AccountController::class, 'storeStaffAccount'])->name('admin.storeStaffAccount');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
