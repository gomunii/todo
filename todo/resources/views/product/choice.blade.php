@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-body">
            <button type="button" onclick="history.back()">前のページへ戻る</button>
          </div>
          <div class="panel-heading">商品選択</div>
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
                <td>{{ $data->name }}</td>
                <td>{{ $data->price }}</td>
                <td><img src="{{ asset($data->image) }}"width="150px"></td>
                <td>
                <form action="{{ route('products.display',['id'=>$data->id]) }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <input type="hidden" name="id" value="{{ $data->id }}" />
                    <input type="hidden" name="id" value="{{ $data->profile_id }}" />
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">この商品を選択</button>
                  </div>
                </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
