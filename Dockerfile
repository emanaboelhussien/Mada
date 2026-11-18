FROM php:8.2-cli

# تثبيت الأدوات اللازمة للاراول
RUN apt-get update && apt-get install -y unzip git libzip-dev \
    && docker-php-ext-install zip

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# تثبيت حزم لاراول
RUN composer install --no-dev --optimize-autoloader

# تشغيل السيرفر على البورت المطلوب
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}