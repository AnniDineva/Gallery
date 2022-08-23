@extends('layouts.layout')
@section('content')

<div class="container">
    <div class="row imagetiles">
        @if($photos->count()==0)
          <div class="alert alert-danger text-center">Потребителят все още няма качени снимки
          </div>
        @endif
        @foreach ($photos as $photo)
            
        
        <div class="img-wrapper-20">
            <a href="{{route('photo_show', ['id'=>$photo->id])}}">
              <div class="img-card img-thumbnail">
                <img src="{{asset('storage/'. $photo->path)}}"  class="img-fluid  shadow img-dimension" alt="Sheep 11">
              </div>
             </a>
            <div class="row mt-3 mb-5 mr-2">
                <p class="galp col-6">{{$photo->created_at}}</p>
                @auth
                    
                
                    @if (Auth::user()->is_admin==1 || Auth::user()->id==$photo->user_id)
                    <button type="button" class="btn btn-sm btn-danger pr-5 col-6" data-toggle="modal" data-target="#deletePhoto" data-rowid="{{$photo->id}}">
                        Изтрий
                    </button>
                    @endif
                @endauth
                    
            </div>
            
        </div>
        @endforeach
    </div>

    {{ $photos->links() }}
</div>

    <style>
        div.imagetiles div.col-lg-3.col-md-3.col-sm-3.col-xs-6{
        padding: 0px;
        }
    </style>

 <!-- Modal -->
 <div class="modal fade" id="deletePhoto" tabindex="-1" aria-labelledby="deletePhotoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletePhotoLabel" class="text-center text-danger">Are you want to delete this photo?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('photo_destroy')}}" method="post" id="removePhotoForm">
            <div class="modal-footer">
                @csrf
                
                <input type="hidden" value="" class="photoId" name="id"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger ">Yes, delete photo</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  
@endsection