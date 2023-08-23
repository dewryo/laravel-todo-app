<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="password"] {
            width: 25em;
            max-width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button[type="submit"] {
            background-color: #337ab7;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .alert {
            background-color: #f2dede;
            color: #a94442;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 15px;
            border: 1px solid #ebccd1;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2>ログイン</h2>
        <form action="{{ route('user.login') }}" method="POST">
            {!! csrf_field() !!}
            <p>メールアドレス</p>
            <p><input type="text" name="email"></p>
            <p>パスワード</p>
            <p><input type="password" name="password"></p>
            <button type="submit">ログイン</button>
        </form>
    </div>
</body>
</html>