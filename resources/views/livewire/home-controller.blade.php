<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            @include('partials.sectionSuccessError')
            <div class="row justify-content-center">
                <div class="@if($loginMode) col-md-4 @else col-md-6 @endif d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="/" class="logo d-flex align-items-center w-auto">
                            <img src="{{asset('logo.png')}}" alt="">
                            <span class="d-none d-lg-block">Bonanza</span>
                        </a>
                    </div>

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">
                                    @if($loginMode)
                                    Login to Your Account
                                    @else
                                    Create an Account
                                    @endif
                                </h5>
                                <p class="text-center small">
                                    @if($loginMode)
                                    Enter your email & password to login
                                    @else
                                    Enter your personal details to create account
                                    @endif
                                </p>
                            </div>

                            <form class="row g-3 needs-validation" novalidate>
                                @if(!$loginMode)
                                <div class="col-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input wire:model='first_name' type="text" class="form-control @error('first_name') is-invalid @enderror" id="firstName">
                                    @error('first_name') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input wire:model='last_name' type="text" class="form-control @error('last_name') is-invalid @enderror" id="lastName">
                                    @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input wire:model='phone' type="text" class="form-control @error('phone') is-invalid @enderror" id="phone">
                                    @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                @endif
                                <div class="@if(!$loginMode) col-6 @else col-12 @endif">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" wire:model='email' class="form-control" id="email" required>
                                    @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" wire:model='password' class="form-control" id="password" required>
                                    @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                @if(!$loginMode)
                                <div class="col-12">
                                    <label for="renewPassword">Re-enter New Password</label>
                                    <input wire:model="password_confirmation" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="renewPassword">
                                    @error('password_confirmation') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                @else                                
                                <div class="col-12">
                                    <p class="small mb-0"><a href="{{route('account.auth.forget')}}">Forget Password</a></p>                                    
                                </div>
                                @endif
                                <div class="col-5 mr-1" x-data="{ goBack: function() { window.history.back(); } }">
                                    <button type ="button"class="btn btn-secondary w-100" x-on:click="goBack">Back</button>
                                </div>

                                <div class="col-6">
                                    @if($loginMode)
                                    <button class="btn btn-primary w-100" wire:click.prevent='login'>Login</button>
                                    @else
                                    <button class="btn btn-primary w-100" wire:click.prevent='register'>Register</button>
                                    @endif
                                </div>
                                <div class="col-12">
                                    @if($loginMode)
                                    <p class="small mb-0">Don't have account? <a href="javascript:;" wire:click.prevent='toggleMode'>Create an account</a></p>
                                    @else
                                    <p class="small mb-0">Already have an account? <a href="javascript:;" wire:click.prevent='toggleMode'>Log in</a></p>
                                    @endif
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>
@push('scripts')
<script>
    Livewire.on('updateUrl', params => {
        const account = params[0].account;
        history.replaceState({}, '', `{{ route('login') }}/${account}`);
    });
</script>
@endpush