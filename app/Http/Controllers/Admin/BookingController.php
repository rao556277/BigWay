<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Booking;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookingController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('booking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.booking.index');
    }

    public function create()
    {
        abort_if(Gate::denies('booking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.booking.create');
    }

    public function edit(Booking $booking)
    {
        abort_if(Gate::denies('booking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.booking.edit', compact('booking'));
    }

    public function show(Booking $booking)
    {
        abort_if(Gate::denies('booking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $booking->load('createdBy', 'updatedBy', 'user', 'student', 'vehicle');

        return view('admin.booking.show', compact('booking'));
    }

    public function __construct()
    {
        $this->csvImportModel = Booking::class;
    }
}
