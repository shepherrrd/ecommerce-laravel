<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'item' => $this->item->item,
            'user' =>[
               'user_id' => $this->user->id,
               'user_email' => $this->user->email 
            ]
            ];
    }
}
