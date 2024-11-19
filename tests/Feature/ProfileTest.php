<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function testSuccessfulProfileUpdate()
    {
        $user = User::factory()->create([
            'name' => 'Old Name',
            'email' => 'old@example.com',
        ]);

        $this->actingAs($user);
        $data = [
            'name' => 'New Name',
            'email' => 'new@example.com',
        ];
        $response = $this->patch(route('profile.update'), $data);
        $response->assertRedirect(route('profile.edit'));
        $response->assertSessionHas('flash_message', [
            'status' => 'success',
            'message' => 'Профиль успешно обновлен'
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'New Name',
            'email' => 'new@example.com',
        ]);
    }

    /**
     * Тест на ошибку валидации при обновлении профиля.
     *
     * @return void
     */
    public function testValidationFailureProfileUpdate()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $data = [
            'name' => '',
            'email' => 'new@example.com',
        ];
        $response = $this->patch(route('profile.update'), $data);
        $response->assertSessionHasErrors('name');
    }
}
