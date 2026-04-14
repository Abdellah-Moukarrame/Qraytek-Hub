<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login Selection - EduPlatform</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#137fec",
                        "accent-orange": "#f97316",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                    },
                    fontFamily: {
                        "display": ["Lexend"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>

<body
    class="font-display bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen overflow-x-hidden">
    {{-- <header
        class="sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-[#e7edf3] dark:border-slate-800">
        @include('layouts.partials.navbar')
    </header> --}}

    <div class="flex h-screen w-full">

        {{-- Left Side: Educational Imagery (Hidden on small screens) --}}
        <div class="hidden lg:flex lg:w-3/5 relative overflow-hidden bg-primary">
            <div class="absolute inset-0 z-10 bg-gradient-to-br from-primary/80 to-primary/40"></div>
            <img alt="Teacher in a modern classroom setting" class="absolute inset-0 object-cover w-full h-full"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtd1Ncmcbgf1tdhZUBOT9oBPzW8QWb04QQ-P5dbpIQt6fYeaGggrMN-mSBHrcphtAzESB-rJCD6Xasn24k934q_o0i6swBEY_1KtBkEohKX37blut0I1NXSiImdK4umLO_NZWYqkUFfA0fgLtsv6fj6NPZYA-mcot0HljEvr-c0phd6seQeKCuIpUioEimY9tNZPUOEzrU5GDEmW2uUqDsmwUkG2usRPRjQZd3MmpJUG3D9EMmNi4TuJbu66Cug7Tnr_1fblKBIMk" />
            <div class="relative z-20 flex flex-col justify-end p-20 text-white max-w-2xl">
                <h1 class="text-5xl font-bold leading-tight mb-4">Empowering independent educators everywhere.</h1>
                <p class="text-xl text-white/90 leading-relaxed">
                    A seamless ecosystem for bookings, automated payments, and comprehensive student tracking.
                </p>
                <div class="mt-8 flex gap-4">
                    <div class="flex -space-x-3 overflow-hidden">
                        <img alt="User" class="inline-block h-10 w-10 rounded-full ring-2 ring-primary"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmF8GWQvv15nOFlT1yzGBJKuo8noQD0kQr_USkkMAtJUC_VKtpQJeElPD50opuD3UQtS1pAm7ne3UXRWx_ZUxlaaGsbxnrDn95z6ozv_cCck966U5_hZbiMYgulS4EPjAoMO3rX5HkDQ3O20ObuHRSJ07TKVbMntFLZhB3fYzS3qsjIfW0Zb-YXG6P2b6RLO7EYzDmGv-GXb1Rv673tX4vdluUcNTn5OTCkVZyE6wpmRQf7Pgm_uBYWSRe_pGJfsrMqz0G39ia9cM" />
                        <img alt="User" class="inline-block h-10 w-10 rounded-full ring-2 ring-primary"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlSGXpvQfW8wCxUorflrh7-USqN6MtsZeNPj5M8INPCf0-51KotaKyDgD2MdRzimTDwJajgXApB1W7bQ00v7KyrASiwbmxvv2N2VbYgm3Agaq4Q8aepro-6q3rEsldjqlr2wdHkKSY8v38s6zCqLV6sQTBbsj4wDYJPsmPVITy0MfAJehEQoimgRfBEafCKYU8BlHnO_WJmm1ZRg5ahNDh_9RhAyBrO-9_uSjrfyBOR05SZbhiTM3hrCjLjzNCeduQBB9Stk0S_iE" />
                        <img alt="User" class="inline-block h-10 w-10 rounded-full ring-2 ring-primary"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjcBmQZo0I18WjGv4NCA7-yVWhziiyqvb_yKJsnCYB5upDUOhL2dOY72b_x9EmfBKNFe3aae1DUPTND5erglpbAdrW1k6xRMEshohB7hYeA0ujxSA9BuZJYTDOhVP4INVJFO1kBdLY21DieZswW7fRqlo9XVaGA0uFy55ruWtYh_BKZsY5ovgOOxU9X8I4L_9dWEUiKeGhpJ0uEvdy1axGMYtB9N0lgnLthjt46SrbF3PPS2-UJacz2U50N0lhWvXrgfprxTPN2wc" />
                    </div>
                    <div class="text-sm font-medium flex items-center">
                        Joined by 10,000+ teachers this month
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Side: Login Selection & Form --}}
        <div
            class="w-full lg:w-2/5 bg-white dark:bg-background-dark flex flex-col justify-center px-8 sm:px-16 lg:px-12 xl:px-20 py-12 overflow-y-auto">
            <div class="max-w-md w-full mx-auto">

                {{-- Mobile Logo --}}
                <div class="flex lg:hidden items-center gap-2 mb-8">
                    <span class="material-symbols-outlined text-primary text-3xl">school</span>
                    <span class="text-xl font-bold tracking-tight text-slate-900 dark:text-white">EduPlatform</span>
                </div>

                <div class="mb-10 text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Welcome back</h2>
                    <p class="text-slate-500 dark:text-slate-400">Please select your role to continue to your dashboard.
                    </p>
                </div>

                {{-- Social Logins --}}
                <div class="space-y-3 mb-8">
                    <a href="{{ route('google.redirect', 'google') }}"
                        class="flex w-full items-center justify-center gap-3 h-12 px-4 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors font-medium">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="#4285F4" />
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="#34A853" />
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"
                                fill="#FBBC05" />
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                fill="#EA4335" />
                        </svg>
                        <span>Continue with Google</span>
                    </a>

                </div>

                {{-- Divider --}}
                <div class="relative flex items-center justify-center mb-8">
                    <div class="flex-grow border-t border-slate-200 dark:border-slate-800"></div>
                    <span class="flex-shrink mx-4 text-xs font-medium text-slate-400 uppercase tracking-widest">Or email
                        login</span>
                    <div class="flex-grow border-t border-slate-200 dark:border-slate-800"></div>
                </div>

                {{-- Login Form --}}
                <form method="POST" action="{{ route('login.create') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email"
                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Email Address
                        </label>
                        <input id="email" name="email" type="email" required placeholder="name@example.com"
                            class="w-full h-12 px-4 rounded-lg bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400 @error('email') border-red-500 @enderror" />
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="text-sm font-semibold text-slate-700 dark:text-slate-300">
                                Password
                            </label>

                            <a class="text-xs font-semibold text-primary hover:underline" href="">
                                Forgot password?
                            </a>

                        </div>
                        <input id="password" name="password" type="password" required placeholder="••••••••"
                            class="w-full h-12 px-4 rounded-lg bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400 @error('password') border-red-500 @enderror" />
                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                        class="w-full h-12 bg-primary hover:bg-primary/90 text-white font-bold rounded-lg shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2">
                        <span>Sign In</span>
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </button>

                </form>

                {{-- Footer --}}
                <div class="mt-8 pt-8 border-t border-slate-100 dark:border-slate-800 text-center">
                    <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Don't have an account?

                        <a class="text-primary font-bold hover:underline" href="/register">Create an
                            account
                        </a>
                    </p>
                    <div class="flex justify-center gap-6 mt-6">
                        <a class="text-xs text-slate-400 hover:text-slate-600 dark:hover:text-slate-300"
                            href="#">Help Center</a>
                        <a class="text-xs text-slate-400 hover:text-slate-600 dark:hover:text-slate-300"
                            href="#">Terms of Service</a>
                        <a class="text-xs text-slate-400 hover:text-slate-600 dark:hover:text-slate-300"
                            href="#">Privacy Policy</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <footer class="bg-slate-50 dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 pt-20 pb-10">
        {{-- @include('layouts.partials.footer') --}}
    </footer>

</body>

</html>
