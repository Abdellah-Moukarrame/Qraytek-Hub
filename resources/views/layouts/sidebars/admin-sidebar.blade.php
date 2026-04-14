<aside
    class="w-64 border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 flex flex-col fixed inset-y-0 left-0 z-50">

    {{-- Logo --}}
    <div class="p-6 flex items-center gap-3">
        <div class="size-10 bg-primary rounded-lg flex items-center justify-center text-white">
            <span class="material-symbols-outlined text-2xl">school</span>
        </div>
        <h1 class="text-xl font-bold tracking-tight">EduMaster</h1>
    </div>

    {{-- Navigation Links --}}
    <nav class="flex-1 px-4 space-y-1">

        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg
                {{ request()->routeIs('admin.dashboard') ? 'bg-primary/10 text-primary font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}
                transition-colors">
            <span class="material-symbols-outlined">dashboard</span>
            <p class="text-sm">Dashboard</p>
        </a>

        <a href="{{ route('admin.teachers.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg
                {{ request()->routeIs('admin.teachers.*') ? 'bg-primary/10 text-primary font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}
                transition-colors">
            <span class="material-symbols-outlined">person_pin_circle</span>
            <p class="text-sm">Teachers</p>
        </a>

        <a href="{{ route('admin.users.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg
                {{ request()->routeIs('admin.users.*') ? 'bg-primary/10 text-primary font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}
                transition-colors">
            <span class="material-symbols-outlined">group</span>
            <p class="text-sm">Students</p>
        </a>

        <a href="#"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
            <span class="material-symbols-outlined">payments</span>
            <p class="text-sm">Payments</p>
        </a>

        <a href="#"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
            <span class="material-symbols-outlined">analytics</span>
            <p class="text-sm">Reports</p>
        </a>

        <a href="#"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
            <span class="material-symbols-outlined">settings</span>
            <p class="text-sm">System Settings</p>
        </a>

    </nav>

    {{-- Admin Profile --}}
    <div class="p-4 border-t border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-3 p-2 rounded-xl bg-slate-50 dark:bg-slate-800/50">
            <div class="size-10 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                <span class="material-symbols-outlined">admin_panel_settings</span>
            </div>
            <div class="overflow-hidden">
                <p class="text-sm font-semibold truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-slate-500 truncate">Global Controller</p>
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
