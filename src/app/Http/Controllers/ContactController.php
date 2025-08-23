<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;


use Illuminate\Pagination\Paginator;


use Illuminate\Support\Facades\Response;


class ContactController extends Controller
{



    public function index()
    {
        return view('index');
    }



//         public function admin(Request $request)
//     {

//         $contacts = Contact::with('category')->paginate(7);
//         $categories = Category::all();



//         if(gender == 1){
//             $gender_name="男性";
//         }elseif(gender == 2){
//             $gender_name="女性";
//         }elseif(gender == 3){
//             $gender_name="その他";
//         }

//         $gender_name = $gender;


// dd($contacts);


//        return view('admin', compact('contacts', 'categories', ));
//     }




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




    public function search(Request $request)
{

  $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword , $request->keyword_gender)->paginate(7);
  $categories = Category::all();

  return view('admin', compact('contacts', 'categories'));
}




    public function modal()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        return view('test-modal', compact('contacts', 'categories', ));
    }





public function postCsv()
{
    // 1. データとファイル情報を定義
    $data = [
        ['id' => 1, 'name' => 'hoge'],
        ['id' => 2, 'name' => 'hogehoge']
    ];




    $columns = ['名前', '性別','メールアドレス',"お問い合わせ種類",];




    $fileName = 'hoge.csv';

    // 2. CSVファイルを安全なストレージパスに作成
    $filePath = storage_path('app/' . $fileName);
    $file = fopen($filePath, 'w');

    // 3. ファイルにデータを書き込む
    if ($file) {
        // カラムの書き込み（文字コード変換も）
        mb_convert_variables('SJIS', 'UTF-8', $columns);
        fputcsv($file, $columns);

        // データの書き込み
        foreach ($data as $row) {
            mb_convert_variables('SJIS', 'UTF-8', $row);
            fputcsv($file, $row);
        }
    }
    fclose($file);

    // 4. ダウンロードレスポンスを返す
    // ダウンロード後、ファイルを自動的に削除する
    return Response::download($filePath, $fileName)->deleteFileAfterSend(true);
}




}