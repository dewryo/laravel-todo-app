<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TodoList</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .alert {
            background-color: #f2dede;
            color: #a94442;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        form {
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input[type="text"], form select {
            box-sizing:border-box;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            
        }
        
        form button {
            background-color: #337ab7;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        li form {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <h2>{{ $user->name }}のTODOLIST</h2>

        @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('add.todo') }}" method="POST">
            @csrf
            <p><label for="todo">todo</label></p>
            <p><input type="text" name="todo" id="todo"></p>
            <p><label for="times">mail</label></p>
            <select id="times" name="addtime">
                <option value="0">送信しない</option>
                <option value="1">1時間後</option>
                <option value="6">6時間後</option>
                <option value="12">12時間後</option>
                <option value="24">24時間後</option>
            </select>
            <br><br>
            <input type="hidden" name="exist" value="1">
            <button type="submit">登録</button>
        </form>

        <ul>
            @foreach ($todos as $todo)
            <li>
                {{ $todo->todo }}
                <form action="{{ route('delete.todo') }}" method="POST">
                    @csrf
                    <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                    <button type="submit">削除</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</body>
</html>

    </div>

</body>
</html>