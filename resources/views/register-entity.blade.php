<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل جهة جديدة - منصة مدى</title>
    <!-- استدعاء خط تجوال -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome للأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- ربط ملف الـ CSS الخاص بالتسجيل -->
    <link rel="stylesheet" href="{{ asset('css/mada-register.css') }}">
</head>
<body class="register-body">

    <div class="register-card">
        <!-- زر العودة للرئيسية -->
        <div class="back-home">
            <a href="{{ url('/') }}">
                <i class="fas fa-arrow-right"></i> العودة للرئيسية
            </a>
        </div>

        <div class="brand-header">
            <h2>مدى</h2>
            <h3>تسجيل جهة جديدة</h3>
        </div>

        <form action="#" method="POST">
            @csrf

            <!-- اسم الجهة -->
            <div class="input-group">
                <label class="input-label" for="entity_name">اسم الجهة</label>
                <input type="text" id="entity_name" name="entity_name" class="text-input" placeholder="اسم الجهة" required>
            </div>

            <!-- نوع الجهة -->
            <div class="input-group">
                <label class="input-label" for="entity_type">نوع الجهة</label>
                <input type="text" id="entity_type" name="entity_type" class="text-input" placeholder="شركة | مؤسسة | مركز تدريب | جهة مانحة | أخرى" required>
            </div>

            <!-- البريد الرسمي للجهة -->
            <div class="input-group">
                <label class="input-label" for="email">البريد الرسمي للجهة</label>
                <input type="email" id="email" name="email" class="text-input" placeholder="name@example.com" required>
            </div>

            <!-- رقم الهاتف -->
            <div class="input-group">
                <label class="input-label" for="phone">رقم الهاتف</label>
                <input type="text" id="phone" name="phone" class="text-input" placeholder="رقم الهاتف" required>
            </div>

            <!-- رابط الموقع أو الصفحة الرسمية -->
            <div class="input-group">
                <label class="input-label" for="website">رابط الموقع أو الصفحة الرسمية</label>
                <input type="url" id="website" name="website" class="text-input" placeholder="https://..." required>
            </div>

            <!-- نبذة عن الجهة -->
            <div class="input-group">
                <label class="input-label" for="bio">نبذة عن الجهة</label>
                <input type="text" id="bio" name="bio" class="text-input" placeholder="نبذة مختصرة عن الجهة" required>
            </div>

            <!-- كلمة المرور -->
            <div class="input-group">
                <label class="input-label" for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" class="text-input" required>
            </div>

            <!-- تأكيد كلمة المرور -->
            <div class="input-group">
                <label class="input-label" for="password_confirmation">تأكيد كلمة المرور</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="text-input" required>
                <span class="input-hint">سراجع مشرف المنصة طلبك، ويُفعّل حسابك بعد الموافقة.</span>
            </div>

            <!-- زر إنشاء الحساب -->
            <button type="submit" class="submit-btn">إنشاء الحساب</button>

            <!-- رابط الانتقال لتسجيل الدخول -->
            <div class="login-redirect">
                لديك حساب؟ <a href="{{ route('login') }}">سجل دخولك</a>
            </div>
        </form>
    </div>

</body>
</html>