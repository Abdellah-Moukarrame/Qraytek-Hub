<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>EduIndependent - Public Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
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
                    <button
                        class="px-8 py-4 bg-primary text-white font-bold rounded-xl hover:scale-[1.02] transition-transform flex items-center gap-2">
                        Start Learning Now
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                    <button
                        class="px-8 py-4 border-2 border-slate-200 dark:border-slate-800 font-bold rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        Become a Teacher
                    </button>
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
                <div class="flex flex-col sm:flex-row gap-4 justify-center relative z-10">
                    <button
                        class="bg-primary px-10 py-4 rounded-xl font-bold text-lg hover:bg-primary/90 transition-all">Join
                        as a Student</button>
                    <button
                        class="bg-white text-background-dark px-10 py-4 rounded-xl font-bold text-lg hover:bg-slate-100 transition-all">Start
                        Teaching</button>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-slate-50 dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 pt-20 pb-10">
        @include('layouts.partials.footer')
    </footer>

</body>

</html>
