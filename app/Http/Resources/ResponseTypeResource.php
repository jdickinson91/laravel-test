<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ResponseTypeResource extends Resource {

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'code'       => $this->code,
            'deleted_at' => $this->deleted_at
        ];
    }
}
