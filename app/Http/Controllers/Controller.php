<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Devsafe µs Documentation",
 *      description="Devsafe µs Swagger OpenApi Description",
 *      @OA\Contact(
 *          email="developers@beitsafe.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000/api/v1",
 *     description="Local API Server",
 * )
 *
 * @OA\Server(
 *     url="http://posmediacentre-2103936654.ap-southeast-2.elb.amazonaws.com/api/v1",
 *     description="Live API Server",
 * )
 *
 */


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
