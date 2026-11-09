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
    <section class="py-16 px-8 max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-right">رحلتك مع مدى</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-teal-800 text-white p-6 rounded-2xl shadow-md text-right">
                <span class="text-sm opacity-80">الخطوة 1</span>
                <h3 class="text-xl font-bold mt-2">اختبر مستواك</h3>
                <p class="text-xs text-gray-200 mt-2">اختبار قصير تظهر نتيجته على صفحتك</p>
            </div>
            <div class="bg-teal-700 text-white p-6 rounded-2xl shadow-md text-right">
                <span class="text-sm opacity-80">الخطوة 2</span>
                <h3 class="text-xl font-bold mt-2">ابن ملفك</h3>
                <p class="text-xs text-gray-200 mt-2">مهاراتك ومستواك في مكان واحد وانت تبرز من يظهر</p>
            </div>
            <div class="bg-amber-500 text-white p-6 rounded-2xl shadow-md text-right">
                <span class="text-sm opacity-80">الخطوة 3</span>
                <h3 class="text-xl font-bold mt-2">جهات تبحث عنك</h3>
                <p class="text-xs text-gray-100 mt-2">جهات موثقة تطلبك حسب المجال والمستوى</p>
            </div>
        </div>
    </section>

    <!-- قسم لماذا مدى؟ -->
<section class="py-16 px-8 max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-right">لماذا مدى؟</h2>
    
    <!-- شبكة الإحصائيات أو المميزات -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- البطاقة الأولى -->
        <div class="bg-teal-800 text-white p-8 rounded-2xl shadow-lg text-center transform transition duration-300 hover:scale-105">
            <h3 class="text-4xl font-extrabold text-amber-400 mb-4">50%</h3>
            <p class="text-sm leading-relaxed text-gray-100">
                يزيد أن الفرص التقنية أو العمل حقيقية لأكبر صعوبة تواجههم
            </p>
        </div>

        <!-- البطاقة الثانية -->
        <div class="bg-teal-800 text-white p-8 rounded-2xl shadow-lg text-center transform transition duration-300 hover:scale-105">
            <h3 class="text-4xl font-extrabold text-amber-400 mb-4">65%</h3>
            <p class="text-sm leading-relaxed text-gray-100">
                يصدمهم شرط الخبرة السابقة عن القبول
            </p>
        </div>

        <!-- البطاقة الثالثة -->
        <div class="bg-teal-800 text-white p-8 rounded-2xl shadow-lg text-center transform transition duration-300 hover:scale-105">
            <h3 class="text-4xl font-extrabold text-amber-400 mb-4">90%</h3>
            <p class="text-sm leading-relaxed text-gray-100">
                لم يجدوا منصة تقترب مستواهم وتحاكيها للجهات
            </p>
        </div>

    </div>

    <!-- النص السفلي التوضيحي -->
    <p class="text-gray-500 text-sm mt-8">
        من استبيان شارك فيه 20 طالباً وخريجاً
    </p>
</section>
<!-- قسم أحدث الفرص -->
<section class="py-16 px-8 max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-right">أحدث الفرص</h2>
    
    <!-- شبكة البطاقات -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- البطاقة الأولى (تدريب ويب) -->
        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center mb-4">
                    <span class="bg-teal-50 text-teal-700 text-xs px-3 py-1 rounded-full font-medium">تدريب ميداني</span>
                    <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">مفتوحة</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">متدرب تطوير ويب</h3>
                <p class="text-xs text-gray-500 mb-4">اسم الجهة-تطوير ويب</p>
                
                <div class="text-xs text-gray-600 space-y-1 mb-6">
                    <p>آخر موعد للتقديم: 12/11/2026</p>
                    <p class="text-red-500 font-medium">آخر تحقق: 29/10/2026</p>
                </div>
            </div>
            
            <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                <span class="bg-amber-100 text-amber-800 text-xs px-3 py-1 rounded-lg font-bold">باقي 41 يوماً</span>
                <a href="#" class="border border-teal-700 text-teal-700 px-4 py-1.5 rounded-lg text-sm hover:bg-teal-50 transition">التفاصيل</a>
            </div>
        </div>

        <!-- البطاقة الثانية (منحة دراسية) -->
        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center mb-4">
                    <span class="bg-amber-50 text-amber-700 text-xs px-3 py-1 rounded-full font-medium">منحة</span>
                    <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">مفتوحة</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">منحة دراسية</h3>
                <p class="text-xs text-gray-500 mb-4">اسم الجهة-تطوير ويب</p>
                
                <div class="text-xs text-gray-600 space-y-1 mb-6">
                    <p>آخر موعد للتقديم: 12/11/2026</p>
                    <p class="text-red-500 font-medium">آخر تحقق: 29/10/2026</p>
                </div>
            </div>
            
            <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-lg font-bold">تنتهي قريباً</span>
                <a href="#" class="border border-teal-700 text-teal-700 px-4 py-1.5 rounded-lg text-sm hover:bg-teal-50 transition">التفاصيل</a>
            </div>
        </div>

        <!-- البطاقة الثالثة (تدريب ويب متقدم) -->
        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center mb-4">
                    <span class="bg-teal-50 text-teal-700 text-xs px-3 py-1 rounded-full font-medium">تدريب ميداني</span>
                    <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">مفتوحة</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">متدرب تطوير ويب</h3>
                <p class="text-xs text-gray-500 mb-4">اسم الجهة-تطوير ويب</p>
                
                <div class="text-xs text-gray-600 space-y-1 mb-6">
                    <p>آخر موعد للتقديم: 12/11/2026</p>
                    <p class="text-red-500 font-medium">آخر تحقق: 29/10/2026</p>
                </div>
            </div>
            
            <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                <span class="bg-teal-100 text-teal-800 text-xs px-3 py-1 rounded-lg font-bold">مفتوحة</span>
                <a href="#" class="border border-teal-700 text-teal-700 px-4 py-1.5 rounded-lg text-sm hover:bg-teal-50 transition">التفاصيل</a>
            </div>
        </div>

    </div>
</section>
<!-- قسم كيف تعمل المنصة؟ -->
<section class="py-16 px-8 max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-right">كيف تعمل المنصة؟</h2>
    
    <!-- شبكة البطاقات (الجهات والطلاب) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- البطاقة الأولى (الجهات - بإطار أزرق أو مميز حسب التصميم) -->
        <div class="bg-white rounded-2xl shadow-md p-8 border-2 border-sky-400 relative">
            <div class="absolute -top-3 right-8 bg-sky-100 text-sky-800 text-xs px-4 py-1 rounded-full font-bold">الجهات</div>
            <ul class="space-y-4 mt-4 text-gray-700 text-sm text-right">
                <li class="flex items-center gap-3 justify-end">
                    <span>1. سجل جهتك و انتظر الموافقة</span>
                    <span class="w-6 h-6 bg-sky-50 text-sky-700 rounded-full flex items-center justify-center text-xs font-bold">1</span>
                </li>
                <li class="flex items-center gap-3 justify-end">
                    <span>2. ابحث عن الطلبة و فلتر النتائج</span>
                    <span class="w-6 h-6 bg-sky-50 text-sky-700 rounded-full flex items-center justify-center text-xs font-bold">2</span>
                </li>
                <li class="flex items-center gap-3 justify-end">
                    <span>3. أرسل طلب تواصل للطلاب المناسبين</span>
                    <span class="w-6 h-6 bg-sky-50 text-sky-700 rounded-full flex items-center justify-center text-xs font-bold">3</span>
                </li>
            </ul>
        </div>

        <!-- البطاقة الثانية (الطلاب) -->
        <div class="bg-white rounded-2xl shadow-md p-8 border border-gray-100 relative">
            <div class="absolute -top-3 right-8 bg-teal-100 text-teal-800 text-xs px-4 py-1 rounded-full font-bold">طالب</div>
            <ul class="space-y-4 mt-4 text-gray-700 text-sm text-right">
                <li class="flex items-center gap-3 justify-end">
                    <span>1. سجل و أنشئ ملفك</span>
                    <span class="w-6 h-6 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center text-xs font-bold">1</span>
                </li>
                <li class="flex items-center gap-3 justify-end">
                    <span>2. اختبر مستواك في مجالـك</span>
                    <span class="w-6 h-6 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center text-xs font-bold">2</span>
                </li>
                <li class="flex items-center gap-3 justify-end">
                    <span>3. تصل اليك الجهات و تواصل معك بموافقتك</span>
                    <span class="w-6 h-6 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center text-xs font-bold">3</span>
                </li>
            </ul>
        </div>

    </div>
</section>

<!-- القسم الداكن السفلي (جاهز تعرف مستواك الحقيقي؟) -->
<section class="bg-[#0b4f4c] text-white py-12 px-8 max-w-6xl mx-auto rounded-3xl my-12 shadow-lg flex flex-col md:flex-row items-center justify-between">
    <div class="text-right mb-6 md:mb-0">
        <h2 class="text-2xl font-bold mb-2">جاهز تعرف مستواك الحقيقي؟</h2>
        <p class="text-gray-200 text-sm">أنشئ حسابك و ابدأ الاختبار الان.</p>
    </div>
    <a href="#" class="bg-amber-400 text-gray-900 font-bold px-8 py-3 rounded-xl text-sm shadow hover:bg-amber-500 transition">أبدأ الان</a>
</section>

<!-- الفوتر السفلي (Footer) -->
<footer class="bg-[#062c2a] text-gray-400 py-6 px-8 text-xs flex flex-col md:flex-row justify-between items-center border-t border-teal-900">
    <p>2026© فريق مدى</p>
    <p class="mt-2 md:mt-0">مدى-مشروع تخرج جامعة الأقصى -كلية تكنولوجيا و علوم الحاسوب-قسم تكنولوجيا المعلومات التطبيقية</p>
</footer>

</body>
</html>