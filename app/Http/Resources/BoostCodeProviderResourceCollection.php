<?php

namespace App\Http\Resources;

use App\Models\Admin\BoostCodeProvider;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class BoostCodeProviderResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array|Collection
     */
    public function toArray($request)
    {
        $data = $this->collection->transform(function ($provider) {
            /** @var BoostCodeProvider $provider */
            return [
                'id' => $provider->id,
                'name' => $provider->name,
                'unique_id' => $provider->unique_id,
                'description' => $provider->description,
                'credits_left' => $provider->creditLeft(),
                'credits_total' => $provider->credits_total,
                'image' => $provider->image,
            ];
        });

        if ($data->count() == 1) {
            // Fixing of sometime collections array sometimes object for when have one element
            return [$data->first()];
        } else {
            return $data;
        }

    }
}