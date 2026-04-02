<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Teacher Registration - EduPlatform</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#137fec",
                        "accent-orange": "#f97316",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                    },
                    fontFamily: {
                        "display": ["Lexend"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>

<body class="font-display bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen overflow-x-hidden">


    <div class="flex min-h-screen w-full">

        {{-- Left Side Panel --}}
        <div class="hidden lg:flex lg:w-2/5 relative overflow-hidden bg-primary sticky top-0 h-screen">
            <div class="absolute inset-0 z-10 bg-gradient-to-br from-primary/80 to-primary/40"></div>
            <img alt="Teacher in a modern classroom setting" class="absolute inset-0 object-cover w-full h-full"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtd1Ncmcbgf1tdhZUBOT9oBPzW8QWb04QQ-P5dbpIQt6fYeaGggrMN-mSBHrcphtAzESB-rJCD6Xasn24k934q_o0i6swBEY_1KtBkEohKX37blut0I1NXSiImdK4umLO_NZWYqkUFfA0fgLtsv6fj6NPZYA-mcot0HljEvr-c0phd6seQeKCuIpUioEimY9tNZPUOEzrU5GDEmW2uUqDsmwUkG2usRPRjQZd3MmpJUG3D9EMmNi4TuJbu66Cug7Tnr_1fblKBIMk" />
            <div class="relative z-20 flex flex-col justify-between p-14 text-white h-full">

                {{-- Logo --}}
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-white/20 backdrop-blur-md rounded-lg">
                        <span class="material-symbols-outlined text-white text-2xl">school</span>
                    </div>
                    <img src="{{ asset('images/logo.png') }}" alt="EduIndependent" class="h-20 w-auto object-contain">
                </div>

                {{-- Main copy --}}
                <div>
                    <span class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-full mb-6">
                        <span class="material-symbols-outlined text-sm">verified</span>
                        Teacher Account
                    </span>
                    <h1 class="text-4xl font-bold leading-tight mb-4">Grow your teaching business, your way.</h1>
                    <p class="text-lg text-white/80 leading-relaxed mb-10">
                        Everything you need to manage students, bookings, and payments — all in one place.
                    </p>

                    {{-- Steps progress --}}
                    <div class="space-y-5">
                        <div class="flex items-center gap-4" id="step-indicator-1">
                            <div class="w-8 h-8 rounded-full bg-white text-primary flex items-center justify-center font-bold text-sm shrink-0 shadow-md">1</div>
                            <div>
                                <p class="font-semibold text-white text-sm">Personal Information</p>
                                <p class="text-white/60 text-xs">Your name, email & contact</p>
                            </div>
                        </div>
                        <div class="w-px h-5 bg-white/30 ml-4"></div>
                        <div class="flex items-center gap-4" id="step-indicator-2">
                            <div class="w-8 h-8 rounded-full bg-white/20 border border-white/40 text-white flex items-center justify-center font-bold text-sm shrink-0">2</div>
                            <div>
                                <p class="font-semibold text-white/60 text-sm">Teaching Profile</p>
                                <p class="text-white/40 text-xs">Subjects, experience & bio</p>
                            </div>
                        </div>
                        <div class="w-px h-5 bg-white/30 ml-4"></div>
                        <div class="flex items-center gap-4" id="step-indicator-3">
                            <div class="w-8 h-8 rounded-full bg-white/20 border border-white/40 text-white flex items-center justify-center font-bold text-sm shrink-0">3</div>
                            <div>
                                <p class="font-semibold text-white/60 text-sm">Account Security</p>
                                <p class="text-white/40 text-xs">Password & confirmation</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Social proof --}}
                <div class="flex gap-4 items-center">
                    <div class="flex -space-x-3 overflow-hidden">
                        <img alt="User" class="inline-block h-9 w-9 rounded-full ring-2 ring-primary"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmF8GWQvv15nOFlT1yzGBJKuo8noQD0kQr_USkkMAtJUC_VKtpQJeElPD50opuD3UQtS1pAm7ne3UXRWx_ZUxlaaGsbxnrDn95z6ozv_cCck966U5_hZbiMYgulS4EPjAoMO3rX5HkDQ3O20ObuHRSJ07TKVbMntFLZhB3fYzS3qsjIfW0Zb-YXG6P2b6RLO7EYzDmGv-GXb1Rv673tX4vdluUcNTn5OTCkVZyE6wpmRQf7Pgm_uBYWSRe_pGJfsrMqz0G39ia9cM" />
                        <img alt="User" class="inline-block h-9 w-9 rounded-full ring-2 ring-primary"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlSGXpvQfW8wCxUorflrh7-USqN6MtsZeNPj5M8INPCf0-51KotaKyDgD2MdRzimTDwJajgXApB1W7bQ00v7KyrASiwbmxvv2N2VbYgm3Agaq4Q8aepro-6q3rEsldjqlr2wdHkKSY8v38s6zCqLV6sQTBbsj4wDYJPsmPVITy0MfAJehEQoimgRfBEafCKYU8BlHnO_WJmm1ZRg5ahNDh_9RhAyBrO-9_uSjrfyBOR05SZbhiTM3hrCjLjzNCeduQBB9Stk0S_iE" />
                        <img alt="User" class="inline-block h-9 w-9 rounded-full ring-2 ring-primary"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjcBmQZo0I18WjGv4NCA7-yVWhziiyqvb_yKJsnCYB5upDUOhL2dOY72b_x9EmfBKNFe3aae1DUPTND5erglpbAdrW1k6xRMEshohB7hYeA0ujxSA9BuZJYTDOhVP4INVJFO1kBdLY21DieZswW7fRqlo9XVaGA0uFy55ruWtYh_BKZsY5ovgOOxU9X8I4L_9dWEUiKeGhpJ0uEvdy1axGMYtB9N0lgnLthjt46SrbF3PPS2-UJacz2U50N0lhWvXrgfprxTPN2wc" />
                    </div>
                    <p class="text-sm font-medium text-white/80">Joined by 10,000+ teachers this month</p>
                </div>

            </div>
        </div>

        {{-- Right Side: Multi-step Form --}}
        <div class="w-full lg:w-3/5 bg-white dark:bg-background-dark flex flex-col justify-start px-8 sm:px-16 lg:px-16 xl:px-24 py-12 overflow-y-auto">
            <div class="max-w-2xl w-full mx-auto">

                {{-- Mobile Logo --}}
                <div class="flex lg:hidden items-center gap-2 mb-8">
                    <span class="material-symbols-outlined text-primary text-3xl">school</span>
                    <span class="text-xl font-bold tracking-tight text-slate-900 dark:text-white">EduPlatform</span>
                </div>

                {{-- Mobile Step Indicator --}}
                <div class="flex lg:hidden items-center justify-center gap-2 mb-8">
                    <div class="flex items-center gap-2">
                        <div class="step-dot w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xs" data-step="1">1</div>
                        <div class="h-px w-10 bg-slate-200 dark:bg-slate-700"></div>
                        <div class="step-dot w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 flex items-center justify-center font-bold text-xs" data-step="2">2</div>
                        <div class="h-px w-10 bg-slate-200 dark:bg-slate-700"></div>
                        <div class="step-dot w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 flex items-center justify-center font-bold text-xs" data-step="3">3</div>
                    </div>
                </div>

                {{-- Header --}}
                <div class="mb-8">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs font-bold text-primary uppercase tracking-widest" id="step-label">Step 1 of 3</span>
                    </div>
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-1" id="step-title">Personal Information</h2>
                    <p class="text-slate-500 dark:text-slate-400" id="step-subtitle">Tell us about yourself to get started.</p>
                </div>

                {{-- Progress Bar --}}
                <div class="w-full h-1.5 bg-slate-100 dark:bg-slate-800 rounded-full mb-10 overflow-hidden">
                    <div class="h-full bg-primary rounded-full transition-all duration-500" id="progress-bar" style="width: 33%"></div>
                </div>

                <form method="POST" action="{{ route('register.teacher') }}" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="role" value="teacher" />

                    {{-- ========== STEP 1: Personal Info ========== --}}
                    <div id="step-1" class="step-section space-y-6">

                        {{-- Avatar Upload --}}
                        <div class="flex items-center gap-5">
                            <div class="relative group">
                                <div class="w-20 h-20 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center border-2 border-dashed border-slate-300 dark:border-slate-600 overflow-hidden" id="avatar-preview-wrapper">
                                    <span class="material-symbols-outlined text-slate-400 text-3xl" id="avatar-placeholder">person</span>
                                    <img id="avatar-preview" class="hidden w-full h-full object-cover" src="" alt="Preview" />
                                </div>
                                <label for="avatar" class="absolute -bottom-1 -right-1 w-7 h-7 bg-primary rounded-full flex items-center justify-center cursor-pointer shadow-md hover:bg-primary/90 transition">
                                    <span class="material-symbols-outlined text-white text-sm">photo_camera</span>
                                </label>
                                <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden" onchange="previewAvatar(event)" />
                            </div>
                            <div>
                                <p class="font-semibold text-slate-900 dark:text-white text-sm">Profile Photo</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">JPG or PNG. Max 2MB. <br/>Helps students recognize you.</p>
                            </div>
                        </div>

                        {{-- First & Last Name --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">First Name</label>
                                <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" required
                                    autocomplete="given-name" placeholder="John"
                                    class="w-full h-12 px-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400 @error('first_name') border-red-500 @enderror" />
                                @error('first_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Last Name</label>
                                <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" required
                                    autocomplete="family-name" placeholder="Doe"
                                    class="w-full h-12 px-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400 @error('last_name') border-red-500 @enderror" />
                                @error('last_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Email Address</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">mail</span>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                    autocomplete="email" placeholder="name@example.com"
                                    class="w-full h-12 pl-10 pr-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400 @error('email') border-red-500 @enderror" />
                            </div>
                            @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Phone Number</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">phone</span>
                                <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                                    autocomplete="tel" placeholder="+1 234 567 890"
                                    class="w-full h-12 pl-10 pr-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400 @error('phone') border-red-500 @enderror" />
                            </div>
                            @error('phone') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- City & Country --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="city" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">City</label>
                                <input id="city" name="city" type="text" value="{{ old('city') }}"
                                    placeholder="e.g. Paris"
                                    class="w-full h-12 px-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400" />
                            </div>
                            <div>
                                <label for="country" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Country</label>
                                <select id="country" name="country"
                                    class="w-full h-12 px-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white">
                                    <option value="">Select country</option>
                                    <option value="MA" {{ old('country') == 'MA' ? 'selected' : '' }}>Morocco</option>
                                    <option value="FR" {{ old('country') == 'FR' ? 'selected' : '' }}>France</option>
                                    <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                    <option value="GB" {{ old('country') == 'GB' ? 'selected' : '' }}>United Kingdom</option>
                                    <option value="DE" {{ old('country') == 'DE' ? 'selected' : '' }}>Germany</option>
                                    <option value="ES" {{ old('country') == 'ES' ? 'selected' : '' }}>Spain</option>
                                    <option value="NL" {{ old('country') == 'NL' ? 'selected' : '' }}>Netherlands</option>
                                    <option value="OTHER" {{ old('country') == 'OTHER' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    {{-- ========== STEP 2: Teaching Profile ========== --}}
                    <div id="step-2" class="step-section space-y-6 hidden">

                        {{-- Subjects --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-3">Subjects You Teach <span class="text-slate-400 font-normal">(select all that apply)</span></label>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach(['Mathematics', 'Physics', 'Chemistry', 'Biology', 'English', 'French', 'Arabic', 'History', 'Geography', 'Computer Science', 'Art', 'Music'] as $subject)
                                <label class="subject-tag cursor-pointer flex items-center justify-center gap-1.5 px-3 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-600 dark:text-slate-400 hover:border-primary hover:text-primary hover:bg-primary/5 transition-all has-[:checked]:border-primary has-[:checked]:text-primary has-[:checked]:bg-primary/5">
                                    <input type="checkbox" name="subjects[]" value="{{ $subject }}" class="hidden" {{ in_array($subject, old('subjects', [])) ? 'checked' : '' }} />
                                    {{ $subject }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Teaching Level --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-3">Teaching Level</label>
                            <div class="grid grid-cols-2 gap-3">
                                @foreach(['Primary School', 'Middle School', 'High School', 'University', 'Adult Learning', 'All Levels'] as $level)
                                <label class="cursor-pointer flex items-center gap-3 p-3 rounded-lg border border-slate-200 dark:border-slate-700 hover:border-primary/50 transition-all has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                                    <input type="radio" name="teaching_level" value="{{ $level }}" class="text-primary" {{ old('teaching_level') == $level ? 'checked' : '' }} />
                                    <span class="text-sm font-medium text-slate-700 dark:text-slate-300">{{ $level }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Experience & Hourly Rate --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="experience_years" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Years of Experience</label>
                                <select id="experience_years" name="experience_years"
                                    class="w-full h-12 px-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white">
                                    <option value="">Select</option>
                                    <option value="0-1">Less than 1 year</option>
                                    <option value="1-3">1 – 3 years</option>
                                    <option value="3-5">3 – 5 years</option>
                                    <option value="5-10">5 – 10 years</option>
                                    <option value="10+">10+ years</option>
                                </select>
                            </div>
                            <div>
                                <label for="hourly_rate" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Hourly Rate (USD)</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 font-semibold text-sm">$</span>
                                    <input id="hourly_rate" name="hourly_rate" type="number" min="0" value="{{ old('hourly_rate') }}"
                                        placeholder="25"
                                        class="w-full h-12 pl-7 pr-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400" />
                                </div>
                            </div>
                        </div>

                        {{-- Teaching Mode --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-3">Teaching Mode</label>
                            <div class="grid grid-cols-3 gap-3">
                                @foreach(['Online' => 'videocam', 'In-Person' => 'location_on', 'Both' => 'swap_horiz'] as $mode => $icon)
                                <label class="cursor-pointer flex flex-col items-center gap-2 p-4 rounded-xl border-2 border-slate-200 dark:border-slate-700 hover:border-primary/50 transition-all has-[:checked]:border-primary has-[:checked]:bg-primary/5 text-center">
                                    <input type="radio" name="teaching_mode" value="{{ $mode }}" class="hidden" {{ old('teaching_mode') == $mode ? 'checked' : '' }} />
                                    <span class="material-symbols-outlined text-slate-400 text-2xl group-has-[:checked]:text-primary">{{ $icon }}</span>
                                    <span class="text-sm font-semibold text-slate-700 dark:text-slate-300">{{ $mode }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Bio --}}
                        <div>
                            <label for="bio" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                Short Bio
                                <span class="text-slate-400 font-normal">(max 300 characters)</span>
                            </label>
                            <textarea id="bio" name="bio" rows="4" maxlength="300" placeholder="Tell students about your teaching style, background and approach..."
                                class="w-full px-4 py-3 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400 resize-none @error('bio') border-red-500 @enderror">{{ old('bio') }}</textarea>
                            <p class="text-xs text-slate-400 mt-1 text-right"><span id="bio-count">0</span>/300</p>
                            @error('bio') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                    </div>

                    {{-- ========== STEP 3: Account Security ========== --}}
                    <div id="step-3" class="step-section space-y-6 hidden">

                        {{-- Password --}}
                        <div>
                            <label for="password" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Password</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">lock</span>
                                <input id="password" name="password" type="password" required
                                    autocomplete="new-password" placeholder="••••••••"
                                    class="w-full h-12 pl-10 pr-12 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400 @error('password') border-red-500 @enderror"
                                    oninput="checkStrength(this.value)" />
                                <button type="button" onclick="togglePassword('password', 'eye-password')" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                    <span class="material-symbols-outlined text-xl" id="eye-password">visibility</span>
                                </button>
                            </div>
                            {{-- Strength Bar --}}
                            <div class="mt-2 flex gap-1">
                                <div class="h-1 flex-1 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden"><div class="h-full rounded-full transition-all duration-300" id="strength-1"></div></div>
                                <div class="h-1 flex-1 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden"><div class="h-full rounded-full transition-all duration-300" id="strength-2"></div></div>
                                <div class="h-1 flex-1 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden"><div class="h-full rounded-full transition-all duration-300" id="strength-3"></div></div>
                                <div class="h-1 flex-1 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden"><div class="h-full rounded-full transition-all duration-300" id="strength-4"></div></div>
                            </div>
                            <p class="text-xs text-slate-400 mt-1" id="strength-label">Use 8+ characters with letters, numbers & symbols</p>
                            @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Confirm Password</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">lock_reset</span>
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                    autocomplete="new-password" placeholder="••••••••"
                                    class="w-full h-12 pl-10 pr-12 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-primary focus:border-primary text-slate-900 dark:text-white placeholder:text-slate-400" />
                                <button type="button" onclick="togglePassword('password_confirmation', 'eye-confirm')" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                    <span class="material-symbols-outlined text-xl" id="eye-confirm">visibility</span>
                                </button>
                            </div>
                        </div>

                        {{-- Summary Card --}}
                        <div class="bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700 rounded-xl p-5 space-y-3">
                            <p class="text-sm font-bold text-slate-700 dark:text-slate-200 flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-lg">fact_check</span>
                                Account Summary
                            </p>
                            <div class="grid grid-cols-2 gap-y-2 text-xs text-slate-500 dark:text-slate-400">
                                <span class="font-medium text-slate-700 dark:text-slate-300">Role</span>
                                <span>Teacher</span>
                                <span class="font-medium text-slate-700 dark:text-slate-300">Name</span>
                                <span id="summary-name">—</span>
                                <span class="font-medium text-slate-700 dark:text-slate-300">Email</span>
                                <span id="summary-email">—</span>
                                <span class="font-medium text-slate-700 dark:text-slate-300">Experience</span>
                                <span id="summary-experience">—</span>
                            </div>
                        </div>

                        {{-- Terms --}}
                        <div class="flex items-start gap-3">
                            <input id="terms" name="terms" type="checkbox" required
                                class="mt-1 h-4 w-4 rounded border-slate-300 text-primary focus:ring-primary" />
                            <label for="terms" class="text-sm text-slate-500 dark:text-slate-400">
                                I agree to the
                                <a href="#" class="text-primary font-semibold hover:underline">Terms of Service</a>
                                and
                                <a href="#" class="text-primary font-semibold hover:underline">Privacy Policy</a>.
                                I understand my profile will be reviewed before going live.
                            </label>
                        </div>

                    </div>

                    {{-- Navigation Buttons --}}
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-800">
                        <button type="button" id="btn-back" onclick="prevStep()" class="hidden flex items-center gap-2 px-5 h-11 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 font-semibold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                            <span class="material-symbols-outlined text-lg">arrow_back</span>
                            Back
                        </button>
                        <div id="btn-back-placeholder"></div>

                        <button type="button" id="btn-next" onclick="nextStep()"
                            class="flex items-center gap-2 px-7 h-11 bg-primary hover:bg-primary/90 text-white font-bold rounded-lg shadow-lg shadow-primary/20 transition-all">
                            <span>Continue</span>
                            <span class="material-symbols-outlined text-lg">arrow_forward</span>
                        </button>

                        <button type="submit" id="btn-submit" class="hidden flex items-center gap-2 px-7 h-11 bg-primary hover:bg-primary/90 text-white font-bold rounded-lg shadow-lg shadow-primary/20 transition-all">
                            <span>Create Teacher Account</span>
                            <span class="material-symbols-outlined text-lg">check_circle</span>
                        </button>
                    </div>

                </form>

                {{-- Footer --}}
                <div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-800 text-center">
                    <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Already have an account?
                        <a class="text-primary font-bold hover:underline" href="{{ route('login') }}">Sign in</a>
                        &nbsp;·&nbsp;
                        <a class="text-primary font-bold hover:underline" href="{{ route('register') }}">Register as Student</a>
                    </p>
                    <div class="flex justify-center gap-6 mt-4">
                        <a class="text-xs text-slate-400 hover:text-slate-600 dark:hover:text-slate-300" href="#">Help Center</a>
                        <a class="text-xs text-slate-400 hover:text-slate-600 dark:hover:text-slate-300" href="#">Terms of Service</a>
                        <a class="text-xs text-slate-400 hover:text-slate-600 dark:hover:text-slate-300" href="#">Privacy Policy</a>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 3;

        const stepTitles = {
            1: { label: 'Step 1 of 3', title: 'Personal Information', subtitle: 'Tell us about yourself to get started.' },
            2: { label: 'Step 2 of 3', title: 'Teaching Profile', subtitle: 'Share your expertise and teaching style.' },
            3: { label: 'Step 3 of 3', title: 'Account Security', subtitle: 'Create a secure password for your account.' },
        };

        function goToStep(step) {
            document.querySelectorAll('.step-section').forEach(s => s.classList.add('hidden'));
            document.getElementById('step-' + step).classList.remove('hidden');

            const info = stepTitles[step];
            document.getElementById('step-label').textContent = info.label;
            document.getElementById('step-title').textContent = info.title;
            document.getElementById('step-subtitle').textContent = info.subtitle;
            document.getElementById('progress-bar').style.width = (step / totalSteps * 100) + '%';

            // Mobile dots
            document.querySelectorAll('.step-dot').forEach(dot => {
                const s = parseInt(dot.dataset.step);
                if (s < step) {
                    dot.className = dot.className.replace(/bg-\S+/g, '').replace(/text-\S+/g, '');
                    dot.classList.add('bg-primary', 'text-white');
                    dot.innerHTML = '<span class="material-symbols-outlined text-xs">check</span>';
                } else if (s === step) {
                    dot.className = dot.className.replace(/bg-\S+/g, '').replace(/text-\S+/g, '');
                    dot.classList.add('bg-primary', 'text-white');
                    dot.textContent = s;
                } else {
                    dot.className = dot.className.replace(/bg-\S+/g, '').replace(/text-\S+/g, '');
                    dot.classList.add('bg-slate-200', 'dark:bg-slate-700', 'text-slate-500');
                    dot.textContent = s;
                }
            });

            // Left panel steps
            for (let i = 1; i <= 3; i++) {
                const ind = document.getElementById('step-indicator-' + i);
                if (!ind) continue;
                const circle = ind.querySelector('div');
                const texts = ind.querySelectorAll('p');
                if (i < step) {
                    circle.className = 'w-8 h-8 rounded-full bg-white text-primary flex items-center justify-center font-bold text-sm shrink-0 shadow-md';
                    circle.innerHTML = '<span class="material-symbols-outlined text-sm">check</span>';
                } else if (i === step) {
                    circle.className = 'w-8 h-8 rounded-full bg-white text-primary flex items-center justify-center font-bold text-sm shrink-0 shadow-md';
                    circle.textContent = i;
                    texts[0].className = 'font-semibold text-white text-sm';
                    texts[1].className = 'text-white/60 text-xs';
                } else {
                    circle.className = 'w-8 h-8 rounded-full bg-white/20 border border-white/40 text-white flex items-center justify-center font-bold text-sm shrink-0';
                    circle.textContent = i;
                    texts[0].className = 'font-semibold text-white/60 text-sm';
                    texts[1].className = 'text-white/40 text-xs';
                }
            }

            // Back button
            document.getElementById('btn-back').classList.toggle('hidden', step === 1);
            document.getElementById('btn-back-placeholder').classList.toggle('hidden', step !== 1);
            document.getElementById('btn-next').classList.toggle('hidden', step === totalSteps);
            document.getElementById('btn-submit').classList.toggle('hidden', step !== totalSteps);

            // Update summary on step 3
            if (step === 3) updateSummary();
        }

        function nextStep() {
            if (currentStep < totalSteps) {
                currentStep++;
                goToStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                goToStep(currentStep);
            }
        }

        function updateSummary() {
            const fn = document.getElementById('first_name').value;
            const ln = document.getElementById('last_name').value;
            const email = document.getElementById('email').value;
            const exp = document.getElementById('experience_years').value;
            document.getElementById('summary-name').textContent = [fn, ln].filter(Boolean).join(' ') || '—';
            document.getElementById('summary-email').textContent = email || '—';
            document.getElementById('summary-experience').textContent = exp || '—';
        }

        function previewAvatar(event) {
            const file = event.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('avatar-placeholder').classList.add('hidden');
                const img = document.getElementById('avatar-preview');
                img.src = e.target.result;
                img.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }

        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }

        function checkStrength(value) {
            let score = 0;
            if (value.length >= 8) score++;
            if (/[A-Z]/.test(value)) score++;
            if (/[0-9]/.test(value)) score++;
            if (/[^A-Za-z0-9]/.test(value)) score++;

            const colors = ['', 'bg-red-400', 'bg-yellow-400', 'bg-blue-400', 'bg-green-500'];
            const labels = ['', 'Weak', 'Fair', 'Good', 'Strong'];
            for (let i = 1; i <= 4; i++) {
                const bar = document.getElementById('strength-' + i);
                bar.className = 'h-full rounded-full transition-all duration-300 ' + (i <= score ? colors[score] : '');
            }
            document.getElementById('strength-label').textContent = score > 0 ? 'Password strength: ' + labels[score] : 'Use 8+ characters with letters, numbers & symbols';
        }

        // Bio character count
        document.getElementById('bio').addEventListener('input', function () {
            document.getElementById('bio-count').textContent = this.value.length;
        });

        // Subject tag toggle visual
        document.querySelectorAll('.subject-tag input').forEach(cb => {
            cb.addEventListener('change', () => {
                cb.closest('label').classList.toggle('border-primary', cb.checked);
                cb.closest('label').classList.toggle('text-primary', cb.checked);
                cb.closest('label').classList.toggle('bg-primary/5', cb.checked);
            });
        });

        // Init
        goToStep(1);
    </script>

</body>
</html>
