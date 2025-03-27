FROM php:8.2 as php

# تحديث النظام وتثبيت الحزم المطلوبة
RUN apt-get update -y && apt-get install -y unzip libpq-dev libcurl4-gnutls-dev

# تثبيت PHP Extensions
RUN docker-php-ext-install pdo pdo_mysql bcmath

# تحديد مسار العمل ونسخ الملفات
WORKDIR /var/www
COPY . .

# نسخ Composer من صورة أخرى
COPY --from=composer:2.3.5 /usr/bin/composer /usr/bin/composer

# إعداد البيئة
ENV PORT=8000

# التأكد من أن ملف entrypoint.sh موجود في المسار الصحيح
COPY Docker/entrypoint.sh /entrypoint.sh

# إعطاء صلاحية التنفيذ لـ entrypoint.sh
RUN chmod +x /entrypoint.sh

# استخدام entrypoint
ENTRYPOINT ["/entrypoint.sh"]

# تشغيل PHP-FPM بدلاً من artisan serve
