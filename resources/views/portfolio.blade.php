{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="bg-white text-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.name') }} - {{ __('messages.job_title') }}</title>
    <script>
      // Set theme from localStorage (default: light)
      if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="font-sans">

    <!-- Header -->
    <header class="bg-white shadow-lg fixed top-0 left-0 right-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('images/Flag_of_the_Barbarossa_brothers_Oruç_and_Hayreddin.jpg') }}" alt="Profile" class="h-12 w-12 rounded-full border-2 border-teal-400">
                <a href="#home" class="text-gray-900 text-2xl font-bold ml-4">{{ __('messages.name') }}</a>
            </div>
            <div class="hidden md:flex items-center space-x-6">
                <a href="#about" class="text-gray-900 hover:text-teal-400 transition duration-300">{{ __('messages.nav.about') }}</a>
                <a href="#projects" class="text-gray-900 hover:text-teal-400 transition duration-300">{{ __('messages.nav.projects') }}</a>
                <a href="#skills" class="text-gray-900 hover:text-teal-400 transition duration-300">{{ __('messages.nav.skills') }}</a>
                <a href="#contact" class="text-gray-900 hover:text-teal-400 transition duration-300">{{ __('messages.nav.contact') }}</a>
                <!-- Theme Toggle -->
                <button id="theme-toggle" class="mx-2 text-xl focus:outline-none" aria-label="Toggle dark mode">
                    <span id="theme-toggle-light" style="display:none;">🌞</span>
                    <span id="theme-toggle-dark" style="display:none;">🌙</span>
                </button>
                <!-- Language Switcher -->
                <div class="relative" id="desktop-lang-switcher">
                    <button id="desktop-lang-button" class="flex items-center focus:outline-none">
                        <span class="text-gray-900">{{ strtoupper(app()->getLocale()) }}</span>
                        <svg class="h-5 w-5 text-gray-900 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="desktop-lang-dropdown" class="absolute right-0 mt-2 w-20 bg-gray-200 rounded-md shadow-lg py-1 hidden">
                        <a href="{{ route('language.set', 'en') }}" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-300">EN</a>
                        <a href="{{ route('language.set', 'fr') }}" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-300">FR</a>
                        <a href="{{ route('language.set', 'ar') }}" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-300">AR</a>
                    </div>
                </div>
            </div>
            <div class="md:hidden flex items-center">
                <!-- Theme Toggle (Mobile) -->
                <button id="theme-toggle-mobile" class="mx-2 text-xl focus:outline-none" aria-label="Toggle dark mode">
                    <span id="theme-toggle-light-mobile" style="display:none;">🌞</span>
                    <span id="theme-toggle-dark-mobile" style="display:none;">🌙</span>
                </button>
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="text-gray-900 focus:outline-none ml-2">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden px-6 py-4 bg-gray-100">
            <a href="#about" class="block py-2 text-gray-900 hover:text-teal-400">{{ __('messages.nav.about') }}</a>
            <a href="#projects" class="block py-2 text-gray-900 hover:text-teal-400">{{ __('messages.nav.projects') }}</a>
            <a href="#skills" class="block py-2 text-gray-900 hover:text-teal-400">{{ __('messages.nav.skills') }}</a>
            <a href="#contact" class="block py-2 text-gray-900 hover:text-teal-400">{{ __('messages.nav.contact') }}</a>
             <!-- Language Switcher -->
             <div class="relative mt-4" id="mobile-lang-switcher">
                <button id="mobile-lang-button" class="flex items-center focus:outline-none w-full text-left">
                    <span class="text-gray-900">{{ strtoupper(app()->getLocale()) }}</span>
                    <svg class="h-5 w-5 text-gray-900 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="mobile-lang-dropdown" class="mt-2 w-full bg-gray-200 rounded-md shadow-lg py-1">
                    <a href="{{ route('language.set', 'en') }}" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-300">English</a>
                    <a href="{{ route('language.set', 'fr') }}" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-300">Français</a>
                    <a href="{{ route('language.set', 'ar') }}" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-300">العربية</a>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-20">

        <!-- Hero Section -->
        <section id="home" class="container mx-auto px-6 py-24 flex flex-col md:flex-row items-center text-center md:text-left">
            <div class="md:w-1/2">
                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-4">{{ __('messages.hero.title') }}</h1>
                <p class="text-lg md:text-xl text-gray-700 mb-8">{{ __('messages.hero.subtitle') }}</p>
                <a href="/cv.pdf" download class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-8 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                    {{ __('messages.hero.cv_button') }}
                </a>
            </div>
            <div class="md:w-1/2 mt-12 md:mt-0 flex justify-center">
                 <img src="{{ asset('images/Flag_of_the_Barbarossa_brothers_Oruç_and_Hayreddin.jpg') }}" alt="Profile" class="h-64 w-64 md:h-80 md:w-80 rounded-full object-cover border-4 border-teal-400 shadow-2xl">
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="bg-gray-100 py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">{{ __('messages.about.title') }}</h2>
                <div class="max-w-4xl mx-auto text-gray-700 text-lg leading-relaxed">
                    <p class="mb-6">{{ __('messages.about.paragraph1') }}</p>
                    <p>{{ __('messages.about.paragraph2') }}</p>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">{{ __('messages.projects.title') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach (['project_1', 'project_2', 'project_3'] as $projectKey)
                    <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition duration-300">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __("messages.projects.{$projectKey}.title") }}</h3>
                            <p class="text-gray-700 mb-4">{{ __("messages.projects.{$projectKey}.description") }}</p>
                            <p class="text-sm text-teal-600 font-semibold mb-4">{{ __("messages.projects.{$projectKey}.stack") }}</p>
                            <a href="{{ __("messages.projects.{$projectKey}.link") }}" target="_blank" class="text-gray-900 hover:text-teal-600 font-semibold">View Project &rarr;</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" class="bg-gray-100 py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">{{ __('messages.skills.title') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
                    @foreach (['backend', 'frontend', 'mobile', 'databases', 'tools'] as $skillCategory)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-xl font-bold text-teal-600 mb-4">{{ __("messages.skills.{$skillCategory}") }}</h3>
                        <div class="flex flex-wrap justify-center gap-2">
                             @foreach (trans("messages.skills.skills_list.{$skillCategory}") as $skill)
                                <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">{{ __('messages.contact.title') }}</h2>
                <div class="max-w-2xl mx-auto">
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-md mb-6">
                            {{ session('success') }}
                        </div>
                    @endif
                     @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 rounded-md mb-6">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('messages.contact.form.name') }}</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full bg-white border-gray-300 text-gray-900 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('messages.contact.form.email') }}</label>
                            <input type="email" name="email" id="email" required class="mt-1 block w-full bg-white border-gray-300 text-gray-900 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">{{ __('messages.contact.form.subject') }}</label>
                            <input type="text" name="subject" id="subject" required class="mt-1 block w-full bg-white border-gray-300 text-gray-900 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">{{ __('messages.contact.form.message') }}</label>
                            <textarea name="message" id="message" rows="4" required class="mt-1 block w-full bg-white border-gray-300 text-gray-900 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-6 rounded-md transition duration-300">
                                {{ __('messages.contact.form.submit_button') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 py-6">
        <div class="container mx-auto px-6 text-center text-gray-700">
            <p>&copy; {{ date('Y') }} {{ __('messages.name') }}. All Rights Reserved.</p>
            <div class="flex justify-center space-x-6 mt-4">
                <a href="{{ __('messages.contact.github') }}" target="_blank" class="hover:text-gray-900">GitHub</a>
                <a href="{{ __('messages.contact.linkedin') }}" target="_blank" class="hover:text-gray-900">LinkedIn</a>
                <a href="mailto:{{ __('messages.contact.email_address') }}" class="hover:text-gray-900">Email</a>
            </div>
        </div>
    </footer>

    <script>
        // Theme toggle logic
        function setTheme(theme) {
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                document.getElementById('theme-toggle-light').style.display = 'inline';
                document.getElementById('theme-toggle-dark').style.display = 'none';
                document.getElementById('theme-toggle-light-mobile').style.display = 'inline';
                document.getElementById('theme-toggle-dark-mobile').style.display = 'none';
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                document.getElementById('theme-toggle-light').style.display = 'none';
                document.getElementById('theme-toggle-dark').style.display = 'inline';
                document.getElementById('theme-toggle-light-mobile').style.display = 'none';
                document.getElementById('theme-toggle-dark-mobile').style.display = 'inline';
            }
        }
        function initTheme() {
            const userTheme = localStorage.getItem('theme');
            if (userTheme === 'dark') {
                setTheme('dark');
            } else {
                setTheme('light');
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            initTheme();
            document.getElementById('theme-toggle').addEventListener('click', function() {
                setTheme(document.documentElement.classList.contains('dark') ? 'light' : 'dark');
            });
            document.getElementById('theme-toggle-mobile').addEventListener('click', function() {
                setTheme(document.documentElement.classList.contains('dark') ? 'light' : 'dark');
            });
        });

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Desktop language switcher dropdown
        const desktopLangButton = document.getElementById('desktop-lang-button');
        const desktopLangDropdown = document.getElementById('desktop-lang-dropdown');
        
        if(desktopLangButton) {
            desktopLangButton.addEventListener('click', (e) => {
                e.stopPropagation();
                desktopLangDropdown.classList.toggle('hidden');
            });
        }

        // Mobile language switcher dropdown
        const mobileLangButton = document.getElementById('mobile-lang-button');
        const mobileLangDropdown = document.getElementById('mobile-lang-dropdown');
        
        if(mobileLangButton) {
            mobileLangButton.addEventListener('click', (e) => {
                e.stopPropagation();
                mobileLangDropdown.classList.toggle('hidden');
            });
        }

        // Hide dropdowns when clicking outside
        document.addEventListener('click', (event) => {
            if (desktopLangDropdown && !desktopLangButton.contains(event.target)) {
                desktopLangDropdown.classList.add('hidden');
            }
            if (mobileLangDropdown && !mobileLangButton.contains(event.target)) {
                mobileLangDropdown.classList.add('hidden');
            }
        });

        // Close mobile menu when a link is clicked
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    </script>

</body>
</html> --}}





<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.name') }} - {{ __('messages.job_title') }}</title>
    <script>
        // Theme initialization
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .dark ::-webkit-scrollbar-track {
            background: #374151;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: #6b7280;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        .dark ::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
        html {
            scroll-behavior: smooth;
        }
        
        /* Theme toggle button animation */
        .theme-toggle {
            transition: transform 0.3s ease;
        }
        .theme-toggle:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="font-sans bg-white dark:bg-gray-900 transition-colors duration-300">

    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow-lg fixed top-0 left-0 right-0 z-50 transition-colors duration-300">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('images/oussama.jpg') }}" alt="Profile" class="h-12 w-12 rounded-full border-2 border-teal-400">
                <a href="#home" class="text-gray-900 dark:text-gray-100 text-2xl font-bold ml-4 transition-colors duration-300">{{ __('messages.name') }}</a>
            </div>
            <div class="hidden md:flex items-center space-x-6">
                {{-- <a href="#about" class="text-gray-900 dark:text-gray-100 hover:text-teal-400 transition duration-300">{{ __('messages.nav.about') }}</a>
                <a href="#projects" class="text-gray-900 dark:text-gray-100 hover:text-teal-400 transition duration-300">{{ __('messages.nav.projects') }}</a>
                <a href="#skills" class="text-gray-900 dark:text-gray-100 hover:text-teal-400 transition duration-300">{{ __('messages.nav.skills') }}</a>
                <a href="#contact" class="text-gray-900 dark:text-gray-100 hover:text-teal-400 transition duration-300">{{ __('messages.nav.contact') }}</a>
                 --}}
                <a href="#about" class="mx-4 text-gray-900 dark:text-gray-100 hover:text-teal-400 transition duration-300">
                    {{ __('messages.nav.about') }}
                </a>
                <a href="#projects" class="mx-4 text-gray-900 dark:text-gray-100 hover:text-teal-400 transition duration-300">
                    {{ __('messages.nav.projects') }}
                </a>
                <a href="#skills" class="mx-4 text-gray-900 dark:text-gray-100 hover:text-teal-400 transition duration-300">
                    {{ __('messages.nav.skills') }}
                </a>
                <a href="#contact" class="mx-4 text-gray-900 dark:text-gray-100 hover:text-teal-400 transition duration-300">
                    {{ __('messages.nav.contact') }}
                </a>


                <!-- Theme Toggle Button -->
                <button id="theme-toggle" class="theme-toggle p-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-300">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                
                <!-- Language Switcher -->
                <div class="relative" id="desktop-lang-switcher">
                    <button id="desktop-lang-button" class="flex items-center focus:outline-none">
                        <span class="text-gray-900 dark:text-gray-100 transition-colors duration-300">{{ strtoupper(app()->getLocale()) }}</span>
                        <svg class="h-5 w-5 text-gray-900 dark:text-gray-100 ml-1 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="desktop-lang-dropdown" class="absolute right-0 mt-2 w-20 bg-gray-200 dark:bg-gray-700 rounded-md shadow-lg py-1 hidden transition-colors duration-300">
                        <a href="{{ route('language.set', 'en') }}" class="block px-4 py-2 text-sm text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300">EN</a>
                        <a href="{{ route('language.set', 'fr') }}" class="block px-4 py-2 text-sm text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300">FR</a>
                        <a href="{{ route('language.set', 'ar') }}" class="block px-4 py-2 text-sm text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300">AR</a>
                    </div>
                </div>
            </div>
            <div class="md:hidden flex items-center space-x-2">
                <!-- Mobile Theme Toggle -->
                <button id="mobile-theme-toggle" class="theme-toggle p-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-300">
                    <svg id="mobile-theme-toggle-dark-icon" class="hidden w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="mobile-theme-toggle-light-icon" class="hidden w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="text-gray-900 dark:text-gray-100 focus:outline-none transition-colors duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden px-6 py-4 bg-gray-100 dark:bg-gray-700 transition-colors duration-300">
            <a href="#about" class="block py-2 text-gray-900 dark:text-gray-100 hover:text-teal-400 transition-colors duration-300">{{ __('messages.nav.about') }}</a>
            <a href="#projects" class="block py-2 text-gray-900 dark:text-gray-100 hover:text-teal-400 transition-colors duration-300">{{ __('messages.nav.projects') }}</a>
            <a href="#skills" class="block py-2 text-gray-900 dark:text-gray-100 hover:text-teal-400 transition-colors duration-300">{{ __('messages.nav.skills') }}</a>
            <a href="#contact" class="block py-2 text-gray-900 dark:text-gray-100 hover:text-teal-400 transition-colors duration-300">{{ __('messages.nav.contact') }}</a>
             <!-- Language Switcher -->
             <div class="relative mt-4" id="mobile-lang-switcher">
                <button id="mobile-lang-button" class="flex items-center focus:outline-none w-full text-left">
                    <span class="text-gray-900 dark:text-gray-100 transition-colors duration-300">{{ strtoupper(app()->getLocale()) }}</span>
                    <svg class="h-5 w-5 text-gray-900 dark:text-gray-100 ml-1 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="mobile-lang-dropdown" class="mt-2 w-full bg-gray-200 dark:bg-gray-600 rounded-md shadow-lg py-1 transition-colors duration-300">
                    <a href="{{ route('language.set', 'en') }}" class="block px-4 py-2 text-sm text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors duration-300">English</a>
                    <a href="{{ route('language.set', 'fr') }}" class="block px-4 py-2 text-sm text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors duration-300">Français</a>
                    <a href="{{ route('language.set', 'ar') }}" class="block px-4 py-2 text-sm text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors duration-300">العربية</a>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-20">

        <!-- Hero Section -->
        <section id="home" class="container mx-auto px-6 py-24 flex flex-col md:flex-row items-center text-center md:text-left">
            <div class="md:w-1/2">
                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 dark:text-gray-100 leading-tight mb-4 transition-colors duration-300">{{ __('messages.hero.title') }}</h1>
                <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 mb-8 transition-colors duration-300">{{ __('messages.hero.subtitle') }}</p>
                <a href="/cv.pdf" download class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-8 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                    {{ __('messages.hero.cv_button') }}
                </a>
            </div>
            <div class="md:w-1/2 mt-12 md:mt-0 flex justify-center">
                 <img src="{{ asset('images/oussama.jpg') }}" alt="Profile" class="h-64 w-64 md:h-80 md:w-80 rounded-full object-cover border-4 border-teal-400 shadow-2xl">
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="bg-gray-100 dark:bg-gray-800 py-20 transition-colors duration-300">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100 mb-12 transition-colors duration-300">{{ __('messages.about.title') }}</h2>
                <div class="max-w-4xl mx-auto text-gray-700 dark:text-gray-300 text-lg leading-relaxed transition-colors duration-300">
                    <p class="mb-6">{{ __('messages.about.paragraph1') }}</p>
                    <p>{{ __('messages.about.paragraph2') }}</p>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-20 bg-white dark:bg-gray-900 transition-colors duration-300">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100 mb-12 transition-colors duration-300">{{ __('messages.projects.title') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach (['project_1', 'project_2', 'project_3'] as $projectKey)
                    <div class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2 transition-colors duration-300">{{ __("messages.projects.{$projectKey}.title") }}</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-4 transition-colors duration-300">{{ __("messages.projects.{$projectKey}.description") }}</p>
                            <p class="text-sm text-teal-600 font-semibold mb-4">{{ __("messages.projects.{$projectKey}.stack") }}</p>
                            <a href="{{ __("messages.projects.{$projectKey}.link") }}" target="_blank" class="text-gray-900 dark:text-gray-100 hover:text-teal-600 font-semibold transition-colors duration-300">View Project &rarr;</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" class="bg-gray-100 dark:bg-gray-800 py-20 transition-colors duration-300">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100 mb-12 transition-colors duration-300">{{ __('messages.skills.title') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
                    @foreach (['backend', 'frontend', 'mobile', 'databases', 'tools'] as $skillCategory)
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow transition-colors duration-300">
                        <h3 class="text-xl font-bold text-teal-600 mb-4">{{ __("messages.skills.{$skillCategory}") }}</h3>
                        <div class="flex flex-wrap justify-center gap-2">
                             @foreach (trans("messages.skills.skills_list.{$skillCategory}") as $skill)
                                <span class="bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 px-3 py-1 rounded-full text-sm transition-colors duration-300">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-white dark:bg-gray-900 transition-colors duration-300">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100 mb-12 transition-colors duration-300">{{ __('messages.contact.title') }}</h2>
                <div class="max-w-2xl mx-auto">
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-md mb-6">
                            {{ session('success') }}
                        </div>
                    @endif
                     @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 rounded-md mb-6">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-300">{{ __('messages.contact.form.name') }}</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 transition-colors duration-300">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-300">{{ __('messages.contact.form.email') }}</label>
                            <input type="email" name="email" id="email" required class="mt-1 block w-full bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 transition-colors duration-300">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-300">{{ __('messages.contact.form.subject') }}</label>
                            <input type="text" name="subject" id="subject" required class="mt-1 block w-full bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 transition-colors duration-300">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-300">{{ __('messages.contact.form.message') }}</label>
                            <textarea name="message" id="message" rows="4" required class="mt-1 block w-full bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 transition-colors duration-300"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-6 rounded-md transition duration-300">
                                {{ __('messages.contact.form.submit_button') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    {{-- <footer class="bg-gray-100 dark:bg-gray-800 py-6 transition-colors duration-300">
        <div class="container mx-auto px-6 text-center text-gray-700 dark:text-gray-300 transition-colors duration-300">
            <p>&copy; {{ date('Y') }} {{ __('messages.name') }}. All Rights Reserved.</p>
            <div class="flex justify-center space-x-6 mt-4">
                <a href="{{ __('messages.contact.github') }}" target="_blank" class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-300">GitHub</a>
                <a href="{{ __('messages.contact.linkedin') }}" target="_blank" class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-300">LinkedIn</a>
                <a href="mailto:{{ __('messages.contact.email_address') }}" class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-300">Email</a>
            </div>
        </div>
    </footer> --}}



    <!-- Footer -->
    <footer class="bg-gray-100 dark:bg-gray-800 py-6 transition-colors duration-300">
        <div class="container mx-auto px-6 text-center text-gray-700 dark:text-gray-300 transition-colors duration-300">
            <p class="mb-4">&copy; {{ date('Y') }} {{ __('messages.name') }}. All Rights Reserved.</p>

            <div class="flex justify-center space-x-8 rtl:space-x-reverse">
                <!-- GitHub -->
                <a href="{{ __('messages.contact.github') }}" target="_blank" aria-label="GitHub"
                class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 .5C5.65.5.5 5.65.5 12c0 5.1 3.3 9.4 7.9 10.9.6.1.8-.3.8-.6v-2.2c-3.2.7-3.9-1.5-3.9-1.5-.5-1.2-1.2-1.6-1.2-1.6-1-.7.1-.7.1-.7 1.1.1 1.6 1.2 1.6 1.2 1 .1.8 1.7 3.5 1.2.1-.8.4-1.3.7-1.6-2.5-.3-5.2-1.3-5.2-5.8 0-1.3.5-2.4 1.2-3.3-.1-.3-.5-1.5.1-3.1 0 0 1-.3 3.4 1.2 1-.3 2-.4 3-.4s2 .1 3 .4c2.4-1.6 3.4-1.2 3.4-1.2.6 1.6.2 2.8.1 3.1.7.9 1.2 2 1.2 3.3 0 4.6-2.7 5.5-5.3 5.8.4.4.8 1.1.8 2.2v3.3c0 .3.2.7.8.6C20.7 21.4 24 17 24 12 24 5.65 18.35.5 12 .5Z"/>
                    </svg>
                </a>

                <!-- LinkedIn -->
                <a href="{{ __('messages.contact.linkedin') }}" target="_blank" aria-label="LinkedIn"
                class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.447 20.452h-3.554v-5.568c0-1.327-.024-3.037-1.85-3.037-1.853 0-2.136 1.445-2.136 2.939v5.666H9.353V9h3.414v1.561h.049c.476-.9 1.635-1.85 3.367-1.85 3.6 0 4.267 2.368 4.267 5.448v6.293zM5.337 7.433a2.062 2.062 0 110-4.124 2.062 2.062 0 010 4.124zM6.99 20.452H3.683V9H6.99v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.225.792 24 1.771 24h20.451C23.205 24 24 23.225 24 22.271V1.729C24 .774 23.205 0 22.225 0z"/>
                    </svg>
                </a>

                <!-- Email -->
                <a href="mailto:{{ __('messages.contact.email_address') }}" aria-label="Email"
                class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2Zm0 4-8 5-8-5V6l8 5 8-5v2Z"/>
                    </svg>
                </a>

                <!-- Facebook -->
                <a href="{{ __('messages.contact.facebook') }}" target="_blank" aria-label="Facebook"
                class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24h11.495v-9.294H9.691v-3.622h3.129V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 1.763v2.312h3.587l-.467 3.622h-3.12V24h6.116C23.407 24 24 23.407 24 22.676V1.325C24 .593 23.407 0 22.675 0z"/>
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="{{ __('messages.contact.instagram') }}" target="_blank" aria-label="Instagram"
                class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7.5 2h9A5.5 5.5 0 0 1 22 7.5v9A5.5 5.5 0 0 1 16.5 22h-9A5.5 5.5 0 0 1 2 16.5v-9A5.5 5.5 0 0 1 7.5 2Zm0 2A3.5 3.5 0 0 0 4 7.5v9A3.5 3.5 0 0 0 7.5 20h9a3.5 3.5 0 0 0 3.5-3.5v-9A3.5 3.5 0 0 0 16.5 4h-9Zm9.25 1.25a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>



    <script>
        // Theme toggle functionality
        const themeToggleBtn = document.getElementById('theme-toggle');
        const mobileThemeToggleBtn = document.getElementById('mobile-theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        const mobileThemeToggleDarkIcon = document.getElementById('mobile-theme-toggle-dark-icon');
        const mobileThemeToggleLightIcon = document.getElementById('mobile-theme-toggle-light-icon');

        function updateThemeIcons() {
            if (document.documentElement.classList.contains('dark')) {
                themeToggleLightIcon.classList.remove('hidden');
                themeToggleDarkIcon.classList.add('hidden');
                mobileThemeToggleLightIcon.classList.remove('hidden');
                mobileThemeToggleDarkIcon.classList.add('hidden');
            } else {
                themeToggleLightIcon.classList.add('hidden');
                themeToggleDarkIcon.classList.remove('hidden');
                mobileThemeToggleLightIcon.classList.add('hidden');
                mobileThemeToggleDarkIcon.classList.remove('hidden');
            }
        }

        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
            updateThemeIcons();
        }

        // Initialize theme icons
        updateThemeIcons();

        // Theme toggle event listeners
        themeToggleBtn.addEventListener('click', toggleTheme);
        mobileThemeToggleBtn.addEventListener('click', toggleTheme);

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Desktop language switcher dropdown
        const desktopLangButton = document.getElementById('desktop-lang-button');
        const desktopLangDropdown = document.getElementById('desktop-lang-dropdown');
        
        if(desktopLangButton) {
            desktopLangButton.addEventListener('click', (e) => {
                e.stopPropagation();
                desktopLangDropdown.classList.toggle('hidden');
            });
        }

        // Mobile language switcher dropdown
        const mobileLangButton = document.getElementById('mobile-lang-button');
        const mobileLangDropdown = document.getElementById('mobile-lang-dropdown');
        
        if(mobileLangButton) {
            mobileLangButton.addEventListener('click', (e) => {
                e.stopPropagation();
                mobileLangDropdown.classList.toggle('hidden');
            });
        }

        // Hide dropdowns when clicking outside
        document.addEventListener('click', (event) => {
            if (desktopLangDropdown && !desktopLangButton.contains(event.target)) {
                desktopLangDropdown.classList.add('hidden');
            }
            if (mobileLangDropdown && !mobileLangButton.contains(event.target)) {
                mobileLangDropdown.classList.add('hidden');
            }
        });

        // Close mobile menu when a link is clicked
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    </script>

</body>
</html>
