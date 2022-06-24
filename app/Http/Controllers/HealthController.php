<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;


class HealthController extends Controller
{
    /**
     * @OA\GET(
     *     path="/healthz",
     *     tags={"Health"},
     *     summary="Health Check",
     *     description="Health Check",
     *     operationId="health-check",
     *     @OA\Response(response=200, description="Health Check" ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     * )
     */

    public function healthz()
    {
        //All good let's go Mario
        return Response::json([
            'result' => "success",
            'heading' => "Health Response",
            'message' => "This app is healthy"
        ], 200);
    }
}
