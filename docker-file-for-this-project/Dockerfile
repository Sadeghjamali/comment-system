# مرحله اول: نصب وابستگی‌ها و Composer
FROM php:8.1-fpm AS build

# نصب اکستنشن‌های لازم برای لاراول
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# نصب Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# کپی سورس کد
COPY . .

# نصب پکیج‌ها (از جمله Breeze)
RUN composer install --no-dev --optimize-autoloader

# مرحله دوم: ایمیج نهایی سبک‌تر
FROM php:8.1-fpm

WORKDIR /var/www

# نصب دوباره اکستنشن‌ها (برای فعال‌سازی در ایمیج نهایی)
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# کپی composer و سورس کد از مرحله build
COPY --from=build /usr/bin/composer /usr/bin/composer
COPY --from=build /var/www /var/www

# تنظیم دسترسی‌ها
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# اجرای PHP-FPM
CMD ["php-fpm"]
