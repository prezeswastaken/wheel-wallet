<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DatabaseMigrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_users_table_has_expected_columns()
    {
        // Uruchom migracje
        $this->artisan('migrate');

        // Sprawdź, czy tabela "users" istnieje w bazie danych
        $this->assertTrue(Schema::hasTable('users'));

        // Sprawdź, czy tabela zawiera oczekiwane kolumny
        $this->assertTrue(Schema::hasColumns('users', [
            'id',
            'name',
            'email',
            'password',
            // Dodaj inne kolumny, które powinny istnieć w tabeli
        ]));
    }

    // Tutaj możesz dodać inne testy dotyczące migracji, np. dodawanie innych tabel, indeksów itp.
}