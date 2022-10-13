@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">従業員</div>
          <div class="panel-body">
            <a href="{{ route('employees.create') }}" class="btn btn-default btn-block">
              従業員追加
            </a>
          </div>
          <table class="table">
            <thead>
            <tr>
              <th>会社名</th>
              <th>名前</th>
              <th>年齢</th>
              <th>性別</th>
              <th></th>
              <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($datas as $data)
              <tr>
                <td>{{ $data->companies_name}}</td>
                <td>{{ $data->employees_name }}</td>
                <td>{{ $data->old }}</td>
                <td>{{ $data->sex }}</td>
                <td>{{ $data->created_at}}</td>
                <td>{{ $data->updated_at }}</td>


                <td>
                  <a href="{{ route('companies.edit', ['id' => $data->company_id]) }}">所属の編集</a>
                </td>
                <td>
                  <a href="{{ route('employees.edit', ['id' => $data->employee_id]) }}">従業員の編集</a>
                </td>
                <td>
                  <form action="{{ route('employees.delete', ['id'=>$data->employee_id]) }}" method="POST">
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
