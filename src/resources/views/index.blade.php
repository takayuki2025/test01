<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Page</title>
 
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    

<header class="header">
        <div class="header__top">
            <h2>FashionablyLate</h2>
        </div>
</header>

<main>

    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h3>Contact</h3>
      </div>

    <form class="form" action="/confirm" method="post">
    @csrf
    <input type="hidden" name="category_id" value="1">
      <table id="my-table">
  <tr>
        <div class="form__group">

        
          <div class="form__group-title1">
           <th> <span class="form__label--item">お名前</span> </th>
        
          </div>
        
         <div class="form__group-content">
        <td>
            <div class="form__input--text2">
  <input type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name') }}" class="form__text1" />
<div class="form__error">
                @error('first_name')
                    {{ $message }}
                @enderror
</div>
</div>
</td>
<td>
  
<div class="form__input--text2">
  <input type="text" name="last_name" placeholder="例：太郎" value="{{ old('last_name') }}" class="form__text1" />
            
            <div class="form__error">
                @error('last_name')
                    {{ $message }}
                @enderror
            </div>
</div>
</td>
<td></td>
            </div>
        </div>
        </div>
  </tr>
  <tr>
        <div class="form__group">
        <div class="form__group-title2">
            <th><span class="form__label--item">性別</span></th>
            
        </div>

       
        <td colspan="3">
            <div class="form__input--radio">

 <form action="/session" method="post">
          @csrf

                 <label><input type="radio" name="gender" value=1 checked @checked(old('gender') == 1)>1.男性</label>
                <label><input type="radio" name="gender" value=2 @checked(old('gender') == 2)>2.女性</label>
                <label><input type="radio" name="gender" value=3 @checked(old('gender') == 3)>3.その他</label>
</form>
            </div>
  
            <div class="form__error">
                @error('gender')
                    {{ $message }}
                @enderror
            </div>
</td>
            </div>
  </tr>
  
  <tr>
         <div class="form__group">
            <div class="form__group-title3">
  <th><span class="form__label--item">メールアドレス</span></th>
  
          </div>
          <div class="form__group-content">
            <div class="form__input--text1">
              <td colspan="3"><input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            </td>
            </div>
            </div>
</tr>

<tr>            

            <div class="form__group">
          <div class="form__group-title4">
            <th><span class="form__label--item">電話番号</span></th>
          
          </div>
          <div class="form__group-content">
            <div class="form__input--text3">
              
             <td> <input type="tel" name="tel01" placeholder="090" value="{{ old('tel01') }}" class="form__tel1"/>
             <label>-</label>
<div class="form__error">
                @error('tel01')
                    {{ $message }}
                @enderror
</div>
</td>

              

              <td><input type="tel" name="tel02" placeholder="1234" value="{{ old('tel02') }}" class="form__tel2"/>
              <label>-</label>
              <div class="form__error">
                @error('tel02')
                    {{ $message }}
                @enderror
</diV>
</td>

              <td><input type="tel" name="tel03" placeholder="5678" value="{{ old('tel03') }}" class="form__tel3"/>
            
            <div class="form__error">
                
                @error('tel03')
                    {{ $message }}
                @enderror
            </div>
            </td>
            </div>
            </div>
</tr>
<tr>
        <div class="form__group">
          <div class="form__group-title5">
            <th><span class="form__label--item">住所</span></th>
          
          </div>
         <div class="form__group-content">
            <div class="form__input--text">
              <td colspan="3"><input type="text" name="address" placeholder="例：東京都渋谷区" value="{{ old('address') }}" class="form__text2" />
            </div>
            <div class="form__error">
                @error('address')
                    {{ $message }}
                @enderror</td>
            </div>
        </div>
        </div>
</tr>
<tr>
        <div class="form__group">
          <div class="form__group-title6">
            <th><span class="form__label--item２">建物名</span></th>
           
            


          </div>
         <div class="form__group-content">
            <div class="form__input--text">
              <td colspan="3"><input type="text" name="building" placeholder="例：千駄ヶ谷マンション１０１" value="{{ old('building') }}" class="form__text2" /></td>
        </div>
        </div>
        </div>
</tr>
<tr>


        <div class="form__group">
          <div class="form__group-title7">
            <th><span class="form__label--item">お問い合わせの種類</span></th>
            
          </div>
            <div class="form__group-title">
                <td colspan="3"><select name="content" class="form__select">
                    <option value="" selected disabled>選択してください</option>
                    <option value="商品のお届けについて" @if(isset($data['prefecture']) && $data['prefecture'] == 'tokyo') selected @endif>>商品のお届けについて</option>
                    <option value="商品の交換について" @if(isset($data['prefecture']) && $data['prefecture'] == 'tokyo') selected @endif>>商品の交換について</option>
                    <option value="商品トラブル" @if(isset($data['prefecture']) && $data['prefecture'] == 'tokyo') selected @endif>>商品トラブル</option>
                    <option value="ショップへのお問い合わせ" @if(isset($data['prefecture']) && $data['prefecture'] == 'tokyo') selected @endif>>ショップへのお問い合わせ</option>
                    <option value="その他" @if(isset($data['prefecture']) && $data['prefecture'] == 'tokyo') selected @endif>>その他</option>
                </select>
                <div class="form__error">
                @error('content')
                    {{ $message }}
                @enderror</td>
            </div>
            </div>
            </div>

</tr>
<tr>       
            <div class="form__group">
          <div class="form__group-title8">
            <th><span class="form__label--item">お問い合わせの内容</span></th>
          
          </div>
          <td colspan="3"><div class="form__group-content">
            <div class="form__input--textarea">
             <textarea name="detail" placeholder="お問い合わせ内容をご記入ください">{{ old('detail') }}</textarea>
              
            </div>
            <div class="form__error">
                @error('detail')
                    {{ $message }}
                @enderror</td>
            </div>
        </div>
        </div>
</tr>
</table>
<div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
</form>
</div>








</main>
</body>
</html>