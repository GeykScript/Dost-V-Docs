<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserAccountEmail;

class AddUserAccountTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   use RefreshDatabase;

    /** @test */
    public function it_can_create_a_new_user_account()
    {
        // Prevent actual emails from being sent
        Mail::fake();

        // Create a unit for the user
        $unit = Unit::factory()->create();

        // Prepare data
        $data = [
            'username' => 'Geykscript',
            'first_name' => 'Jake',
            'last_name' => 'Morales',
            'suffix' => 'Jr',
            'email' => 'thedemonhunter11@gmail.com',
            'unit_id' => $unit->id,
            'position' => 'Unit Head',
            'is_super_admin' => 0,
        ];

        // Act as an authenticated user
        $admin = User::factory()->create();
        $response = $this->actingAs($admin)
            ->post(route('accounts.store'), $data);

        // Assertions
        $response->assertRedirect(route('accounts')); // redirected after success
        $this->assertDatabaseHas('users', ['email' => 'thedemonhunter11@gmail.com']);
        $this->assertDatabaseHas('user_assignments', [
            'position' => 'Unit Head',
            'unit_id' => $unit->id
        ]);

        // Check email was sent
        Mail::assertSent(NewUserAccountEmail::class, function ($mail) use ($data) {
            return $mail->hasTo($data['email']);
        });
    }
}
