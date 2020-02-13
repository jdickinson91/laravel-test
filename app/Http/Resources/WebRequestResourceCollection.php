<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WebRequestResourceCollection extends ResourceCollection {

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'data' => $this->collection
        ];
    }
}
