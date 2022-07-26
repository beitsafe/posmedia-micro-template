<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseRequest;
use App\Http\Resources\BaseResource;
use App\Interfaces\OptionRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class OptionController extends Controller
{
    private OptionRepositoryInterface $optionRepository;

    public function __construct(OptionRepositoryInterface $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }

    /**
     * @OA\Get(
     *      path="/options",
     *      operationId="optionList",
     *      tags={"Option"},
     *      summary="List of all options",
     *      security={ {"bearerAuth": {}} },
     *      @OA\Response(response=200, description="List of all options", @OA\JsonContent()),
     *      @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     *      @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent()),
     *      @OA\Response(response=403, description="Forbidden", @OA\JsonContent()),
     * )
     */

    public function index(Request $request): ResourceCollection
    {
        return BaseResource::collection($this->optionRepository->paginate($request->all()));
    }

    /**
     * @OA\Post(
     *      path="/options",
     *      operationId="optionStore",
     *      tags={"Option"},
     *      summary="Store new option",
     *      security={ {"bearerAuth": {}} },
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="option_name", type="string", example="option"),
     *              @OA\Property(property="option_value", type="string", example="value")
     *          ),
     *      ),
     *      @OA\Response(response=201, description="Created option", @OA\JsonContent()),
     *      @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     *      @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent()),
     *      @OA\Response(response=403, description="Forbidden", @OA\JsonContent()),
     * )
     */
    public function store(BaseRequest $request): BaseResource
    {
        return new BaseResource($this->optionRepository->create($request->all()));
    }

    /**
     * @OA\Get(
     *      path="/options/{id}",
     *      operationId="optionShow",
     *      tags={"Option"},
     *      summary="Get option information",
     *      security={ {"bearerAuth": {}} },
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="string", format="uuid")
     *      ),
     *      @OA\Response(response=200, description="Show option", @OA\JsonContent()),
     *      @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     *      @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent()),
     *      @OA\Response(response=403,description="Forbidden", @OA\JsonContent()),
     *      @OA\Response(response=404, description="Not Found", @OA\JsonContent()),
     * )
     */
    public function show($id): BaseResource
    {
        return new BaseResource($this->optionRepository->find($id));
    }

    /**
     * @OA\Put(
     *      path="/options/{id}",
     *      operationId="optionUpdate",
     *      tags={"Option"},
     *      summary="Update existing option",
     *      security={ {"bearerAuth": {}} },
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="string", format="uuid")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="option_value", type="string", example="value")
     *          ),
     *      ),
     *      @OA\Response(response=202, description="Updated option", @OA\JsonContent()),
     *      @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     *      @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent()),
     *      @OA\Response(response=403, description="Forbidden", @OA\JsonContent()),
     *      @OA\Response(response=404, description="Not Found", @OA\JsonContent()),
     * )
     */
    public function update($id, BaseRequest $request): JsonResponse
    {
        return response()->json($this->optionRepository->update($id, $request->all()), Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/options/{id}",
     *      operationId="optionDelete",
     *      tags={"Option"},
     *      summary="Delete existing option",
     *      security={ {"bearerAuth": {}} },
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="string", format="uuid")
     *      ),
     *      @OA\Response(response=204, description="Deleted option", @OA\JsonContent()),
     *      @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     *      @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent()),
     *      @OA\Response(response=403, description="Forbidden", @OA\JsonContent()),
     *      @OA\Response(response=404, description="Not Found", @OA\JsonContent()),
     * )
     */
    public function destroy($id): JsonResponse
    {
        return response()->json($this->optionRepository->delete($id), Response::HTTP_NO_CONTENT);
    }
}
