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
            <tr>
                <td>متدرب تطوير ويب</td>
                <td>تدريب ميداني</td>
                <td>اسم الجهة</td>
                <td>15/12/2026</td>
                <td>28/10/2026</td>
                <td><span class="status-pill-open">مفتوحة</span></td>
                <td>
                    <div class="text-actions">
                        <a href="#oppForm" class="action-link">تعديل</a>
                        <span class="action-divider">/</span>
                       <a href="javascript:void(0);" class="action-link delete" onclick="openDeleteModal()">حذف</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div id="oppForm" class="form-card-wrapper">
    <div class="opportunity-form-card">
        <h3 class="form-card-title">نموذج الفرصة</h3>
        <form action="#" method="POST">
            @csrf
            <div class="admin-form-group"><label class="admin-label">نوع الفرصة</label><input type="text" class="admin-input"></div>
            <div class="admin-form-group"><label class="admin-label">العنوان</label><input type="text" class="admin-input"></div>
            <div class="admin-form-group"><label class="admin-label">الجهة</label><input type="text" class="admin-input"></div>
            <div class="admin-form-group"><label class="admin-label">المجال</label><input type="text" class="admin-input"></div>
            <div class="form-card-actions">
                <button type="submit" class="btn-modal-confirm">حفظ الفرصة</button>
                <button type="reset" class="btn-modal-cancel">إلغاء</button>
            </div>
        </form>
    </div>
</div>