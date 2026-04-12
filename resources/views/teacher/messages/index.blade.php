@extends('layouts.app')

@section('title', 'Messages')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex overflow-hidden">

        {{-- Conversations List --}}
        <div class="w-80 flex-shrink-0 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 flex flex-col">
            <div class="p-4 border-b border-slate-200 dark:border-slate-800">
                <h2 class="text-lg font-bold mb-3">Messages</h2>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                    <input type="text" placeholder="Search students..." class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 pl-9 pr-3 text-sm focus:ring-2 focus:ring-primary/50" />
                </div>
            </div>
            <div class="flex-1 overflow-y-auto divide-y divide-slate-100 dark:divide-slate-800">
                @php
                $conversations = [
                    ['initials' => 'LK', 'color' => 'bg-primary/20 text-primary', 'name' => 'Lisa Kim', 'last' => 'I\'ll be there! Looking forward to it', 'time' => '10:45', 'unread' => 2, 'active' => true],
                    ['initials' => 'JW', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'James Wilson', 'last' => 'Thanks for the resources!', 'time' => 'Yesterday', 'unread' => 0, 'active' => false],
                    ['initials' => 'AT', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Amira Tazi', 'last' => 'Can we reschedule Friday?', 'time' => 'Mon', 'unread' => 1, 'active' => false],
                    ['initials' => 'PM', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Pedro Martinez', 'last' => 'The Figma file was super helpful.', 'time' => 'Sun', 'unread' => 0, 'active' => false],
                    ['initials' => 'HB', 'color' => 'bg-rose-100 text-rose-600', 'name' => 'Hannah Brown', 'last' => 'When is the next session?', 'time' => 'Sat', 'unread' => 0, 'active' => false],
                ];
                @endphp
                @foreach($conversations as $conv)
                <div class="flex items-center gap-3 p-4 cursor-pointer transition-colors {{ $conv['active'] ? 'bg-primary/5' : 'hover:bg-slate-50 dark:hover:bg-slate-800' }}">
                    <div class="size-11 rounded-full {{ $conv['color'] }} flex items-center justify-center font-bold text-sm flex-shrink-0">
                        {{ $conv['initials'] }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-center">
                            <p class="text-sm font-bold truncate {{ $conv['active'] ? 'text-primary' : '' }}">{{ $conv['name'] }}</p>
                            <span class="text-[10px] text-slate-400 flex-shrink-0">{{ $conv['time'] }}</span>
                        </div>
                        <p class="text-xs text-slate-500 truncate">{{ $conv['last'] }}</p>
                    </div>
                    @if($conv['unread'] > 0)
                    <span class="size-5 rounded-full bg-primary text-white text-[10px] font-bold flex items-center justify-center flex-shrink-0">
                        {{ $conv['unread'] }}
                    </span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        {{-- Chat Window --}}
        <div class="flex-1 flex flex-col">

            {{-- Chat Header --}}
            <div class="h-16 flex-shrink-0 flex items-center justify-between px-6 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="size-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold">LK</div>
                    <div>
                        <p class="font-bold text-sm">Lisa Kim</p>
                        <p class="text-xs text-emerald-500 font-medium">● Online · Advanced UI Systems</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('teacher.students.show', 1) }}"
                        class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors">
                        <span class="material-symbols-outlined">person</span>
                    </a>
                    <button class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors">
                        <span class="material-symbols-outlined">video_call</span>
                    </button>
                </div>
            </div>

            {{-- Messages --}}
            <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-background-light dark:bg-background-dark">

                {{-- Sent --}}
                <div class="flex items-end gap-3 max-w-lg ml-auto flex-row-reverse">
                    <div class="size-8 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-xs flex-shrink-0">
                        {{ strtoupper(substr(auth()->user()->name ?? 'T', 0, 2)) }}
                    </div>
                    <div>
                        <div class="bg-primary text-white rounded-2xl rounded-br-sm px-4 py-3">
                            <p class="text-sm">Hi Lisa! Don't forget our session is today at 14:00. We'll be covering Component Architecture 🎨</p>
                        </div>
                        <p class="text-[10px] text-slate-400 mt-1 mr-2 text-right">10:30 AM</p>
                    </div>
                </div>

                {{-- Received --}}
                <div class="flex items-end gap-3 max-w-lg">
                    <div class="size-8 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-xs flex-shrink-0">LK</div>
                    <div>
                        <div class="bg-white dark:bg-slate-800 rounded-2xl rounded-bl-sm px-4 py-3 shadow-sm">
                            <p class="text-sm">I'll be there! Looking forward to it 🙌</p>
                        </div>
                        <p class="text-[10px] text-slate-400 mt-1 ml-2">10:32 AM</p>
                    </div>
                </div>

                {{-- Received --}}
                <div class="flex items-end gap-3 max-w-lg">
                    <div class="size-8 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-xs flex-shrink-0">LK</div>
                    <div>
                        <div class="bg-white dark:bg-slate-800 rounded-2xl rounded-bl-sm px-4 py-3 shadow-sm">
                            <p class="text-sm">Should I prepare anything beforehand?</p>
                        </div>
                        <p class="text-[10px] text-slate-400 mt-1 ml-2">10:45 AM</p>
                    </div>
                </div>

            </div>

            {{-- Input --}}
            <div class="p-4 bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-3 bg-slate-100 dark:bg-slate-800 rounded-xl px-4 py-2">
                    <button class="text-slate-400 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">attach_file</span>
                    </button>
                    <input type="text" placeholder="Type a message..." class="flex-1 bg-transparent border-none text-sm focus:ring-0 focus:outline-none" />
                    <button class="p-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                        <span class="material-symbols-outlined text-lg">send</span>
                    </button>
                </div>
            </div>

        </div>
    </main>
</div>

@endsection
