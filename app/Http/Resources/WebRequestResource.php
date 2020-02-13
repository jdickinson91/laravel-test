<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class WebRequestResource extends Resource {

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id'                => $this->id,
            'response_type_id'  => $this->response_type_id,
            'response_type'     => ResponseTypeResource::make($this->whenLoaded('responseType')),
            'country_id'        => CountryResource::make($this->whenLoaded('country'))
        ];
    }
}
