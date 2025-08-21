<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required','numeric'],
            'email' => ['required', 'string', 'max:255'],
            'tel01' => ['required', 'numeric', 'digits_between:1,5'],
            'tel02' => ['required', 'numeric', 'digits_between:1,5'],
            'tel03' => ['required', 'numeric', 'digits_between:1,5'],
            'address' => ['required', 'string'],
            'building' => ['required', 'string'],
            'content' => ['required', 'string'],
            'detail' => ['required', 'string', 'max:120'],
        ];
    }


    public function messages()
     {
         return [
             'first_name.required' => '姓を入力してください',
             'last_name.required' => '名を入力してください',
             'gender.required' => '性別を選択してください',
             'email.required' => 'メールアドレスを入力してください',
             'email.email' => 'メールアドレスはメール形式で入力してください',
             'tel01.required' => '電話番号を入力してください',
             'tel02.required' => '電話番号を入力してください',
             'tel03.required' => '電話番号を入力してください',
             'tel01.digits_between' => '電話番号は5桁までの数字で入力してください',
             'tel02.digits_between' => '電話番号は5桁までの数字で入力してください',
             'tel03.digits_between' => '電話番号は5桁までの数字で入力してください',
             'address.required' => '住所を入力してください',
             'content.required' => 'お問い合わせの種類を選択してください',
             'detail.required' => 'お問い合わせ内容を入力してください',
             'detail.max:120' => 'お問合せ内容は120文字以内で入力してください',
         ];
        }
}
