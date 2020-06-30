<?php

/**
 * @OA\Schema(schema="RoomGETAttributes", required={ "type", "number", "floor", "price_default", "created_at", "updated_at" },
 *
 *  @OA\Property(property="type", type="string", enum={"superior", "executive", "suite"}),
 *  @OA\Property(property="number", type="string", minLength=3, maxLength=10  , example="201"),
 *  @OA\Property(property="floor", type="string", enum={"2", "3", "4"}),
 *  @OA\Property(property="price_default", type="number", format="float", example="200.00"),
 *  @OA\Property(property="created_at", type="string", format="Y-m-d H:i:s"  , example="2020-01-01 11:55:00"),
 *  @OA\Property(property="updated_at", type="string", format="Y-m-d H:i:s"  , example="2020-01-01 11:55:00"),
 * )
 */

/**
 * @OA\Schema(schema="RoomGETDataItemLinks", required={"self"},
 *
 *  @OA\Property(property="self", type="string", example="http://localhost/api/rooms/1"),
 * )
 **/

/**
 * @OA\Schema(schema="RoomGETDataItem", required={ "id", "type", "attributes", "links" },
 *
 *  @OA\Property(property="type", type="string", example="rooms"),
 *  @OA\Property(property="id", type="integer", format="int64", example="1"),
 *  @OA\Property(property="attributes", type="object", ref="#/components/schemas/RoomGETAttributes"   ),
 *  @OA\Property(property="links", type="object", ref="#/components/schemas/RoomGETDataItemLinks"   ),
 * )
 **/

/**
 * @OA\Schema(schema="RoomGET", required={"data"},
 *
 *  @OA\Property(property="data", type="object", ref="#/components/schemas/RoomGETDataItem"   ),
 * )
 **/

/**
 * @OA\Schema(schema="RoomRelatedDataObject", required={"id", "type"},
 *
 *  @OA\Property(property="id", type="string", example="1"),
 *  @OA\Property(property="type", type="string", example="rooms"),
 * )
 */

/**
 * @OA\Schema(schema="RoomRelatedLinkObject", required={"related"},
 *
 *  @OA\Property(property="related", type="string"),
 * )
 */

/**

/**
 * @OA\Schema(schema="RoomRelatedSingleOutput", required={"data"},
 *
 *  @OA\Property(property="links", type="object", ref="#/components/schemas/RoomRelatedLinkObject"   ),
 *  @OA\Property(property="data", type="object", ref="#/components/schemas/RoomRelatedDataObject"   ),
 * )
 */
