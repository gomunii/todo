@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">新規作成</div>
        <div class="panel-body">
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
              @endforeach
            </div>
          @endif

          <form action="{{ route('employees.createForm') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">名前</label>
              <input type="text" class="form-control" name="name" />
              <label for="title">年齢</label>
              <input type="text" class="form-control" name="old" />
              <label for="title">性別</label>
              <input type="text" class="form-control" name="sex" />
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary">送信</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  @include('share.flatpickr.scripts')
@endsection
