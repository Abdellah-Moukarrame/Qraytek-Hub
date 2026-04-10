@extends('layouts.app')

@section('title', 'Messages')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.student-sidebar')

    <main class="flex-1 flex overflow-hidden">

        {{-- Conversations List --}}
        <div class="w-80 flex-shrink-0 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 flex flex-col">
            <div class="p-4 border-b border-slate-200 dark:border-slate-800">
                <h2 class="text-lg font-bold mb-3">Messages</h2>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                    <input type="text" placeholder="Search conversations..." class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-lg py-2 pl-9 pr-3 text-sm focus:ring-2 focus:ring-primary/50" />
                </div>
            </div>
            <div class="flex-1 overflow-y-auto divide-y divide-slate-100 dark:divide-slate-800">
                @php
                $conversations = [
                    ['initials' => 'SM', 'color' => 'bg-primary/20 text-primary', 'name' => 'Sarah Miller', 'last' => 'See you in the session!', 'time' => '10:45', 'unread' => 2, 'active' => true],
                    ['initials' => 'DC', 'color' => 'bg-emerald-100 text-emerald-600', 'name' => 'David Chen', 'last' => 'Please review the homework.', 'time' => 'Yesterday', 'unread' => 0, 'active' => false],
                    ['initials' => 'MR', 'color' => 'bg-indigo-100 text-indigo-600', 'name' => 'Marco Rossi', 'last' => 'Bravissimo! Great progress.', 'time' => 'Mon', 'unread' => 0, 'active' => false],
                    ['initials' => 'ER', 'color' => 'bg-amber-100 text-amber-600', 'name' => 'Elena Rodriguez', 'last' => 'Next session is confirmed.', 'time' => 'Sun', 'unread' => 1, 'active' => false],
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
                    <div class="size-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold">SM</div>
                    <div>
                        <p class="font-bold text-sm">Sarah Miller</p>
                        <p class="text-xs text-emerald-500 font-medium">● Online</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors">
                        <span class="material-symbols-outlined">video_call</span>
                    </button>
                    <button class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors">
                        <span class="material-symbols-outlined">info</span>
                    </button>
                </div>
            </div>

            {{-- Messages --}}
            <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-background-light dark:bg-background-dark">

                {{-- Received --}}
                <div class="flex items-end gap-3 max-w-lg">
                    <div class="size-8 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-xs flex-shrink-0">SM</div>
                    <div>
                        <div class="bg-white dark:bg-slate-800 rounded-2xl rounded-bl-sm px-4 py-3 shadow-sm">
                            <p class="text-sm">Hi Alex! Don't forget our session is today at 14:00. We'll be covering Component Architecture 🎨</p>
                        </div>
                        <p class="text-[10px] text-slate-400 mt-1 ml-2">10:30 AM</p>
                    </div>
                </div>

                {{-- Sent --}}
                <div class="flex items-end gap-3 max-w-lg ml-auto flex-row-reverse">
                    <div class="size-8 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center font-bold text-xs flex-shrink-0">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}
                    </div>
                    <div>
                        <div class="bg-primary text-white rounded-2xl rounded-br-sm px-4 py-3">
                            <p class="text-sm">I'll be there! Looking forward to it 🙌</p>
                        </div>
                        <p class="text-[10px] text-slate-400 mt-1 mr-2 text-right">10:32 AM</p>
                    </div>
                </div>

                {{-- Received --}}
                <div class="flex items-end gap-3 max-w-lg">
                    <div class="size-8 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-xs flex-shrink-0">SM</div>
                    <div>
                        <div class="bg-white dark:bg-slate-800 rounded-2xl rounded-bl-sm px-4 py-3 shadow-sm">
                            <p class="text-sm">See you in the session! 😊</p>
                        </div>
                        <p class="text-[10px] text-slate-400 mt-1 ml-2">10:45 AM</p>
                    </div>
                </div>

            </div>

            {{-- Message Input --}}
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
