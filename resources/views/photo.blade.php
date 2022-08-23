@extends('layouts.layout')
@section('content')

<img src="{{asset('storage/'.$photo->path)}}" alt="..."  class="img-fluid singlePhoto" >
<p>Автор: {{$photo->name}} {{$photo->last_name}}</p>
@auth
    @if (Auth::user()->id==$photo->user_id || Auth::user()->is_admin==1)
        <button type="button" class="btn btn-sm btn-danger pr-5 mb-5 col-9 singlePhoto" data-toggle="modal" data-target="#deletePhoto" data-rowid="{{$photo->id}}">
            Изтрий
        </button>
    @endif
    @if (count($photo->comment)>=10)
        <div class="alert alert-danger mt-1 mb-1 singlePhoto" ">Коментарите са изключени, понеже е достигнат е максималният брой коментари за тази снимка</div>
    @else
        @if(Auth::user()->is_admin!==1)
        <div class="card mt-5 singlePhoto" ">
            <h5 class="card-header">Добави коментар</h5>
            @if ($errors->comments_form->any())
            <div class="alert alert-danger text-center" id="commentErrors">
                <ul>
                @foreach ($errors->comments_form->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
            
            <form action="{{route('add_comment')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="photo_id" value="{{$photo->id}}">
                <textarea name="comment"  class="form-control" rows="3"></textarea>
                <button type="submit" class="btn btn-sm btn-primary mt-2 float-fight">Изпрати</button>
            </form>
            
            </div>
        </div>
        @endif
    @endif
    <!--Display comments-->
      <div class="card singlePhoto" ">
        <h5 class="card-header">Kоментари</h5>
        
        @foreach ($photo->comment as $comment) 
            <div class="card-body">
                <div class="card card_width" >
                    
                    <h7 class="card-header">{{$comment->user['name']}} {{$comment->user['last_name']}}
                        <span class="text-muted">{{$comment->created_at}}</span>
                    @if (Auth::user()->is_admin==1)
                        <button type="button" class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#deleteComment" data-rowid="{{$comment->id}}">
                            Изтрий коментар
                        </button>
                    @endif
                    </h7>
                    <div class="card-body">
                        <p>{{$comment->comment}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endauth

@include('modals.delete_photo_modal')
@include('modals.delete_comment_modal')
@endsection