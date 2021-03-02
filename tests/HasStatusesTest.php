<?php

namespace Tests;

use Fabpl\ModelStatus\Exceptions\InvalidStatusException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class HasStatusesTest extends TestCase
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $builder = $this->app['db']->connection()->getSchemaBuilder();

        $builder->create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $this->model = TestModel::create(['name' => 'test']);
    }

    public function testSetterTest(): void
    {
        $this->model->setStatus('one');

        $this->assertEquals('one', $this->model->status);
    }

    public function testSettersTest(): void
    {
        $this->model->setStatus('one');
        $this->model->setStatus('two');

        $this->assertInstanceOf(Collection::class, $this->model->statuses);
        $this->assertCount(2, $this->model->statuses);
        $this->assertEquals('two', $this->model->status);
    }

    public function testInvalidStatusExceptionTest(): void
    {
        $this->expectException(InvalidStatusException::class);

        $this->model->setStatus('three');
    }
}
