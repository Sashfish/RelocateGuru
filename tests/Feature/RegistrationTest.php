<?php

namespace Tests\Feature;

use App\model\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    // use RefreshDatabase;

    // public function tearDown()
    // {
    //     parent::tearDown();
    //     User::where('name', 'Taylor')->where('email', 'taylor@example.com')->delete();
    // }

    /**
     *
     * @return void
     */
    public function test_home_page_visit()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_registration_page_visit()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    // Registration tests
    public function test_new_user_registration_with_correct_details()
    {
        $data = [
            'name' => "Taylor",
            'email' => "taylor@example.com",
            'password' => "passWord!1",
            'password_confirmation' => "passWord!1",
            'terms' => "on"
        ];

        $response = $this->from('/register')->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', '/register', $data);
        $response->assertStatus(200)->assertRedirect('/home'); // user redirected to home page

        // remove the user (todo: move to a tearDown function)
        User::where('name', 'Taylor')->where('email', 'taylor@example.com')->delete();
    }

    public function test_new_user_cannot_register_when_password_has_no_uppercase()
    {
        $data = [
            'name' => "Taylor",
            'email' => "taylor@example.com",
            'password' => "password!1",
            'password_confirmation' => "password!1",
            'terms' => "on"
        ];

        $response = $this->from('/register')->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', '/register', $data);
        $response->assertStatus(422); // 422 as error code?
    }

    public function test_new_user_cannot_register_when_password_has_no_lowercase()
    {
        $data = [
            'name' => "Taylor",
            'email' => "taylor@example.com",
            'password' => "PASSWORD!1",
            'password_confirmation' => "PASSWORD!1",
            'terms' => "on"
        ];

        $response = $this->from('/register')->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', '/register', $data);
        $response->assertStatus(422); // 422 as error code?
    }

    public function test_new_user_cannot_register_when_password_has_no_numeric_value()
    {
        $data = [
            'name' => "Taylor",
            'email' => "taylor@example.com",
            'password' => "passWord!",
            'password_confirmation' => "passWord!",
            'terms' => "on"
        ];

        $response = $this->from('/register')->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', '/register', $data);
        $response->assertStatus(422); // 422 as error code?
    }

    public function test_new_user_cannot_register_when_password_has_no_special_character()
    {
        $data = [
            'name' => "Taylor",
            'email' => "taylor@example.com",
            'password' => "passWord1",
            'password_confirmation' => "passWord1",
            'terms' => "on"
        ];

        $response = $this->from('/register')->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', '/register', $data);
        $response->assertStatus(422); // 422 as error code?
    }

    public function test_new_user_cannot_register_when_password_is_less_than_8_chars()
    {
        $data = [
            'name' => "Taylor",
            'email' => "taylor@example.com",
            'password' => "Pass!1",
            'password_confirmation' => "Pass!1",
            'terms' => "on"
        ];

        $response = $this->from('/register')->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', '/register', $data);
        $response->assertStatus(422); // 422 as error code?
    }

    public function test_new_user_cannot_register_when_password_does_not_match_confirm_password()
    {
        $data = [
            'name' => "Taylor",
            'email' => "taylor@example.com",
            'password' => "Password!1",
            'password_confirmation' => "Password!2",
            'terms' => "on"
        ];

        $response = $this->from('/register')->from('/register')->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', '/register', $data);
        $response->assertStatus(422); // 422 as error code?
    }

    public function test_new_user_cannot_register_without_an_email()
    {
        $data = [
            'name' => "Taylor",
            'email' => "",
            'password' => "Password!1",
            'password_confirmation' => "Password!1",
            'terms' => "on"
        ];

        $response = $this->from('/register')->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', '/register', $data);
        $response->assertStatus(422); // 422 as error code?
    }

    public function test_new_user_cannot_register_without_name()
    {
        $data = [
            'name' => "",
            'email' => "taylor@example.com",
            'password' => "Password!1",
            'password_confirmation' => "Password!1",
            'terms' => "on"
        ];

        $response = $this->from('/register')->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', '/register', $data);
        $response->assertStatus(422); // 422 as error code?
    }

    public function test_new_user_cannot_register_terms_are_not_accepted()
    {
        $data = [
            'name' => "Taylor",
            'email' => "taylor@example.com",
            'password' => "Password!1",
            'password_confirmation' => "Password!1",
            'terms' => "off"
        ];

        $response = $this->from('/register')->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', '/register', $data);
        $response->assertStatus(422); // 422 as error code?
    }

    public function test_multiple_users_cannot_have_the_same_email()
    {
        $this->expectExceptionMessageRegExp('/Duplicate entry/'); // expect duplicate entry exception
        // create user 1
        $user1 = factory(User::class)->create([
            'name' => "Joe1",
            'email' => "joe@example.com",
            'password' => bcrypt('i-love-laravel')
        ]);
        // create user 2
        $user2 = factory(User::class)->create([
            'name' => "Joe2",
            'email' => "joe@example.com",
            'password' => bcrypt('i-love-laravel')
        ]);
    }
}
