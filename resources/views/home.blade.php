@extends('layouts.layout')
@section('content')


 

    @if (Auth::check() && Auth::user()->is_admin==1)

    <div class="container">
        <h3 class="text-center">Последни 5 регистрирани потребители</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Име</th>
                <th scope="col">E-mail</th>
                <th scope="col">Качени снимки</th>
                <th>Дата на регистрация</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                
              
              <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}} {{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->photos_count}}</td>
                  <td>{{$user->created_at}}</td>


              </tr>
              @endforeach
              
            </tbody>
           
          </table>
    </div>

    <div class="container">
        <h3 class="text-center">Последни 5 качени снимки</h3>
        <div class="row imagetiles">
            @foreach ($statistikPhoto as $photo)
                
            
            <div class="img-wrapper-20">
                <a href="{{route('photo_show', ['id'=>$photo->id])}}">
                    <div class="img-card img-thumbnail">
                        <img src="{{asset('storage/'. $photo->path)}}"  class="img-fluid  shadow img-dimension" alt="Sheep 11">
                    </div>
                 </a>
                <div class="row mt-3 mb-5 mr-2">
                    <p class="galp col-6">{{$photo->created_at}}</p>
                    <p class="galp col-6">Автор: {{$photo->name}} {{$photo->last_name}}</p>
                        
                </div>
                
            </div>
            @endforeach
        </div>
    </div>

    @else
    <div class="container">
        <div class="row imagetiles">
            @foreach ($photos as $photo)
                
            
            <div class="img-wrapper-20">
                <a href="{{route('photo_show', ['id'=>$photo->id])}}">
                    <div class="img-card img-thumbnail">
                        <img src="{{asset('storage/'. $photo->path)}}"  class="img-fluid  shadow img-dimension" alt="Sheep 11">
                    </div>
                 </a>
                <div class="row mt-3 mb-5 mr-2">
                    <p class="galp col-6">{{$photo->created_at}}</p>
                        
                </div>
                
            </div>
            @endforeach
        </div>
    </div>

        <style>
            div.imagetiles div.col-lg-3.col-md-3.col-sm-3.col-xs-6{
            padding: 0px;
            }
        </style> 
    @endif

@endsection