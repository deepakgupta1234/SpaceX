# Project Q&A Cheat Sheet

Use this file for quick answers about this repo. If you have a question, search here first.

## What is this project?
- Laravel 5.8 app displaying SpaceX launches via the public SpaceX API.
- Core UI lives in Blade views; assets use Bootstrap 4.

## Key entry points
- Web routes: `routes/web.php`
  - `/` → `welcome` view
  - `/get10launch` → `HomeController@index` (top 10 upcoming launches)
  - `/launches` → `HomeController@launches` (all launches)
- API routes: `routes/api.php`
  - `/api/user` (requires `auth:api`)

## Where is the SpaceX API called?
- `app/Http/Controllers/HomeController.php`
  - Base endpoint: `https://api.spacexdata.com/v3/`
  - `index()` calls `launches/upcoming`, slices top 10
  - `launches()` calls `launches` (all)

## What renders the launch list?
- `resources/views/launch_data.blade.php`
  - Expects `$top10Launch` collection of launch objects
  - Uses `
      mission_name, flight_number, mission_id, details, launch_date_local
    `
- Layout: `resources/views/layouts/app.blade.php`

## How do I run the app locally?
1. Install system deps: PHP 7.1+, Composer, Node 10+ recommended
2. Install PHP deps:
   ```bash
   composer install
   ```
3. Create env and app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. (Optional for auth) Configure DB in `.env`, then:
   ```bash
   php artisan migrate
   ```
5. Start dev server:
   ```bash
   php artisan serve
   ```
6. Visit:
   - `http://127.0.0.1:8000/get10launch` for top 10 upcoming
   - `http://127.0.0.1:8000/launches` for all launches

## How do I build frontend assets?
- Install node deps:
  ```bash
  npm install
  ```
- Build/dev:
  ```bash
  npm run dev    # or: npm run watch
  npm run prod   # production build
  ```
- Entry points in `resources/js` and `resources/sass`; output to `public/`

## How do I run tests?
```bash
./vendor/bin/phpunit
```

## Where is authentication configured?
- Controllers: `app/Http/Controllers/Auth/*`
- Config: `config/auth.php`
- Default routes come from Laravel scaffolding; DB required for full auth flows.

## Common tweaks
- Change SpaceX API base URL: edit `$endpoint` in `HomeController`
- Modify list rendering: edit `resources/views/launch_data.blade.php`
- Add a new page: add a route in `routes/web.php`, controller in `app/Http/Controllers`, and a Blade view in `resources/views`

## Useful Composer and Artisan
```bash
composer install            # install PHP deps
php artisan config:clear    # clear config cache
php artisan route:list      # see all routes
php artisan migrate         # run DB migrations
```

## Project metadata
- PHP deps: see `composer.json` (Laravel 5.8, Guzzle 6, Bootstrap 4.3.1)
- Node toolchain: see `package.json` (Laravel Mix 4, Vue 2 available)

If you ask a question that this file doesn’t cover, we’ll expand it here so it helps next time.
