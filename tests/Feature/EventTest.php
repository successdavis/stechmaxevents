<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function eventdatabase_has_expected_columns() {
        $this->assertTrue(Schema::hasColumns('events', [
            'id', 'name'
        ]), 1);
    }
}
