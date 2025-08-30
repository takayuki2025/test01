<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class Develop2 extends TestCase
{
    use RefreshDatabase;

    public function test_access()
  {
    // ログイン認証が必要なページへのアクセス
    // $user = User::factory()->create();

        // ログイン認証が必要なページへのアクセス
        // $response = $this->actingAs($user)->get('/admin');

        // ログイン認証が必要ないページへのアクセス
        $this->assertTrue(true);

        $response = $this->get('/register');
        $response->assertStatus(200);

        // 共通
        $response = $this->get('/no_route');
        $response->assertStatus(404);
}

    public function test_database()
    {
        User::factory()->create([
            'name'=>'aaa',
            'email'=>'bbb@ccc.com',
            'password'=>'test12345'
        ]);
        $this->assertDatabaseHas('users',[
            'name'=>'aaa',
            'email'=>'bbb@ccc.com',
            'password'=>'test12345'
        ]);
    }
}