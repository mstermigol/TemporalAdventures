<?php

/*
    Author: Miguel Jaramillo
*/

namespace Tests\Feature;

use Tests\TestCase;

class TravelsTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/travels');

        $response->assertStatus(200);
    }
}
