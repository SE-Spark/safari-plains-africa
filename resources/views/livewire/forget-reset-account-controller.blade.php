<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="/" class="logo d-flex align-items-center w-auto">
                            <img src="{{asset('logo.jpeg')}}" alt="">
                            <span class="d-none d-lg-block">Safari</span>
                        </a>
                    </div>

                    <div class="card mb-3">

                        <div class="card-body">
                            @include('partials.sectionSuccessError')
                            @if(!$reset_success)
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">
                                    @if($resetMode)
                                    Reset Your Account Password
                                    @else
                                    Forget Your Account Password
                                    @endif
                                </h5>
                            </div>

                            <form class="row g-3 needs-validation frm-frp12345" novalidate>

                                @if($resetMode)
                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" wire:model='password' class="form-control" id="password" required>
                                    @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="renewPassword">Re-enter New Password</label>
                                    <input wire:model="password_confirmation" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="renewPassword">
                                    @error('password_confirmation') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                @else
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" wire:model='email' class="form-control" id="email" required>
                                    @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                @endif
                                <div class="col-5 mr-1" x-data="{ goBack: function() { window.history.back(); } }">
                                    <button type="button" class="btn btn-secondary w-100" x-on:click="goBack">Back</button>
                                </div>

                                <div class="col-6">
                                    @if($resetMode)
                                    <button class="btn btn-primary w-100" wire:click.prevent='resetPassword'>Change Password</button>
                                    @else
                                    <button class="btn btn-primary w-100" wire:click.prevent='sendPasswordResetLink'>Reset</button>
                                    @endif
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>
@push('scripts')
<script>
    Livewire.on('passwordReset', () => {
        setTimeout(function() {
            window.location.href = `{{ route('login',['account'=>'signin'])}}`;
        }, 2000);
    });
</script>
@endpush