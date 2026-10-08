# TRS Landing

Landing page for **TRS - The Real Stories | Recognizing Talent**.

## How it works
1. A person registers with their details, story, proof link and photo.
2. The TRS team reviews the submission in the admin panel.
3. Verified people are featured in a TRS post.

## Stack
- Laravel
- MySQL
- Blade views (no frontend build step)
- Hosted on InfinityFree

## Local setup
```bash
composer install
cp .env.example .env
php artisan key:generate
# set DB_* and ADMIN_PASSWORD in .env
php artisan migrate
php artisan serve
```

Admin panel: `/admin/login`