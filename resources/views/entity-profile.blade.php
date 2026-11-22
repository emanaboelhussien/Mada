<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملف الجهة - منصة مدى</title>
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
                <h1>ملف الجهة</h1>
                <p>استعرضي بيانات الجهة التعريفية وحدثي المعلومات الأساسية وروابط التواصل.</p>
            </div>
        </header>

        <section class="profile-grid">
            <div class="profile-summary-card">
                <div class="profile-header-box">
                    <div class="profile-avatar">
                        <i class="far fa-building"></i>
                    </div>
                    <div>
                        <h2 class="profile-name" id="previewEntityName">مؤسسة مدى للتدريب والتطوير</h2>
                        <p class="profile-type" id="previewEntityType">مؤسسة تدريبية وتعليمية</p>
                    </div>
                </div>

                <p class="profile-bio" id="previewEntityBio">
                    جهة متخصصة في تقديم البرامج التدريبية العملية والمنح والدورات التأهيلية لطلبة الجامعات والخريجين.
                </p>

                <div class="profile-meta-list">
                    <div><i class="fas fa-map-marker-alt"></i> <span id="previewEntityLocation">غزة - فلسطين</span></div>
                    <div><i class="fas fa-envelope"></i> <span id="previewEntityEmail">contact@mada-entity.org</span></div>
                    <div><i class="fas fa-link"></i> <span id="previewEntityWebsite">https://mada-entity.org</span></div>
                </div>
            </div>

            <div class="profile-form-card">
                <div class="panel-header">
                    <h2>تعديل بيانات الجهة</h2>
                </div>

                <form id="entityProfileForm">
                    <div class="form-group">
                        <label class="form-label" for="entityNameInput">اسم الجهة</label>
                        <input type="text" id="entityNameInput" class="form-control" value="مؤسسة مدى للتدريب والتطوير">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="entityTypeInput">تصنيف الجهة</label>
                        <input type="text" id="entityTypeInput" class="form-control" value="مؤسسة تدريبية وتعليمية">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="entityLocationInput">الموقع / المدينة</label>
                        <input type="text" id="entityLocationInput" class="form-control" value="غزة - فلسطين">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="entityEmailInput">البريد الإلكتروني الرسمي</label>
                        <input type="email" id="entityEmailInput" class="form-control" value="contact@mada-entity.org">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="entityWebsiteInput">الموقع الإلكتروني أو رابط التواصل</label>
                        <input type="text" id="entityWebsiteInput" class="form-control" value="https://mada-entity.org">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="entityBioInput">نبذة تعريفية عن الجهة</label>
                        <textarea id="entityBioInput" class="form-control">جهة متخصصة في تقديم البرامج التدريبية العملية والمنح والدورات التأهيلية لطلبة الجامعات والخريجين.</textarea>
                    </div>

                    <button type="submit" class="btn-primary-teal">حفظ التعديلات (معاينة)</button>
                </form>
            </div>
        </section>
    </main>
</div>

<script>
    const profileForm = document.getElementById('entityProfileForm');
    if (profileForm) {
        profileForm.addEventListener('submit', (e) => {
            e.preventDefault();
            document.getElementById('previewEntityName').textContent = document.getElementById('entityNameInput').value;
            document.getElementById('previewEntityType').textContent = document.getElementById('entityTypeInput').value;
            document.getElementById('previewEntityLocation').textContent = document.getElementById('entityLocationInput').value;
            document.getElementById('previewEntityEmail').textContent = document.getElementById('entityEmailInput').value;
            document.getElementById('previewEntityWebsite').textContent = document.getElementById('entityWebsiteInput').value;
            document.getElementById('previewEntityBio').textContent = document.getElementById('entityBioInput').value;
            alert('تم تحديث معاينة ملف الجهة بنجاح.');
        });
    }
</script>
</body>
</html>