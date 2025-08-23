<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Page</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

 @livewireStyles
</head>


<body>
  <header class="header">
    <div class="header__top">
      <h2>FashionablyLate</h2>


      <form class="form" action="/logout" method="post">
      @csrf
        <button class="header-nav__button">ログアウト</button>
      </form>
    </div>
  </header>

  <main>
    <div class="contact-form__heading">
      <h3 class="h3heading">Admin</h3>
    </div>
      <div class="search_form">
        <form class="form" action="/admin/search" method="get">
        @csrf
          <div class="search-form__item">
            <input class="search-form__item-input" type="text" placeholder="名前やメールアドレスを入力してください" name="keyword" value="{{ old('keyword') }}">
              <select class="create-form__item-select" name="gender_number">
                <option value="" selected >性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
              </select>

              <select class="create-form__item-select" name="category_id">
                <option value="" selected>お問い合わせ種類</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                  @endforeach
              </select>
          </div>

            <label for="birthdate"></label>
              <input type="date" id="birthdate" name="birthdate">

              <button class="button-submit" type="submit">
                検索
              </button>
    </form>

      <div class="reset_form_button">
        <a href="/admin" class="button-submit2">リセット</a>
      </div>
    </div>
  </form>

      <div class="csv-area">
        <form action="/postcsv" method="post" class="csv-button">
        @csrf
          <button type="csv-submit" class="csv-submit">エクスポート</button>
        </form>
          {{ $contacts->links() }}
      </div>

    <table>
      <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせ種類</th>
        <th></th>
      </tr>
        @foreach ($contacts as $author)
        <td>{{ $author->first_name . ' ' . $author->last_name }}</td>
        <td>{{$author->gender}}</td>
        <td>{{$author->email}}</td>
        <td>
          {{ $author->category->content }}</td>

        <td>
          <div class="modal-button">

            <livewire:counter />

        </td>

          </div>
        </td>

      </tr>
        @endforeach

    </table>

  </main>

@livewireScripts
</body>

</html>
