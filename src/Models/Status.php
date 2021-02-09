<?php

namespace Fabpl\ModelStatus\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Status extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'model_type',
        'model_id',
        'name',
    ];

    /**
     * Define model relation.
     *
     * @return MorphTo
     */
    public function model(): MorphTo
    {
        return $this->morphTo(
            'model',
            'model_type',
            'model_id',
            'id'
        );
    }
}
