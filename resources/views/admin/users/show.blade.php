@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

<div class="flex min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

```
@include('layouts.sidebars.admin-sidebar')

<main class="flex-1 ml-64 flex flex-col">

    {{-- Header --}}
    <header class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-40">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.users.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <h2 class="text-lg font-bold">User Profile</h2>
        </div>
        <button class="px-4 py-2 bg-rose-50 text-rose-600 hover:bg-rose-100 dark:bg-rose-900/20 dark:text-rose-400 text-sm font-bold rounded-lg transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined text-lg">block</span>
            Suspend Account
        </button>
    </header>

    <div class="p-8 space-y-6">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Left: Profile Card --}}
            <div class="space-y-6">

                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 flex flex-col items-center text-center">

                    {{-- Avatar --}}
                    <div class="size-24 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 font-black text-3xl mb-4">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>

                    {{-- Name & Email --}}
                    <h3 class="text-xl font-bold">{{ $user->name }}</h3>
                    <p class="text-sm text-slate-500 mt-1">{{ $user->email }}</p>

                    {{-- Role --}}
                    <span class="mt-3 px-3 py-1 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 text-xs font-bold rounded-full">
                        {{ ucfirst($user->role) }}
                    </span>

                    {{-- Info --}}
                    <div class="w-full mt-6 pt-6 border-t border-slate-100 dark:border-slate-800 space-y-3 text-left">

                        <div class="flex items-center gap-3 text-sm">
                            <span class="material-symbols-outlined text-slate-400 text-lg">location_on</span>
                            <span class="text-slate-600 dark:text-slate-400">{{ $user->city }}</span>
                        </div>

                        <div class="flex items-center gap-3 text-sm">
                            <span class="material-symbols-outlined text-slate-400 text-lg">calendar_today</span>
                            <span class="text-slate-600 dark:text-slate-400">
                                Joined {{ $user->created_at->format('M d, Y') }}
                            </span>
                        </div>

                    </div>

                    {{-- Teacher Info --}}
                    @if($user->role === 'teacher' && $user->teacher)
                        <div class="w-full mt-6 pt-6 border-t border-slate-100 dark:border-slate-800 text-left space-y-2 text-sm">

                            <p><strong>Subject:</strong> {{ $user->teacher->subject }}</p>
                            <p><strong>Experience:</strong> {{ $user->teacher->experience }} years</p>
                            <p><strong>Hourly Rate:</strong> ${{ $user->teacher->hourly_rate }}</p>

                            {{-- Status Badge --}}
                            <span class="inline-block mt-2 px-3 py-1 text-xs font-bold rounded-full
                                @if($user->teacher->status === 'approved')
                                    bg-emerald-100 text-emerald-600
                                @elseif($user->teacher->status === 'pending')
                                    bg-amber-100 text-amber-600
                                @else
                                    bg-rose-100 text-rose-600
                                @endif
                            ">
                                {{ ucfirst($user->teacher->status) }}
                            </span>

                            {{-- CV Download --}}
                            @if($user->teacher->cv_path)
                                <a href="{{ asset('storage/'.$user->teacher->cv_path) }}" target="_blank"
                                   class="block mt-3 text-primary font-semibold underline">
                                    View CV
                                </a>
                            @endif

                        </div>
                    @endif

                </div>

                {{-- Activity Summary (optional static or dynamic later) --}}
                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                    <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Activity</h4>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-600 dark:text-slate-400">Role</span>
                            <span class="text-sm font-bold">{{ ucfirst($user->role) }}</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Right Section (you can later make dynamic) --}}
            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                    <h4 class="text-base font-bold mb-4">User Details</h4>

                    <div class="space-y-3 text-sm">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>City:</strong> {{ $user->city }}</p>
                        <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>
```

</div>

@endsection
