<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رسائل النظام - منصة مدى</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mada-system.css') }}">
</head>
<body class="system-body">

    <div class="system-container">
        
        <!-- رأس الصفحة -->
        <header class="system-header">
            <h1 class="system-title">رسائل النظام</h1>
            <a href="{{ url('/admin/questions') }}" class="btn-teal">إضافة سؤال</a>
        </header>

        <!-- الصف العلوي: 3 بطاقات (النجاح، أخطاء النماذج، خطأ الاتصال والتحميل) -->
        <section class="top-cards-grid">
            
            <!-- البطاقة 1: النجاح -->
            <div class="msg-card">
                <h2 class="card-heading">النجاح</h2>
                <div class="pills-group">
                    <span class="success-pill">تم حفظ التغييرات</span>
                    <span class="success-pill">تم ارسال طلب التواصل</span>
                    <span class="success-pill">تمت اضافة الفرصة</span>
                    <span class="success-pill">تم حذف الفرصة</span>
                    <span class="success-pill">تمت الموافقة على الجهة</span>
                </div>
            </div>

            <!-- البطاقة 2: أخطاء النماذج -->
            <div class="msg-card">
                <h2 class="card-heading">أخطاء النماذج</h2>
                <ul class="error-list">
                    <li>هذا الحقل مطلوب.</li>
                    <li>أدخل بريدا الكترونيا صحيحا.</li>
                    <li>كلمة المرور يجب ألا تقل عن 8 أحرف.</li>
                    <li>كلمتا المرور غير متطابقتين.</li>
                    <li>هذا البريد مسجل مسبقا.</li>
                </ul>
            </div>

            <!-- البطاقة 3: خطأ الاتصال والتحميل -->
            <div class="msg-card">
                <h2 class="card-heading">خطأ الاتصال والتحميل</h2>
                <p class="connection-error-text">تعذر الاتصال . تحقق من الانترنت وحاول مرة أخرى.</p>
                <p class="loading-text">جارٍ التحميل .....</p>
            </div>

        </section>

        <!-- الصف السفلي: بطاقتان (404 و 403) -->
        <section class="bottom-cards-grid">
            
            <!-- البطاقة 4: الصفحة غير موجودة -->
            <div class="state-card">
                <h3 class="state-title">الصفحة غير موجودة</h3>
                <p class="state-subtitle">قد يكون الرابط خاطئا أو الصفحة نقلت</p>
                <a href="{{ url('/') }}" class="btn-teal">العودة الى الرئيسية</a>
            </div>

            <!-- البطاقة 5: هذه الصفحة غير متاحة لحسابك -->
            <div class="state-card">
                <h3 class="state-title">هذه الصفحة غير متاحة لحسابك.</h3>
                <a href="{{ url('/student/dashboard') }}" class="btn-teal mt-btn">العودة الى لوحتي</a>
            </div>

        </section>

    </div>

</body>
</html>