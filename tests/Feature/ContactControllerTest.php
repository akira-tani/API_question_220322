<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_contact()
    {
        $item = Contact::factory()->create();
        $response = $this->get('/api/contact');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => $item->name,
            'email' => $item->email,
        ]);
    }
    // public function test_store_contact()
    // {
    //     $data = [
    //         'name' => 'rest',
    //         'email' => 'email@example.com',
    //     ];
    //     $response = $this->post('/api/contact', $data);
    //     $response->assertStatus(201);
    //     $response->assertJsonFragment($data);
    //     $this->assertDatabaseHas('contacts', $data);
    // }
}
