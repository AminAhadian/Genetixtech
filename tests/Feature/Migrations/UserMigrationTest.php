<?php
namespace Tests\Feature\Migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_table_has_expected_columns()
    {
        $this->artisan('migrate');
        $this->assertTrue(Schema::hasTable('users'));
        $this->assertTrue(Schema::hasColumns('users', [
            'id',
            'name',
            'phone_number',
            'email',
            'email_verified_at',
            'phone_number_verified_at',
            'password',
            'date_of_birth',
            'active',
            'created_at',
            'updated_at',
        ]));
    }

    public function test_users_table_is_dropped_on_rollback()
    {
        $this->artisan('migrate');
        $this->artisan('migrate:rollback');
        $this->assertFalse(Schema::hasTable('users'));
    }
}
