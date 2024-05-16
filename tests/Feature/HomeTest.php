<?php

/*
    Author: Miguel Jaramillo
*/

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSeeText(trans('app.adventure.intro'));
    }

    public function test_about(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }
}
