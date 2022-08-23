@if (Auth::user()->is_admin!==1)
@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header text-center">Промяна профил</h5>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger text-center">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('message') }}
                </div>
            @endif
          <form action="{{route('profile_edit')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Име</label>                
                <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">               
            </div>
            <div class="form-group">
                <label for="last_name">Фамилия</label>                
                <input type="text" name="last_name" class="form-control" value="{{Auth::user()->last_name}}">               
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>                
                <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">               
            </div>
            <div class="form-group">
                <label for="password">Парола</label>                
                <input type="password" name="password" class="form-control" ">               
            </div>
            <div class="form-group">
                <label for="password_confirmation">Повтори парола</label>                
                <input type="password" name="password_confirmation" class="form-control" ">               
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Промени</button>
            </div>
          </form>
          
        </div>
        <div class="card-footer">
            <a href="{{route('gallery', ['user_id'=>Auth::user()->id])}}"  class="btn btn-warning">Мои снимки</a>
        </div>
      </div>
</div>

@endsection
@endif