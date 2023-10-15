<?php

namespace Tests\Feature;

use Tests\TestCase;

use Symfony\Component\HttpKernel\Exception\HttpException;


class ExpensesByMonthTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/expenses/5');

        $response->assertStatus(200)
            ->assertJsonStructure([
                [
                    'month',
                    'nome',
                    'value',
                ],
            ])
            ->assertJsonCount(5);
    }

    public function test_invalid_month_below_range() // Mês inválido (abaixo do intervalo):
    {

        $this->withoutExceptionHandling();

        $this->expectException(HttpException::class);
        $this->expectExceptionMessage('Invalid month. Month must be a number between 1 and 12');

        $this->get('/expenses/0');
    }

    public function test_invalid_month_above_range() // Mês inválido (acima do intervalo):
    {
        $this->withoutExceptionHandling();

        $this->expectException(HttpException::class);
        $this->expectExceptionMessage('Invalid month. Month must be a number between 1 and 12');

        $this->get('/expenses/13');
    }

    public function test_month_invalid_when_letter() // Mês inválido (acima do intervalo):
    {
        $this->withoutExceptionHandling();

        $this->expectException(HttpException::class);
        $this->expectExceptionMessage('Invalid month. Month must be a number between 1 and 12');

        $this->get('/expenses/a');
    }
}
