<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <form class="mt-6 mb-4 md:hidden">
                <div class="mb-3 pt-0">
                    @livewire('global-search')
                </div>
            </form>

            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('vehicle_managment_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/vehicletypes*")||request()->is("admin/vehicles*")||request()->is("admin/bookings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-bus">
                            </i>
                            {{ trans('cruds.vehicleManagment.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('vehicletype_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/vehicletypes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.vehicletypes.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-shuttle-van">
                                        </i>
                                        {{ trans('cruds.vehicletype.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('vehicle_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/vehicles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.vehicles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-bus-alt">
                                        </i>
                                        {{ trans('cruds.vehicle.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('booking_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/bookings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.bookings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-car">
                                        </i>
                                        {{ trans('cruds.booking.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/user-alerts*")||request()->is("admin/users*")||request()->is("admin/schools*")||request()->is("admin/students*")||request()->is("admin/admins*")||request()->is("admin/vendors*")||request()->is("admin/emergencycontacts*")||request()->is("admin/guardians*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('user_alert_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/user-alerts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-alerts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                                        </i>
                                        {{ trans('cruds.userAlert.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('school_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/schools*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.schools.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-school">
                                        </i>
                                        {{ trans('cruds.school.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('student_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/students*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.students.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-child">
                                        </i>
                                        {{ trans('cruds.student.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('admin_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/admins*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.admins.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle">
                                        </i>
                                        {{ trans('cruds.admin.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('vendor_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/vendors*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.vendors.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-hand-holding-usd">
                                        </i>
                                        {{ trans('cruds.vendor.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('emergencycontact_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/emergencycontacts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.emergencycontacts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-hospital">
                                        </i>
                                        {{ trans('cruds.emergencycontact.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('guardian_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/guardians*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.guardians.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.guardian.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('notification_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/notifications*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.notifications.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon far fa-bell">
                            </i>
                            {{ trans('cruds.notification.title') }}
                        </a>
                    </li>
                @endcan
                @can('agreement_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/agreements*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.agreements.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                            </i>
                            {{ trans('cruds.agreement.title') }}
                        </a>
                    </li>
                @endcan
                @can('routes_and_attendence_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/attendances*")||request()->is("admin/route-histories*")||request()->is("admin/junctions*")||request()->is("admin/locations*")||request()->is("admin/expenses*")||request()->is("admin/routes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-map-marked-alt">
                            </i>
                            {{ trans('cruds.routesAndAttendence.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('attendance_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/attendances*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.attendances.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-address-card">
                                        </i>
                                        {{ trans('cruds.attendance.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('route_history_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/route-histories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.route-histories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-history">
                                        </i>
                                        {{ trans('cruds.routeHistory.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('junction_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/junctions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.junctions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-stop-circle">
                                        </i>
                                        {{ trans('cruds.junction.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('location_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/locations*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.locations.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-map-marker-alt">
                                        </i>
                                        {{ trans('cruds.location.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('expense_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/expenses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.expenses.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-dollar-sign">
                                        </i>
                                        {{ trans('cruds.expense.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('route_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/routes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.routes.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-map-marked-alt">
                                        </i>
                                        {{ trans('cruds.route.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('settings_and_appearance_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/settings*")||request()->is("admin/sliders*")||request()->is("admin/roles*")||request()->is("admin/permissions*")||request()->is("admin/logs*")||request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.settingsAndAppearance.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('setting_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/settings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.settings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.setting.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('slider_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/sliders*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.sliders.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-sliders-h">
                                        </i>
                                        {{ trans('cruds.slider.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('log_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.logs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-sign-out-alt">
                                        </i>
                                        {{ trans('cruds.log.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.audit-logs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                                        </i>
                                        {{ trans('cruds.auditLog.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('drivers_and_caretaker_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/commissions*")||request()->is("admin/drivers*")||request()->is("admin/caretakers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.driversAndCaretaker.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('commission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/commissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.commissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-people-carry">
                                        </i>
                                        {{ trans('cruds.commission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('driver_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/drivers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.drivers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-tie">
                                        </i>
                                        {{ trans('cruds.driver.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('caretaker_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/caretakers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.caretakers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-female">
                                        </i>
                                        {{ trans('cruds.caretaker.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('payment_managment_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/packages*")||request()->is("admin/costs*")||request()->is("admin/earnings*")||request()->is("admin/payments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-money-bill">
                            </i>
                            {{ trans('cruds.paymentManagment.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('package_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/packages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.packages.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-box">
                                        </i>
                                        {{ trans('cruds.package.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('cost_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/costs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.costs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-money-bill">
                                        </i>
                                        {{ trans('cruds.cost.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('earning_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/earnings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.earnings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-money-check-alt">
                                        </i>
                                        {{ trans('cruds.earning.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('payment_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/payments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.payments.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-money-bill-alt">
                                        </i>
                                        {{ trans('cruds.payment.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>