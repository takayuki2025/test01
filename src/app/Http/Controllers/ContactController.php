<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Response;


use Symfony\Component\HttpFoundation\StreamedResponse;



class ContactController extends Controller
{



    public function index()
    {
        return view('index');
    }



    public function admin(Request $request)
{
        $contact = $request->only(['first_name', 'last_name', 'gender',  'email', 'tel01', 'tel02', 'tel03', 'address', 'building', 'content', 'detail']);

        return view('confirm', compact('contact', ));
}


    public function search(Request $request)
{

        $contacts = Contact::with('category')->CategorySearch($request->category_id)
                                            ->KeywordSearch($request->keyword , $request->keyword_gender ,$request->dateFrom)->paginate(7);

        $contacts->appends($request->all());

        $categories = Category::all();



return view('admin', compact('contacts', 'categories'));
}




    public function confirm(ContactRequest $request)
{

    $contact = $request->only(['first_name', 'last_name', 'gender',  'email', 'tel01', 'tel02', 'tel03', 'address', 'building', 'content', 'detail']);


                $genderValue = $request->input('gender');
                $genderText = '';

                if ($genderValue == 1) {
                    $genderText = '　男性';
                } elseif ($genderValue == 2) {
                    $genderText = '　女性';
                } elseif ($genderValue == 3) {
                    $genderText = '　その他';
                }
                $request->session()->put('gender_text', $genderText);

    return view('confirm', compact('contact', ));
}


    public function confirm2(ContactRequest $request)
{

    $contact = $request->only(['first_name', 'last_name', 'gender',  'email', 'tel01', 'tel02', 'tel03', 'address', 'building', 'content', 'detail']);


    return view('back-to-form', compact('contact', ));
}


    public function store(Request $request)

    {

        $contact = $request->only(['first_name', 'last_name', 'gender',  'email', 'tel', 'address', 'building', 'content', 'detail']);

            if($contact['content']=="商品のお届けについて"){
            $contact['category_id'] = 1;
            }elseif($contact['content']=="商品の交換について"){
            $contact['category_id'] = 2;
            }elseif($contact['content']=="商品トラブル"){
            $contact['category_id'] = 3;
            }elseif($contact['content']=="ショップへのお問い合わせ"){
            $contact['category_id'] = 4;
            }elseif($contact['content']=="その他"){
            $contact['category_id'] = 5;
            }

        Contact::create($contact);
        return view('thanks');
    }






    public function modal()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        return view('test-modal', compact('contacts', 'categories', ));
    }





public function exportContacts(): StreamedResponse
    {
        // レスポンスヘッダーの設定（ダウンロードを強制する）
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ];

        // ストリーミング処理を定義するコールバック関数
        $callback = function() {
            // ファイルポインタを開く
            $file = fopen('php://output', 'w');

            // ヘッダー行をCSVに書き込む
            fputcsv($file, ['人数','お問い合わせ種類', '性', '名','性別','メールアドレス','電話番号','住所','お問い合わせ内容']);


            $contacts = Contact::with('category')->get();

        // 各連絡先をループで処理し、CSVに書き込む
        foreach ($contacts as $contact) {

                // ここが重要: Eloquentモデルを配列に変換する
                // $row = $contact->toArray();

                    $gender_text = '';
                    if ($contact->gender == 1) {
                        $gender_text = '男性';
                    }elseif($contact->gender == 2) {
                        $gender_text = '女性';
                    }else{
                        $gender_text = 'その他';
                    }


                // 特定の列だけを書き込みたい場合
                $row = [
                    $contact->id,
                    $contact->category->content,
                    $contact->first_name,
                    $contact->last_name,
                    $gender_text ,
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->detail
                ];

                // CSVファイルに1行を書き込む
                fputcsv($file, $row);
            }

            // ファイルポインタを閉じる
            fclose($file);
        };

        // ストリーミングレスポンスを返す
        return new StreamedResponse($callback, 200, $headers);
    }
}
