<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class registrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisterWithoutErrors()
    {
        $this->withoutExceptionHandling();
        // $user = factory(User::class)->create();

        $data = [
            'email' => 'business@example.com',
            'name' => 'Test',
            'business_name' => 'Empire',
            'password' => 'password',
        ];
        //Send post request
        $response = $this->json('POST','api/register',$data);
        //Assert it was successful
        $response->assertStatus(200)
        ->assertJsonStructure([
            'success',
            'data' => [
                'name',
                'token'
            ],
            'message',
        ]);
    }

    public function testRegisterWithExistingEmail()
    {
        User::factory()->create([
            "email" => "test@gmail.com"
        ]);

        $user = User::factory()->make([
            "email" => "test@gmail.com"
        ])->toArray();
        //Send post request
        $response = $this->json('POST','api/register',$user);
        //Assert it was successful
        $response->assertStatus(422)
            ->assertInvalid([
                'email' => 'User with this email address already exist'
            ]);
    }

    public function testRegisterWithInvalidEmailAddress()
    {
        $user = User::factory()->make([
            "email" => "test",
        ])->toArray();
        //Send post request
        $response = $this->json('POST','api/register',$user);
        //Assert it was successful
        $response->assertStatus(422)
            ->assertInvalid([
                'email' => 'Enter a valid email address'
            ]);
    }

    public function testRegisterWithoutOrWithEmptyCredentials()
    {
        $user = User::factory()->make([
            "email" => "",
            "name" => "",
            "business_name" => "",
            "password" => ""
        ])->toArray();
        //Send post request
        $response = $this->json('POST','api/register',$user);
        //Assert it was successful
        $response->assertStatus(422)
            ->assertInvalid([
                'email' => 'Email field cannot be empty. Enter your login credentials',
                'name' => 'Name field cannot be empty',
                'business_name' => 'The business name field is required.',
                'password' => 'Password field cannot be empty',
        ], true);
    }
}
