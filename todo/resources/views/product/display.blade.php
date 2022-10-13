@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="panel-body">
              <button type="button" onclick="history.back()">前のページへ戻る</button>
            </div>
            <form action="{{ route('products.index',['id'=>$index]) }}" method="GET">

                <input type="hidden" name="id" value="{{ $index }}" />
                <button type="submit" class="btn btn-default btn-block">注文確定</button>
            </form>
            </div>
          <div class="panel-heading">確認画面</div>
          <div class="panel-body">
          </div>
          <h4>お届け先</h4>
          <table class="table">
            <thead>
            <tr>
              <th>名前</th>
              <th>郵便番号</th>
              <th>住所</th>
              <th></th>
              <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($datas as $data)
              <tr>
                <td>{{ $data->profiles_name}}</td>
                <td>{{ $data->postcode }}</td>
                <td>{{ $data->house }}</td>
                <td>
                  <a href="{{ route('profiles.edit', ['id' => $data->profile_id]) }}">お届け先の編集</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <h4>選択した商品</h4>
          <table class="table">
            <thead>
            <tr>
              <th>商品名</th>
              <th>価格</th>
              <th>画像</th>
              <th></th>
              <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($datas as $data)
              <tr>
                <td>{{ $data->products_name }}</td>
                <td>{{ $data->price }}</td>
                <td><img src="{{ asset($data->image) }}" width="150px"></td>
                <td>
                  <form action="{{ route('products.choice',['id'=>$data->profile_id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="hidden" name="id" value="{{ $data->profile_id }}" />
                    </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary">商品の変更</button>
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
