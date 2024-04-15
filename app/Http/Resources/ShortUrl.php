<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShortUrl extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'orig_url' => $this->orig_url,
            'short_url_key' => $this->short_url_key,
            'name' => $this->name,
            'redirect_statistic' => new RedirectStatistic($this->whenLoaded('redirectStatistic')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
