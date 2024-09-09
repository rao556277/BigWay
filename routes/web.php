<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgreementController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CaretakerController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\CostController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\EarningController;
use App\Http\Controllers\Admin\EmergencycontactController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\GuardianController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JunctionController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\RouteHistoryController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\VehicletypeController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Auth\ApprovalController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;

Route::get('/fresh-start', function () {
//    // Run database migrations
//    Artisan::call('migrate:fresh');
//
//    // Seed the database
//    Artisan::call('db:seed');
//
//    // Create symbolic link for storage
//    Artisan::call('storage:link');

    return "Fresh start completed : Git Test success comp";
});






Route::redirect('/', '/login');

Auth::routes(['verify' => true]);

Route::get('email/approval', [ApprovalController::class, 'show'])->name('approval.notice');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'approved']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::post('roles/csv', [RoleController::class, 'csvStore'])->name('roles.csv.store');
    Route::put('roles/csv', [RoleController::class, 'csvUpdate'])->name('roles.csv.update');
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::post('users/csv', [UserController::class, 'csvStore'])->name('users.csv.store');
    Route::put('users/csv', [UserController::class, 'csvUpdate'])->name('users.csv.update');
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // User Alert
    Route::post('user-alerts/csv', [UserAlertController::class, 'csvStore'])->name('user-alerts.csv.store');
    Route::put('user-alerts/csv', [UserAlertController::class, 'csvUpdate'])->name('user-alerts.csv.update');
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // Vehicletype
    Route::post('vehicletypes/csv', [VehicletypeController::class, 'csvStore'])->name('vehicletypes.csv.store');
    Route::put('vehicletypes/csv', [VehicletypeController::class, 'csvUpdate'])->name('vehicletypes.csv.update');
    Route::resource('vehicletypes', VehicletypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Slider
    Route::post('sliders/csv', [SliderController::class, 'csvStore'])->name('sliders.csv.store');
    Route::put('sliders/csv', [SliderController::class, 'csvUpdate'])->name('sliders.csv.update');
    Route::resource('sliders', SliderController::class, ['except' => ['store', 'update', 'destroy']]);

    // Commission
    Route::post('commissions/csv', [CommissionController::class, 'csvStore'])->name('commissions.csv.store');
    Route::put('commissions/csv', [CommissionController::class, 'csvUpdate'])->name('commissions.csv.update');
    Route::resource('commissions', CommissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Vehicles
    Route::post('vehicles/csv', [VehicleController::class, 'csvStore'])->name('vehicles.csv.store');
    Route::put('vehicles/csv', [VehicleController::class, 'csvUpdate'])->name('vehicles.csv.update');
    Route::resource('vehicles', VehicleController::class, ['except' => ['store', 'update', 'destroy']]);

    // School
    Route::post('schools/csv', [SchoolController::class, 'csvStore'])->name('schools.csv.store');
    Route::put('schools/csv', [SchoolController::class, 'csvUpdate'])->name('schools.csv.update');
    Route::resource('schools', SchoolController::class, ['except' => ['store', 'update', 'destroy']]);

    // Attendance
    Route::post('attendances/csv', [AttendanceController::class, 'csvStore'])->name('attendances.csv.store');
    Route::put('attendances/csv', [AttendanceController::class, 'csvUpdate'])->name('attendances.csv.update');
    Route::resource('attendances', AttendanceController::class, ['except' => ['store', 'update', 'destroy']]);

    // Notifications
    Route::post('notifications/csv', [NotificationController::class, 'csvStore'])->name('notifications.csv.store');
    Route::put('notifications/csv', [NotificationController::class, 'csvUpdate'])->name('notifications.csv.update');
    Route::resource('notifications', NotificationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Student
    Route::post('students/media', [StudentController::class, 'storeMedia'])->name('students.storeMedia');
    Route::post('students/csv', [StudentController::class, 'csvStore'])->name('students.csv.store');
    Route::put('students/csv', [StudentController::class, 'csvUpdate'])->name('students.csv.update');
    Route::resource('students', StudentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Route History
    Route::post('route-histories/csv', [RouteHistoryController::class, 'csvStore'])->name('route-histories.csv.store');
    Route::put('route-histories/csv', [RouteHistoryController::class, 'csvUpdate'])->name('route-histories.csv.update');
    Route::resource('route-histories', RouteHistoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Emergencycontact
    Route::post('emergencycontacts/csv', [EmergencycontactController::class, 'csvStore'])->name('emergencycontacts.csv.store');
    Route::put('emergencycontacts/csv', [EmergencycontactController::class, 'csvUpdate'])->name('emergencycontacts.csv.update');
    Route::resource('emergencycontacts', EmergencycontactController::class, ['except' => ['store', 'update', 'destroy']]);

    // Packages
    Route::post('packages/csv', [PackageController::class, 'csvStore'])->name('packages.csv.store');
    Route::put('packages/csv', [PackageController::class, 'csvUpdate'])->name('packages.csv.update');
    Route::resource('packages', PackageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Guardian
    Route::post('guardians/media', [GuardianController::class, 'storeMedia'])->name('guardians.storeMedia');
    Route::post('guardians/csv', [GuardianController::class, 'csvStore'])->name('guardians.csv.store');
    Route::put('guardians/csv', [GuardianController::class, 'csvUpdate'])->name('guardians.csv.update');
    Route::resource('guardians', GuardianController::class, ['except' => ['store', 'update', 'destroy']]);

    // Junctions
    Route::post('junctions/csv', [JunctionController::class, 'csvStore'])->name('junctions.csv.store');
    Route::put('junctions/csv', [JunctionController::class, 'csvUpdate'])->name('junctions.csv.update');
    Route::resource('junctions', JunctionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Location
    Route::post('locations/csv', [LocationController::class, 'csvStore'])->name('locations.csv.store');
    Route::put('locations/csv', [LocationController::class, 'csvUpdate'])->name('locations.csv.update');
    Route::resource('locations', LocationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Admin
    Route::post('admins/media', [AdminController::class, 'storeMedia'])->name('admins.storeMedia');
    Route::post('admins/csv', [AdminController::class, 'csvStore'])->name('admins.csv.store');
    Route::put('admins/csv', [AdminController::class, 'csvUpdate'])->name('admins.csv.update');
    Route::resource('admins', AdminController::class, ['except' => ['store', 'update', 'destroy']]);

    // Booking
    Route::post('bookings/csv', [BookingController::class, 'csvStore'])->name('bookings.csv.store');
    Route::put('bookings/csv', [BookingController::class, 'csvUpdate'])->name('bookings.csv.update');
    Route::resource('bookings', BookingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Driver
    Route::post('drivers/media', [DriverController::class, 'storeMedia'])->name('drivers.storeMedia');
    Route::post('drivers/csv', [DriverController::class, 'csvStore'])->name('drivers.csv.store');
    Route::put('drivers/csv', [DriverController::class, 'csvUpdate'])->name('drivers.csv.update');
    Route::resource('drivers', DriverController::class, ['except' => ['store', 'update', 'destroy']]);

    // Cost
    Route::post('costs/csv', [CostController::class, 'csvStore'])->name('costs.csv.store');
    Route::put('costs/csv', [CostController::class, 'csvUpdate'])->name('costs.csv.update');
    Route::resource('costs', CostController::class, ['except' => ['store', 'update', 'destroy']]);

    // Expense
    Route::post('expenses/csv', [ExpenseController::class, 'csvStore'])->name('expenses.csv.store');
    Route::put('expenses/csv', [ExpenseController::class, 'csvUpdate'])->name('expenses.csv.update');
    Route::resource('expenses', ExpenseController::class, ['except' => ['store', 'update', 'destroy']]);

    // Earnings
    Route::post('earnings/csv', [EarningController::class, 'csvStore'])->name('earnings.csv.store');
    Route::put('earnings/csv', [EarningController::class, 'csvUpdate'])->name('earnings.csv.update');
    Route::resource('earnings', EarningController::class, ['except' => ['store', 'update', 'destroy']]);

    // Route
    Route::post('routes/csv', [RouteController::class, 'csvStore'])->name('routes.csv.store');
    Route::put('routes/csv', [RouteController::class, 'csvUpdate'])->name('routes.csv.update');
    Route::resource('routes', RouteController::class, ['except' => ['store', 'update', 'destroy']]);

    // Agreement
    Route::post('agreements/csv', [AgreementController::class, 'csvStore'])->name('agreements.csv.store');
    Route::put('agreements/csv', [AgreementController::class, 'csvUpdate'])->name('agreements.csv.update');
    Route::resource('agreements', AgreementController::class, ['except' => ['store', 'update', 'destroy']]);

    // Caretaker
    Route::post('caretakers/media', [CaretakerController::class, 'storeMedia'])->name('caretakers.storeMedia');
    Route::post('caretakers/csv', [CaretakerController::class, 'csvStore'])->name('caretakers.csv.store');
    Route::put('caretakers/csv', [CaretakerController::class, 'csvUpdate'])->name('caretakers.csv.update');
    Route::resource('caretakers', CaretakerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Settings
    Route::post('settings/csv', [SettingController::class, 'csvStore'])->name('settings.csv.store');
    Route::put('settings/csv', [SettingController::class, 'csvUpdate'])->name('settings.csv.update');
    Route::resource('settings', SettingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Vendor
    Route::post('vendors/media', [VendorController::class, 'storeMedia'])->name('vendors.storeMedia');
    Route::post('vendors/csv', [VendorController::class, 'csvStore'])->name('vendors.csv.store');
    Route::put('vendors/csv', [VendorController::class, 'csvUpdate'])->name('vendors.csv.update');
    Route::resource('vendors', VendorController::class, ['except' => ['store', 'update', 'destroy']]);

    // Payment
    Route::post('payments/csv', [PaymentController::class, 'csvStore'])->name('payments.csv.store');
    Route::put('payments/csv', [PaymentController::class, 'csvUpdate'])->name('payments.csv.update');
    Route::resource('payments', PaymentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Logs
    Route::post('logs/csv', [LogController::class, 'csvStore'])->name('logs.csv.store');
    Route::put('logs/csv', [LogController::class, 'csvUpdate'])->name('logs.csv.update');
    Route::resource('logs', LogController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});

Route::get('welocome',function (){
    return "hello world";
});