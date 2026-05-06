@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')

<div class="flex h-screen overflow-hidden bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

    @include('layouts.sidebars.teacher-sidebar')

    <main class="flex-1 flex flex-col overflow-hidden">

        <header class="h-16 flex-shrink-0 flex items-center justify-between px-8 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
            <div class="flex items-center gap-3">
                <a href="{{ route('teacher.courses.show', $course->id) }}"
                    class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-slate-500">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h2 class="text-lg font-bold">Edit Course</h2>
            </div>
            <span class="text-sm text-slate-500">
                Last updated: {{ $course->updated_at->diffForHumans() }}
            </span>
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
                      action="{{ route('teacher.courses.update', $course->id) }}"
                      enctype="multipart/form-data"
                      id="edit-course-form">
                    @csrf
                    @method('PUT')

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
                                value="{{ old('title', $course->title) }}"
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
                                placeholder="Describe what students will learn..."
                                class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-lg py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all resize-none @error('description') border-rose-400 @enderror"
                            >{{ old('description', $course->description) }}</textarea>
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
                                        <option value="{{ $cat }}"
                                            {{ old('category', $course->category) == $cat ? 'selected' : '' }}>
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
                                        <option value="{{ $val }}"
                                            {{ old('level', $course->level) == $val ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Cover Image --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold mb-4">Cover Image</h3>

                    {{-- Current image --}}
                    @if($course->image_path)
                    <div class="mb-4">
                        <p class="text-xs text-slate-500 mb-2 font-semibold uppercase tracking-wider">Current Image</p>
                        <div class="relative w-full h-48 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700">
                            <img src="{{ asset('storage/' . $course->image_path) }}"
                                 alt="{{ $course->title }}"
                                 class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                <p class="text-white text-sm font-bold">Click below to replace</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Upload new image --}}
                    <div class="border-2 border-dashed border-slate-200 dark:border-slate-600 rounded-xl p-6 text-center hover:border-primary transition-colors cursor-pointer"
                        onclick="document.getElementById('image_path').click()">
                        <div id="image-preview-container">
                            <span class="material-symbols-outlined text-3xl text-slate-300 block mb-2">add_photo_alternate</span>
                            <p class="text-sm font-semibold text-slate-500">
                                {{ $course->image_path ? 'Click to replace image' : 'Click to upload cover image' }}
                            </p>
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

                        {{-- Existing lessons from DB --}}
                        @forelse($course->lessons as $lesson)
                        <div id="lesson-existing-{{ $lesson->id }}" class="flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-700/50 rounded-lg">
                            <span class="material-symbols-outlined text-slate-400 cursor-grab">drag_indicator</span>
                            <div class="size-7 rounded-full bg-primary/20 text-primary flex items-center justify-center text-xs font-bold flex-shrink-0">
                                {{ $lesson->order }}
                            </div>

                            {{-- Hidden lesson id for update --}}
                            <input type="hidden" name="lesson_ids[]" value="{{ $lesson->id }}" />

                            <input
                                type="text"
                                name="lessons[]"
                                value="{{ $lesson->title }}"
                                placeholder="Lesson title..."
                                class="flex-1 bg-transparent border-none text-sm focus:ring-0 focus:outline-none font-medium"
                            />
                            <button type="button"
                                onclick="removeExistingLesson({{ $lesson->id }})"
                                class="text-slate-400 hover:text-rose-500 transition-colors flex-shrink-0">
                                <span class="material-symbols-outlined text-lg">delete</span>
                            </button>
                        </div>
                        @empty
                        <p id="no-lessons" class="text-sm text-slate-400 text-center py-4">
                            No lessons yet. Click "Add Lesson" to start.
                        </p>
                        @endforelse

                    </div>

                    {{-- No lessons placeholder (hidden if lessons exist) --}}
                    @if($course->lessons->isEmpty())
                    {{-- already shown by @empty above --}}
                    @endif

                </div>

                {{-- Danger Zone --}}
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-rose-100 dark:border-rose-900/30 p-6">
                    <h4 class="text-sm font-bold uppercase tracking-wider text-rose-500 mb-4">Danger Zone</h4>
                    <p class="text-xs text-slate-500 mb-4">
                        Deleting this course is permanent and cannot be undone. All lessons will be lost.
                    </p>
                    <button type="button"
                        onclick="openDeleteModal()"
                        class="px-4 py-2 bg-rose-50 dark:bg-rose-900/20 text-rose-600 text-sm font-bold rounded-lg hover:bg-rose-100 transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">delete_forever</span>
                        Delete This Course
                    </button>
                </div>

                {{-- Actions --}}
                <div class="flex gap-4 pb-8">
                    <a href="{{ route('teacher.courses.show', $course->id) }}"
                        class="flex-1 py-3 text-center bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-lg hover:bg-slate-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="flex-1 py-3 bg-primary text-white font-bold rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">save</span>
                        Save Changes
                    </button>
                </div>

                </form>

            </div>
        </div>
    </main>
</div>

{{-- Delete Course Modal --}}
<div id="delete-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800 p-8 max-w-md w-full mx-4">
        <div class="flex items-center gap-4 mb-6">
            <div class="size-14 rounded-full bg-rose-50 dark:bg-rose-900/20 flex items-center justify-center">
                <span class="material-symbols-outlined text-rose-600 text-3xl">delete_forever</span>
            </div>
            <div>
                <h3 class="text-lg font-bold">Delete Course</h3>
                <p class="text-sm text-slate-500">This action is permanent.</p>
            </div>
        </div>
        <p class="text-sm text-slate-600 dark:text-slate-400 mb-6">
            Are you sure you want to delete
            <span class="font-bold text-slate-900 dark:text-white">{{ $course->title }}</span>?
            All lessons will be permanently removed.
        </p>
        <form method="POST" action="{{ route('teacher.courses.destroy', $course->id) }}">
            @csrf
            @method('DELETE')
            <div class="flex gap-3">
                <button type="button" onclick="closeDeleteModal()"
                    class="flex-1 py-2.5 border border-slate-200 dark:border-slate-700 text-sm font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                    Cancel
                </button>
                <button type="submit"
                    class="flex-1 py-2.5 bg-rose-500 hover:bg-rose-600 text-white text-sm font-bold rounded-xl transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-base">delete_forever</span>
                    Delete Permanently
                </button>
            </div>
        </form>
    </div>
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

// ─── Add new lesson dynamically ────────────────────
let newLessonCount = 0;
const existingCount = {{ $course->lessons->count() }};

function addLesson() {
    newLessonCount++;
    const order = existingCount + newLessonCount;

    const noLessons = document.getElementById('no-lessons');
    if (noLessons) noLessons.classList.add('hidden');

    const container = document.getElementById('lessons-container');
    const div = document.createElement('div');
    div.id = 'lesson-new-' + newLessonCount;
    div.className = 'flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-700/50 rounded-lg border-l-4 border-primary';
    div.innerHTML = `
        <span class="material-symbols-outlined text-slate-400 cursor-grab">drag_indicator</span>
        <div class="size-7 rounded-full bg-primary/20 text-primary flex items-center justify-center text-xs font-bold flex-shrink-0">
            ${order}
        </div>
        <input type="hidden" name="lesson_ids[]" value="" />
        <input
            type="text"
            name="lessons[]"
            placeholder="New lesson title..."
            class="flex-1 bg-transparent border-none text-sm focus:ring-0 focus:outline-none font-medium"
            autofocus
        />
        <span class="text-xs text-primary font-bold bg-primary/10 px-2 py-0.5 rounded-full flex-shrink-0">New</span>
        <button type="button" onclick="removeNewLesson(${newLessonCount})"
            class="text-slate-400 hover:text-rose-500 transition-colors flex-shrink-0">
            <span class="material-symbols-outlined text-lg">delete</span>
        </button>
    `;
    container.appendChild(div);
}

// ─── Remove existing lesson ─────────────────────────
function removeExistingLesson(id) {
    const el = document.getElementById('lesson-existing-' + id);
    if (el) {
        el.style.opacity = '0.4';
        el.style.pointerEvents = 'none';
        // Add hidden input to mark for deletion
        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = 'deleted_lessons[]';
        hidden.value = id;
        document.getElementById('edit-course-form').appendChild(hidden);
        // Visually strike through
        const input = el.querySelector('input[name="lessons[]"]');
        if (input) input.style.textDecoration = 'line-through';
    }
}

// ─── Remove new lesson ──────────────────────────────
function removeNewLesson(id) {
    const el = document.getElementById('lesson-new-' + id);
    if (el) el.remove();
}

// ─── Delete Modal ───────────────────────────────────
function openDeleteModal() {
    document.getElementById('delete-modal').classList.remove('hidden');
    document.getElementById('delete-modal').classList.add('flex');
}
function closeDeleteModal() {
    document.getElementById('delete-modal').classList.add('hidden');
    document.getElementById('delete-modal').classList.remove('flex');
}
document.getElementById('delete-modal').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});
</script>

@endsection
