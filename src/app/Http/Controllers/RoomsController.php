<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Room;
use Illuminate\Http\Request;

/**
 * Class RoomsController
 * @package App\Http\Controllers
 */
class RoomsController extends Controller
{
    /**
     * @param Request $request
     * @param string $roomId
     * @return RoomResource
     */
    public function show(Request $request, string $roomId)
    {
        return (new RoomResource(Room::where('id', $roomId)->firstOrFail()));
    }
}
