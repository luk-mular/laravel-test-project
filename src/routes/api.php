<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * ****** ROOMS **********
 */
Route::get(
    '/rooms/{roomId}',
    [
        'uses' => 'RoomsController@show',
        'as' => 'rooms.show',
    ]
);

Route::post(
    '/rooms',
    [
        'uses' => 'RoomsController@store',
        'as' => 'rooms.store',
    ]
);

/*
 * ****** GUESTS **********
 */
Route::get(
    '/guests/{guestId}',
    [
        'uses' => 'GuestsController@show',
        'as' => 'guests.show',
    ]
);


/*
 * ****** RESERVATIONS ****
 */
Route::get(
    '/reservations/{reservationId}',
    [
        'uses' => 'ReservationsController@show',
        'as' => 'reservations.show',
    ]
);
Route::get(
    '/reservations/{reservationId}/room',
    [
        'uses' => 'ReservationsController@room',
        'as' => 'reservations.room.show',
    ]
);
Route::patch(
    '/reservations/status',
    [
        'uses' => 'ReservationsController@status',
        'as' => 'reservations.status.patch'
    ]
);
