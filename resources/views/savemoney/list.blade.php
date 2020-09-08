<!doctype html>
<html lang="ja">

<head>
    <title>SaveMoney</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <style>
        .cover {
            background: url({{ asset('/img/bg.png') }});
            background-size: cover;
        }

    </style>
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-light">
                <a href="" class="navbar-brand">一覧</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="menu" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ url('/verification/create') }}" class="nav-link">新規</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="cover text-white text-center py-5">
            <h1 class="display-4 mb-4">Save Money</h1>
            <a href="" class="btn btn-primary btn-lg">状況確認</a>
        </div>
    </header>
    <main>
        <section class="bg-light text-center py-5">
            <h2 class="mb-5">8月一覧</h2>
            <div class="container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>日付</th>
                            <th>使用金額</th>
                            <th>結果</th>
                            <th>画像</th>
                            <th>修正</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($records as $record)
                            <tr>
                                <td>{{$record->targetDate}}</td>
                                <td>{{$record->money}}</td>
                                <td>{{$record->result}}</td>
                                <td><img  src="/storage/{{$record->imgpath}}" width="32" height="32"></td>
                                <td><a href="{{ action('RecordsController@edit', $record) }}" class="btn btn-info">修正</a></td>
                                <td>
                                    <a href="" class="del btn btn-danger" data-id="{{ $record->id }}"">削除</a>
                                    <form method="post" action="{{ url('/verification', $record->id) }}" id="form_{{ $record->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    </form>
                                </td>
                            </tr>
                        @empty
                        
                        @endforelse

                    </tbody>
                </table>
            </div>
        </section>

    </main>
    <footer class="fixed-bottom text-center text-muted py-4">
        Copyright 2020-09 mtake.com
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>
