<?php

namespace Tests\Feature;

use Tests\TestCase;

class MediasTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/medias');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data' => [
                    '*' => [
                        'mediaName',
                        'count',
                    ],
                ],
            ]);
    }
}
