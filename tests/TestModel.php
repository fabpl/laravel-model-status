<?php

namespace Tests;

use Fabpl\ModelStatus\Traits\HasStatuses;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasStatuses;

    /**
     * @var string
     */
    protected $table = 'tests';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @inheritDoc
     */
    public function getAvailableStatus(): array
    {
        return [
            'one',
            'two',
        ];
    }
}
