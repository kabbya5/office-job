@extends('layouts.app')
@push('css')
.login-card {
    background: rgba(255,255,255,.03);
    backdrop-filter: blur(20px);
}

.gold-glow {
    box-shadow:
        0 0 10px rgba(245,197,66,.3),
        0 0 30px rgba(245,197,66,.2),
        0 0 60px rgba(245,197,66,.1);
}

.animate-float {
    animation: float 4s ease-in-out infinite;
}

@keyframes float {
    0%,100%{
        transform: translateY(0);
    }
    50%{
        transform: translateY(-10px);
    }
}
@endpush
@section('content')
<div class="h-screen bg-[var(--bg-dark)] relative overflow-hidden">

    <!-- Background Glow -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-[var(--primary)]/10 blur-3xl rounded-full"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[var(--info)]/10 blur-3xl rounded-full"></div>

    <div class="container mx-auto p-4 flex items-center justify-center">

        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="text-center mb-4">
                <h1 class="text-3xl font-bold text-[var(--primary)] tracking-wider">
                    CASINO
                </h1>

                <p class="text-[var(--text-muted)] mt-2">
                    Create Your Account
                </p>
            </div>

            <!-- Login Card -->
            <div
                class="backdrop-blur-xl bg-white/5 border border-[var(--primary-border)]
                       rounded-3xl p-8 shadow-2xl">

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-5">
                        <x-input name="phone_number" label="Phone Number" />
                    </div>

                    <input type="hidden" name="ip" value="{{$ip}}">
                    <input type="hidden" id="fingerprint" name="fingerprint">

                    <div class="mb-5 form-group">
                        <label for=""> Country </label>
                        <select name="country_id" id="" class="form-control">
                            @foreach ($countries as $country)
                                <option value="{{$country->id}}" {{old('country_id', $select_country->id) == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <label class="block text-[var(--text)] mb-2">
                            Password
                        </label>

                        <div class="relative password-wrapper">
                            <input
                                type="password"
                                name="password"
                                class="@error('password') invalid @enderror w-full bg-[var(--bg-card)] border border-[var(--border)] px-4 py-2 text-[var(--text)] focus:border-[var(--primary)] outline-none transition"
                                placeholder="Enter Password">

                            <button type="button"
                                class="absolute toggle-password right-4 top-1/2 -translate-y-1/2 text-[var(--text-muted)]">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>

                        @error('password')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block text-[var(--text)] mb-2">
                            Confirm Password
                        </label>

                        <div class="relative password-wrapper">
                            <input
                                type="password"
                                name="password_confirmation"
                                class="w-full bg-white border border-[var(--border)] px-4 py-2 text-black focus:border-[var(--primary)] outline-none transition"
                                placeholder="Confirm Password">

                            <button type="button"
                                class="absolute toggle-password right-4 top-1/2 -translate-y-1/2 text-[var(--text-muted)]">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>


                    <button
                        type="submit"
                        class="w-full bg-[var(--primary)]
                               text-black font-bold
                               py-3 rounded-xl
                               hover:scale-[1.02]
                               transition duration-300
                               shadow-lg shadow-yellow-500/20">
                        REGISTER NOW
                    </button>

                    <!-- Register -->
                    <div class="text-center mt-6">
                        <span class="text-[var(--text-muted)]">
                            Have an account?
                        </span>

                        <a href="{{ route('login') }}"
                           class="text-[var(--primary)] font-semibold">
                            Log In
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
@endsection

@section('js')
<script src="{{asset('assets/js/fingerprint-v4.js')}}"></script>
<script>
$(document).ready(function () {
    $('.toggle-password').on('click', function () {

        let input = $(this).siblings('input');

        if(input.attr('type') === 'password') {
            input.attr('type', 'text');
            $(this).html('<i class="fas fa-eye-slash"></i>');
        } else {
            input.attr('type', 'password');
            $(this).html('<i class="fas fa-eye"></i>');
        }
    });

    const raw = navigator.userAgent + screen.width + screen.height + navigator.platform;
    const fingerprint = CryptoJS.SHA256(raw).toString();
    $('#fingerprint').val(fingerprint);
});
</script>

@endsection