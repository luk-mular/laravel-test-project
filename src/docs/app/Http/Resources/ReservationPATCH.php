<?php

/**
 * @OA\Schema(schema="ReservationPatchAttributes", required={ "status" },
 *
 *  @OA\Property(property="status", type="string", enum={"pending", "confirmed", "cancelled", "completed", "overdue"}, example="pending"),
 * )
 **/

/**
 * @OA\Schema(schema="ReservationPATCHDataItem", required={ "type", "id", "attributes" },
 *
 *  @OA\Property(property="type", type="string", example="reservations"),
 *  @OA\Property(property="id", type="int", example="1"),
 *  @OA\Property(property="attributes", type="object", ref="#/components/schemas/ReservationPatchAttributes"   ),
 * )
 **/

/**
 * @OA\Schema(schema="ReservationPATCH", required={"data"},
 *
 *  @OA\Property(property="data", type="object", ref="#/components/schemas/ReservationPATCHDataItem"   ),
 * )
 **/
