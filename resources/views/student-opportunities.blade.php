<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التدريب و المنح - منصة مدى</title>
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
            <a href="{{ route('student.exam') }}" class="nav-item">
                <i class="far fa-check-square"></i>
                <span>الاختبار</span>
            </a>
            <a href="{{ route('student.opportunities') }}" class="nav-item active">
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
        <header class="dashboard-header">
            <h1>التدريب و المنح</h1>
        </header>

        <!-- قسم البحث والتصفية (Filters) -->
        <div class="filter-section">
            <div class="search-box">
                <input type="text" id="oppSearchInput" class="search-input" placeholder="ابحث عن فرصة" oninput="applyOppFilters()">
            </div>

            <div class="filter-controls">
                <div class="filter-tabs">
                    <button type="button" class="filter-tab active" onclick="setTypeFilter('all', this)">الكل</button>
                    <button type="button" class="filter-tab" onclick="setTypeFilter('تدريب ميداني', this)">تدريب ميداني</button>
                    <button type="button" class="filter-tab" onclick="setTypeFilter('منح', this)">منح</button>
                </div>

                <div class="filter-select-group">
                    <select id="oppFieldSelect" class="filter-select">
                        <option value="">المجال، الحالة: مفتوحة/مغلقة</option>
                        <option value="تطوير الويب">تطوير الويب - مفتوحة</option>
                        <option value="الذكاء الاصطناعي">الذكاء الاصطناعي - مفتوحة</option>
                        <option value="closed">مغلقة</option>
                    </select>
                    <button type="button" class="btn-apply-filter" onclick="applyOppFilters()">تطبيق</button>
                </div>
            </div>
        </div>

        <!-- شبكة بطاقات الفرص -->
        <div class="opportunities-grid" id="opportunitiesGrid">
            @forelse ($opportunities ?? [] as $opportunity)
                @php
                    $isOpen = ($opportunity->status ?? 'مفتوحة') === 'مفتوحة';
                @endphp
                <div class="opp-card"
                     data-title="{{ mb_strtolower($opportunity->title . ' ' . $opportunity->organization_name . ' ' . ($opportunity->field ?? '')) }}"
                     data-type="{{ $opportunity->type }}"
                     data-field="{{ $opportunity->field ?? '' }}"
                     data-status="{{ $isOpen ? 'open' : 'closed' }}">
                    <div class="opp-badges">
                        <span class="badge badge-type">{{ $opportunity->type }}</span>
                        <span class="badge {{ $isOpen ? 'badge-open' : 'badge-closed' }}">
                            {{ $opportunity->status ?? 'مفتوحة' }}
                        </span>
                    </div>
                    <h3 class="opp-title">{{ $opportunity->title }}</h3>
                    <div class="opp-meta">
                        <p>
                            الجهة: {{ $opportunity->organization_name }}
                            @if (!empty($opportunity->field))
                                ، المجال: {{ $opportunity->field }}
                            @endif
                        </p>
                        <p>آخر موعد للتقديم: {{ optional($opportunity->deadline)->format('d/m/Y') ?? 'غير محدد' }}</p>
                        <p>آخر تحقق: {{ optional($opportunity->last_verified_at)->format('d/m/Y') ?? optional($opportunity->created_at)->format('d/m/Y') }}</p>
                    </div>
                    <div class="opp-footer">
                        <a href="javascript:void(0);" class="btn-details">التفاصيل</a>
                    </div>
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; padding: 2rem;">
                    لا توجد فرص تدريب أو منح متاحة حالياً.
                </p>
            @endforelse
        </div>
    </main>
</div>

<script>
    let selectedOppType = 'all';

    function setTypeFilter(type, btn) {
        selectedOppType = type;
        document.querySelectorAll('.filter-tabs .filter-tab').forEach(tab => tab.classList.remove('active'));
        btn.classList.add('active');
        applyOppFilters();
    }

    function applyOppFilters() {
        const searchTerm = (document.getElementById('oppSearchInput').value || '').trim().toLowerCase();
        const selectVal = document.getElementById('oppFieldSelect').value;

        document.querySelectorAll('#opportunitiesGrid .opp-card').forEach(card => {
            const titleText = card.dataset.title || '';
            const cardType = card.dataset.type || '';
            const cardField = card.dataset.field || '';
            const cardStatus = card.dataset.status || '';

            const matchesSearch = !searchTerm || titleText.includes(searchTerm);
            const matchesType = selectedOppType === 'all'
                || (selectedOppType === 'منح' ? cardType.includes('منح') : cardType === selectedOppType);

            let matchesSelect = true;
            if (selectVal === 'closed') {
                matchesSelect = (cardStatus === 'closed');
            } else if (selectVal) {
                matchesSelect = (cardField === selectVal && cardStatus === 'open');
            }

            card.style.display = (matchesSearch && matchesType && matchesSelect) ? '' : 'none';
        });
    }
</script>

</body>
</html>