<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>

<body>

  <header class="header">
    <div class="header__top">
      <h2>FashionablyLate</h2>
    </div>
      <a href="{{ route('register') }}" class="btn">register</a>
  </header>

  <main>
    <div class="register-form__contents">
    <div class="register-form__heading">
      <h2>Login</h2>
    </div>

    <div class="register-form__content">
      <form class="form" action="/login" method="post">
      @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
          </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例：test@fashionablylate" class="form__input--formtext"/>
          </div>
            <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
            </div>
          </div>
        </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">パスワード</span>
        </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="password" name="password" placeholder="例：fashionablylate" class="form__input--formtext"/>
            </div>
              <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
              </div>
            </div>
          </div>

          <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
          </div>

    </form>
  </div>

</main>

</body>
</html>