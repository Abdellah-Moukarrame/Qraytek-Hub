<aside
    class="w-64 flex-shrink-0 border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark flex flex-col">

    {{-- Logo --}}
    <div class="p-6 flex items-center gap-3">

        <a href="#" class="flex items-center gap-3">
            <img src="https://i.ibb.co/p6Dst1hw/Chat-GPT-Image-Feb-19-2026-11-51-38-AM.png" alt="EduIndependent"
                class="h-24 w-auto object-contain" style="max-height: none;">

        </a>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-4 overflow-y-auto">

        <div class="py-4">
            <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Menu</p>

            <a href="{{ route('teacher.dashboard') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors
                    {{ request()->routeIs('teacher.dashboard') ? 'bg-primary/10 text-primary font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <span class="material-symbols-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('teacher.courses.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors
                    {{ request()->routeIs('teacher.courses.*') ? 'bg-primary/10 text-primary font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <span class="material-symbols-outlined">menu_book</span>
                <span>My Courses</span>
            </a>

            <a href="{{ route('teacher.sessions.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors
                    {{ request()->routeIs('teacher.sessions.*') ? 'bg-primary/10 text-primary font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <span class="material-symbols-outlined">video_call</span>
                <span>Sessions</span>
            </a>

            <a href="{{ route('teacher.students.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors
                    {{ request()->routeIs('teacher.students.*') ? 'bg-primary/10 text-primary font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <span class="material-symbols-outlined">group</span>
                <span>My Students</span>
            </a>

            <a href="{{ route('teacher.messages.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors
                    {{ request()->routeIs('teacher.messages.*') ? 'bg-primary/10 text-primary font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <span class="material-symbols-outlined">chat_bubble</span>
                <span>Messages</span>
            </a>
        </div>

        <div class="py-4 border-t border-slate-100 dark:border-slate-800">
            <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Account</p>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                <span class="material-symbols-outlined">settings</span>
                <span>Settings</span>
            </a>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                <span class="material-symbols-outlined">help</span>
                <span>Help Center</span>
            </a>
        </div>

    </nav>

    {{-- Teacher Profile --}}
    <div class="p-4 border-t border-slate-100 dark:border-slate-800">
        <div class="flex items-center gap-3 p-2 rounded-xl bg-slate-50 dark:bg-slate-800/50">
            <div
                class="size-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">
                {{ strtoupper(substr(auth()->user()->name ?? 'T', 0, 2)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold truncate">{{ auth()->user()->name ?? 'Teacher' }}</p>
                <p class="text-xs text-slate-500 truncate">Independent Teacher</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <span class="material-symbols-outlined text-xl">logout</span>
                </button>
            </form>
        </div>
    </div>

</aside>
