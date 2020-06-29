<?php

/**
 * @OA\Schema(schema="RoomPOSTAttributes", required={ "type", "number", "floor", "price_default" },
 *
 *  @OA\Property(property="type", type="string", enum={"superior", "executive", "apartament"}),
 *  @OA\Property(property="number", type="string", minLength=3, maxLength=10  , example="201"),
 *  @OA\Property(property="floor", type="string", enum={"2", "3", "4"}),
 *  @OA\Property(property="price_default", type="number", format="float", example="200.00"),
 * )
 */

/**
 * @OA\Schema(schema="RoomPOSTDataItem", required={ "type", "attributes" },
 *
 *  @OA\Property(property="type", type="string", example="rooms"),
 *  @OA\Property(property="attributes", type="object", ref="#/components/schemas/RoomPOSTAttributes"   ),
 * )
 **/

/**
 * @OA\Schema(schema="RoomPOST", required={"data"},
 *
 *  @OA\Property(property="data", type="object", ref="#/components/schemas/RoomPOSTDataItem"   ),
 * )
 **/
