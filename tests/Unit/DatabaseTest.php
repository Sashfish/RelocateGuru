<?php

namespace Tests\Unit;

use App\model\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use App\Service;
use App;

class DatabaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
      $this->assertDatabaseHas('users', [
        'email'=>"teambravo2019@outlook.com"
      ]);
    }

    public function testCreateTipWithMiddleware()
    {
      $data = [
        'title'=>'Test title',
        'description'=>'Test Desc',
        'url'=>'whatever.com',
      ];
      $response=$this->json('post','/tip/create',$data);
      $response->assertStatus(401);
      $response->assertJson(['message'=>"Unauthenticated."]);
    }

    public function testGettingAllTips()//broken
    {
      $this->withoutMiddleware();
      $response=$this->json('get','/tip/select');
      $response->assertStatus(200);
      $response->assertJsonStructure([
        'data'=> [
          'id',
          'title',
          'description',
          'url',
          'category_id',
          'created_at',
          'updated_at',
          'deleted_at',
          'image',
          'user_id',
          'city_id'

      ]
      ]);
    }

    public function testImageUpload()//broken
    {
      $this->withoutMiddleware();
      $response=$this->json('post','/tip/create', [

        'title'=>'Test Title',
        'description'=>'Test Desc',
        'url'=>'whatever.com',
        'category_id'=>1,
        'image'=> UploadedFile::fake()->image('image.jpg'),
        'user_id'=>1,
        'city_id'=>1
      ]);
      $response->assertStatus(201);
      $this->assertNotNull($response->getData());
    }

    public function testDatabaseHasUsers ()//broken
    {
      $this->assertDatabaseHas('users', [

        'id'=>'regex:/[0-9]+/',//numbers
        'role_id'=>'regex:/[12]/',//1-admin 2-user
        'name'=>'regex:/^[a-zA-Z\s]*$/', //any letters + spaces
        'email'=>'regex:/@{1}/'//single @ present

      ]);
    }

    public function testBlogRouteWorks () {
      $blogcontroller=\Mockery::mock('App\Http\Controllers\BlogController[index]');
      $blogcontroller->shouldReceive('index')->once();
      App::instance('App\Http\Controllers\BlogController', $blogcontroller);
      $this->call('GET','/blog');
    }

}
