<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'promo_code' => $this->promo_code,
            'discount_type' => $this->discount_type,
            'discount_limit' => $this->discount_limit,
            'discount_value' => $this->discount_value,
            'user_id' => $this->user_id,
        ];
    }
}
