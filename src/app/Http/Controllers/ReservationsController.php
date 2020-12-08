<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\BusinessLogic\Reservation\Status\StatusEnum;
use App\BusinessLogic\Reservation\Status\StatusMap;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\RoomResource;
use App\Http\Resources\ValidationErrorResource;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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


    /**
     * @OA\Get(
     *     path="/api/reservations/{reservationId}/room",
     *     tags={"reservations.general"},
     *     summary="Get details of related room.",
     *     description="",
     *     operationId="reservations.rooms.show",
     *     deprecated=false,
     *      @OA\Parameter(name="reservationId", in="path", required=true, @OA\Schema(type="integer", format="int64")),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(mediaType="application/vnd.api+json", @OA\Schema(ref="#/components/schemas/RoomGET"))
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
     * @return RoomResource
     */
    public function room(Request $request, int $reservationId): RoomResource
    {
        /** @var Reservation $reservation */
        $reservation = Reservation::where('id', $reservationId)
            ->firstOrFail();

        return new RoomResource(
            $reservation
                ->room()
                ->withTrashed()
                ->firstOrFail()
        );
    }

    /**
     * @OA\Patch (
     *     path="/api/reservations/status",
     *     tags={"reservations.status"},
     *     summary="Sets reservation status",
     *     description="",
     *     operationId="reservations.status.patch",
     *     deprecated=false,
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(mediaType="application/vnd.api+json", @OA\Schema(ref="#/components/schemas/ReservationGET"))
     *     ),
     *     @OA\Response(
     *      response=400,
     *      description="Validation errors"
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
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="application/vnd.api+json", @OA\Schema(ref="#/components/schemas/ReservationPATCH"))
     *     ),
     * )
     */

    /**
     * Ustawia status rezerwacji
     * @param Request $request
     * @return ReservationResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \ReflectionException
     */
    public function status(Request $request)
    {
        $rules = [
            'data.type' => 'required|in:reservations',
            'data.attributes.status' => 'required',
        ];
        /** @var Reservation $reservation */
        $reservation = Reservation::where('id', $request->json('data.id'))
            ->first();
        if ($reservation) {
            $rules['data.attributes.status'] .= '|in:' . implode(
                ',',
                StatusMap::getValueTo($reservation->status, [])
            );
        } else {
            $rules['data.attributes.status'] .= '|in:' . implode(',', StatusEnum::getConstants());
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return \response(new ValidationErrorResource($validator->getMessageBag()), 400);
        }
        $reservation->status = $request->json('data.attributes.status');
        $reservation->save();

        return new ReservationResource($reservation);
    }
}
