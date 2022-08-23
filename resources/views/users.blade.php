@extends('layouts.layout')
@section('content')


<div class="row mt-5">
  <h3 class="text-center">Списък потребители</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Име</th>
            <th scope="col">E-mail</th>
            <th scope="col">Качени снимки</th>
            @if( Auth::check() && Auth::user()->is_admin==1)
            <th>Дата на регистрация</th>
            <th scope="col">Actions</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            
          
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}} {{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->photos_count}}</td>
            @if( Auth::check() && Auth::user()->is_admin==1)
              <td>{{$user->created_at}}</td>
              <td>
                @if(Auth::user()->id !== $user->id)
                <button type="button" class="btn btn-danger delUser" data-toggle="modal" data-target="#deleteUser" data-rowid="{{$user->id}}">
                  Изтрий
                </button>
                @endif
                <a href="{{route('gallery', ['user_id'=>$user->id])}}"  class="btn btn-warning">Разгледай снимки</a>
              </td>
            @endif
          </tr>
          @endforeach
          
        </tbody>
        
      </table>
      {{ $users->links() }}
      
</div>
  <!-- Modal -->
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserLabel" class="text-center text-danger">Are you want to delete this user?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('user_destroy')}}" method="post" id="removeForm">
          <div class="modal-footer">
              @csrf
              
              <input type="hidden" value="" class="userId" name="id"> 
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger ">Yes, delete user</button>
          </div>
      </form>
    </div>
  </div>
</div>

@endsection