<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirm Page</title>
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>

  <header class="header">
      <div class="header__top">
        <h2>FashionablyLate</h2>
      </div>
  </header>

  <main>
    <div class="contact-form__confirm">
      <div class="contact-form__heading">
        <h3>Confirm</h3>
      </div>
        <form class="form" action="/thanks" method="post">
        @csrf
          <div class="confirm-table">
            <table class="confirm-table__inner">
              <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__text">
                  <input type="text" name="name" value="{{ $contact['first_name']}} {{ $contact['last_name']}}" readonly />
                  <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                  <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__text">
                  <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly />
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__text">
                  <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__text">
                  <input type="tel" name="tel" value="{{ $contact['tel01']}}{{ $contact['tel02']}}{{ $contact['tel03']}}" readonly />
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                <td class="confirm-table__text">
                  <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header">建物名</th>
                <td class="confirm-table__text">
                  <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ種類</th>
                <td class="confirm-table__text">
                  <input type="text" name="content" value="{{ $contact['content'] }}" readonly />
                </td>
              </tr>


              <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                <td class="confirm-table__text">
                  <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                </td>
              </tr>

          </table>
        </div>

        <div class="form__button">
        <button class="form__button-submit" type="submit">送信</button>
    </form>

    <form method="post" action="/back-to-form">
    @csrf

      <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
      <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
      <input type="hidden" name="gender" value=4 >
      <input type="hidden" name="email" value="{{ $contact['email'] }}">
      <input type="hidden" name="tel01" value="{{ $contact['tel01'] }}">
      <input type="hidden" name="tel02" value="{{ $contact['tel02'] }}">
      <input type="hidden" name="tel03" value="{{ $contact['tel03'] }}">
      <input type="hidden" name="address" value="{{ $contact['address'] }}">
      <input type="hidden" name="building" value="{{ $contact['building'] }}">
      <input type="hidden" name="content" value="テスト">
      <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
        <button type="submit" class="reverse">修正</button>
    </form>
  </div>
  </div>


</main>

</html>