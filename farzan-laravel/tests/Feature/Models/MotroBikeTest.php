<?php

namespace Tests\Feature\Models;

use App\Models\MotorBike;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MotroBikeTest extends TestCase
{
    // Refresh database
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testinsertdata(): void
    {
       $data=MotorBike::factory()->make()->toArray();
       MotorBike::create($data);
       

        $this->assertDatabaseHas('motor_bikes',$data);
    }
}
