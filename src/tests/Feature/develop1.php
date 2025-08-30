<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;
use App\Models\Category;

class Develop1 extends TestCase
{
        use RefreshDatabase;
    /**
     * A basic feature test example.
     */

//     public function test_access_confirm()
//   {
// //  Categoryモデルのダミーデータを作成して、フォーム送信に使用
//         // $category = Category::factory()->create();

//         // フォーム送信をシミュレート（POSTリクエスト）
//         // バリデーションが通る有効なデータを渡す
//         $response = $this->post('/confirm', [
//             // 'category_id' => $category->id,
//             'first_name' => 'テスト',
//             'last_name' => '太郎',
//             'gender' => 1,
//             'email' => 'test@example.com',
//             'tel01' => '090',
//             'tel02' => '1234',
//             'tel03' => '5678',
//             'address' => '東京都',
//             'building' => 'コーポ',
//             'content' => '商品のお届けについて',
//             'detail' => 'テスト用の詳細内容です。',
//         ]);
//         // POSTリクエストが成功し、確認ページが正常に表示されることを検証
//         $response->assertStatus(200);
//         // 存在しないルートへのアクセスが404になることを検証
//         $response = $this->get('/no_route');
//         $response->assertStatus(404);
//     }








//             public function test_access_thanks()
//   {
// //  Categoryモデルのダミーデータを作成して、フォーム送信に使用
//         // $category = Category::factory()->create();

//         // フォーム送信をシミュレート（POSTリクエスト）
//         // バリデーションが通る有効なデータを渡す
//         $response = $this->post('/thanks', [
//             // 'category_id' => 1,
//             'first_name' => 'テスト',
//             'last_name' => '太郎',
//             'gender' => 1,
//             'email' => 'test@example.com',
//             'tel' => '09012345678',

//             'address' => '東京都',
//             'building' => 'コーポ',
//             'content' => '商品のお届けについて',
//             'detail' => 'テスト用の詳細内容です。',
//         ]);
//         // POSTリクエストが成功し、確認ページが正常に表示されることを検証
//         $response->assertStatus(200);
//         // 存在しないルートへのアクセスが404になることを検証
//         $response = $this->get('/no_route');
//         $response->assertStatus(404);
//     }




     public function test_contact_database()
    {
        Contact::factory()->create([
            'first_name' => 'aaa',
        'last_name' => 'bbb',
        'gender'=> 1,
        'email' => 'ccc@ddd.com',
        'tel' => '08012345678',
        'address' => 'コーポ',
        'building' => '山岡',
        'detail' => 'テストです',
        'created_at' => '2025-08-29 22:49:27',
        'updated_at' => '2025-08-29 22:49:27',
        
        'category_id' => 1,

        ]);
        $this->assertDatabaseHas('contacts',[
            'first_name' => 'aaa',
        'last_name' => 'bbb',
        'gender'=> 1,
        'email' => 'ccc@ddd.com',
        'tel' => '08012345678',
        'address' => 'コーポ',
        'building' => '山岡',
        'detail' => 'テストです',
        'created_at' => '2025-08-29 22:49:27',
        'updated_at' => '2025-08-29 22:49:27',
        'category_id' => 1,
        ]);
    }
}
