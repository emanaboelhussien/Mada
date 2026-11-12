<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة مدى - Mada</title>

    <!-- رابط مكتبة الأيقونات FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
   <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- ربط ملف الـ CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

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
           <a href="{{ url('/login') }}" class="btn-outline">تسجيل الدخول</a>
            <a href="#" class="btn-solid">إنشاء حساب</a>
        </div>
    </header>

   <!-- القسم الرئيسي (Hero Section) -->
    <section class="hero-section">
        <div class="hero-container">
            
          
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
        
        <div class="side-card">
            <img src="{{ asset('images/1.jpg') }}" alt="طالبة">
            <div class="mini-badge">تحليل البيانات - المستوى: متوسط</div>
        </div>

        <div class="main-card">
            <img src="{{ asset('images/2.jpg') }}" alt="طالبة متفوقة">
           
            <div class="bottom-notification">طلب تواصل جديد من [اسم الجهة] بانتظار موافقتك</div>
        </div>

        <div class="side-card">
             <div class="top-badge">تطوير الويب - المستوى: متقدم</div>
            <img src="{{ asset('images/3.jpg') }}" alt="طالبة">
        </div>

    </div>
</div>
        </div>
    </section>

 
<!--  قسم رحلتك مع مدى  -->
<section class="mada-section">
    <h2 class="mada-section-title">رحلتك مع مدى</h2>
    <div class="steps-grid">
        
        <div class="step-card">
            <div class="step-card-header">
                <span class="step-num-text">الخطوة 1</span>
                <div class="step-icon">
                    <i class="fa-solid fa-clipboard-check"></i>
                </div>
            </div>
            <div class="step-card-body">
                <h3>اختبر مستواك</h3>
                <p>اختبار قصير تظهر نتيجته على صفحتك</p>
            </div>
        </div>

        <div class="step-card">
            <div class="step-card-header">
                <span class="step-num-text">الخطوة 2</span>
                <div class="step-icon">
                    <i class="fa-regular fa-user"></i>
                </div>
            </div>
            <div class="step-card-body">
                <h3>ابنِ ملفك </h3>
                <p>مهاراتك ومستواك في مكان واحد وانت تبرز من يظهر</p>
            </div>
        </div>

        <div class="step-card">
            <div class="step-card-header">
                <span class="step-num-text">الخطوة 3</span>
                <div class="step-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <div class="step-card-body">
                <h3>جهات تبحث عنك</h3>
                <p>جهات موثقة تطلبك حسب المجال والمستوى</p>
            </div>
        </div>

    </div>
</section>

<!-- قسم لماذا مدى؟ -->
<section class="mada-section">
    <h2 class="section-title">لماذا مدى؟</h2>
    
    <div class="stats-grid">
        <div class="stat-card">
            <h3><span class="counter" data-target="50">0</span>%</h3>
            <p class="stat-desc">
                يرون أن الفرص المنتهية أو غير الحقيقية أكبر صعوباتهم
            </p>
        </div>
        <div class="stat-card">
            <h3><span class="counter" data-target="65">0</span>%</h3>
            <p class="stat-desc">
                يمنعهم شرط الخبرة السابقة من القبول
            </p>
        </div>
        <div class="stat-card">
            <h3><span class="counter" data-target="90">0</span>%</h3>
            <p class="stat-desc">
                لم يجربوا منصة تقيّم مستواهم وتعرضه للجهات
            </p>
        </div>
    </div>
    <p class="stats-footer-note">من استبيان شارك فيه 20 طالباً وخريجاً</p>
</section>

<!-- قسم أحدث الفرص -->
<section class="mada-section opportunities-section">
    <h2 class="mada-section-title">أحدث الفرص</h2>
    
    <div class="opportunities-grid">
        <!-- الفرصة الأولى -->
        <div class="opp-card">
            <div class="opp-card-body">
                <div class="opp-tags">
                    <span class="tag tag-teal">تدريب ميداني</span>
                    <span class="tag tag-gray">مفتوحة</span>
                </div>
                
                <h3 class="opp-title">متدرب تطوير ويب</h3>
                <p class="opp-subtitle">اسم الجهة - تطوير ويب</p>
                <div class="opp-dates">
                    <p>آخر موعد للتقديم: 12/11/2026</p>
                    <p class="text-danger">آخر تحقق: 29/10/2026</p>
                </div>
            </div>
            <div class="opp-card-footer">
                <span class="badge-status badge-orange">باقي 41 يوماً</span>
                <a href="#" class="btn-details">التفاصيل</a>
            </div>
        </div>

        <!-- الفرصة الثانية -->
        <div class="opp-card">
            <div class="opp-card-body">
                <div class="opp-tags">
                    <span class="tag tag-gray">منحة</span>
                    <span class="tag tag-gray">مفتوحة</span>
                </div>
                <h3 class="opp-title">منحة دراسية</h3>
                <p class="opp-subtitle">اسم الجهة - تطوير ويب</p>
                <div class="opp-dates">
                    <p>آخر موعد للتقديم: 12/11/2026</p>
                    <p class="text-danger">آخر تحقق: 29/10/2026</p>
                </div>
            </div>
            <div class="opp-card-footer">
                <span class="badge-status badge-orange">تنتهي قريباً</span>
                <a href="#" class="btn-details">التفاصيل</a>
            </div>
        </div>

        <!-- الفرصة الثالثة -->
        <div class="opp-card">
            <div class="opp-card-body">
                <div class="opp-tags">
                    <span class="tag tag-teal">تدريب ميداني</span>
                    <span class="tag tag-gray">مفتوحة</span>
                </div>
                <h3 class="opp-title">متدرب تطوير ويب</h3>
                <p class="opp-subtitle">اسم الجهة - تطوير ويب</p>
                <div class="opp-dates">
                    <p>آخر موعد للتقديم: 12/11/2026</p>
                    <p class="text-danger">آخر تحقق: 29/10/2026</p>
                </div>
            </div>
            <div class="opp-card-footer">
                <span class="badge-status badge-teal">مفتوحة</span>
                <a href="#" class="btn-details">التفاصيل</a>
            </div>
        </div>
    </div>
</section>
<!-- قسم كيف تعمل المنصة؟ -->
<section class="mada-section how-it-works-section">
    <h2 class="mada-section-title">كيف تعمل المنصة؟</h2>
    
    <div class="how-it-works-grid">
        <!-- بطاقة الجهات -->
        <div class="how-card border-sky">
            <div class="how-badge badge-teal">الجهات</div>
            <ul class="how-list">
                <li><span class="step-num-text" dir="ltr">1.</span> <span>سجل جهتك وانتظر الموافقة</span></li>
                <li><span class="step-num-text" dir="ltr">2.</span> <span>ابحث عن الطلبة وفلتر النتائج</span></li>
                <li><span class="step-num-text" dir="ltr">3.</span> <span>أرسل طلب تواصل للطلاب المناسبين</span></li>
            </ul>
        </div>

        <!-- بطاقة الطلاب -->
        <div class="how-card border-teal">
            <div class="how-badge badge-teal">طالب</div>
            <ul class="how-list">
                <li><span class="step-num-text" dir="ltr">1.</span> <span>سجل وأنشئ ملفك</span></li>
                <li><span class="step-num-text" dir="ltr">2.</span> <span>اختبر مستواك في مجالك</span></li>
                <li><span class="step-num-text" dir="ltr">3.</span> <span>تصل إليك الجهات وتتواصل معك بموافقتك</span></li>
            </ul>
        </div>
    </div>
</section>

<!-- (جاهز تعرف مستواك الحقيقي؟) -->
<section class="cta-section">
    <div class="cta-container">
        <div class="cta-text">
            <h2>جاهز تعرف مستواك الحقيقي؟</h2>
            <p>أنشئ حسابك و ابدأ الاختبار الآن.</p>
        </div>
        <div>
            <a href="#" class="btn-cta">ابدأ الآن</a>
        </div>
    </div>
</section>

<footer class="main-site-footer">
    <div class="footer-container">
        <p class="footer-right">مدى-مشروع تخرج جامعة الأقصى- كلية تكنولوجيا و علوم الحاسوب-قسم تكنولوجيا المعلومات التطبيقية</p>
        <p class="footer-left">فريق مدى 2026©</p>
    </div>
</footer>
<button id="scrollToTopBtn" title="العودة للأعلى">
    <i class="fas fa-arrow-up"></i>
</button>
<script src="{{ asset('js/counter.js') }}"></script>
<script src="{{ asset('js/scroll-to-top.js') }}"></script>
</body>
</html>