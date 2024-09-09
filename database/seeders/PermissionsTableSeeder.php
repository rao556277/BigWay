<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 25,
                'title' => 'vehicletype_create',
            ],
            [
                'id'    => 26,
                'title' => 'vehicletype_edit',
            ],
            [
                'id'    => 27,
                'title' => 'vehicletype_show',
            ],
            [
                'id'    => 28,
                'title' => 'vehicletype_delete',
            ],
            [
                'id'    => 29,
                'title' => 'vehicletype_access',
            ],
            [
                'id'    => 30,
                'title' => 'slider_create',
            ],
            [
                'id'    => 31,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 32,
                'title' => 'slider_show',
            ],
            [
                'id'    => 33,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 34,
                'title' => 'slider_access',
            ],
            [
                'id'    => 35,
                'title' => 'commission_create',
            ],
            [
                'id'    => 36,
                'title' => 'commission_edit',
            ],
            [
                'id'    => 37,
                'title' => 'commission_show',
            ],
            [
                'id'    => 38,
                'title' => 'commission_delete',
            ],
            [
                'id'    => 39,
                'title' => 'commission_access',
            ],
            [
                'id'    => 40,
                'title' => 'vehicle_create',
            ],
            [
                'id'    => 41,
                'title' => 'vehicle_edit',
            ],
            [
                'id'    => 42,
                'title' => 'vehicle_show',
            ],
            [
                'id'    => 43,
                'title' => 'vehicle_delete',
            ],
            [
                'id'    => 44,
                'title' => 'vehicle_access',
            ],
            [
                'id'    => 45,
                'title' => 'vehicle_managment_access',
            ],
            [
                'id'    => 46,
                'title' => 'school_create',
            ],
            [
                'id'    => 47,
                'title' => 'school_edit',
            ],
            [
                'id'    => 48,
                'title' => 'school_show',
            ],
            [
                'id'    => 49,
                'title' => 'school_delete',
            ],
            [
                'id'    => 50,
                'title' => 'school_access',
            ],
            [
                'id'    => 51,
                'title' => 'attendance_create',
            ],
            [
                'id'    => 52,
                'title' => 'attendance_edit',
            ],
            [
                'id'    => 53,
                'title' => 'attendance_show',
            ],
            [
                'id'    => 54,
                'title' => 'attendance_delete',
            ],
            [
                'id'    => 55,
                'title' => 'attendance_access',
            ],
            [
                'id'    => 56,
                'title' => 'notification_create',
            ],
            [
                'id'    => 57,
                'title' => 'notification_edit',
            ],
            [
                'id'    => 58,
                'title' => 'notification_show',
            ],
            [
                'id'    => 59,
                'title' => 'notification_delete',
            ],
            [
                'id'    => 60,
                'title' => 'notification_access',
            ],
            [
                'id'    => 61,
                'title' => 'student_create',
            ],
            [
                'id'    => 62,
                'title' => 'student_edit',
            ],
            [
                'id'    => 63,
                'title' => 'student_show',
            ],
            [
                'id'    => 64,
                'title' => 'student_delete',
            ],
            [
                'id'    => 65,
                'title' => 'student_access',
            ],
            [
                'id'    => 66,
                'title' => 'route_history_create',
            ],
            [
                'id'    => 67,
                'title' => 'route_history_edit',
            ],
            [
                'id'    => 68,
                'title' => 'route_history_show',
            ],
            [
                'id'    => 69,
                'title' => 'route_history_delete',
            ],
            [
                'id'    => 70,
                'title' => 'route_history_access',
            ],
            [
                'id'    => 71,
                'title' => 'emergencycontact_create',
            ],
            [
                'id'    => 72,
                'title' => 'emergencycontact_edit',
            ],
            [
                'id'    => 73,
                'title' => 'emergencycontact_show',
            ],
            [
                'id'    => 74,
                'title' => 'emergencycontact_delete',
            ],
            [
                'id'    => 75,
                'title' => 'emergencycontact_access',
            ],
            [
                'id'    => 76,
                'title' => 'package_create',
            ],
            [
                'id'    => 77,
                'title' => 'package_edit',
            ],
            [
                'id'    => 78,
                'title' => 'package_show',
            ],
            [
                'id'    => 79,
                'title' => 'package_delete',
            ],
            [
                'id'    => 80,
                'title' => 'package_access',
            ],
            [
                'id'    => 81,
                'title' => 'guardian_create',
            ],
            [
                'id'    => 82,
                'title' => 'guardian_edit',
            ],
            [
                'id'    => 83,
                'title' => 'guardian_show',
            ],
            [
                'id'    => 84,
                'title' => 'guardian_delete',
            ],
            [
                'id'    => 85,
                'title' => 'guardian_access',
            ],
            [
                'id'    => 86,
                'title' => 'junction_create',
            ],
            [
                'id'    => 87,
                'title' => 'junction_edit',
            ],
            [
                'id'    => 88,
                'title' => 'junction_show',
            ],
            [
                'id'    => 89,
                'title' => 'junction_delete',
            ],
            [
                'id'    => 90,
                'title' => 'junction_access',
            ],
            [
                'id'    => 91,
                'title' => 'location_create',
            ],
            [
                'id'    => 92,
                'title' => 'location_edit',
            ],
            [
                'id'    => 93,
                'title' => 'location_show',
            ],
            [
                'id'    => 94,
                'title' => 'location_delete',
            ],
            [
                'id'    => 95,
                'title' => 'location_access',
            ],
            [
                'id'    => 96,
                'title' => 'admin_create',
            ],
            [
                'id'    => 97,
                'title' => 'admin_edit',
            ],
            [
                'id'    => 98,
                'title' => 'admin_show',
            ],
            [
                'id'    => 99,
                'title' => 'admin_delete',
            ],
            [
                'id'    => 100,
                'title' => 'admin_access',
            ],
            [
                'id'    => 101,
                'title' => 'booking_create',
            ],
            [
                'id'    => 102,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 103,
                'title' => 'booking_show',
            ],
            [
                'id'    => 104,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 105,
                'title' => 'booking_access',
            ],
            [
                'id'    => 106,
                'title' => 'driver_create',
            ],
            [
                'id'    => 107,
                'title' => 'driver_edit',
            ],
            [
                'id'    => 108,
                'title' => 'driver_show',
            ],
            [
                'id'    => 109,
                'title' => 'driver_delete',
            ],
            [
                'id'    => 110,
                'title' => 'driver_access',
            ],
            [
                'id'    => 111,
                'title' => 'cost_create',
            ],
            [
                'id'    => 112,
                'title' => 'cost_edit',
            ],
            [
                'id'    => 113,
                'title' => 'cost_show',
            ],
            [
                'id'    => 114,
                'title' => 'cost_delete',
            ],
            [
                'id'    => 115,
                'title' => 'cost_access',
            ],
            [
                'id'    => 116,
                'title' => 'expense_create',
            ],
            [
                'id'    => 117,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 118,
                'title' => 'expense_show',
            ],
            [
                'id'    => 119,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 120,
                'title' => 'expense_access',
            ],
            [
                'id'    => 121,
                'title' => 'earning_create',
            ],
            [
                'id'    => 122,
                'title' => 'earning_edit',
            ],
            [
                'id'    => 123,
                'title' => 'earning_show',
            ],
            [
                'id'    => 124,
                'title' => 'earning_delete',
            ],
            [
                'id'    => 125,
                'title' => 'earning_access',
            ],
            [
                'id'    => 126,
                'title' => 'route_create',
            ],
            [
                'id'    => 127,
                'title' => 'route_edit',
            ],
            [
                'id'    => 128,
                'title' => 'route_show',
            ],
            [
                'id'    => 129,
                'title' => 'route_delete',
            ],
            [
                'id'    => 130,
                'title' => 'route_access',
            ],
            [
                'id'    => 131,
                'title' => 'agreement_create',
            ],
            [
                'id'    => 132,
                'title' => 'agreement_edit',
            ],
            [
                'id'    => 133,
                'title' => 'agreement_show',
            ],
            [
                'id'    => 134,
                'title' => 'agreement_delete',
            ],
            [
                'id'    => 135,
                'title' => 'agreement_access',
            ],
            [
                'id'    => 136,
                'title' => 'caretaker_create',
            ],
            [
                'id'    => 137,
                'title' => 'caretaker_edit',
            ],
            [
                'id'    => 138,
                'title' => 'caretaker_show',
            ],
            [
                'id'    => 139,
                'title' => 'caretaker_delete',
            ],
            [
                'id'    => 140,
                'title' => 'caretaker_access',
            ],
            [
                'id'    => 141,
                'title' => 'setting_create',
            ],
            [
                'id'    => 142,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 143,
                'title' => 'setting_show',
            ],
            [
                'id'    => 144,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 145,
                'title' => 'setting_access',
            ],
            [
                'id'    => 146,
                'title' => 'vendor_create',
            ],
            [
                'id'    => 147,
                'title' => 'vendor_edit',
            ],
            [
                'id'    => 148,
                'title' => 'vendor_show',
            ],
            [
                'id'    => 149,
                'title' => 'vendor_delete',
            ],
            [
                'id'    => 150,
                'title' => 'vendor_access',
            ],
            [
                'id'    => 151,
                'title' => 'payment_create',
            ],
            [
                'id'    => 152,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 153,
                'title' => 'payment_show',
            ],
            [
                'id'    => 154,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 155,
                'title' => 'payment_access',
            ],
            [
                'id'    => 156,
                'title' => 'log_create',
            ],
            [
                'id'    => 157,
                'title' => 'log_edit',
            ],
            [
                'id'    => 158,
                'title' => 'log_show',
            ],
            [
                'id'    => 159,
                'title' => 'log_delete',
            ],
            [
                'id'    => 160,
                'title' => 'log_access',
            ],
            [
                'id'    => 161,
                'title' => 'routes_and_attendence_access',
            ],
            [
                'id'    => 162,
                'title' => 'settings_and_appearance_access',
            ],
            [
                'id'    => 163,
                'title' => 'drivers_and_caretaker_access',
            ],
            [
                'id'    => 164,
                'title' => 'payment_managment_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
