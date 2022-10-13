@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">お届け先を入力してください</div>
        <div class="panel-body">
          <div class="panel-body">
            <a href="{{ route('profiles.index') }}" class="btn btn-default btn-block">
              既存の情報を使用する
            </a>
          </div>
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
              @endforeach
            </div>
          @endif

          <form action="{{ route('profiles.createForm') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">名前</label>
              <input type="text" class="form-control" name="name" id="name" />
              <label for="postcode">郵便番号</label>
              <input type="text" class="form-control" name="postcode" id="postcode"/>
              <label for="house">住所</label>
              <input type="text" class="form-control" name="house" id="house"/>
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
