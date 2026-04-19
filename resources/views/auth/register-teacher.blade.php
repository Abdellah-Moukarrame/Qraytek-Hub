<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register as Teacher — EduMaster</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Lexend', sans-serif; }

        @keyframes float-up {
            0%   { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-float   { animation: float-up 0.5s 0.0s ease both; }
        .animate-float-1 { animation: float-up 0.5s 0.1s ease both; }
        .animate-float-2 { animation: float-up 0.5s 0.2s ease both; }
        .animate-float-3 { animation: float-up 0.5s 0.3s ease both; }
        .animate-float-4 { animation: float-up 0.5s 0.4s ease both; }
        .animate-float-5 { animation: float-up 0.5s 0.5s ease both; }
        .animate-float-6 { animation: float-up 0.5s 0.6s ease both; }

        /* Upload drop zone */
        .upload-zone {
            border: 2px dashed #cbd5e1;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .upload-zone:hover,
        .upload-zone.dragover {
            border-color: #137fec;
            background-color: #eff6ff;
        }
        .dark .upload-zone:hover,
        .dark .upload-zone.dragover {
            background-color: #1e3a5f22;
        }
        .upload-zone.has-file {
            border-color: #10b981;
            background-color: #f0fdf4;
        }
        .dark .upload-zone.has-file {
            background-color: #064e3b22;
        }

        /* Step indicator */
        .step-line {
            height: 2px;
            background: #e2e8f0;
            flex: 1;
        }
        .step-line.active {
            background: #137fec;
        }
    </style>
</head>
<body class="min-h-screen bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">

<div class="min-h-screen flex">

    {{-- Left: Info Panel --}}
    <div class="hidden lg:flex w-5/12 bg-primary relative overflow-hidden flex-col justify-between p-12">

        <div class="absolute -top-20 -left-20 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>

        {{-- Logo --}}
        <div class="relative z-10 flex items-center gap-3">
            <div class="size-10 bg-white/20 rounded-lg flex items-center justify-center text-white">
                <span class="material-symbols-outlined">school</span>
            </div>
            <span class="text-xl font-bold text-white">EduMaster</span>
        </div>

        {{-- Middle Content --}}
        <div class="relative z-10 text-white">
            <div class="size-16 bg-white/20 rounded-2xl flex items-center justify-center mb-8">
                <span class="material-symbols-outlined text-4xl">verified_user</span>
            </div>
            <h2 class="text-4xl font-black mb-4 leading-tight">
                Join as an<br/>Independent Teacher
            </h2>
            <p class="text-white/70 leading-relaxed mb-10 text-lg">
                Submit your application and get verified by our admin team within 48 hours.
            </p>

            {{-- What happens next --}}
            <div class="space-y-4">
                @php
                $steps = [
                    ['icon' => 'edit_note',       'title' => 'Fill in your details',       'desc' => 'Personal info & teaching profile'],
                    ['icon' => 'upload_file',      'title' => 'Upload your documents',      'desc' => 'CV, Degree, Certificate & ID'],
                    ['icon' => 'admin_panel_settings', 'title' => 'Admin reviews your profile', 'desc' => 'Usually within 48 hours'],
                    ['icon' => 'rocket_launch',    'title' => 'Start teaching!',             'desc' => 'Accept bookings & earn'],
                ];
                @endphp
                @foreach($steps as $i => $step)
                <div class="flex items-start gap-4">
                    <div class="size-9 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="material-symbols-outlined text-white text-lg">{{ $step['icon'] }}</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">{{ $step['title'] }}</p>
                        <p class="text-xs text-white/60">{{ $step['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Bottom --}}
        <div class="relative z-10 text-white/60 text-xs">
            © {{ date('Y') }} EduMaster. All rights reserved.
        </div>
    </div>

    {{-- Right: Form --}}
    <div class="flex-1 overflow-y-auto">
        <div class="max-w-2xl mx-auto px-6 py-12">

            {{-- Logo (mobile) --}}
            <div class="animate-float flex items-center gap-3 mb-8 lg:hidden">
                <div class="size-9 bg-primary rounded-lg flex items-center justify-center text-white">
                    <span class="material-symbols-outlined">school</span>
                </div>
                <span class="text-lg font-bold">EduMaster</span>
            </div>

            {{-- Heading --}}
            <div class="animate-float mb-8">
                <h1 class="text-3xl font-black mb-2">Teacher Application</h1>
                <p class="text-slate-500 dark:text-slate-400">
                    Complete all fields and upload your documents to apply.
                </p>
            </div>

            {{-- Errors --}}
            @if($errors->any())
            <div class="animate-float bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 rounded-xl p-4 mb-6 flex items-start gap-3">
                <span class="material-symbols-outlined text-rose-500 flex-shrink-0">error</span>
                <div>
                    @foreach($errors->all() as $error)
                    <p class="text-sm text-rose-600 dark:text-rose-400">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
            @endif

            <form method="POST" action="{{ route('register.teacher.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

                {{-- ─── SECTION 1: Personal Info ─── --}}
                <div class="animate-float-1">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="size-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                            <span class="material-symbols-outlined text-lg">person</span>
                        </div>
                        <h3 class="font-bold text-lg">Personal Information</h3>
                    </div>

                    <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 space-y-4">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Full Name</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">badge</span>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Your full name" required
                                        class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-xl py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:border-primary transition-all @error('name') border-rose-400 @enderror" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Email Address</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">mail</span>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="your@email.com" required
                                        class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-xl py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:border-primary transition-all @error('email') border-rose-400 @enderror" />
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Phone Number</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">phone</span>
                                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+212 6XX XXX XXX"
                                        class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-xl py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:border-primary transition-all" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">City</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">location_on</span>
                                    <input type="text" name="city" value="{{ old('city') }}" placeholder="Casablanca"
                                        class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-xl py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:border-primary transition-all" />
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Password</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">lock</span>
                                    <input type="password" name="password" id="password" placeholder="Min. 8 characters" required
                                        class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-xl py-2.5 pl-10 pr-10 text-sm focus:outline-none focus:border-primary transition-all @error('password') border-rose-400 @enderror" />
                                    <button type="button" onclick="togglePwd('password','eye1')" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400">
                                        <span class="material-symbols-outlined text-lg" id="eye1">visibility</span>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Confirm Password</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">lock_clock</span>
                                    <input type="password" name="password_confirmation" placeholder="Confirm password" required
                                        class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-xl py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:border-primary transition-all" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- ─── SECTION 2: Teaching Profile ─── --}}
                <div class="animate-float-2">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="size-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                            <span class="material-symbols-outlined text-lg">menu_book</span>
                        </div>
                        <h3 class="font-bold text-lg">Teaching Profile</h3>
                    </div>

                    <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 space-y-4">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Subject / Specialization</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">science</span>
                                    <input type="text" name="subject" value="{{ old('subject') }}" placeholder="e.g. Physics, Mathematics..." required
                                        class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-xl py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:border-primary transition-all @error('subject') border-rose-400 @enderror" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Years of Experience</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">work_history</span>
                                    <input type="number" name="experience" value="{{ old('experience') }}" placeholder="e.g. 5" min="0" max="50" required
                                        class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-xl py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:border-primary transition-all @error('experience') border-rose-400 @enderror" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Hourly Rate ($/hr)</label>
                            <div class="relative max-w-xs">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">payments</span>
                                <input type="number" name="rate" value="{{ old('rate') }}" placeholder="e.g. 45" min="0" step="0.01"
                                    class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-xl py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:border-primary transition-all" />
                            </div>
                            <p class="text-xs text-slate-400 mt-1">You can update this anytime from your profile.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Bio / About You</label>
                            <textarea name="bio" rows="3" placeholder="Tell students about your teaching experience, methodology and passion..."
                                class="w-full bg-slate-100 dark:bg-slate-700 border-2 border-transparent rounded-xl py-2.5 px-4 text-sm focus:outline-none focus:border-primary transition-all resize-none">{{ old('bio') }}</textarea>
                        </div>

                    </div>
                </div>

                {{-- ─── SECTION 3: Documents ─── --}}
                <div class="animate-float-3">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="size-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                            <span class="material-symbols-outlined text-lg">upload_file</span>
                        </div>
                        <h3 class="font-bold text-lg">Required Documents</h3>
                    </div>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-5 ml-11">
                        Upload clear scans or photos. Accepted formats: PDF, JPG, PNG — max 5MB each.
                    </p>

                    <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- CV --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2 flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-base">description</span>
                                Curriculum Vitae (CV)
                                <span class="text-rose-500">*</span>
                            </label>
                            <div class="upload-zone rounded-xl p-5 text-center transition-all" id="zone-cv"
                                ondragover="handleDragOver(event, 'zone-cv')"
                                ondragleave="handleDragLeave('zone-cv')"
                                ondrop="handleDrop(event, 'cv_path', 'zone-cv', 'preview-cv')"
                                onclick="document.getElementById('cv_path').click()">
                                <div id="preview-cv">
                                    <span class="material-symbols-outlined text-3xl text-slate-300 mb-2 block">upload_file</span>
                                    <p class="text-sm font-semibold text-slate-500">Click or drag to upload</p>
                                    <p class="text-xs text-slate-400 mt-1">PDF, JPG, PNG — max 5MB</p>
                                </div>
                            </div>
                            <input type="file" id="cv_path" name="cv_path" accept=".pdf,.jpg,.jpeg,.png" class="hidden"
                                onchange="handleFileSelect(this, 'zone-cv', 'preview-cv')" required />
                            @error('cv_path')
                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Teaching Certificate --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2 flex items-center gap-2">
                                <span class="material-symbols-outlined text-indigo-500 text-base">workspace_premium</span>
                                Teaching Certificate
                                <span class="text-rose-500">*</span>
                            </label>
                            <div class="upload-zone rounded-xl p-5 text-center transition-all" id="zone-certificate"
                                ondragover="handleDragOver(event, 'zone-certificate')"
                                ondragleave="handleDragLeave('zone-certificate')"
                                ondrop="handleDrop(event, 'certificate_path', 'zone-certificate', 'preview-certificate')"
                                onclick="document.getElementById('certificate_path').click()">
                                <div id="preview-certificate">
                                    <span class="material-symbols-outlined text-3xl text-slate-300 mb-2 block">workspace_premium</span>
                                    <p class="text-sm font-semibold text-slate-500">Click or drag to upload</p>
                                    <p class="text-xs text-slate-400 mt-1">PDF, JPG, PNG — max 5MB</p>
                                </div>
                            </div>
                            <input type="file" id="certificate_path" name="certificate_path" accept=".pdf,.jpg,.jpeg,.png" class="hidden"
                                onchange="handleFileSelect(this, 'zone-certificate', 'preview-certificate')" required />
                            @error('certificate_path')
                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- University Degree --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2 flex items-center gap-2">
                                <span class="material-symbols-outlined text-emerald-500 text-base">school</span>
                                University Degree
                                <span class="text-rose-500">*</span>
                            </label>
                            <div class="upload-zone rounded-xl p-5 text-center transition-all" id="zone-diploma"
                                ondragover="handleDragOver(event, 'zone-diploma')"
                                ondragleave="handleDragLeave('zone-diploma')"
                                ondrop="handleDrop(event, 'diploma_path', 'zone-diploma', 'preview-diploma')"
                                onclick="document.getElementById('diploma_path').click()">
                                <div id="preview-diploma">
                                    <span class="material-symbols-outlined text-3xl text-slate-300 mb-2 block">school</span>
                                    <p class="text-sm font-semibold text-slate-500">Click or drag to upload</p>
                                    <p class="text-xs text-slate-400 mt-1">PDF, JPG, PNG — max 5MB</p>
                                </div>
                            </div>
                            <input type="file" id="diploma_path" name="diploma_path" accept=".pdf,.jpg,.jpeg,.png" class="hidden"
                                onchange="handleFileSelect(this, 'zone-diploma', 'preview-diploma')" required />
                            @error('diploma_path')
                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- ID Card --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2 flex items-center gap-2">
                                <span class="material-symbols-outlined text-rose-500 text-base">badge</span>
                                National ID Card
                                <span class="text-rose-500">*</span>
                            </label>
                            <div class="upload-zone rounded-xl p-5 text-center transition-all" id="zone-id"
                                ondragover="handleDragOver(event, 'zone-id')"
                                ondragleave="handleDragLeave('zone-id')"
                                ondrop="handleDrop(event, 'id_card_path', 'zone-id', 'preview-id')"
                                onclick="document.getElementById('id_card_path').click()">
                                <div id="preview-id">
                                    <span class="material-symbols-outlined text-3xl text-slate-300 mb-2 block">badge</span>
                                    <p class="text-sm font-semibold text-slate-500">Click or drag to upload</p>
                                    <p class="text-xs text-slate-400 mt-1">PDF, JPG, PNG — max 5MB</p>
                                </div>
                            </div>
                            <input type="file" id="id_card_path" name="id_card_path" accept=".pdf,.jpg,.jpeg,.png" class="hidden"
                                onchange="handleFileSelect(this, 'zone-id', 'preview-id')" required />
                            @error('id_card_path')
                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- Upload notice --}}
                    <div class="mt-3 flex items-start gap-2 px-1">
                        <span class="material-symbols-outlined text-amber-500 text-base flex-shrink-0 mt-0.5">info</span>
                        <p class="text-xs text-slate-500">
                            Your documents are used only for identity and qualification verification. They are stored securely and never shared with third parties.
                        </p>
                    </div>
                </div>

                {{-- ─── SECTION 4: Terms ─── --}}
                <div class="animate-float-4">
                    <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-5 space-y-3">
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="checkbox" name="terms" required
                                class="mt-1 size-4 rounded border-slate-300 text-primary focus:ring-primary" />
                            <span class="text-sm text-slate-600 dark:text-slate-400">
                                I agree to the
                                <a href="#" class="text-primary font-semibold hover:underline">Terms of Service</a>
                                and
                                <a href="#" class="text-primary font-semibold hover:underline">Privacy Policy</a>.
                                I confirm that all documents submitted are authentic.
                            </span>
                        </label>
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="checkbox" name="accuracy" required
                                class="mt-1 size-4 rounded border-slate-300 text-primary focus:ring-primary" />
                            <span class="text-sm text-slate-600 dark:text-slate-400">
                                I certify that the information provided is accurate and complete.
                                Submitting false documents may result in permanent account suspension.
                            </span>
                        </label>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="animate-float-5">
                    <button type="submit"
                        class="w-full py-4 bg-primary text-white font-bold rounded-2xl hover:bg-primary/90 hover:scale-[1.01] active:scale-[0.99] transition-all flex items-center justify-center gap-3 shadow-lg shadow-primary/20 text-base">
                        <span class="material-symbols-outlined">send</span>
                        Submit Application
                    </button>
                    <p class="text-center text-xs text-slate-400 mt-3">
                        Your application will be reviewed within 48 hours.
                        You'll receive an email once approved.
                    </p>
                </div>

                {{-- Login link --}}
                <div class="animate-float-6 text-center pb-4">
                    <p class="text-sm text-slate-500">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-primary font-bold hover:underline">Sign In</a>
                    </p>
                </div>

            </form>
        </div>
    </div>

</div>

<script>
function togglePwd(id, eyeId) {
    const input = document.getElementById(id);
    const eye   = document.getElementById(eyeId);
    input.type  = input.type === 'password' ? 'text' : 'password';
    eye.textContent = input.type === 'password' ? 'visibility' : 'visibility_off';
}

function handleFileSelect(input, zoneId, previewId) {
    if (input.files && input.files[0]) {
        showFilePreview(input.files[0], zoneId, previewId);
    }
}

function handleDragOver(e, zoneId) {
    e.preventDefault();
    document.getElementById(zoneId).classList.add('dragover');
}

function handleDragLeave(zoneId) {
    document.getElementById(zoneId).classList.remove('dragover');
}

function handleDrop(e, inputId, zoneId, previewId) {
    e.preventDefault();
    const zone  = document.getElementById(zoneId);
    zone.classList.remove('dragover');
    const file  = e.dataTransfer.files[0];
    if (!file) return;

    // Attach to input
    const input = document.getElementById(inputId);
    const dt    = new DataTransfer();
    dt.items.add(file);
    input.files = dt.files;

    showFilePreview(file, zoneId, previewId);
}

function showFilePreview(file, zoneId, previewId) {
    const zone    = document.getElementById(zoneId);
    const preview = document.getElementById(previewId);
    const sizeMB  = (file.size / 1024 / 1024).toFixed(2);
    const isImage = file.type.startsWith('image/');
    const icon    = file.type === 'application/pdf' ? 'picture_as_pdf' : 'image';

    zone.classList.add('has-file');
    zone.classList.remove('dragover');

    preview.innerHTML = `
        <div class="flex items-center gap-3 text-left">
            <div class="size-10 rounded-lg bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined">${icon}</span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-emerald-700 dark:text-emerald-400 truncate">${file.name}</p>
                <p class="text-xs text-slate-400">${sizeMB} MB</p>
            </div>
            <span class="material-symbols-outlined text-emerald-500">check_circle</span>
        </div>
    `;
}
</script>

</body>
</html>
