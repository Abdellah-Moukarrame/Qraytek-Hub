<header
    class="sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
    <div class="max-w-[1440px] mx-auto flex items-center justify-between px-10 py-4">

        {{-- Logo --}}
        <a href="#" class="flex items-center gap-3">
            <img src="https://i.ibb.co/p6Dst1hw/Chat-GPT-Image-Feb-19-2026-11-51-38-AM.png" alt="EduIndependent"
                class="h-24 w-auto object-contain" style="max-height: none;">

        </a>

        {{-- Navigation Links --}}
        <nav class="hidden md:flex items-center gap-10">
            <a href="#" class="text-sm font-medium hover:text-primary transition-colors">Home</a>
            <a href="#courses" class="text-sm font-medium hover:text-primary transition-colors">Courses</a>
            <a href="#teachers" class="text-sm font-medium hover:text-primary transition-colors">For Teachers</a>
            <a href="#pricing" class="text-sm font-medium hover:text-primary transition-colors">Pricing</a>
            <a href="#about" class="text-sm font-medium hover:text-primary transition-colors">About</a>
        </nav>

        {{-- Right side actions --}}
        <div class="flex items-center gap-4">

            {{-- Guest buttons --}}
            <a href="/login"
                class="px-5 py-2 text-sm font-bold hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-all">
                Sign In
            </a>
            <a href="/login"
                class="px-5 py-2 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary/90 shadow-md shadow-primary/20 transition-all">
                Join for Free
            </a>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div class="md:hidden border-t border-slate-200 dark:border-slate-800 bg-background-light dark:bg-background-dark px-6 py-4 hidden"
        x-data="{ open: false }" x-on:toggle-mobile-menu.window="open = !open" x-show="open">
        <nav class="flex flex-col gap-3">
            <a href="#" class="text-sm font-medium py-2">Home</a>
            <a href="#courses" class="text-sm font-medium py-2">Courses</a>
            <a href="#teachers" class="text-sm font-medium py-2">For Teachers</a>
            <a href="#" class="text-sm font-bold text-primary py-2">Sign In</a>
            <a href="#" class="text-center bg-primary text-white text-sm font-bold py-3 rounded-xl">Join for
                Free</a>
        </nav>
    </div>
</header>
