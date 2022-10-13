@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">会社名</div>
          <div class="panel-body">
            <a href="{{ route('companies.create') }}" class="btn btn-default btn-block">
              会社追加
            </a>
          </div>
          <table class="table">
            <thead>
            <tr>
              <th>名前</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas as $data)
              <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->created_at}}</td>
                <td>{{ $data->updated_at }}</td>

                <td><a href="{{ route('companies.edit', ['id' => $data->id]) }}">編集</a></td>
                <td>
                  <form action="{{ route('companies.delete', ['id'=>$data->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">削除</button>
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
