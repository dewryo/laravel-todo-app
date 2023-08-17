<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規登録</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action = "{{ route('user.signup') }}" method="POST">
        {!! csrf_field() !!}
        <p>名前:<input type="text" name="name" ></p>
        <p>メールアドレス:<input type="text" name="email" ></p>
        <p>パスワード:<input type="password" name="password" ></p>
        <button type="submit">登録</button>
    </form>
</body>
</html>