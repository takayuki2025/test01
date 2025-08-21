<?php

return [
    'required' => ':attributeは必須です。',
    'email' => ':attributeは有効なメールアドレスではありません。',
    // ... その他のバリデーションルール
    'attributes' => [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        // ... Fortifyの各フォームで使用されるフィールド名
    ],
];