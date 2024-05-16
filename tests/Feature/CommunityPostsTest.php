<?php

namespace Tests\Feature;

use Tests\TestCase;

class CommunityPostsTest extends TestCase
{

    public function test_index(): void
    {
        $response = $this->get('/communityposts');

        $response->assertStatus(200);
    }
}
