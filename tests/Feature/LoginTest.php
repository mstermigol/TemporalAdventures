<?php

/*
    Author: Miguel Jaramillo
*/

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{

    public function test_login_path(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login(): void
    {
        $response = $this->post('/login', [
            'email' => 'migue@gmail.com',
            'password' => '123456789',
        ]);

        $response->assertRedirect('/');

        $response->assertDontSeeText(trans('app.navbar_items.login'));
    }

}
