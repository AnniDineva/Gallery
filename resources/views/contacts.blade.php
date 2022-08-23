@extends('layouts.layout')
@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header text-center">Контактна форма</h5>
        <div class="card-body">
            @if ($errors->contact_form->any())
            <div class="alert alert-danger text-center" id="contactsErrors">
                <ul>
                @foreach ($errors->contact_form->all() as $error)
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
          <form action="{{route('contacts_send_message')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Име</label>                
                <input type="text" name="name" class="form-control" :value="old('name')" required>               
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>                
                <input type="email" name="email" class="form-control" :value="old('email')" required>               
            </div>
            <div class="form-group">
                <label for="message">Съобщение</label>                
                <textarea  name="message" class="form-control" :value="old('message')" required> </textarea>              
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Изпрати</button>
            </div>
          </form>
          
        </div>
        
      </div>
</div>
@endsection