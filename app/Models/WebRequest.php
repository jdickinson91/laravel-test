<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebRequest extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'response_type_id',
        'country_id',
        'ip',
        'response_time',
        'path'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function responseType(){
        return $this->belongsTo(ResponseType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
