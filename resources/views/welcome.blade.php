<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>EduIndependent - Public Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            font-family: 'Lexend', sans-serif;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-[#0d141b] dark:text-slate-50 transition-colors duration-200">

    <!-- Top Navigation Bar -->
    <header
        class="sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-[#e7edf3] dark:border-slate-800">
        @include('layouts.partials.navbar')
    </header>

    <main>

        <!-- Hero Section -->
        <section
            class="max-w-[1440px] mx-auto px-10 py-16 md:py-24 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="flex flex-col gap-8">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 bg-accent-orange/10 text-accent-orange rounded-full w-fit">
                    <span class="material-symbols-outlined text-sm">stars</span>
                    <span class="text-xs font-bold uppercase tracking-wider">Trusted by 50,000+ students</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-black leading-tight tracking-tight">
                    Empower your <span class="text-primary">teaching</span> journey.
                </h1>
                <p class="text-lg text-slate-600 dark:text-slate-400 max-w-lg leading-relaxed">
                    The all-in-one platform for independent teachers to host, manage, and grow their educational
                    business with integrated booking and payments.
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('login.index') }}"
                        class="px-8 py-4 bg-primary text-white font-bold rounded-xl hover:scale-[1.02] transition-transform flex items-center gap-2">
                        Start Learning Now
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                    <a href="{{ route('register.teacher') }}"
                        class="px-8 py-4 border-2 border-slate-200 dark:border-slate-800 font-bold rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        Become a Teacher
                    </a>
                </div>
                <div class="flex items-center gap-6 pt-4 text-slate-500">
                    <div class="flex items-center gap-2 text-sm font-medium">
                        <span class="material-symbols-outlined text-green-500">check_circle</span>
                        No credit card required
                    </div>
                    <div class="flex items-center gap-2 text-sm font-medium">
                        <span class="material-symbols-outlined text-green-500">check_circle</span>
                        Verified experts
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-10 -right-10 w-64 h-64 bg-accent-orange/10 rounded-full blur-3xl -z-10">
                </div>
                <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-primary/10 rounded-full blur-3xl -z-10"></div>
                <div
                    class="rounded-3xl overflow-hidden shadow-2xl border-8 border-white dark:border-slate-800 transform rotate-2">
                    <img alt="Students collaborating" class="w-full aspect-[4/3] object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcu2QWAEkkC5A_NtASD-81y046r0R38ep5PnYytCvj6o0uMcMqdR_vWEVOX4ENjfEJD0PlLjfWOAnLNc9sVBYnk-pr82Z2iR1D4kaTgRoK4pfLJcfSgtL4bxWZ-Yw_VP6loSDsI6bFg4DnT9HkFAz8EEgqR0NxdEo1EJFhdybUMEY6dKTHzibZErRVTWMT7i0tbw_RQM_OCKbeFZTS2e-UsJO6i_OeobEI6eX4sbW3KuJWNCKNWxaYaIUj52yYhQUxBgGBVBH6d6k" />
                </div>
                <!-- Floating Card -->
                <div
                    class="absolute -bottom-6 -right-6 bg-white dark:bg-slate-800 p-4 rounded-2xl shadow-xl border border-slate-100 dark:border-slate-700 hidden md:block">
                    <div class="flex items-center gap-4">
                        <div
                            class="size-12 rounded-full bg-accent-orange/20 flex items-center justify-center text-accent-orange">
                            <span class="material-symbols-outlined">payments</span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Total Teacher Earnings</p>
                            <p class="text-lg font-bold text-primary">$2,450,000+</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How it Works Section -->
        <section class="bg-slate-100 dark:bg-slate-900/50 py-24">
            <div class="max-w-[1440px] mx-auto px-10">
                <div class="text-center mb-16">
                    <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-4">The Process</h2>
                    <h3 class="text-4xl font-black mb-6">Simple, Secure, and Scalable</h3>
                    <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">Everything you need to manage your
                        learning experience in one place. We've simplified the journey from student to expert.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div
                        class="bg-white dark:bg-background-dark p-8 rounded-2xl border border-slate-200 dark:border-slate-800 hover:shadow-xl transition-shadow group">
                        <div
                            class="size-14 bg-primary/10 text-primary rounded-xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">search</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3">1. Find your tutor</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            Browse through hundreds of verified independent experts across various subjects and find the
                            perfect match for your learning style.
                        </p>
                    </div>
                    <!-- Step 2 -->
                    <div
                        class="bg-white dark:bg-background-dark p-8 rounded-2xl border border-slate-200 dark:border-slate-800 hover:shadow-xl transition-shadow group">
                        <div
                            class="size-14 bg-accent-orange/10 text-accent-orange rounded-xl flex items-center justify-center mb-6 group-hover:bg-accent-orange group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">event_available</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3">2. Book &amp; Pay securely</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            Seamless payment processing and automated booking system for hassle-free scheduling. Pay per
                            session or buy multi-lesson bundles.
                        </p>
                    </div>
                    <!-- Step 3 -->
                    <div
                        class="bg-white dark:bg-background-dark p-8 rounded-2xl border border-slate-200 dark:border-slate-800 hover:shadow-xl transition-shadow group">
                        <div
                            class="size-14 bg-green-500/10 text-green-500 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-500 group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">trending_up</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3">3. Track your progress</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            Monitor your learning journey with our integrated student tracking and analytics tools. See
                            your growth in real-time.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Categories -->
        <section class="py-24 px-10 max-w-[1440px] mx-auto">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h3 class="text-4xl font-black mb-2">Featured Categories</h3>
                    <p class="text-slate-600 dark:text-slate-400">Master new skills with specialized independent
                        mentors.</p>
                </div>
                <button class="text-primary font-bold flex items-center gap-1 hover:underline">
                    View all 24+ categories
                    <span class="material-symbols-outlined text-sm">arrow_outward</span>
                </button>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Category 1 -->
                <div class="relative group cursor-pointer overflow-hidden rounded-2xl aspect-[4/5]">
                    <img alt="Coding & Tech"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdOQ1T6Nr9M3q-v9LLarM1tMILX2dD9G7AgnM5xfHkRAAxFxGD1JkO_6arr5FVCwQS66MdYvdZfFYoDuhB-G9uZ9PTXL0Hh96OpB8ujcKLOjXvFuvH84E1gktV5Mz47nRKNAzxzL_9GVWbIpIDjJriYoYEnAofsQ-rWq22fgO5I-TlyAIecGT1GiEkLFiUxreQFObbX4HnCZ_qleFSKJ3EdMJmggWMHsMsBBapfQer-BbxUwWAQwKtBCvkCnoMGJa48eGbMSsy_KI" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h5 class="text-white text-xl font-bold">Coding &amp; Tech</h5>
                        <p class="text-white/80 text-sm">1,240 Teachers</p>
                    </div>
                </div>
                <!-- Category 2 -->
                <div class="relative group cursor-pointer overflow-hidden rounded-2xl aspect-[4/5]">
                    <img alt="Business Strategy"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTzW1igIW0sPAdvsIz4JawzQ4oEtYgq-vzmfUUQCv_RG4qm5056EyolEaX4N0TtElfYmRXo99Bdd3CLRKN9IpysrY5aUJ_7h5I9zmNdKmYfTlUAlAaN6dhd08jOHqRuejqHZODWeAt70pF-elNM6G1tmnbUtjaggTk4MgDD83aWEfEd63oiHEVTwvjqtIQEc9Z_b91aDqebRit8ctcxNo_4ls_53C-TRhAnk7htbm7DSRp7n6-PshniT7kqiFah8MJos20qFME6iU" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h5 class="text-white text-xl font-bold">Business Strategy</h5>
                        <p class="text-white/80 text-sm">850 Teachers</p>
                    </div>
                </div>
                <!-- Category 3 -->
                <div class="relative group cursor-pointer overflow-hidden rounded-2xl aspect-[4/5]">
                    <img alt="Arts & Design"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9juIDu39jVtND3pYefJJuEWSbr_ZL1gMvMu2UMx5L_5TqnrsDT059mqT_MH07B--IyP_0Kqn-zPeQkZpEs12a_tN_9M4Tmx6VRB9gPOlQr5B_W61u3AVJM5K2SRfis2sKKmhoaBRjFmXbWvsdZfKezLL_QejlAlqlRJpa1Yv2z0sN7H-XbTISW686dPMH03HB2gEWaqIhYXigILkOqbzfCIK7Xmzrxhs_8ejXkaPfX5qik_KrAtnr2UJCtbwUr6mu_V73CGAW2eA" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h5 class="text-white text-xl font-bold">Arts &amp; Design</h5>
                        <p class="text-white/80 text-sm">620 Teachers</p>
                    </div>
                </div>
                <!-- Category 4 -->
                <div class="relative group cursor-pointer overflow-hidden rounded-2xl aspect-[4/5]">
                    <img alt="Languages"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAhdxVOOa0T3zZpakxdx0_-JwheEo2CP9g5XU519KmR7cbDJoTigjfhFzMPPxRRGLf7TpIjKYBqDYSpfVmKa6DKtZohyShD85Ed39YWthg2-sEybr385PJpJ9Q-l3ZD8QxVK-NAsO2sta5f3j-r8dz-3_gpxA_KRxz51Ma1FNWrKRqCAOvYscGl5zFO-ch5MfeWUduGlM84LgX05lsXt5PcsWNOvLi1WReGFEYHByBky3yysam543bestW6D06Tm153YM2l2C4R_pk" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h5 class="text-white text-xl font-bold">Languages</h5>
                        <p class="text-white/80 text-sm">2,100 Teachers</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOR TEACHERS -->
        <section id="for-teachers" class="py-24 bg-slate-50 dark:bg-slate-900/50">
            <div class="max-w-[1440px] mx-auto px-10">

                {{-- Section Header --}}
                <div class="text-center mb-16">
                    <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-4">For Teachers</h2>
                    <h3 class="text-4xl font-black mb-6">
                        Your knowledge. <span class="text-primary">Your rules.</span>
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-lg leading-relaxed">
                        Join thousands of independent teachers who have ditched the classroom limits and built
                        a thriving teaching business — fully online, fully on their terms.
                    </p>
                </div>

                {{-- Trust Numbers --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-20">
                    @php
                        $numbers = [
                            [
                                'value' => '$2.4M+',
                                'label' => 'Paid to Teachers',
                                'icon' => 'payments',
                                'color' => 'text-primary bg-primary/10',
                            ],
                            [
                                'value' => '1,240',
                                'label' => 'Active Teachers',
                                'icon' => 'person_pin_circle',
                                'color' => 'text-emerald-600 bg-emerald-50 dark:bg-emerald-900/20',
                            ],
                            [
                                'value' => '4.8★',
                                'label' => 'Avg. Teacher Rating',
                                'icon' => 'star',
                                'color' => 'text-amber-600 bg-amber-50 dark:bg-amber-900/20',
                            ],
                            [
                                'value' => '$1,800',
                                'label' => 'Avg. Monthly Earnings',
                                'icon' => 'trending_up',
                                'color' => 'text-indigo-600 bg-indigo-50 dark:bg-indigo-900/20',
                            ],
                        ];
                    @endphp
                    @foreach ($numbers as $stat)
                        <div
                            class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 text-center hover:shadow-lg transition-shadow">
                            <div
                                class="size-12 {{ $stat['color'] }} rounded-xl flex items-center justify-center mx-auto mb-4">
                                <span class="material-symbols-outlined">{{ $stat['icon'] }}</span>
                            </div>
                            <p class="text-3xl font-black mb-1">{{ $stat['value'] }}</p>
                            <p class="text-sm text-slate-500">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>

                {{-- Main Content: Value Props + How it Works --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">

                    {{-- Left: Value Propositions --}}
                    <div class="space-y-6">
                        <h4 class="text-3xl font-black">Why teachers <span class="text-primary">love</span> us</h4>
                        <p class="text-slate-500 dark:text-slate-400 leading-relaxed">
                            We handle the tech, payments, and bookings — you focus entirely on teaching.
                        </p>

                        @php
                            $values = [
                                [
                                    'icon' => 'schedule',
                                    'color' => 'bg-primary/10 text-primary',
                                    'title' => 'You control your schedule',
                                    'desc' =>
                                        'Set your own availability. Teach mornings, evenings, or weekends — whatever fits your life.',
                                ],
                                [
                                    'icon' => 'payments',
                                    'color' => 'bg-emerald-50 text-emerald-600 dark:bg-emerald-900/20',
                                    'title' => 'You set your own price',
                                    'desc' =>
                                        'Define your hourly rate based on your expertise. No platform dictating what you earn.',
                                ],
                                [
                                    'icon' => 'menu_book',
                                    'color' => 'bg-indigo-50 text-indigo-600 dark:bg-indigo-900/20',
                                    'title' => 'Full curriculum freedom',
                                    'desc' =>
                                        'Create your own courses and sessions. No rigid syllabus — teach the way you know best.',
                                ],
                                [
                                    'icon' => 'account_balance_wallet',
                                    'color' => 'bg-amber-50 text-amber-600 dark:bg-amber-900/20',
                                    'title' => 'Get paid per session',
                                    'desc' =>
                                        'Receive payments directly and securely after every confirmed session. No delays.',
                                ],
                                [
                                    'icon' => 'verified_user',
                                    'color' => 'bg-rose-50 text-rose-600 dark:bg-rose-900/20',
                                    'title' => 'Verified badge & trust',
                                    'desc' =>
                                        'Get a verified teacher badge after validation — build credibility and attract more students.',
                                ],
                            ];
                        @endphp

                        <div class="space-y-4">
                            @foreach ($values as $value)
                                <div
                                    class="flex items-start gap-4 p-4 bg-white dark:bg-slate-900 rounded-xl border border-slate-100 dark:border-slate-800 hover:border-primary/30 hover:shadow-sm transition-all group">
                                    <div
                                        class="size-10 {{ $value['color'] }} rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                        <span class="material-symbols-outlined">{{ $value['icon'] }}</span>
                                    </div>
                                    <div>
                                        <h5 class="font-bold mb-0.5">{{ $value['title'] }}</h5>
                                        <p class="text-sm text-slate-500 leading-relaxed">{{ $value['desc'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Right: How it Works for Teachers --}}
                    <div
                        class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-10 shadow-xl">
                        <h4 class="text-2xl font-black mb-8">Start in <span class="text-primary">3 simple steps</span>
                        </h4>

                        <div
                            class="space-y-8 relative before:absolute before:left-5 before:top-10 before:bottom-10 before:w-0.5 before:bg-slate-100 dark:before:bg-slate-800">

                            {{-- Step 1 --}}
                            <div class="flex items-start gap-5 relative">
                                <div
                                    class="size-10 rounded-full bg-primary text-white flex items-center justify-center font-black text-sm flex-shrink-0 z-10">
                                    1
                                </div>
                                <div class="pt-1">
                                    <h5 class="font-bold text-lg mb-1">Create your profile</h5>
                                    <p class="text-sm text-slate-500 leading-relaxed">
                                        Sign up, fill in your subjects, experience, and upload your documents. Our team
                                        will verify your profile within 48 hours.
                                    </p>
                                    <div class="flex items-center gap-2 mt-3 text-xs text-emerald-600 font-bold">
                                        <span class="material-symbols-outlined text-sm">check_circle</span>
                                        Free to join — no upfront cost
                                    </div>
                                </div>
                            </div>

                            {{-- Step 2 --}}
                            <div class="flex items-start gap-5 relative">
                                <div
                                    class="size-10 rounded-full bg-primary text-white flex items-center justify-center font-black text-sm flex-shrink-0 z-10">
                                    2
                                </div>
                                <div class="pt-1">
                                    <h5 class="font-bold text-lg mb-1">Set your availability & rate</h5>
                                    <p class="text-sm text-slate-500 leading-relaxed">
                                        Define your weekly schedule and set your hourly price. Students will see your
                                        availability and book directly from your profile.
                                    </p>
                                    <div class="flex items-center gap-2 mt-3 text-xs text-primary font-bold">
                                        <span class="material-symbols-outlined text-sm">tune</span>
                                        Full control over your calendar
                                    </div>
                                </div>
                            </div>

                            {{-- Step 3 --}}
                            <div class="flex items-start gap-5 relative">
                                <div
                                    class="size-10 rounded-full bg-primary text-white flex items-center justify-center font-black text-sm flex-shrink-0 z-10">
                                    3
                                </div>
                                <div class="pt-1">
                                    <h5 class="font-bold text-lg mb-1">Teach & get paid</h5>
                                    <p class="text-sm text-slate-500 leading-relaxed">
                                        Conduct your sessions via our integrated video system. Payment is automatically
                                        released to you after each confirmed session.
                                    </p>
                                    <div class="flex items-center gap-2 mt-3 text-xs text-amber-600 font-bold">
                                        <span class="material-symbols-outlined text-sm">bolt</span>
                                        Fast, secure payouts
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- CTA --}}
                        <div class="mt-10 pt-8 border-t border-slate-100 dark:border-slate-800">
                            <a href="{{ route('register.teacher') }}"
                                class="flex items-center justify-center gap-2 w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary/90 hover:scale-[1.02] transition-all text-lg">
                                <span class="material-symbols-outlined">school</span>
                                Start Teaching Today
                            </a>
                            <p class="text-center text-xs text-slate-400 mt-3">Free to join · Verified in 48h · No
                                hidden fees</p>
                        </div>
                    </div>

                </div>

                {{-- Teacher Testimonial --}}
                <div class="bg-primary rounded-3xl p-10 md:p-14 relative overflow-hidden">
                    <div class="absolute top-0 right-0 opacity-10 p-8">
                        <span class="material-symbols-outlined text-[10rem]">format_quote</span>
                    </div>
                    <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                        <div class="md:col-span-2">
                            <p class="text-white text-xl md:text-2xl font-bold leading-relaxed mb-6">
                                "I left my 9-to-5 teaching job 8 months ago. Today I earn more, work fewer hours, and
                                actually enjoy teaching again. This platform gave me back my freedom."
                            </p>
                            <div class="flex items-center gap-4">
                                <div
                                    class="size-12 rounded-full bg-white/20 flex items-center justify-center text-white font-black">
                                    AL
                                </div>
                                <div>
                                    <p class="text-white font-bold">Amina Larbi</p>
                                    <p class="text-white/70 text-sm">Arabic Language Teacher · 210 students</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-center md:items-end gap-4">
                            <div
                                class="bg-white/10 backdrop-blur rounded-2xl p-6 text-white text-center w-full md:w-auto">
                                <p class="text-4xl font-black mb-1">$3,200</p>
                                <p class="text-white/70 text-sm">Earned last month</p>
                            </div>
                            <a href="{{ route('register.teacher') }}"
                                class="bg-white text-primary px-6 py-3 rounded-xl font-bold hover:bg-slate-50 transition-colors w-full md:w-auto text-center">
                                Join Amina & 1,240+ Teachers
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-24 bg-primary relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
                <svg fill="none" height="100%" preserveAspectRatio="none" viewBox="0 0 100 100" width="100%"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="20" stroke="white" stroke-width="0.5"></circle>
                    <circle cx="90" cy="80" r="30" stroke="white" stroke-width="0.5"></circle>
                </svg>
            </div>
            <div class="max-w-[1440px] mx-auto px-10">
                <div class="text-center mb-16">
                    <h3 class="text-white text-4xl font-black mb-6">Success Stories</h3>
                    <p class="text-white/80 max-w-xl mx-auto">Hear from the thousands of teachers and students who have
                        transformed their lives using our platform.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-white dark:bg-background-dark p-10 rounded-3xl shadow-2xl relative">
                        <span
                            class="material-symbols-outlined absolute top-6 right-8 text-primary/20 text-6xl">format_quote</span>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="size-16 rounded-full overflow-hidden">
                                <img alt="Sarah Jenkins" class="w-full h-full object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcOODEnAdmnrb4ueabA0rvvAUN7FliSD2HfT1Iz8Nbxg08TNIJ2RyRTUvUJvlEY0JD1ci76xXxJLPiSYExgGTv41G6xjdFjnQB53OevUSrLkYpTEwljcbVlgFPGWuvLNQvVTSA22haCH-VKA2k-N7lmuTMiaeipPVe9j-kcn00VOeJksmOLrVe81S8zZ1PWMsYw_mJs2QOcJB6rTgAxRb7viWO_TCB8eXhJNsFCQH9hbmqO0Umq5dix0ac5G37R5P66wfT8bNoEh8" />
                            </div>
                            <div>
                                <h6 class="font-bold text-lg">Sarah Jenkins</h6>
                                <p class="text-slate-500 text-sm italic">Independent Math Teacher</p>
                                <div class="flex text-accent-orange">
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="material-symbols-outlined text-sm">star</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-slate-700 dark:text-slate-300 leading-relaxed">
                            "EduIndependent allowed me to transition from a public school teacher to a full-time
                            independent tutor. I now earn 40% more and have complete control over my schedule and
                            curriculum."
                        </p>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="bg-white dark:bg-background-dark p-10 rounded-3xl shadow-2xl relative">
                        <span
                            class="material-symbols-outlined absolute top-6 right-8 text-primary/20 text-6xl">format_quote</span>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="size-16 rounded-full overflow-hidden">
                                <img alt="Michael Chen" class="w-full h-full object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUTlXooUd6huCVwvlYiHFjnvtnYsj07mg3ovjCNZv35-Qy4okGZa82bBFwR8f5ScWngP6qoZyiO6RRqB-AwqauGv5Wou90de4TrCAu3avUjzSu-gO1EJNdK0kOcaHkwarisOYVoVefU3-1XoR4QFQFIkCLHWkQ5AWlJsWdWASk9Ktd88waClrE-1H5dNxN_p_LbTlCsRdVtpZ1KWvKCYZvwveiy0Ahv-PRZulwDKAGDC_SnchhA5muGoCmyB3ScUK6BvQE-n_FQhk" />
                            </div>
                            <div>
                                <h6 class="font-bold text-lg">Michael Chen</h6>
                                <p class="text-slate-500 text-sm italic">Software Developer Student</p>
                                <div class="flex text-accent-orange">
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="material-symbols-outlined text-sm">star</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-slate-700 dark:text-slate-300 leading-relaxed">
                            "Finding a high-quality mentor for specialized tech stacks was impossible before. The
                            tracking system helps me stay accountable, and the payment process is incredibly smooth."
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24 px-10">
            <div
                class="max-w-[1200px] mx-auto bg-background-dark text-white rounded-[2rem] p-12 md:p-20 relative overflow-hidden text-center">
                <div class="absolute top-0 right-0 p-10 opacity-20">
                    <span class="material-symbols-outlined text-[12rem]">rocket_launch</span>
                </div>
                <h3 class="text-4xl md:text-5xl font-black mb-8 relative z-10">Ready to start your journey?</h3>
                <p class="text-white/70 text-lg mb-10 max-w-2xl mx-auto relative z-10">Join thousands of students and
                    teachers who are building the future of education together.</p>
                {{-- Join as a Student --}}
                <a href="{{ route('register') }}"
                    class="bg-primary px-10 py-4 rounded-xl font-bold text-lg hover:bg-primary/90 transition-all">
                    Join as a Student
                </a>

                {{-- Start Teaching --}}
                <a href="{{ route('register.teacher') }}"
                    class="bg-white text-background-dark px-10 py-4 rounded-xl font-bold text-lg hover:bg-slate-100 transition-all">
                    Start Teaching
                </a>
            </div>
        </section>

    </main>
    <!-- Pricing Section -->
    <section id="pricing" class="py-24 px-10 max-w-[1440px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-4">Pricing</h2>
            <h3 class="text-4xl font-black mb-6">Pay for What You Need</h3>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                No subscriptions, no hidden fees. Each teacher sets their own rate — you only pay per session you book.
                Browse teachers and find the perfect fit for your budget.
            </p>
        </div>

        {{-- How Pricing Works --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div
                class="text-center p-8 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800">
                <div
                    class="size-14 bg-primary/10 text-primary rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl">person_pin_circle</span>
                </div>
                <h4 class="text-xl font-bold mb-2">Teacher Sets the Rate</h4>
                <p class="text-slate-500 text-sm leading-relaxed">Every independent teacher defines their own hourly
                    price based on their experience, subject, and availability.</p>
            </div>
            <div
                class="text-center p-8 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800">
                <div
                    class="size-14 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl">payments</span>
                </div>
                <h4 class="text-xl font-bold mb-2">Pay Per Session</h4>
                <p class="text-slate-500 text-sm leading-relaxed">You only pay for the sessions you book. No monthly
                    fees, no commitments. Cancel up to 24h before for a full refund.</p>
            </div>
            <div
                class="text-center p-8 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800">
                <div
                    class="size-14 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl">verified</span>
                </div>
                <h4 class="text-xl font-bold mb-2">Secure Payments</h4>
                <p class="text-slate-500 text-sm leading-relaxed">All transactions are encrypted and protected. Pay by
                    card or mobile wallet — your money is safe until the session is confirmed.</p>
            </div>
        </div>

        {{-- Price Range Examples --}}
        <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-10">
            <h4 class="text-xl font-bold text-center mb-8">Typical Price Ranges by Subject</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $ranges = [
                        [
                            'subject' => 'Languages',
                            'icon' => 'translate',
                            'min' => 20,
                            'max' => 50,
                            'color' => 'text-primary bg-primary/10',
                        ],
                        [
                            'subject' => 'Coding & Tech',
                            'icon' => 'code',
                            'min' => 40,
                            'max' => 90,
                            'color' => 'text-emerald-600 bg-emerald-50',
                        ],
                        [
                            'subject' => 'Sciences & Math',
                            'icon' => 'science',
                            'min' => 25,
                            'max' => 70,
                            'color' => 'text-indigo-600 bg-indigo-50',
                        ],
                        [
                            'subject' => 'Arts & Design',
                            'icon' => 'design_services',
                            'min' => 30,
                            'max' => 80,
                            'color' => 'text-amber-600 bg-amber-50',
                        ],
                    ];
                @endphp
                @foreach ($ranges as $range)
                    <div class="flex flex-col items-center text-center p-6 rounded-2xl bg-slate-50 dark:bg-slate-800">
                        <div class="size-12 rounded-xl {{ $range['color'] }} flex items-center justify-center mb-3">
                            <span class="material-symbols-outlined">{{ $range['icon'] }}</span>
                        </div>
                        <h5 class="font-bold mb-1">{{ $range['subject'] }}</h5>
                        <p class="text-2xl font-black text-slate-900 dark:text-white">${{ $range['min'] }}<span
                                class="text-slate-400 font-normal text-base"> — </span>${{ $range['max'] }}</p>
                        <p class="text-xs text-slate-400 mt-1">per hour</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 pt-8 border-t border-slate-100 dark:border-slate-800 text-center">
                <p class="text-slate-500 text-sm mb-4">Prices vary by teacher experience, qualifications, and demand.
                    Always visible before you book.</p>
                <a href="{{ route('login.index') }}"
                    class="inline-flex items-center gap-2 bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-primary/90 transition-colors">
                    Browse Teachers & Rates
                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-50 dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 pt-20 pb-10">
        @include('layouts.partials.footer')
    </footer>

</body>

</html>
