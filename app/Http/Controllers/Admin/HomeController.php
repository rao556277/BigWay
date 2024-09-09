<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Vendors',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Vendor',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'        => '5',
            'translation_key'       => 'vendor',
        ];

        $settings1['total_number'] = 0;
        if (class_exists($settings1['model'])) {
            $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1) {
                if (isset($settings1['filter_days'])) {
                    return $query->where($settings1['filter_field'], '>=',
                        now()->subDays($settings1['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings1['filter_period'])) {
                    switch ($settings1['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings1['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');
        }

        $settings2 = [
            'chart_title'           => 'Schools',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\School',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'        => '5',
            'translation_key'       => 'school',
        ];

        $settings2['total_number'] = 0;
        if (class_exists($settings2['model'])) {
            $settings2['total_number'] = $settings2['model']::when(isset($settings2['filter_field']), function ($query) use ($settings2) {
                if (isset($settings2['filter_days'])) {
                    return $query->where($settings2['filter_field'], '>=',
                        now()->subDays($settings2['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings2['filter_period'])) {
                    switch ($settings2['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings2['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings2['aggregate_function'] ?? 'count'}($settings2['aggregate_field'] ?? '*');
        }

        $settings3 = [
            'chart_title'           => 'Students',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Student',
            'group_by_field'        => 'dob',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d',
            'column_class'          => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'        => '5',
            'translation_key'       => 'student',
        ];

        $settings3['total_number'] = 0;
        if (class_exists($settings3['model'])) {
            $settings3['total_number'] = $settings3['model']::when(isset($settings3['filter_field']), function ($query) use ($settings3) {
                if (isset($settings3['filter_days'])) {
                    return $query->where($settings3['filter_field'], '>=',
                        now()->subDays($settings3['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings3['filter_period'])) {
                    switch ($settings3['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings3['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings3['aggregate_function'] ?? 'count'}($settings3['aggregate_field'] ?? '*');
        }

        $settings4 = [
            'chart_title'           => 'Vehicles',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Vehicle',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'        => '5',
            'translation_key'       => 'vehicle',
        ];

        $settings4['total_number'] = 0;
        if (class_exists($settings4['model'])) {
            $settings4['total_number'] = $settings4['model']::when(isset($settings4['filter_field']), function ($query) use ($settings4) {
                if (isset($settings4['filter_days'])) {
                    return $query->where($settings4['filter_field'], '>=',
                        now()->subDays($settings4['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings4['filter_period'])) {
                    switch ($settings4['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings4['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings4['aggregate_function'] ?? 'count'}($settings4['aggregate_field'] ?? '*');
        }

        $settings5 = [
            'chart_title'           => 'Attendence',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Attendance',
            'group_by_field'        => 'date',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full xl:w-6/12',
            'entries_number'        => '5',
            'translation_key'       => 'attendance',
        ];

        $chart5 = new LaravelChart($settings5);

        $settings6 = [
            'chart_title'           => 'Total Earnings',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Earning',
            'group_by_field'        => 'date',
            'group_by_period'       => 'month',
            'aggregate_function'    => 'avg',
            'aggregate_field'       => 'amount',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full xl:w-6/12',
            'entries_number'        => '5',
            'translation_key'       => 'earning',
        ];

        $chart6 = new LaravelChart($settings6);

        $settings7 = [
            'chart_title'        => 'Users',
            'chart_type'         => 'latest_entries',
            'report_type'        => 'group_by_string',
            'model'              => 'App\Models\User',
            'group_by_field'     => 'name',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'filter_period'      => 'year',
            'column_class'       => 'w-full xl:w-6/12',
            'entries_number'     => '5',
            'fields'             => [
                'id'    => '',
                'name'  => '',
                'email' => '',
            ],
            'translation_key' => 'user',
        ];

        $settings7['data'] = [];
        if (class_exists($settings7['model'])) {
            $settings7['data'] = $settings7['model']::latest()
                ->take($settings7['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings7)) {
            $settings7['fields'] = [];
        }

        $settings8 = [
            'chart_title'        => 'Vehicle',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\Models\Vehicle',
            'group_by_field'     => 'name',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'w-full xl:w-6/12',
            'entries_number'     => '5',
            'relationship_name'  => 'createdBy',
            'translation_key'    => 'vehicle',
        ];

        $chart8 = new LaravelChart($settings8);

        return view('admin.home', compact('chart5', 'chart6', 'chart8', 'settings1', 'settings2', 'settings3', 'settings4', 'settings7'));
    }
}
