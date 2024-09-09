<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEarningRequest;
use App\Http\Requests\UpdateEarningRequest;
use App\Http\Resources\Admin\EarningResource;
use App\Models\Earning;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EarningApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('earning_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EarningResource(Earning::with(['createdBy', 'updatedBy'])->get());
    }

    public function store(StoreEarningRequest $request)
    {
        $earning = Earning::create($request->validated());

        return (new EarningResource($earning))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Earning $earning)
    {
        abort_if(Gate::denies('earning_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EarningResource($earning->load(['createdBy', 'updatedBy']));
    }

    public function update(UpdateEarningRequest $request, Earning $earning)
    {
        $earning->update($request->validated());

        return (new EarningResource($earning))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Earning $earning)
    {
        abort_if(Gate::denies('earning_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $earning->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
