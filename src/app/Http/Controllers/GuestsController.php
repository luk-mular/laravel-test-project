<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Guest;
use App\Http\Resources\GuestResource;
use Illuminate\Http\Request;

/**
 * Class GuestsController
 * @package App\Http\Controllers
 */
class GuestsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/guests/{guestId}",
     *     tags={"guests.general"},
     *     summary="Get details of a guest.",
     *     description="",
     *     operationId="guests.show",
     *     deprecated=false,
     *      @OA\Parameter(name="guestId", in="path", required=true, @OA\Schema(type="integer", format="int64")),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(mediaType="application/vnd.api+json", @OA\Schema(ref="#/components/schemas/GuestGET"))
     *     ),
     *     @OA\Response(
     *      response=404,
     *      description="Not Found"
     *     ),
     *     @OA\Response(
     *      response=405,
     *      description="Method not allowed"
     *     ),
     *     @OA\Response(
     *      response=500,
     *      description="Server error"
     *     ),
     * )
     */

    /**
     * @param Request $request
     * @param int $guestId
     * @return GuestResource
     */
    public function show(Request $request, int $guestId): GuestResource
    {
        return new GuestResource(
            Guest::where('id', $guestId)
                ->firstOrFail()
        );
    }
}
