# Laravel Portfolio Website Setup Guide

This guide documents all the steps, structure, and code changes made to build a modern, multi-language, light/dark mode portfolio website using Laravel and Tailwind CSS CDN.

---

## Features
- **Multi-language** (English, French, Arabic) with session-based language switcher
- **Light/Dark mode** toggle with persistent user preference
- **Responsive** and modern UI (Tailwind CSS CDN)
- **Sections:** Header, Hero, About, Projects, Skills, Contact, Footer
- **Contact form** with validation and email (Laravel backend)
- **Easy to extend**: Add projects, skills, or languages easily

---

## 1. Project Structure

```
app/Http/Controllers/
    PortfolioController.php
    LocalizationController.php
    ContactController.php
app/Http/Middleware/
    SetLocale.php
resources/views/
    portfolio.blade.php
resources/lang/
    en/messages.php
    fr/messages.php
    ar/messages.php
routes/web.php
public/images/ (for profile image)
PORTFOLIO_SETUP_GUIDE.md (this file)
```

---

## 2. Multi-Language Support

- **Translation files:** `resources/lang/{en,fr,ar}/messages.php`
- **Usage in Blade:** `{{ __('messages.key') }}`
- **Language switcher:**
  - Route: `/language/{locale}`
  - Controller: `LocalizationController@setLocale` (sets `session('locale')`)
  - Middleware: `SetLocale` (reads session and sets `app()->setLocale()`)
- **Controller fallback:** In `PortfolioController@index`, always set locale from session before rendering view:
  ```php
  if (session()->has('locale')) {
      app()->setLocale(session('locale'));
  }
  ```

---

## 3. Light/Dark Mode (Tailwind CDN)

- **Tailwind CDN:** No build step, just `<script src="https://cdn.tailwindcss.com"></script>`
- **Dark mode strategy:**
  - Add both light and dark classes to all backgrounds and text, e.g.:
    ```html
    <section class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200">
    ```
  - Do **not** use only `bg-gray-900` or `text-white`.
- **Theme toggle button:**
  - Add a button in the header (and mobile menu) with sun/moon icons.
  - JS toggles the `dark` class on `<html>` and saves preference in `localStorage`.
- **Initialization script:** Place **before** Tailwind CDN:
    ```html
    <script>
      // Always start in light mode unless user explicitly chose dark
      if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    ```
- **Toggle logic:**
    ```js
    function setTheme(theme) {
      if (theme === 'dark') {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      }
    }
    // ...
    ```

---

## 4. Section-by-Section Example

**Header:**
```blade
<header class="bg-white dark:bg-gray-800 ...">
  <a class="text-gray-900 dark:text-white ...">...</a>
  ...
</header>
```

**About/Projects/Skills/Contact/Footer:**
```blade
<section class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 ...">
  ...
</section>
<footer class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200 ...">
  ...
</footer>
```

**Project/Skill Cards:**
```blade
<div class="bg-gray-100 dark:bg-gray-800 ...">
  <h3 class="text-gray-900 dark:text-white ...">...</h3>
  <p class="text-gray-700 dark:text-gray-300 ...">...</p>
</div>
```

---

## 5. Contact Form
- Uses Blade, CSRF, and Laravel validation.
- All labels and messages are localized.

---

## 6. How to Reproduce

1. **Create a new Laravel project:**
   ```bash
   composer create-project laravel/laravel my-portfolio
   cd my-portfolio
   ```
2. **Add controllers, middleware, and routes as above.**
3. **Create translation files in `resources/lang`.**
4. **Create `portfolio.blade.php` and use the above section patterns.**
5. **Add the Tailwind CDN and dark mode script to your `<head>`.**
6. **Add your images to `public/images/`.**
7. **Test in browser, toggle theme, and switch languages.**

---

## 7. Troubleshooting
- If dark mode is always on, check for hardcoded dark classes and remove them.
- Always use both light and dark classes for backgrounds and text.
- Clear your browser's localStorage if the theme is stuck.
- Make sure the dark mode script is before the Tailwind CDN script.

---

## 8. Customization
- Add more languages by copying a `messages.php` file and translating.
- Add more projects/skills by editing the translation files and Blade loops.
- Change color palette by editing Tailwind classes in Blade.

---

## 9. Credits
- Built with [Laravel](https://laravel.com/) and [Tailwind CSS CDN](https://tailwindcss.com/docs/installation/play-cdn)
- Multi-language and theme logic by [your name] 