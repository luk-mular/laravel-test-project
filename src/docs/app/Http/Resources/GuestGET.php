<?php

/**
 * @OA\Schema(schema="GuestGETAttributes", required={ "id_number", "first_name", "last_name", "email", "phone", "city", "country", "created_at", "updated_at" },
 *
 *  @OA\Property(property="id_number", type="string", minLength=6, maxLength=30, example="ABS123456"),
 *  @OA\Property(property="first_name", type="string", minLength=3, maxLength=100, example="John"),
 *  @OA\Property(property="last_name", type="string", minLength=3, maxLength=100, example="Doe"),
 *  @OA\Property(property="email", type="string", maxLength=100, example="john.doe@example.com"),
 *  @OA\Property(property="phone", type="string", minLength=9, maxLength=30, example="+48710072772"),
 *  @OA\Property(property="country", minLength=2, maxLength=2, example="PL"),
 *  @OA\Property(property="created_at", type="string", format="Y-m-d H:i:s", example="2020-01-01 11:55:00"),
 *  @OA\Property(property="updated_at", type="string", format="Y-m-d H:i:s", example="2020-01-01 11:55:00"),
 * )
 */

/**
 * @OA\Schema(schema="GuestGETDataItemLinks", required={"self"},
 *
 *  @OA\Property(property="self", type="string", example="http://localhost/api/Guests/1"),
 * )
 **/

/**
 * @OA\Schema(schema="GuestGETDataItem", required={ "id", "type", "attributes", "links" },
 *
 *  @OA\Property(property="type", type="string", example="Guests"),
 *  @OA\Property(property="id", type="integer", format="int64", example="1"),
 *  @OA\Property(property="attributes", type="object", ref="#/components/schemas/GuestGETAttributes"   ),
 *  @OA\Property(property="links", type="object", ref="#/components/schemas/GuestGETDataItemLinks"   ),
 * )
 **/

/**
 * @OA\Schema(schema="GuestGET", required={"data"},
 *
 *  @OA\Property(property="data", type="object", ref="#/components/schemas/GuestGETDataItem"   ),
 * )
 **/
