<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password — EduMaster</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        body { font-family: 'Lexend', sans-serif; }
        .bg-dots {
            background-image: radial-gradient(circle, #137fec18 1px, transparent 1px);
            background-size: 28px 28px;
        }
        @keyframes float-up {
            0%   { opacity: 0; transform: translateY(24px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulse-ring {
            0%   { transform: scale(1);   opacity: 0.4; }
            100% { transform: scale(1.5); opacity: 0; }
        }
        .animate-float            { animation: float-up 0.6s 0.0s ease both; }
        .animate-float-delay-1    { animation: float-up 0.6s 0.1s ease both; }
        .animate-float-delay-2    { animation: float-up 0.6s 0.2s ease both; }
        .animate-float-delay-3    { animation: float-up 0.6s 0.3s ease both; }
        .animate-float-delay-4    { animation: float-up 0.6s 0.4s ease both; }
        .animate-float-delay-5    { animation: float-up 0.6s 0.5s ease both; }
        .pulse-ring {
            position: absolute; inset: 0;
            border-radius: 9999px;
            border: 2px solid #137fec;
            animation: pulse-ring 2s ease-out infinite;
        }
        .pulse-ring-2 { animation-delay: 0.7s; }
        #strength-bar { transition: width 0.4s ease, background-color 0.4s ease; }
    </style>
</head>
<body class="min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

<div class="min-h-screen bg-dots flex">

    {{-- Left Panel --}}
    <div class="hidden lg:flex w-1/2 bg-primary relative overflow-hidden flex-col items-center justify-center p-16">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50"  cy="50"  r="40"  stroke="white" stroke-width="0.5" fill="none"/>
                <circle cx="450" cy="450" r="60"  stroke="white" stroke-width="0.5" fill="none"/>
                <circle cx="250" cy="250" r="120" stroke="white" stroke-width="0.5" fill="none"/>
                <circle cx="100" cy="400" r="30"  stroke="white" stroke-width="0.5" fill="none"/>
                <circle cx="400" cy="100" r="50"  stroke="white" stroke-width="0.5" fill="none"/>
            </svg>
        </div>
        <div class="relative z-10 text-white text-center max-w-sm">
            <div class="relative size-24 mx-auto mb-10">
                <div class="pulse-ring"></div>
                <div class="pulse-ring pulse-ring-2"></div>
                <div class="size-24 rounded-full bg-white/20 backdrop-blur flex items-center justify-center">
                    <span class="material-symbols-outlined text-5xl text-white">lock_open</span>
                </div>
            </div>
            <h2 class="text-4xl font-black mb-4 leading-tight">
                Create a new<br/>password
            </h2>
            <p class="text-white/70 leading-relaxed text-lg">
                Choose a strong password to keep your account safe.
            </p>
            <div class="mt-12 space-y-3 text-left">
                @foreach([
                    'At least 8 characters long',
                    'Mix uppercase & lowercase letters',
                    'Include numbers and symbols',
                    'Never reuse an old password',
                ] as $tip)
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur rounded-xl px-4 py-3">
                    <span class="material-symbols-outlined text-white/80 text-lg">check_circle</span>
                    <span class="text-sm text-white/80">{{ $tip }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Right: Form --}}
    <div class="flex-1 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">

            {{-- Logo --}}
            <div class="animate-float flex items-center gap-3 mb-10">
                <div class="size-10 bg-primary rounded-lg flex items-center justify-center text-white">
                    <span class="material-symbols-outlined">school</span>
                </div>
                <span class="text-xl font-bold">EduMaster</span>
            </div>

            {{-- Heading --}}
            <div class="animate-float-delay-1 mb-8">
                <h1 class="text-3xl font-black mb-2">Set new password</h1>
                <p class="text-slate-500 dark:text-slate-400">
                    Almost there! Enter and confirm your new password below.
                </p>
            </div>

            {{-- Errors --}}
            @if($errors->any())
            <div class="animate-float bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 rounded-xl p-4 mb-6 flex items-start gap-3">
                <span class="material-symbols-outlined text-rose-500 flex-shrink-0">error</span>
                <div>
                    @foreach($errors->all() as $error)
                    <p class="text-sm text-rose-600 dark:text-rose-400">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf

                {{-- Hidden fields --}}
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

                {{-- New Password --}}
                <div class="animate-float-delay-2">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        New Password
                    </label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl">lock</span>
                        <input type="password" name="password" id="password"
                            placeholder="Enter new password" required
                            oninput="checkStrength(this.value)"
                            class="w-full bg-slate-100 dark:bg-slate-800 border-2 border-transparent rounded-xl py-3 pl-12 pr-12 text-sm focus:outline-none focus:border-primary focus:bg-white dark:focus:bg-slate-700 transition-all @error('password') border-rose-400 @enderror" />
                        <button type="button" onclick="togglePwd('password','eye1')"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <span class="material-symbols-outlined text-xl" id="eye1">visibility</span>
                        </button>
                    </div>
                    {{-- Strength bar --}}
                    <div class="mt-2 h-1.5 w-full bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                        <div id="strength-bar" class="h-full rounded-full w-0 bg-rose-400"></div>
                    </div>
                    <p id="strength-label" class="text-xs text-slate-400 mt-1">Password strength</p>
                </div>

                {{-- Confirm Password --}}
                <div class="animate-float-delay-3">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Confirm Password
                    </label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl">lock_clock</span>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Confirm new password" required
                            class="w-full bg-slate-100 dark:bg-slate-800 border-2 border-transparent rounded-xl py-3 pl-12 pr-12 text-sm focus:outline-none focus:border-primary focus:bg-white dark:focus:bg-slate-700 transition-all" />
                        <button type="button" onclick="togglePwd('password_confirmation','eye2')"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <span class="material-symbols-outlined text-xl" id="eye2">visibility</span>
                        </button>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="animate-float-delay-4">
                    <button type="submit"
                        class="w-full py-3.5 bg-primary text-white font-bold rounded-xl hover:bg-primary/90 hover:scale-[1.01] active:scale-[0.99] transition-all flex items-center justify-center gap-2 shadow-lg shadow-primary/20">
                        <span class="material-symbols-outlined">lock_reset</span>
                        Reset Password
                    </button>
                </div>

            </form>

            {{-- Back to login --}}
            <div class="animate-float-delay-5 mt-8 text-center">
                <a href="{{ route('login.index') }}"
                    class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-primary transition-colors font-medium">
                    <span class="material-symbols-outlined text-base">arrow_back</span>
                    Back to Sign In
                </a>
            </div>

        </div>
    </div>
</div>

<script>
function togglePwd(id, eyeId) {
    const input = document.getElementById(id);
    const eye   = document.getElementById(eyeId);
    input.type  = input.type === 'password' ? 'text' : 'password';
    eye.textContent = input.type === 'password' ? 'visibility' : 'visibility_off';
}

function checkStrength(val) {
    const bar   = document.getElementById('strength-bar');
    const label = document.getElementById('strength-label');
    let score = 0;
    if (val.length >= 8)           score++;
    if (/[A-Z]/.test(val))         score++;
    if (/[0-9]/.test(val))         score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;

    const levels = [
        { width: '0%',   color: 'bg-slate-300',  text: 'Password strength' },
        { width: '25%',  color: 'bg-rose-400',    text: 'Weak' },
        { width: '50%',  color: 'bg-amber-400',   text: 'Fair' },
        { width: '75%',  color: 'bg-yellow-400',  text: 'Good' },
        { width: '100%', color: 'bg-emerald-500', text: 'Strong 💪' },
    ];
    const level = levels[score];
    bar.style.width = level.width;
    bar.className = `h-full rounded-full transition-all ${level.color}`;
    label.textContent = level.text;
}
</script>

</body>
</html>
