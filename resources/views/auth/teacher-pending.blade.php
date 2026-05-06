<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Application Pending — Qraytek Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    @vite('resources/css/app.css')
    <style>
        body { font-family: 'Lexend', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        @keyframes pulse-ring {
            0%   { transform: scale(1); opacity: 0.4; }
            100% { transform: scale(1.6); opacity: 0; }
        }
        .pulse { animation: pulse-ring 2s ease-out infinite; }
        .pulse-2 { animation: pulse-ring 2s 0.7s ease-out infinite; }
    </style>
</head>
<body class="min-h-screen bg-background-light dark:bg-background-dark flex items-center justify-center p-6">

<div class="max-w-lg w-full text-center">

    {{-- Animated Icon --}}
    <div class="relative size-28 mx-auto mb-10">
        <div class="pulse absolute inset-0 rounded-full border-2 border-amber-400"></div>
        <div class="pulse-2 absolute inset-0 rounded-full border-2 border-amber-400"></div>
        <div class="size-28 rounded-full bg-amber-50 dark:bg-amber-900/20 flex items-center justify-center">
            <span class="material-symbols-outlined text-amber-500" style="font-size: 3rem">hourglass_top</span>
        </div>
    </div>

    {{-- Logo --}}
    <div class="flex items-center justify-center gap-2 mb-8">
        <div class="size-9 bg-primary rounded-lg flex items-center justify-center text-white">
            <span class="material-symbols-outlined">school</span>
        </div>
        <span class="text-xl font-bold text-slate-900 dark:text-white">Qraytek Hub</span>
    </div>

    {{-- Content --}}
    <h1 class="text-3xl font-black text-slate-900 dark:text-white mb-4">
        Application Submitted! 🎉
    </h1>
    <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-8">
        Thank you for applying to join Qraytek Hub as a teacher.
        We've sent a confirmation email to your inbox.
        Our admin team will review your application within <strong class="text-amber-600">48 hours</strong>.
    </p>

    {{-- Status Card --}}
    <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-2xl p-6 mb-8 text-left">
        <div class="flex items-center gap-3 mb-4">
            <span class="size-2.5 rounded-full bg-amber-500 animate-pulse inline-block"></span>
            <span class="font-bold text-amber-700 dark:text-amber-400">Status: Pending Review</span>
        </div>
        <div class="space-y-3">
            @foreach([
                ['icon' => 'check_circle', 'text' => 'Application received', 'done' => true],
                ['icon' => 'schedule', 'text' => 'Documents under review (up to 48h)', 'done' => false],
                ['icon' => 'mark_email_read', 'text' => 'Decision email will be sent', 'done' => false],
                ['icon' => 'rocket_launch', 'text' => 'Start teaching on Qraytek Hub', 'done' => false],
            ] as $step)
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-lg {{ $step['done'] ? 'text-emerald-500' : 'text-slate-300 dark:text-slate-600' }}">
                    {{ $step['icon'] }}
                </span>
                <span class="text-sm {{ $step['done'] ? 'text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-500 dark:text-slate-400' }}">
                    {{ $step['text'] }}
                </span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Actions --}}
    <div class="flex flex-col gap-3">
        <a href="{{ route('login') }}"
            class="w-full py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary/90 transition-colors">
            Back to Sign In
        </a>
        <a href="{{ route('home') }}"
            class="w-full py-3 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
            Go to Homepage
        </a>
    </div>



</div>

</body>
</html>
