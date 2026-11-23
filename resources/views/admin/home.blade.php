@if (session('status'))
    <div class="alert-success" style="margin-bottom: 1rem;">
        {{ session('status') }}
    </div>
@endif

<div class="admin-stats-grid">
    <div class="admin-stat-card">
        <span class="stat-label">جهات بانتظار المراجعة</span>
        <strong class="stat-number">{{ $pendingEntitiesCount ?? 0 }}</strong>
    </div>
    <div class="admin-stat-card">
        <span class="stat-label">فرص مفتوحة</span>
        <strong class="stat-number">18</strong>
    </div>
    <div class="admin-stat-card">
        <span class="stat-label">طلاب مسجلون</span>
        <strong class="stat-number">{{ $studentsCount ?? 0 }}</strong>
    </div>
    <div class="admin-stat-card">
        <span class="stat-label">أسئلة الاختبار</span>
        <strong class="stat-number">60</strong>
    </div>
</div>