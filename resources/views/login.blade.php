<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - منصة مدى</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- استدعاء ملف الـ CSS المستقل -->
    <link rel="stylesheet" href="{{ asset('css/mada-login.css') }}">
</head>
<body class="login-body">

    <div class="login-container">
        

        <div class="login-sidebar-section">
            <h2 class="sidebar-main-title">
                أثبت مهارتك، ودع الفرص تصلك
            </h2>

            <ul class="features-list">
                <li class="feature-item">
                    <span class="feature-bullet"></span>
                    <span>اختبار مستوى يظهر على ملفك</span>
                </li>
                <li class="feature-item">
                    <span class="feature-bullet"></span>
                    <span>الجهات تبحث عنك وتتواصل معك بموافقتك</span>
                </li>
                <li class="feature-item">
                    <span class="feature-bullet"></span>
                    <span>فرص تدريب ومنح موثقة في مكان واحد</span>
                </li>
            </ul>
        </div>


        <div class="login-form-section">
            
            <!-- زر العودة للرئيسية -->
            <div class="back-home-container">
                <a href="{{ url('/') }}" class="back-home-link">
                    &larr; العودة للرئيسية
                </a>
            </div>

            <h2 class="brand-title">مدى</h2>
            <h3 class="section-title">تسجيل الدخول</h3>
            <p class="section-subtitle">أهلاً بعودتك. سجل دخولك لمتابعة رحلتك.</p>

            <form action="#" method="POST">
                @csrf
                <!-- حقل البريد الإلكتروني -->
                <div class="input-group">
                    <label class="input-label">البريد الإلكتروني</label>
                    <input type="email" placeholder="name@example.com" class="text-input">
                </div>

                <!-- حقل كلمة المرور -->
                <div class="input-group">
                    <label class="input-label">كلمة المرور</label>
                    <input type="password" class="text-input error-border">
                </div>

                <!-- رسالة الخطأ -->
                <p class="error-text">البريد الإلكتروني أو كلمة المرور غير صحيحة</p>

                <!-- زر تسجيل الدخول -->
                <button type="submit" class="submit-btn">
                    تسجيل الدخول
                </button>
            </form>

            <!-- رابط إنشاء حساب -->
            <div class="register-link-container">
                ليس لديك حساب؟ <a href="{{ route('register') }}">انشئ حساباً</a>
            </div>
        </div>

    </div>

</body>
</html>