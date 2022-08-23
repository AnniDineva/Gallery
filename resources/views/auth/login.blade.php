
<!--Login Modal-->
<div class="modal fade bd-example-modal-lg" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Вход</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @if ($errors->any())
            <div class="alert alert-danger mx-3 mt-3">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 form-control" type="email" name="email" :value="old('email')" required autofocus />
                    
                </div>

                <!-- Password -->
                <div class="mt-4 form-group">
                    <x-label for="password" :value="__('Парола')" />

                    <x-input id="password" class="block mt-1  form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-end mt-4">

                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Затвори') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('Вход') }}</button>
                      </div>
                </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
<!--End Login Modal-->