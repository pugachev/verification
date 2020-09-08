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
                <a href="{{ url('/verification') }}" class="navbar-brand">一覧</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>

        <div class="cover text-white text-center py-5">
            <h1 class="display-4 mb-4">Save Money</h1>
            <a href="" class="btn btn-primary btn-lg">状況確認</a>
        </div>
    </header>
    <main>
        <!-- Page Content -->
        <div class="container mt-5 p-lg-5 bg-light">

            <form method="post" action="{{ url('/verification', $selectRecord->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <!--氏名-->
                <div class="form-row">
                    <div class="col-md-9 mb-3">
                        <label for="inputMoney">金額</label>
                        <input type="text" class="form-control" name="inputMoney" id="inputMoney" placeholder="金額" value="{{ old('inputMoney', $selectRecord->money) }}"">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="inputDate">日時</label>
                        <input type="text" class="form-control" name="inputDate" id="inputDate" placeholder="日時"  value="{{ old('inputDate', $selectRecord->targetDate) }}">
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <img  class="mb-3" id="targetImg" src="/storage/{{ old('imgpath', $selectRecord->imgpath) }}" width="256 height="">
                            <input type="file" name="inputFile" id="inputFile" class="form-control-file" >
                        </div>
                    </div>
                </div>
                <!--/氏名-->

                <!--ボタンブロック-->
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block">登録</button>
                    </div>
                </div>
                <!--/ボタンブロック-->

            </form>

        </div><!-- /container -->
    </main>
    <footer class="fixed-bottom text-center text-muted py-4">
      Copyright YYYY dotinstall.com
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <!-- bootstrap-datepickerを読み込む -->
    <link rel="stylesheet" type="text/css" href="/js/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.min.css">
    <script type="text/javascript" src="/js/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datepicker-1.9.0-dist/locales/bootstrap-datepicker.ja.min.js"></script>

    <script>
      $(function() {
            'use strict';
            $('#inputDate').datepicker();

            // アップロードするファイルを選択
            $('#inputFile').change(function() {
            var file = $(this).prop('files')[0];

                // 画像以外は処理を停止
                if (! file.type.match('image.*')) {
                    // クリア
                    $(this).val('');
                    return;
                }

                // 画像表示
                var reader = new FileReader();
                reader.onload = function() {
                    $('#targetImg')[0].src='';
                    $('#targetImg')[0].src=reader.result;
                }
                reader.readAsDataURL(file);
            });
      });
    </script>
  </body>
</html>