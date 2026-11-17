<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاختبار - منصة مدى</title>
    <!-- استدعاء خط تجوال -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome للأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- ملف التنسيق المشترك للوحة التحكم -->
    <link rel="stylesheet" href="{{ asset('css/mada-dashboard.css') }}">
</head>
<body>

<div class="dashboard-wrapper">
    <!-- القائمة الجانبية (Sidebar) -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <h2>مدى</h2>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('student.dashboard') }}" class="nav-item">
                <i class="fas fa-th-large"></i>
                <span>لوحتي</span>
            </a>
            <a href="{{ route('student.profile') }}" class="nav-item">
                <i class="far fa-user"></i>
                <span>ملفي الشخصي</span>
            </a>
            <a href="{{ route('student.exam') }}" class="nav-item active">
                <i class="far fa-check-square"></i>
                <span>الاختبار</span>
            </a>
            <a href="{{ route('student.opportunities') }}" class="nav-item">
                <i class="fas fa-graduation-cap"></i>
                <span>التدريب والمنح</span>
            </a>
            <a href="{{ route('student.requests') }}" class="nav-item">
                <i class="far fa-envelope"></i>
                <span>الطلبات</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="{{ url('/') }}" class="nav-item logout-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>العودة للرئيسية</span>
            </a>
        </div>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="main-content">
        <!-- المرحلة 1: اختيار مجال الاختبار -->
        <div id="exam-intro-view">
            <header class="dashboard-header">
                <h1>اختبار تحديد المستوى</h1>
                <p class="header-subtitle">اختر مجالك التقني لأداء الاختبار وتحديد مستواك للجهات الموثقة</p>
            </header>

            <div class="tracks-grid">
                <!-- بطاقة مجال تطوير الويب -->
                <div class="track-card">
                    <div class="track-header">
                        <div class="track-icon"><i class="fas fa-code"></i></div>
                        <span class="badge badge-open">15 سؤال • 20 دقيقة</span>
                    </div>
                    <h3 class="track-title">تطوير الويب (Web Development)</h3>
                    <p class="track-desc">يشمل أساسيات HTML5, CSS3, JavaScript وبناء واجهات المستخدم التفاعلية.</p>
                    <div class="track-footer">
                        <button type="button" class="btn-start-exam" onclick="startExam('اختبار تطوير الويب')">ابدأ الاختبار</button>
                    </div>
                </div>

                <!-- بطاقة مجال تحليل البيانات والذكاء الاصطناعي -->
                <div class="track-card">
                    <div class="track-header">
                        <div class="track-icon"><i class="fas fa-chart-line"></i></div>
                        <span class="badge badge-open">15 سؤال • 20 دقيقة</span>
                    </div>
                    <h3 class="track-title">تحليل البيانات والذكاء الاصطناعي</h3>
                    <p class="track-desc">يشمل أساسيات Python، تحليل البيانات، الإحصاء، وتعلم الآلة.</p>
                    <div class="track-footer">
                        <button type="button" class="btn-start-exam" onclick="startExam('اختبار تحليل البيانات والذكاء الاصطناعي')">ابدأ الاختبار</button>
                    </div>
                </div>

                <!-- بطاقة مجال برمجة تطبيقات الموبايل -->
                <div class="track-card">
                    <div class="track-header">
                        <div class="track-icon"><i class="fas fa-mobile-alt"></i></div>
                        <span class="badge badge-open">15 سؤال • 20 دقيقة</span>
                    </div>
                    <h3 class="track-title">تطوير تطبيقات الموبايل (Flutter & Dart)</h3>
                    <p class="track-desc">يشمل أساسيات لغة Dart وبناء الواجهات وإدارة الحالة في تطبيقات الهواتف.</p>
                    <div class="track-footer">
                        <button type="button" class="btn-start-exam" onclick="startExam('اختبار تطوير تطبيقات الموبايل')">ابدأ الاختبار</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- المرحلة 2: واجهة الأسئلة (مطابقة لتصميم الفيجما) -->
        <div id="exam-question-view" style="display: none;">
            <header class="dashboard-header exam-top-bar">
                <div>
                    <h1 id="exam-title">اختبار تطوير الويب</h1>
                    <span class="question-counter">السؤال 3 من 15</span>
                </div>
                <div class="exam-timer">
                    <i class="far fa-clock"></i> 18:45
                </div>
            </header>

            <!-- شريط التقدم -->
            <div class="exam-progress-wrapper">
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 20%;"></div>
                </div>
            </div>

            <!-- بطاقة السؤال والخيارات -->
            <div class="question-card">
                <h2 class="question-text">ما وسم HTML المستخدم لإنشاء رابط تشعبي؟</h2>

                <div class="options-list">
                    <label class="option-item selected" onclick="selectOption(this)">
                        <input type="radio" name="answer" checked>
                        <span class="option-letter">أ.</span>
                        <span class="option-code">&lt;a&gt;</span>
                    </label>

                    <label class="option-item" onclick="selectOption(this)">
                        <input type="radio" name="answer">
                        <span class="option-letter">ب.</span>
                        <span class="option-code">&lt;link&gt;</span>
                    </label>

                    <label class="option-item" onclick="selectOption(this)">
                        <input type="radio" name="answer">
                        <span class="option-letter">ج.</span>
                        <span class="option-code">&lt;href&gt;</span>
                    </label>

                    <label class="option-item" onclick="selectOption(this)">
                        <input type="radio" name="answer">
                        <span class="option-letter">د.</span>
                        <span class="option-code">&lt;url&gt;</span>
                    </label>
                </div>

                <!-- أزرار التنقل بين الأسئلة -->
                <div class="question-actions">
                    <button type="button" class="btn-prev" onclick="backToTracks()">السابق</button>
                    <button type="button" class="btn-next">التالي</button>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    function startExam(title) {
        document.getElementById('exam-title').innerText = title;
        document.getElementById('exam-intro-view').style.display = 'none';
        document.getElementById('exam-question-view').style.display = 'block';
    }

    function backToTracks() {
        document.getElementById('exam-question-view').style.display = 'none';
        document.getElementById('exam-intro-view').style.display = 'block';
    }

    function selectOption(element) {
        document.querySelectorAll('.option-item').forEach(opt => opt.classList.remove('selected'));
        element.classList.add('selected');
        element.querySelector('input').checked = true;
    }
</script>

</body>
</html>