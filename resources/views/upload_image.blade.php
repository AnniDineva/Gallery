@if (Auth::user()->is_admin!==1)
@extends('layouts.layout')
@section('content')

<div class="container mt-5">
    @if(session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif
    <style>
        .images-preview-div img {
            padding: 10px;
            max-width: 100px;
        }

    </style>
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            <h2>Качи снимка</h2>
            </h2>
        </div>
        <div class="card-body">
            @if ($countOfPhotos>=10)
                <div class="alert alert-danger mt-1 mb-1">Достигнали сте максималния брой за качване на снимки</div>
            @else
            <div class="alert alert-danger mt-1 mb-1 text-center" id="errorMessage" style="display: none;"></div>
                <form name="images-upload-form" method="POST" id="images_upload_form"
                    action="{{ route('upload_image') }}" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="countOfPhothos" value="{{$countOfPhotos}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" name="images[]" id="images" placeholder="Choose images" multiple>
                            </div>
                            @error('images')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="mt-1 text-center">
                                <div class="images-preview-div"> </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

</div>

@endsection
@endif