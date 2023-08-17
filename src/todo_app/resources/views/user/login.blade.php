<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
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
    <form action = "{{ route('user.login') }}" method="POST">
        {!! csrf_field() !!}
        <p>メールアドレス:<input type="text" name="email" ></p>
        <p>パスワード:<input type="password" name="password" ></p>
        <button type="submit">ログイン</button>
    </form>
</body>
</html>