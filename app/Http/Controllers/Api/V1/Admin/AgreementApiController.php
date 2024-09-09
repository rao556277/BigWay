<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgreementRequest;
use App\Http\Requests\UpdateAgreementRequest;
use App\Http\Resources\Admin\AgreementResource;
use App\Models\Agreement;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgreementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agreement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgreementResource(Agreement::with(['user', 'createdBy', 'updatedBy'])->get());
    }

    public function store(StoreAgreementRequest $request)
    {
        $agreement = Agreement::create($request->validated());

        return (new AgreementResource($agreement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Agreement $agreement)
    {
        abort_if(Gate::denies('agreement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgreementResource($agreement->load(['user', 'createdBy', 'updatedBy']));
    }

    public function update(UpdateAgreementRequest $request, Agreement $agreement)
    {
        $agreement->update($request->validated());

        return (new AgreementResource($agreement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Agreement $agreement)
    {
        abort_if(Gate::denies('agreement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agreement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
