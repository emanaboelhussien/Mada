<div class="page-header-between">
    <h2 class="page-title">الفرص</h2>
    <button type="button" class="btn-add-opportunity" onclick="document.getElementById('oppForm').scrollIntoView({behavior: 'smooth'})">إضافة فرصة</button>
</div>
<div class="table-container mb-section">
    <table class="data-table">
        <thead>
            <tr>
                <th>العنوان</th>
                <th>النوع</th>
                <th>الجهة</th>
                <th>آخر موعد</th>
                <th>آخر تحقق</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($opportunities ?? [] as $opportunity)
                <tr>
                    <td>{{ $opportunity->title }}</td>
                    <td>{{ $opportunity->type }}</td>
                    <td>{{ $opportunity->organization_name }}</td>
                    <td>{{ optional($opportunity->deadline)->format('d/m/Y') ?? '-' }}</td>
                    <td>{{ optional($opportunity->last_verified_at)->format('d/m/Y') ?? '-' }}</td>
                    <td><span class="status-pill-open">{{ $opportunity->status }}</span></td>
                    <td>
                        <div class="text-actions">
                            <a href="javascript:void(0);" class="action-link delete" onclick="openDeleteModal('{{ route('admin.opportunities.destroy', $opportunity->id) }}')">حذف</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">لا توجد فرص مضافة حالياً.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div id="oppForm" class="form-card-wrapper">
    <div class="opportunity-form-card">
        <h3 class="form-card-title">نموذج الفرصة</h3>
        <form action="{{ route('admin.opportunities.store') }}" method="POST">
            @csrf
            <div class="admin-form-group">
                <label class="admin-label">نوع الفرصة</label>
                <input type="text" name="type" class="admin-input" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-label">العنوان</label>
                <input type="text" name="title" class="admin-input" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-label">الجهة</label>
                <input type="text" name="organization_name" class="admin-input" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-label">المجال</label>
                <input type="text" name="field" class="admin-input">
            </div>
            <div class="admin-form-group">
                <label class="admin-label">آخر موعد</label>
                <input type="date" name="deadline" class="admin-input">
            </div>
            <div class="form-card-actions">
                <button type="submit" class="btn-modal-confirm">حفظ الفرصة</button>
                <button type="reset" class="btn-modal-cancel">إلغاء</button>
            </div>
        </form>
    </div>
</div>