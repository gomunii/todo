@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">お届け先</div>
          <div class="panel-body">
            <button type="button" onclick="history.back()">前のページへ戻る</button>
          </div>
          <table class="table">
            <thead>
            <tr>
              <th>名前</th>
              <th>郵便番号</th>
              <th>住所</th>
              <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($datas as $data)
              <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->postcode }}</td>
                <td>{{ $data->house }}</td>


                <td>
                  <a href="{{ route('profiles.edit', ['id' => $data->id]) }}">編集</a>
                </td>
                <td>
                  <form action="{{ route('profiles.delete', ['id'=>$data->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('削除してよろしいですか？');">削除</button>
                  </form>
                </td>
                <td>

                  <form action="{{ route('products.choice',['id'=>$data->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="hidden" name="id" value="{{ $data->id }}" />
                    </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary">このお届け先で商品選択</button>
                    </div>
                  </form>
              </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
