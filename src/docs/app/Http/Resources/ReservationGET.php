<?php

/**
 * @OA\Schema(schema="ReservationGETAttributes", required={ "from", "to", "adults_amount", "children_amount", "infants_amount", "first_name", "last_name", "email", "phone", "notes", "created_at", "updated_at" },
 *
 *  @OA\Property(property="from", type="string", format="Y-m-d", example="2020-01-01"),
 *  @OA\Property(property="to", type="string", format="Y-m-d", example="2020-01-03"),
 *  @OA\Property(property="adults_amount", type="number", format="int32", minimum=0, maximum=4, example="2"),
 *  @OA\Property(property="children_amount", type="number", format="int32", minimum=0, maximum=4, example="0"),
 *  @OA\Property(property="infants_amount", type="number", format="int32", minimum=0, maximum=4, example="0"),
 *  @OA\Property(property="first_name", type="string", maxLength=100, example="John"),
 *  @OA\Property(property="last_name", type="string", maxLength=100, example="Doe"),
 *  @OA\Property(property="email", type="string", minLength=3, maxLength=100, example="john.doe@example.com"),
 *  @OA\Property(property="notes", type="string", maxLength=65535, example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
 *  @OA\Property(property="status", type="string", enum={"pending", "confirmed", "cancelled", "completed", "overdue"}),
 *  @OA\Property(property="created_at", type="string", format="Y-m-d H:i:s", example="2020-01-01 11:55:00"),
 *  @OA\Property(property="updated_at", type="string", format="Y-m-d H:i:s", example="2020-01-01 11:55:00"),
 * )
 */

/**
 * @OA\Schema(schema="ReservationGETDataItemLinks", required={"self"},
 *
 *  @OA\Property(property="self", type="string", example="http://localhost/api/reservations/1"),
 * )
 **/

/**
 * @OA\Schema(schema="ReservationGETRelationships", required={ "room" },
 *
 *  @OA\Property(property="room", type="object", ref="#/components/schemas/RoomRelatedSingleOutput", description="" ),
 * )
 **/

/**
 * @OA\Schema(schema="ReservationGETDataItem", required={ "id", "type", "attributes", "relationships", "links" },
 *
 *  @OA\Property(property="type", type="string", example="reservations"),
 *  @OA\Property(property="id", type="integer", format="int64", example="1"),
 *  @OA\Property(property="attributes", type="object", ref="#/components/schemas/ReservationGETAttributes"),
 *  @OA\Property(property="relationships", type="object", ref="#/components/schemas/ReservationGETRelationships"),
 *  @OA\Property(property="links", type="object", ref="#/components/schemas/ReservationGETDataItemLinks"),
 * )
 **/

/**
 * @OA\Schema(schema="ReservationGET", required={"data"},
 *
 *  @OA\Property(property="data", type="object", ref="#/components/schemas/ReservationGETDataItem"   ),
 * )
 **/
