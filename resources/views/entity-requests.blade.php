<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلبات التواصل - منصة مدى</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/entity-dashboard.css') }}">
</head>
<body>

<div class="dashboard-wrapper">
    <aside class="sidebar">
        <div>
            <div class="sidebar-logo">
                <h2>مدى</h2>
                <span class="entity-role-badge">حساب جهة</span>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('entity.dashboard') }}" class="nav-item">
                    <i class="fas fa-th-large"></i>
                    <span>لوحة الجهة</span>
                </a>
                <a href="{{ route('entity.students') }}" class="nav-item">
                    <i class="fas fa-user-graduate"></i>
                    <span>الطلاب المتاحون</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-briefcase"></i>
                    <span>الفرص والدورات</span>
                </a>
                  <a href="{{ route('entity.requests') }}" class="nav-item">
    <i class="far fa-paper-plane"></i>
    <span>طلبات التواصل</span>
</a>
                <a href="{{ route('entity.profile') }}" class="nav-item">
        <i class="far fa-building"></i>
        <span>ملف الجهة</span>
    </a>
            </nav>
        </div>

        <div class="sidebar-footer">
            <a href="{{ url('/') }}" class="nav-item">
                <i class="fas fa-home"></i>
                <span>العودة للرئيسية</span>
            </a>
        </div>
    </aside>

    <main class="main-content">
        <header class="dashboard-header">
            <div>
                <h1>طلبات التواصل</h1>
                <p>تابعي طلبات التواصل المرسلة للطلاب وحالة كل طلب (قيد الانتظار، تمت الموافقة، مرفوض).</p>
            </div>
        </header>

        <div class="students-toolbar">
            <div class="search-box">
                <input type="text" id="requestSearch" class="search-input" placeholder="ابحثي باسم الطالب أو التخصص...">
            </div>

            <div class="filter-tabs">
                <button type="button" class="filter-tab active" data-status="all">الكل</button>
                <button type="button" class="filter-tab" data-status="pending">قيد الانتظار</button>
                <button type="button" class="filter-tab" data-status="approved">تمت الموافقة</button>
                <button type="button" class="filter-tab" data-status="rejected">مرفوض</button>
            </div>
        </div>

        <section class="requests-list">
            <article class="request-card" data-status="pending" data-search="أحمد منصور تكنولوجيا المعلومات تدريب عملي">
                <div class="request-info">
                    <div class="request-top">
                        <h2 class="request-student-name">أحمد منصور</h2>
                        <span class="status-badge status-pending">قيد الانتظار</span>
                    </div>
                    <p class="request-meta">تكنولوجيا المعلومات • الفرصة: برنامج تدريب تطوير الويب • أُرسل منذ يومين</p>
                    <p class="request-note">رسالة مبدئية لدعوة الطالب لمقابلة تعريفية حول فرصة التدريب العملي.</p>
                </div>
                <div class="request-actions">
                    <button type="button" class="btn-outline" onclick="openRequestModal('أحمد منصور', 'قيد الانتظار')">عرض التفاصيل</button>
                </div>
            </article>

            <article class="request-card" data-status="approved" data-search="سارة الخطيب علوم الحاسوب منحة تدريبية">
                <div class="request-info">
                    <div class="request-top">
                        <h2 class="request-student-name">سارة الخطيب</h2>
                        <span class="status-badge status-approved">تمت الموافقة</span>
                    </div>
                    <p class="request-meta">علوم الحاسوب • الفرصة: دورة قواعد البيانات • أُرسل قبل 5 أيام</p>
                    <p class="request-note">وافق الطالب على مشاركة بيانات التواصل لبدء تنسيق المواعيد.</p>
                </div>
                <div class="request-actions">
                    <button type="button" class="btn-outline" onclick="openRequestModal('سارة الخطيب', 'تمت الموافقة')">عرض التفاصيل</button>
                </div>
            </article>

            <article class="request-card" data-status="rejected" data-search="ليلى حسن تصميم واجهات">
                <div class="request-info">
                    <div class="request-top">
                        <h2 class="request-student-name">ليلى حسن</h2>
                        <span class="status-badge status-rejected">مرفوض</span>
                    </div>
                    <p class="request-meta">تكنولوجيا المعلومات • الفرصة: تدريب واجهات المستخدم • أُرسل قبل أسبوع</p>
                    <p class="request-note">تم إغلاق الطلب لعدم توافق المواعيد الحالية مع جدول الطالبة.</p>
                </div>
                <div class="request-actions">
                    <button type="button" class="btn-outline" onclick="openRequestModal('ليلى حسن', 'مرفوض')">عرض التفاصيل</button>
                </div>
            </article>
        </section>
    </main>
</div>

<!-- نافذة تفاصيل الطلب -->
<div class="modal-overlay" id="requestModal">
    <div class="modal-box">
        <h2 class="modal-title" id="requestModalTitle">تفاصيل طلب التواصل</h2>
        <p class="modal-desc" id="requestModalDesc"></p>
        <div class="modal-actions">
            <button type="button" class="btn-modal-cancel" onclick="closeRequestModal()">إغلاق</button>
        </div>
    </div>
</div>

<script>
    const searchInput = document.getElementById('requestSearch');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const cards = document.querySelectorAll('.request-card');
    let activeStatus = 'all';

    function filterRequests() {
        const query = (searchInput ? searchInput.value : '').trim().toLowerCase();
        cards.forEach(card => {
            const matchesStatus = activeStatus === 'all' || card.dataset.status === activeStatus;
            const matchesSearch = !query || (card.dataset.search || '').toLowerCase().includes(query);
            card.style.display = (matchesStatus && matchesSearch) ? 'flex' : 'none';
        });
    }

    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            filterTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            activeStatus = tab.dataset.status;
            filterRequests();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', filterRequests);
    }

    const requestModal = document.getElementById('requestModal');
    const requestModalTitle = document.getElementById('requestModalTitle');
    const requestModalDesc = document.getElementById('requestModalDesc');

    function openRequestModal(name, status) {
        requestModalTitle.textContent = 'طلب تواصل: ' + name;
        requestModalDesc.textContent = 'الحالة الحالية للطلب: ' + status + ' (معاينة واجهة تجريبية).';
        requestModal.style.display = 'flex';
    }

    function closeRequestModal() {
        requestModal.style.display = 'none';
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeRequestModal();
    });

    if (requestModal) {
        requestModal.addEventListener('click', (e) => {
            if (e.target === requestModal) closeRequestModal();
        });
    }
</script>
</body>
</html>