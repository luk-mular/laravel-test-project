<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\BusinessLogic\Room\Floor\FloorEnum;
use App\BusinessLogic\Room\Type\TypeEnum;
use App\Http\Resources\RoomResource;
use App\Http\Resources\ValidationErrorResource;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class RoomsController
 * @package App\Http\Controllers
 */
class RoomsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/rooms/{roomId}",
     *     tags={"rooms.general"},
     *     summary="Get details of a room.",
     *     description="",
     *     operationId="rooms.show",
     *     deprecated=false,
     *      @OA\Parameter(name="roomId", in="path", required=true, @OA\Schema(type="integer", format="int64")),
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
     * @param string $roomId
     * @return RoomResource
     */
    public function show(Request $request, string $roomId)
    {
        return new RoomResource(Room::where('id', $roomId)->firstOrFail());
    }

    /**
     * @OA\Post(
     *     path="/api/rooms",
     *     tags={"rooms.general"},
     *     summary="Create new room.",
     *     description="",
     *     operationId="rooms.store",
     *     deprecated=false,
     *     @OA\Response(
     *         response=201,
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
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="application/vnd.api+json", @OA\Schema(ref="#/components/schemas/RoomPOST"))
     *     ),
     * )
     */

    /**
     * Adds a new room
     *
     * @param Request $request
     * @return RoomResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \ReflectionException
     */
    public function store(Request $request)
    {
        $rules = [
            'data.type' => 'required|in:rooms',
            'data.attributes.type' => 'required|in:' . implode(',', TypeEnum::getConstants()),
            'data.attributes.number' => 'required|string|alpha_num|max:10',
            'data.attributes.floor' => 'required|in:' . implode(',', FloorEnum::getConstants()),
            'data.attributes.price_default' => 'required|numeric|between:0,99999.99',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return \response(new ValidationErrorResource($validator->getMessageBag()), 400);
        }

        $room = new Room($request->json('data.attributes'));
        $room->save();

        return new RoomResource($room);
    }
}
