@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">注文中の商品</div>
          <table class="table">
            <thead>
            <tr>
              <th>名前</th>
              <th>郵便番号</th>
              <th>住所</th>
              <th>商品名</th>
              <th>価格</th>
              <th>画像</th>
              <th>注文時刻</th>
              <th>合計額</th>
              <th>進行状況</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas as $data)
              <tr>

                <td>{{ $data->profiles_name}}</td>
                <td>{{ $data->postcode }}</td>
                <td>{{ $data->house }}</td>
                <td>{{ $data->products_name }}</td>
                <td>{{ $data->price }}</td>
                <td><img src="{{ asset($data->image) }}"width="150px"></td>
                <td>{{ $data->updated_at }}</td>
                <td><?php echo $data->price++ ?></td>
                <td>
                @if($data->situation == 1)
                <div class="panel-heading">調理中...</div>
                @endif
                @if($data->situation == 2)
                <div class="panel-heading">お届け中...</div>
                @endif
                @if($data->situation == 3)
                <div class="panel-heading">お届け完了...</div>
                @endif
                </td>
                <td>
                  <form action="{{ route('products.change' ,['id'=>$data->product_id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->product_id }}" />
                    <input type="hidden" name="situation" value="{{ $data->situation }}" />
                    <button type="submit" class="btn btn-danger" >進行</button>
                  </form>
                  </td>
                  <td>
                  <form action="{{ route('products.delete', ['id'=>$data->product_id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('削除してよろしいですか？');">削除</button>
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
