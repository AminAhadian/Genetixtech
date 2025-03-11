<?php

namespace Tests\Feature\Migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class BlogCategoryMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_categories_table_has_expected_columns()
    {
        $this->artisan('migrate');
        $this->assertTrue(Schema::hasTable('blog_categories'));
        $this->assertTrue(Schema::hasColumns('blog_categories', [
            'id',
            'name',
            'slug',
            'description',
            'featured',
            'active',
            'created_at',
            'updated_at',
        ]));
    }

    public function test_blog_categories_table_is_dropped_on_rollback()
    {
        $this->artisan('migrate');
        $this->artisan('migrate:rollback');
        $this->assertFalse(Schema::hasTable('blog_categories'));
    }
}
