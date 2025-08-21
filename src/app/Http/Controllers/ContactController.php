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



    // public function register()
    // {
    //     return view('auth.register');
    // }

    // public function login(Request $request)
    // {
    //     return view('auth.login');
    // }

        public function admin(Request $request)
    {
        // $contacts = Contact::all();
        // $contacts = Contact::Paginate(7);
        // $contacts = Contact::with('category')->get();
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        // $users = Contact::all();

// return view('admin', ['contacts' => $contacts]);
       return view('admin', compact('contacts', 'categories', ));
    }




    public function confirm(ContactRequest $request)
{

    $contact = $request->only(['first_name', 'last_name', 'gender',  'email', 'tel01', 'tel02', 'tel03', 'address', 'building', 'content', 'detail']);

    session(['data' => $request->all()]);
//    dd($contact);
    return view('confirm', compact('contact'));
}

    public function confirm2(ContactRequest $request)
{

    $contact = $request->only(['first_name', 'last_name', 'gender',  'email', 'tel01', 'tel02', 'tel03', 'address', 'building', 'content', 'detail']);

    $formData = session('form_data', []);
    // dd($request2);
    return view('back-to-form', compact('contact', 'formData'));
}


    public function store(Request $request)
    
    {

        $contact = $request->only(['first_name', 'last_name', 'gender',  'email', 'tel', 'address', 'building', 'content', 'detail']);
        $contact['category_id'] = 1;
        $contact['user_id'] = 1;
        
        Contact::create($contact);
        return view('thanks');
    }






    public function search(Request $request)
{

  $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->paginate(7);
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
    $columns = ['ID', '名前'];
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