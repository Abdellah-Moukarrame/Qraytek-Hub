<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password — EduMaster</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
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

        .animate-float { animation: float-up 0.6s ease forwards; }
        .animate-float-delay-1 { animation: float-up 0.6s 0.1s ease both; }
        .animate-float-delay-2 { animation: float-up 0.6s 0.2s ease both; }
        .animate-float-delay-3 { animation: float-up 0.6s 0.3s ease both; }
        .animate-float-delay-4 { animation: float-up 0.6s 0.4s ease both; }

        .pulse-ring {
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            border: 2px solid #137fec;
            animation: pulse-ring 2s ease-out infinite;
        }
        .pulse-ring-2 {
            animation-delay: 0.7s;
        }
    </style>
</head>
<body class="min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

<div class="min-h-screen bg-dots flex">

    {{-- Left: Decorative Panel --}}
    <div class="hidden lg:flex w-1/2 bg-primary relative overflow-hidden flex-col items-center justify-center p-16">

        {{-- Background blobs --}}
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>

        {{-- SVG decoration --}}
        <div class="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="40" stroke="white" stroke-width="0.5" fill="none"/>
                <circle cx="450" cy="450" r="60" stroke="white" stroke-width="0.5" fill="none"/>
                <circle cx="250" cy="250" r="120" stroke="white" stroke-width="0.5" fill="none"/>
                <circle cx="100" cy="400" r="30" stroke="white" stroke-width="0.5" fill="none"/>
                <circle cx="400" cy="100" r="50" stroke="white" stroke-width="0.5" fill="none"/>
            </svg>
        </div>

        <div class="relative z-10 text-white text-center max-w-sm">

            {{-- Animated icon --}}
            <div class="relative size-24 mx-auto mb-10">
                <div class="pulse-ring"></div>
                <div class="pulse-ring pulse-ring-2"></div>
                <div class="size-24 rounded-full bg-white/20 backdrop-blur flex items-center justify-center">
                    <span class="material-symbols-outlined text-5xl text-white">lock_reset</span>
                </div>
            </div>

            <h2 class="text-4xl font-black mb-4 leading-tight">
                Forgot your<br/>password?
            </h2>
            <p class="text-white/70 leading-relaxed text-lg">
                No worries — it happens to everyone. Enter your email and we'll send you a secure reset link in seconds.
            </p>

            {{-- Steps --}}
            <div class="mt-12 space-y-4 text-left">
                @foreach([
                    ['icon' => 'mail', 'title' => 'Enter your email', 'desc' => 'The one linked to your account'],
                    ['icon' => 'mark_email_read', 'title' => 'Check your inbox', 'desc' => 'We\'ll send a reset link'],
                    ['icon' => 'lock_open', 'title' => 'Set a new password', 'desc' => 'And you\'re back in!'],
                ] as $i => $step)
                <div class="flex items-center gap-4 bg-white/10 backdrop-blur rounded-xl px-4 py-3">
                    <div class="size-9 rounded-lg bg-white/20 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-white text-lg">{{ $step['icon'] }}</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">{{ $step['title'] }}</p>
                        <p class="text-xs text-white/60">{{ $step['desc'] }}</p>
                    </div>
                    <div class="ml-auto size-6 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold text-white">
                        {{ $i + 1 }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    {{-- Right: Form Panel --}}
    <div class="flex-1 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">

            {{-- Logo --}}
            <div class="animate-float flex items-center gap-3 mb-10">
                <div class="size-10 bg-primary rounded-lg flex items-center justify-center text-white">
                    <span class="material-symbols-outlined">school</span>
                </div>
                <span class="text-xl font-bold">EduMaster</span>
            </div>

            {{-- Success State (shown after submission) --}}
            @if(session('status'))
            <div class="animate-float bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-2xl p-6 text-center mb-6">
                <div class="size-14 bg-emerald-100 dark:bg-emerald-900/40 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-emerald-600 text-3xl">mark_email_read</span>
                </div>
                <h3 class="font-bold text-emerald-800 dark:text-emerald-400 text-lg mb-1">Check your inbox!</h3>
                <p class="text-sm text-emerald-600 dark:text-emerald-500">{{ session('status') }}</p>
            </div>
            @endif

            {{-- Heading --}}
            <div class="animate-float-delay-1 mb-8">
                <h1 class="text-3xl font-black mb-2">Reset password</h1>
                <p class="text-slate-500 dark:text-slate-400">
                    Enter your email address and we'll send you a link to reset your password.
                </p>
            </div>

            {{-- Error --}}
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
            <form method="POST" action="{{ route('password.reset') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div class="animate-float-delay-2">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Email address
                    </label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl">mail</span>
                        <input
                            type="email"
                            name="email"
                            placeholder="your@email.com"
                            required
                            autofocus
                            class="w-full bg-slate-100 dark:bg-slate-800 border-2 border-transparent rounded-xl py-3 pl-12 pr-4 text-sm focus:outline-none focus:border-primary focus:bg-white dark:focus:bg-slate-700 transition-all @error('email') border-rose-400 bg-rose-50 dark:bg-rose-900/20 @enderror"
                        />
                    </div>
                </div>

                {{-- Submit --}}
                <div class="animate-float-delay-3">
                    <button
                        type="submit"
                        class="w-full py-3.5 bg-primary text-white font-bold rounded-xl hover:bg-primary/90 hover:scale-[1.01] active:scale-[0.99] transition-all flex items-center justify-center gap-2 shadow-lg shadow-primary/20">
                        <span class="material-symbols-outlined">send</span>
                        Send Reset Link
                    </button>
                </div>

            </form>

            {{-- Back to login --}}
            <div class="animate-float-delay-4 mt-8 text-center">
                <a href="{{ route('login.index') }}"
                    class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-primary transition-colors font-medium">
                    <span class="material-symbols-outlined text-base">arrow_back</span>
                    Back to Sign In
                </a>
            </div>

        </div>
    </div>

</div>

</body>
</html>
