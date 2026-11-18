FROM php:8.2-cli

# تثبيت الأدوات اللازمة للاراول و Node.js لبناء التصميم
RUN apt-get update && apt-get install -y unzip git libzip-dev nodejs npm \
    && docker-php-ext-install zip

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# تثبيت حزم لاراول وبناء ملفات CSS/JS
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# إنشاء قاعدة البيانات
RUN mkdir -p database && touch database/database.sqlite && chmod -R 777 database

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}