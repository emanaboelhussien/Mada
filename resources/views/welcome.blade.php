<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة مدى - Mada</title>

    <!-- رابط مكتبة الأيقونات FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- ربط ملف الـ CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

    <!-- (Navbar) -->
    <header class="navbar">
        <div class="logo">
            <h2>مدى</h2>
        </div>
        <nav class="nav-links">
            <a href="#">لماذا مدى</a>
            <a href="#">الاختبار</a>
            <a href="#">التدريب</a>
            <a href="#">المنح</a>
        </nav>
        <div class="auth-buttons">
            <a href="#" class="btn-outline">تسجيل الدخول</a>
            <a href="#" class="btn-solid">إنشاء حساب</a>
        </div>
    </header>

   <!-- القسم الرئيسي (Hero Section) -->
    <section class="hero-section">
        <div class="hero-container">
            
            <!-- القسم الأيمن: النصوص والبحث والزر -->
            <div class="hero-content">
    <h1>أثبت مهارتك، ودع <span class="highlight">الفرص</span> تصلك</h1>
    <p>اختبار مستوى ، وجهات تبحث عنك، وفرص تدريب ومنح موثقة لطلبة تكنولوجيا المعلومات في غزة</p>
    
    <div class="search-box">
    <button class="search-btn">بحث</button>
    <input type="text" placeholder="ابحث عن تدريب أو منحة...">
        <i class="fa-solid fa-magnifying-glass"></i>
</div>

    <div class="tags-container">
        <span class="tag">تطوير ويب</span>
        <span class="tag">منح دراسية</span>
        <span class="tag">تدريب ميداني</span>
    </div>

    <div class="hero-buttons">
        <a href="#" class="btn-orange">ابدأ كطالب</a>
        <a href="#" class="btn-outline-border">سجل جهتك</a>
    </div>
</div>
<div class="hero-images">
    <div class="cards-wrapper">
        
        <!-- البطاقة الجانبية الأولى (يسار) -->
        <div class="side-card">
            <img src="{{ asset('images/1.jpg') }}" alt="طالبة">
            <div class="mini-badge">تحليل البيانات - المستوى: متوسط</div>
        </div>

        <!-- البطاقة الرئيسية المنتصفة (البارزة) -->
        <div class="main-card">
            <img src="{{ asset('images/2.jpg') }}" alt="طالبة متفوقة">
           
            <div class="bottom-notification">طلب تواصل جديد من [اسم الجهة] بانتظار موافقتك</div>
        </div>

        <!-- البطاقة الجانبية الثانية (يمين) -->
        <div class="side-card">
             <div class="top-badge">تطوير الويب - المستوى: متقدم</div>
            <img src="{{ asset('images/3.jpg') }}" alt="طالبة">
        </div>

    </div>
</div>
        </div>
    </section>
</body>
</html>