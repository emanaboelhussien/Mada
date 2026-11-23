<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الطلاب المتاحون - منصة مدى</title>
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
                <a href="{{ route('entity.students') }}" class="nav-item active">
                    <i class="fas fa-user-graduate"></i>
                    <span>الطلاب المتاحون</span>
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
                <h1>الطلاب المتاحون</h1>
                <p>تصفّحي ملفات الطلاب المفعّلة للظهور للجهات وابحثي حسب التخصص أو الاسم.</p>
            </div>
        </header>

        <div class="students-toolbar">
            <div class="search-box">
                <input type="text" id="studentSearch" class="search-input" placeholder="ابحثي بالاسم أو التخصص أو الجامعة...">
            </div>

            <div class="filter-tabs">
                <button type="button" class="filter-tab active" data-filter="all">الكل</button>
                <button type="button" class="filter-tab" data-filter="it">تكنولوجيا المعلومات</button>
                <button type="button" class="filter-tab" data-filter="cs">علوم الحاسوب</button>
            </div>
        </div>

        <section class="students-grid">
            <article class="student-card" data-search="أحمد منصور تكنولوجيا المعلومات الجامعة الإسلامية" data-major="تكنولوجيا المعلومات">
                <div>
                    <div class="student-card-top">
                        <div>
                            <h2 class="student-name">أحمد منصور</h2>
                            <p class="student-sub">الجامعة الإسلامية - تكنولوجيا المعلومات - المستوى الرابع</p>
                        </div>
                        <span class="badge-level">متاح للجهات</span>
                    </div>

                    <p class="student-bio">مهتم بتطوير الويب وبناء واجهات مستخدم حديثة، جاهز للتدريب العملي.</p>
                </div>

                <div class="student-card-footer">
                    <span class="student-sub">
                        <a href="#" class="panel-link">
                            <i class="fas fa-external-link-alt"></i> معرض الأعمال
                        </a>
                    </span>
                    <button type="button" class="btn-outline" onclick="openContactModal('أحمد منصور')">
                        طلب تواصل
                    </button>
                </div>
            </article>

            <article class="student-card" data-search="سارة الخطيب علوم الحاسوب جامعة الأزهر" data-major="علوم الحاسوب">
                <div>
                    <div class="student-card-top">
                        <div>
                            <h2 class="student-name">سارة الخطيب</h2>
                            <p class="student-sub">جامعة الأزهر - علوم الحاسوب - المستوى الثالث</p>
                        </div>
                        <span class="badge-level">متاح للجهات</span>
                    </div>

                    <p class="student-bio">مهتمة بالبرمجة وقواعد البيانات وتبحث عن فرص تدريبية ودورات تخصصية.</p>
                </div>

                <div class="student-card-footer">
                    <span class="student-sub">ملف تعريفي مفعّل</span>
                    <button type="button" class="btn-outline" onclick="openContactModal('سارة الخطيب')">
                        طلب تواصل
                    </button>
                </div>
            </article>
        </section>
    </main>
</div>

<!-- نافذة تأكيد طلب التواصل -->
<div class="modal-overlay" id="contactModal">
    <div class="modal-box">
        <h2 class="modal-title">إرسال طلب تواصل</h2>
        <p class="modal-desc" id="contactModalDesc">هل ترغبين بإرسال طلب تواصل للطالب؟</p>
        <div class="modal-actions">
            <button type="button" class="btn-modal-confirm" id="confirmContactBtn">تأكيد الطلب</button>
            <button type="button" class="btn-modal-cancel" onclick="closeContactModal()">إلغاء</button>
        </div>
    </div>
</div>

<script>
    const searchInput = document.getElementById('studentSearch');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const cards = document.querySelectorAll('.student-card');
    let activeFilter = 'all';

    function applyFilters() {
        const query = (searchInput ? searchInput.value : '').trim().toLowerCase();

        cards.forEach(card => {
            const searchText = (card.dataset.search || '').toLowerCase();
            const majorText = (card.dataset.major || '').toLowerCase();

            const matchesQuery = !query || searchText.includes(query);
            let matchesTab = true;

            if (activeFilter === 'it') {
                matchesTab = majorText.includes('معلومات') || majorText.includes('it');
            } else if (activeFilter === 'cs') {
                matchesTab = majorText.includes('حاسوب') || majorText.includes('cs');
            }

            card.style.display = (matchesQuery && matchesTab) ? 'flex' : 'none';
        });
    }

    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            filterTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            activeFilter = tab.dataset.filter;
            applyFilters();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }

    const contactModal = document.getElementById('contactModal');
    const contactModalDesc = document.getElementById('contactModalDesc');
    const confirmContactBtn = document.getElementById('confirmContactBtn');

    function openContactModal(studentName) {
        contactModalDesc.textContent = 'إرسال طلب تواصل إلى: ' + studentName;
        contactModal.style.display = 'flex';
    }

    function closeContactModal() {
        contactModal.style.display = 'none';
    }

    if (confirmContactBtn) {
        confirmContactBtn.addEventListener('click', () => {
            closeContactModal();
            alert('تم تسجيل طلب التواصل مبدئياً.');
        });
    }

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeContactModal();
        }
    });

    if (contactModal) {
        contactModal.addEventListener('click', (event) => {
            if (event.target === contactModal) {
                closeContactModal();
            }
        });
    }
</script>

</body>
</html>