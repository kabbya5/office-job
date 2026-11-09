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
            <div class="text-center mb-8">
                <h1 class="text-5xl font-bold text-[var(--primary)] tracking-wider">
                    CASINO
                </h1>

                <p class="text-[var(--text-muted)] mt-2">
                    Welcome Back
                </p>
            </div>

            <!-- Login Card -->
            <div
                class="backdrop-blur-xl bg-white/5 border border-[var(--primary-border)]
                       rounded-3xl p-8 shadow-2xl">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Username -->
                    <div class="mb-5">
                        <label class="block text-[var(--text)] mb-2">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone_number"
                            value="{{old('phone_number')}}"
                            class="w-full bg-[var(--bg-card)]
                                   border border-[var(--border)]
                                   rounded-xl px-4 py-3
                                   text-[var(--text)]
                                   focus:border-[var(--primary)]
                                   focus:ring-2
                                   focus:ring-[var(--primary)]/20
                                   outline-none transition"
                            placeholder="Enter Phone Number">
                    </div>
                    @error('phone_number')
                        <span class="text-red-500">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <!-- Password -->
                    <div class="mb-5">
                        <label class="block text-[var(--text)] mb-2">
                            Password
                        </label>

                        <div class="relative">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="w-full bg-[var(--bg-card)]
                                       border border-[var(--border)]
                                       rounded-xl px-4 py-3
                                       text-[var(--text)]
                                       focus:border-[var(--primary)]
                                       outline-none transition"
                                placeholder="Enter Password">

                            <button
                                type="button"
                                id="togglePassword"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-[var(--text-muted)]">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember -->
                    <div class="flex justify-between items-center mb-6">
                        <label class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                name="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <span class="text-sm text-[var(--text-muted)]">
                                Remember me
                            </span>
                        </label>

                        <a href="#" class="text-[var(--primary)] text-sm">
                            Forgot Password?
                        </a>
                    </div>

                    <!-- Login Button -->
                    <button
                        type="submit"
                        class="w-full bg-[var(--primary)]
                               text-black font-bold
                               py-3 rounded-xl
                               hover:scale-[1.02]
                               transition duration-300
                               shadow-lg shadow-yellow-500/20">
                        LOGIN NOW
                    </button>

                    <!-- Register -->
                    <div class="text-center mt-6">
                        <span class="text-[var(--text-muted)]">
                            Don't have an account?
                        </span>

                        <a href="{{ route('register') }}"
                           class="text-[var(--primary)] font-semibold">
                            Register
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
@endsection

@section('js')
<script>
$(function () {

    $('#togglePassword').on('click', function () {

        let input = $('#password');

        if(input.attr('type') === 'password') {
            input.attr('type', 'text');
            $(this).html('<i class="fas fa-eye-slash"></i>');
        } else {
            input.attr('type', 'password');
            $(this).html('<i class="fas fa-eye"></i>');
        }

    });

});
</script>
@endsection