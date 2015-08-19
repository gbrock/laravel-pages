<?php

namespace Gbrock\Pages\Tests;

use Gbrock\Pages\Tests\Cases\DatabaseTestCase;
use Illuminate\Support\Facades\Schema;

class DatabaseTables extends DatabaseTestCase
{
    /**
     * Ensures the migrations ran and tables exist in the database.
     */
    public function test_tables_exist()
    {
        $expectedTables = [
            'pages',
        ];

        foreach ($expectedTables as $table) {
            $this->assertTrue(Schema::hasTable($table));
        }
    }
}
