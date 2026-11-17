<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الطلبات - منصة مدى</title>
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
            <a href="{{ route('student.exam') }}" class="nav-item">
    <i class="far fa-check-square"></i>
    <span>الاختبار</span>
</a>
            <a href="{{ route('student.opportunities') }}" class="nav-item">
                <i class="fas fa-graduation-cap"></i>
                <span>التدريب والمنح</span>
            </a>
            <a href="{{ route('student.requests') }}" class="nav-item active">
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
        <header class="dashboard-header">
            <h1>الطلبات</h1>
        </header>

        <!-- أزرار التبويب (Tabs) -->
        <div class="requests-tabs">
            <button type="button" class="req-tab active" onclick="switchRequestTab('incoming', this)">
                طلبات التواصل الواردة <span class="tab-count">3</span>
            </button>
            <button type="button" class="req-tab" onclick="switchRequestTab('submitted', this)">
                طلباتي المقدمة <span class="tab-count">2</span>
            </button>
        </div>

        <!-- القسم الأول: طلبات التواصل الواردة من الجهات -->
        <section id="incoming-requests" class="requests-list">
            <!-- طلب 1: قيد الانتظار -->
            <div class="request-card">
                <div class="request-header">
                    <div class="entity-info">
                        <div class="entity-avatar">
                            <i class="far fa-building"></i>
                        </div>
                        <div>
                            <h3 class="entity-name">شركة تقنية المستقبل <span class="verified-badge"><i class="fas fa-check-circle"></i> جهة موثقة</span></h3>
                            <span class="request-date">منذ ساعتين • بخصوص: فرصة تدريب تطوير ويب</span>
                        </div>
                    </div>
                    <span class="badge badge-soon">بانتظار ردك</span>
                </div>

                <p class="request-message">
                    مرحباً، اطلعنا على ملفك الشخصي ونتيجتك المميزة في اختبار تطوير الويب، ونرغب بالتواصل معك لإجراء مقابلة مبدئية بخصوص تدريب ميداني.
                </p>

                <div class="request-actions">
                    <button type="button" class="btn-accept">قبول طلب التواصل</button>
                    <button type="button" class="btn-reject">رفض</button>
                </div>
            </div>

            <!-- طلب 2: تم القبول -->
            <div class="request-card">
                <div class="request-header">
                    <div class="entity-info">
                        <div class="entity-avatar">
                            <i class="far fa-building"></i>
                        </div>
                        <div>
                            <h3 class="entity-name">مؤسسة الإبداع الرقمي <span class="verified-badge"><i class="fas fa-check-circle"></i> جهة موثقة</span></h3>
                            <span class="request-date">أمس • بخصوص: منحة تدريبية</span>
                        </div>
                    </div>
                    <span class="badge badge-open">تم القبول</span>
                </div>

                <p class="request-message">
                    أهلاً بك، يسعدنا تواصلك معنا لاستكمال إجراءات الانضمام للبرنامج التدريبي.
                </p>

                <!-- صندوق بيانات التواصل يظهر بعد القبول -->
                <div class="contact-revealed-box">
                    <span><i class="far fa-envelope"></i> hr@digital-creativity.ps</span>
                    <span><i class="fas fa-phone-alt"></i> +970 59 000 0000</span>
                </div>
            </div>

            <!-- طلب 3: مرفوض -->
            <div class="request-card">
                <div class="request-header">
                    <div class="entity-info">
                        <div class="entity-avatar">
                            <i class="far fa-building"></i>
                        </div>
                        <div>
                            <h3 class="entity-name">أكاديمية البرمجة الحديثة</h3>
                            <span class="request-date">قبل 4 أيام</span>
                        </div>
                    </div>
                    <span class="badge badge-closed">مرفوض</span>
                </div>
            </div>
        </section>

        <!-- القسم الثاني: طلباتي المقدمة على الفرص (مخفي مبدئياً) -->
        <section id="submitted-requests" class="requests-list" style="display: none;">
            <div class="request-card">
                <div class="request-header">
                    <div class="entity-info">
                        <div class="entity-avatar">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div>
                            <h3 class="entity-name">متدرب تطوير ويب - شركة حلول البرمجيات</h3>
                            <span class="request-date">تاريخ التقديم: 14/11/2026</span>
                        </div>
                    </div>
                    <span class="badge badge-soon">قيد المراجعة</span>
                </div>
            </div>

            <div class="request-card">
                <div class="request-header">
                    <div class="entity-info">
                        <div class="entity-avatar">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <h3 class="entity-name">منحة تطوير الواجهات الأمامية - مركز التدريب التقني</h3>
                            <span class="request-date">تاريخ التقديم: 02/11/2026</span>
                        </div>
                    </div>
                    <span class="badge badge-open">مقبول مبدئياً</span>
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    function switchRequestTab(tabName, btn) {
        // إزالة التفعيل من كل الأزرار
        document.querySelectorAll('.req-tab').forEach(t => t.classList.remove('active'));
        btn.classList.add('active');

        // إظهار القسم المطلوب وإخفاء الآخر
        if (tabName === 'incoming') {
            document.getElementById('incoming-requests').style.display = 'flex';
            document.getElementById('submitted-requests').style.display = 'none';
        } else {
            document.getElementById('incoming-requests').style.display = 'none';
            document.getElementById('submitted-requests').style.display = 'flex';
        }
    }
</script>

</body>
</html>