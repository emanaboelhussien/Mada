<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة المشرف - منصة مدى</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mada-admin.css') }}">
    <style>
        .admin-section { display: none; }
        .admin-section.active-section { display: block; }
        .admin-nav .nav-item {
            background: transparent;
            border: none;
            width: 100%;
            cursor: pointer;
            text-align: right;
        }
        .admin-nav .nav-item.active-nav {
            background-color: var(--active-pill-bg);
            color: var(--primary-teal);
        }
        /* تنسيقات نافذة تأكيد الحذف المنبثقة */
        .modal-desc-delete {
            font-size: 0.88rem;
            color: var(--primary-teal);
            font-weight: 600;
            margin-bottom: 1.85rem;
        }
        .btn-modal-delete {
            background-color: #C53030;
            color: #FFFFFF;
            border: none;
            padding: 0.55rem 2rem;
            border-radius: 8px;
            font-family: 'Cairo', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-modal-delete:hover {
            background-color: #9B2C2C;
        }
    </style>
</head>
<body class="admin-body">

    <div class="admin-layout">
        
        <!-- القائمة الجانبية اليمنى الداكنة -->
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <h1 class="admin-logo">مدى . مشرف</h1>
            </div>

            <nav class="admin-nav">
                <button type="button" onclick="switchSection('home-section', this)" class="nav-item active-nav">
                    <span>الرئيسية</span>
                </button>
                <button type="button" onclick="switchSection('org-section', this)" class="nav-item">
                    <span>الجهات</span>
                </button>
                <button type="button" onclick="switchSection('opp-section', this)" class="nav-item">
                    <span>الفرص</span>
                </button>
                <button type="button" onclick="switchSection('q-section', this)" class="nav-item">
                    <span>أسئلة الاختبار</span>
                </button>
            </nav>
        </aside>

        <!-- المحتوى الرئيسي -->
        <main class="admin-main">
            
            <!-- 1. الرئيسية -->
            <section id="home-section" class="admin-section active-section">
                @include('admin.home')
            </section>

            <!-- 2. الجهات -->
            <section id="org-section" class="admin-section">
                @include('admin.organizations')
            </section>

            <!-- 3. الفرص (مرفق بها زر ورابط الحذف لفتح نافذة التأكيد) -->
            <section id="opp-section" class="admin-section">
                @include('admin.opportunities')
            </section>

            <!-- 4. أسئلة الاختبار -->
            <section id="q-section" class="admin-section">
                @include('admin.questions')
            </section>

        </main>
    </div>

    <!-- نافذة تأكيد الموافقة على الجهة -->
    <div id="approveModal" class="modal-overlay" onclick="outsideClick(event, 'approveModal')">
        <div class="modal-box">
            <h3 class="modal-title">تأكيد الموافقة على الجهة؟</h3>
            <p class="modal-desc">ستتمكن الجهة من البحث عن الطلبة وإرسال طلبات التواصل.</p>
            <div class="modal-actions">
                <button type="button" class="btn-modal-confirm" onclick="closeModal('approveModal')">موافقة</button>
                <button type="button" class="btn-modal-cancel" onclick="closeModal('approveModal')">إلغاء</button>
            </div>
        </div>
    </div>

    <!-- نافذة تأكيد حذف الفرصة (Delete Modal الجديدة) -->
    <div id="deleteModal" class="modal-overlay" onclick="outsideClick(event, 'deleteModal')">
        <div class="modal-box">
            <h3 class="modal-title">حذف الفرصة</h3>
            <p class="modal-desc-delete">سيتم حذف هذه الفرصة نهائياً ولن تظهر للطلبة</p>
            <div class="modal-actions">
                <button type="button" class="btn-modal-delete" onclick="confirmDelete()">حذف</button>
                <button type="button" class="btn-modal-cancel" onclick="closeModal('deleteModal')">إلغاء</button>
            </div>
        </div>
    </div>

    <!-- سكريبت التبديل وإدارة النوافذ المنبثقة -->
    <script>
        function switchSection(sectionId, element) {
            document.querySelectorAll('.admin-section').forEach(sec => sec.classList.remove('active-section'));
            document.getElementById(sectionId).classList.add('active-section');

            document.querySelectorAll('.admin-nav .nav-item').forEach(item => item.classList.remove('active-nav'));
            element.classList.add('active-nav');
        }

        function openApproveModal() {
            document.getElementById('approveModal').style.display = 'flex';
        }

        function openDeleteModal() {
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function confirmDelete() {
            // سيتم ربط عملية الحذف الفعلي بقاعدة البيانات لاحقاً
            closeModal('deleteModal');
        }

        function outsideClick(event, modalId) {
            const modal = document.getElementById(modalId);
            if (event.target === modal) {
                closeModal(modalId);
            }
        }
    </script>

</body>
</html>