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

 
<!-- 3. قسم رحلتك مع مدى (خطوات العمل) -->
<!-- 3. قسم رحلتك مع مدى (خطوات العمل) -->
<section class="mada-section">
    <h2 class="mada-section-title">رحلتك مع مدى</h2>
    <div class="steps-grid">
        
        <!-- الخطوة 1 -->
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

        <!-- الخطوة 2 -->
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

        <!-- الخطوة 3 -->
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
<section class="mada-section">
    <h2 class="section-title">كيف تعمل المنصة؟</h2>
    
    <div class="how-it-works-grid">
        <!-- بطاقة الجهات -->
        <div class="how-card border-sky">
            <div class="how-badge badge-sky">الجهات</div>
            <ul class="how-list">
                <li>
                    <span>سجل جهتك وانتظر الموافقة</span>
                    <span class="step-num num-sky">1</span>
                </li>
                <li>
                    <span>ابحث عن الطلبة وفلتر النتائج</span>
                    <span class="step-num num-sky">2</span>
                </li>
                <li>
                    <span>أرسل طلب تواصل للطلاب المناسبين</span>
                    <span class="step-num num-sky">3</span>
                </li>
            </ul>
        </div>

        <!-- بطاقة الطلاب -->
        <div class="how-card border-teal">
            <div class="how-badge badge-teal">طالب</div>
            <ul class="how-list">
                <li>
                    <span>سجل وأنشئ ملفك</span>
                    <span class="step-num num-teal">1</span>
                </li>
                <li>
                    <span>اختبر مستواك في مجالك</span>
                    <span class="step-num num-teal">2</span>
                </li>
                <li>
                    <span>تصل إليك الجهات وتتواصل معك بموافقتك</span>
                    <span class="step-num num-teal">3</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- قسم الدعوة للإجراء (CTA) -->
<section class="cta-section">
    <div class="cta-text">
        <h2>جاهز تعرف مستواك الحقيقي؟</h2>
        <p>أنشئ حسابك وابدأ الاختبار الآن.</p>
    </div>
    <a href="#" class="btn-cta">أبدأ الآن</a>
</section>

<!-- الفوتر (Footer) -->
<footer class="main-footer">
    <p>2026© فريق مدى</p>
    <p>مدى - مشروع تخرج جامعة الأقصى - كلية تكنولوجيا وعلوم الحاسوب - قسم تكنولوجيا المعلومات التطبيقية</p>
</footer>
<script src="{{ asset('js/counter.js') }}"></script>
</body>
</html>