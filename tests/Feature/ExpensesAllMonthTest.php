<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExpensesAllMonthTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/expenses');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    '*' => [
                        'month',
                        'nome',
                        'value',
                    ],
                ],
            ])
            ->assertJsonCount(12);
    }
}
