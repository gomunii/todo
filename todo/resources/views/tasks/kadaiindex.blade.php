<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <name>ToDo App</name>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">ToDo App</a>
  </nav>
</header>
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダ</div>
          <div class="panel-body">
            <a href="#" class="btn btn-default btn-block">
              フォルダを追加する
            </a>
          </div>
          <div class="list-group">
            @foreach($names as $name)
            <a href="{{ route('tasks.edit', ['id' => $task->company_id, 'task_id' => $task->id]) }}">
              編集
            </a>
                {{ $name->name }}
            </a>
            @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
        <!-- ここにタスクが表示される -->
      </div>
    </div>
  </div>
</main>
</body>
</html>
