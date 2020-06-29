<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use App\Reservation;
use Illuminate\Http\Request;

/**
 * Class ReservationsController
 * @package App\Http\Controllers
 */
class ReservationsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/reservations/{reservationId}",
     *     tags={"reservations.general"},
     *     summary="Get details of a reservation.",
     *     description="",
     *     operationId="reservations.show",
     *     deprecated=false,
     *      @OA\Parameter(name="reservationId", in="path", required=true, @OA\Schema(type="integer", format="int64")),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(mediaType="application/vnd.api+json", @OA\Schema(ref="#/components/schemas/ReservationGET"))
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
     * @param int $reservationId
     * @return ReservationResource
     */
    public function show(Request $request, int $reservationId): ReservationResource
    {
        return new ReservationResource(
            Reservation::where('id', $reservationId)
                ->firstOrFail()
        );
    }
}
