@extends('layouts.app')

@section('title', 'Create Course')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center gap-3 px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <a href="{{ route('teacher.courses.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <h2 class="text-lg font-bold">Create New Course</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="max-w-3xl mx-auto space-y-6">

                {{-- Errors --}}
                @if($errors->any())
                <div class="bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 rounded-xl p-4 flex items-start gap-3">
                    <span class="material-symbols-outlined text-rose-500 flex-shrink-0">error</span>
                    <div>
                        @foreach($errors->all() as $error)
                            <p class="text-sm text-rose-600 dark:text-rose-400">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Success --}}
                @if(session('success'))
                <div class="bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-xl p-4 flex items-center gap-3">
                    <span class="material-symbols-outlined text-emerald-500">check_circle</span>
                    <p class="text-sm font-semibold text-emerald-700 dark:text-emerald-400">{{ session('success') }}</p>
                </div>
                @endif

                <form method="POST"
                      action="{{ route('teacher.courses.store') }}"
                      enctype="multipart/form-data"
                      id="course-form">
                    @csrf

                {{-- Basic Info --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-4">Course Information</h3>
                    <div class="space-y-4">

                        {{-- Title --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                Course Title <span class="text-rose-500">*</span>
                            </label>
                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="e.g. Advanced UI Systems"
                                class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all @error('title') border-rose-400 @enderror"
                            />
                        </div>

                        {{-- Description --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Description</label>
                            <textarea
                                name="description"
                                rows="4"
                                placeholder="Describe what students will learn in this course..."
                                class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all resize-none @error('description') border-rose-400 @enderror"
                            >{{ old('description') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- Category --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                    Category <span class="text-rose-500">*</span>
                                </label>
                                <select name="category"
                                    class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all @error('category') border-rose-400 @enderror">
                                    <option value="">Select a category</option>
                                    @foreach(['Design', 'Development', 'Languages', 'Sciences', 'Mathematics', 'Business'] as $cat)
                                        <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
                                            {{ $cat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Level --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                    Level <span class="text-rose-500">*</span>
                                </label>
                                <select name="level"
                                    class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all @error('level') border-rose-400 @enderror">
                                    @foreach(['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'] as $val => $label)
                                        <option value="{{ $val }}" {{ old('level') == $val ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Course Image --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-4">Cover Image</h3>
                    <div class="border-2 border-dashed border-slate-200 dark:border-slate-600 rounded-xl p-6 text-center hover:border-primary transition-colors cursor-pointer"
                        onclick="document.getElementById('image_path').click()">
                        <div id="image-preview-container">
                            <span class="material-symbols-outlined text-4xl text-slate-300 block mb-2">add_photo_alternate</span>
                            <p class="text-sm font-semibold text-slate-500">Click to upload cover image</p>
                            <p class="text-xs text-slate-400 mt-1">JPG, PNG — max 2MB</p>
                        </div>
                        <img id="image-preview" src="" alt="Preview"
                            class="hidden w-full h-48 object-cover rounded-lg mt-2" />
                    </div>
                    <input type="file" id="image_path" name="image_path"
                        accept=".jpg,.jpeg,.png" class="hidden"
                        onchange="previewImage(this)" />
                    @error('image_path')
                        <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Lessons --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold">Course Lessons</h3>
                        <button type="button" onclick="addLesson()"
                            class="flex items-center gap-1 text-sm font-bold text-primary hover:underline">
                            <span class="material-symbols-outlined text-base">add</span>
                            Add Lesson
                        </button>
                    </div>
                    <div id="lessons-container" class="space-y-3">
                        {{-- Lessons added dynamically --}}
                    </div>
                    <p id="no-lessons" class="text-sm text-slate-400 text-center py-4">
                        No lessons yet. Click "Add Lesson" to start.
                    </p>
                </div>

                {{-- Actions --}}
                <div class="flex gap-4 pb-8">
                    <a href="{{ route('teacher.courses.index') }}"
                        class="flex-1 py-3 text-center bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-lg hover:bg-slate-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="flex-1 py-3 bg-primary text-white font-bold rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">save</span>
                        Create Course
                    </button>
                </div>

                </form>

            </div>
        </div>
    </main>
</div>

<script>
// ─── Image Preview ─────────────────────────────────
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('image-preview').src = e.target.result;
            document.getElementById('image-preview').classList.remove('hidden');
            document.getElementById('image-preview-container').classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// ─── Lessons ───────────────────────────────────────
let lessonCount = 0;

function addLesson() {
    lessonCount++;
    document.getElementById('no-lessons').classList.add('hidden');

    const container = document.getElementById('lessons-container');
    const div = document.createElement('div');
    div.id = 'lesson-' + lessonCount;
    div.className = 'flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-700/50 rounded-lg';
    div.innerHTML = `
        <span class="material-symbols-outlined text-slate-400 cursor-grab">drag_indicator</span>
        <div class="size-7 rounded-full bg-primary/20 text-primary flex items-center justify-center text-xs font-bold flex-shrink-0">
            ${lessonCount}
        </div>
        <input
            type="text"
            name="lessons[]"
            placeholder="Lesson title..."
            class="flex-1 bg-transparent border-none text-sm focus:ring-0 focus:outline-none font-medium"
        />
        <button type="button" onclick="removeLesson(${lessonCount})"
            class="text-slate-400 hover:text-rose-500 transition-colors flex-shrink-0">
            <span class="material-symbols-outlined text-lg">delete</span>
        </button>
    `;
    container.appendChild(div);
}

function removeLesson(id) {
    document.getElementById('lesson-' + id).remove();
    if (document.getElementById('lessons-container').children.length === 0) {
        document.getElementById('no-lessons').classList.remove('hidden');
    }
    // Re-number
    const items = document.querySelectorAll('#lessons-container > div');
    items.forEach((item, index) => {
        item.querySelector('.rounded-full').textContent = index + 1;
    });
}
</script>

@endsection
