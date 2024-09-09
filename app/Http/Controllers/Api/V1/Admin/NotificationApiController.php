<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Http\Resources\Admin\NotificationResource;
use App\Models\Notification;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NotificationResource(Notification::with(['createdBy', 'updatedBy', 'for'])->get());
    }

    public function store(StoreNotificationRequest $request)
    {
        $notification = Notification::create($request->validated());
        $notification->for()->sync($request->input('for', []));

        return (new NotificationResource($notification))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Notification $notification)
    {
        abort_if(Gate::denies('notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NotificationResource($notification->load(['createdBy', 'updatedBy', 'for']));
    }

    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification->update($request->validated());
        $notification->for()->sync($request->input('for', []));

        return (new NotificationResource($notification))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Notification $notification)
    {
        abort_if(Gate::denies('notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
