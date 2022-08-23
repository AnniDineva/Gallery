<!--Register Modal-->


<div class="modal fade bd-example-modal-lg" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Регистрация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->registration->any())
                <div class="alert alert-danger mx-3 mt-3 text-center">
                    <ul>
                    @foreach ($errors->registration->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf


                    <!-- Name -->
                    <div  class="form-group">
                        <x-label for="name" :value="__('Име')" />

                        <x-input id="reg_name" class="block mt-1 form-control" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Last Name -->
                    <div  class="form-group">
                        <x-label for="last_name" :value="__('Фамилия')" />

                        <x-input id="last_name" class="block mt-1 form-control" type="text" name="last_name" :value="old('last_name')" required autofocus />
                    </div>

                    <!-- Phone -->
                    <div  class="form-group">
                        <x-label for="phone" :value="__('Телефон')" />

                        <x-input id="phone" class="block mt-1 form-control" type="text" name="phone" :value="old('phone')" required autofocus />
                    </div>


                    <!-- Email Address -->
                    <div class="mt-4 form-group">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="reg_email" class="block mt-1 form-control" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 form-group">
                        <x-label for="password" :value="__('Парола')" />

                        <x-input id="reg_password" class="block mt-1 form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4 form-group">
                        <x-label for="password_confirmation" :value="__('Потвърди Парола')" />

                        <x-input id="password_confirmation" class="block mt-1 form-control"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                    
                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Затвори') }}</button>
                        <button type="submit" class="btn btn-success">{{ __(' Регистрирай ме') }}</button>
                    </div>
                </form>
            </div>
                
        
        </div>
    </div>
</div>

<!--End egister Modal-->