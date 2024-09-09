<?php

use App\Http\Controllers\Api\V1\Admin\AdminApiController;
use App\Http\Controllers\Api\V1\Admin\AgreementApiController;
use App\Http\Controllers\Api\V1\Admin\AttendanceApiController;
use App\Http\Controllers\Api\V1\Admin\BookingApiController;
use App\Http\Controllers\Api\V1\Admin\CaretakerApiController;
use App\Http\Controllers\Api\V1\Admin\CommissionApiController;
use App\Http\Controllers\Api\V1\Admin\CostApiController;
use App\Http\Controllers\Api\V1\Admin\DriverApiController;
use App\Http\Controllers\Api\V1\Admin\EarningApiController;
use App\Http\Controllers\Api\V1\Admin\EmergencycontactApiController;
use App\Http\Controllers\Api\V1\Admin\ExpenseApiController;
use App\Http\Controllers\Api\V1\Admin\GuardianApiController;
use App\Http\Controllers\Api\V1\Admin\JunctionApiController;
use App\Http\Controllers\Api\V1\Admin\LocationApiController;
use App\Http\Controllers\Api\V1\Admin\LogApiController;
use App\Http\Controllers\Api\V1\Admin\NotificationApiController;
use App\Http\Controllers\Api\V1\Admin\PackageApiController;
use App\Http\Controllers\Api\V1\Admin\PaymentApiController;
use App\Http\Controllers\Api\V1\Admin\RoleApiController;
use App\Http\Controllers\Api\V1\Admin\RouteApiController;
use App\Http\Controllers\Api\V1\Admin\RouteHistoryApiController;
use App\Http\Controllers\Api\V1\Admin\SchoolApiController;
use App\Http\Controllers\Api\V1\Admin\SettingApiController;
use App\Http\Controllers\Api\V1\Admin\SliderApiController;
use App\Http\Controllers\Api\V1\Admin\StudentApiController;
use App\Http\Controllers\Api\V1\Admin\UserAlertApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;
use App\Http\Controllers\Api\V1\Admin\VehicleApiController;
use App\Http\Controllers\Api\V1\Admin\VehicletypeApiController;
use App\Http\Controllers\Api\V1\Admin\VendorApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Roles
    Route::apiResource('roles', RoleApiController::class);

    // Users
    Route::apiResource('users', UserApiController::class);

    // User Alert
    Route::apiResource('user-alerts', UserAlertApiController::class);

    // Vehicletype
    Route::apiResource('vehicletypes', VehicletypeApiController::class);

    // Slider
    Route::apiResource('sliders', SliderApiController::class);

    // Commission
    Route::apiResource('commissions', CommissionApiController::class);

    // Vehicles
    Route::apiResource('vehicles', VehicleApiController::class);

    // School
    Route::apiResource('schools', SchoolApiController::class);

    // Attendance
    Route::apiResource('attendances', AttendanceApiController::class);

    // Notifications
    Route::apiResource('notifications', NotificationApiController::class);

    // Student
    Route::post('students/media', [StudentApiController::class, 'storeMedia'])->name('students.store_media');
    Route::apiResource('students', StudentApiController::class);

    // Route History
    Route::apiResource('route-histories', RouteHistoryApiController::class);

    // Emergencycontact
    Route::apiResource('emergencycontacts', EmergencycontactApiController::class);

    // Packages
    Route::apiResource('packages', PackageApiController::class);

    // Guardian
    Route::post('guardians/media', [GuardianApiController::class, 'storeMedia'])->name('guardians.store_media');
    Route::apiResource('guardians', GuardianApiController::class);

    // Junctions
    Route::apiResource('junctions', JunctionApiController::class);

    // Location
    Route::apiResource('locations', LocationApiController::class);

    // Admin
    Route::post('admins/media', [AdminApiController::class, 'storeMedia'])->name('admins.store_media');
    Route::apiResource('admins', AdminApiController::class);

    // Booking
    Route::apiResource('bookings', BookingApiController::class);

    // Driver
    Route::post('drivers/media', [DriverApiController::class, 'storeMedia'])->name('drivers.store_media');
    Route::apiResource('drivers', DriverApiController::class);

    // Cost
    Route::apiResource('costs', CostApiController::class);

    // Expense
    Route::apiResource('expenses', ExpenseApiController::class);

    // Earnings
    Route::apiResource('earnings', EarningApiController::class);

    // Route
    Route::apiResource('routes', RouteApiController::class);

    // Agreement
    Route::apiResource('agreements', AgreementApiController::class);

    // Caretaker
    Route::post('caretakers/media', [CaretakerApiController::class, 'storeMedia'])->name('caretakers.store_media');
    Route::apiResource('caretakers', CaretakerApiController::class);

    // Settings
    Route::apiResource('settings', SettingApiController::class);

    // Vendor
    Route::post('vendors/media', [VendorApiController::class, 'storeMedia'])->name('vendors.store_media');
    Route::apiResource('vendors', VendorApiController::class);

    // Payment
    Route::apiResource('payments', PaymentApiController::class);

    // Logs
    Route::apiResource('logs', LogApiController::class);
});
