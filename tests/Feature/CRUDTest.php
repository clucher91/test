<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;

abstract class CRUDTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    abstract protected function getUrl(): string;
    abstract protected function getTableName(): string;
    abstract protected function getClassName(): string;
    
    public function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    public function test_create_a_validate_model()
    {
        $model = $this->makeModel();

        $this->json('POST', $this->getUrl(), $model->toArray())
             ->assertStatus(Response::HTTP_CREATED)
             ->assertJson($model->toArray());

        $this->assertDatabaseHas($this->getTableName(), $model->toArray());
    }

    public function test_read_a_validate_model()
    {
        $model = $this->createModel();
        
        $this->json('GET', $this->getUrl() . $model->id)
             ->assertOk()
             ->assertJson($this->assertJsonShow($model));
    }


    public function test_delete_a_validate_model()
    {
        $model = $this->createModel();

        $this->json('DELETE', $this->getUrl() . $model->id, $model->toArray())
             ->assertOk()
             ->assertSeeText('true');

        $this->assertDatabaseMissing($this->getTableName(), $model->toArray());
    }

    protected function assertJsonShow($model)
    {
        return $model->toArray();
    }

    protected function makeModel()
    {
        return factory($this->getClassName())->make();
    }
    
    protected function createModel()
    {
        return factory($this->getClassName())->create();
    }

}