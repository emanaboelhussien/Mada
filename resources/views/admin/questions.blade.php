<div class="page-header-between">
    <h2 class="page-title">أسئلة الاختبار</h2>
    <button type="button" class="btn-add-opportunity" onclick="document.getElementById('qForm').scrollIntoView({behavior: 'smooth'})">إضافة سؤال</button>
</div>
<div class="filter-tabs">
    <button type="button" class="filter-tab active">المجال</button>
    <button type="button" class="filter-tab">المهارة</button>
    <button type="button" class="filter-tab">مستوى الصعوبة</button>
</div>
<div class="table-container mb-section">
    <table class="data-table">
        <thead>
            <tr>
                <th>نص السؤال</th>
                <th>المجال</th>
                <th>المهارة</th>
                <th>الصعوبة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ما وسم HTML المستخدم لإنشاء رابط؟[cite: 8]</td>
                <td>تطوير الويب</td>
                <td>HTML, CSS</td>
                <td>سهل</td>
                <td>
                    <div class="text-actions">
                        <a href="#qForm" class="action-link">تعديل</a>
                        <span class="action-divider">/</span>
                        <a href="#" class="action-link delete">حذف</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div id="qForm" class="form-card-wrapper">
    <div class="opportunity-form-card">
        <form action="#" method="POST">
            @csrf
            <div class="admin-form-group"><label class="admin-label">المجال</label><input type="text" class="admin-input"></div>
            <div class="admin-form-group"><label class="admin-label">المهارة</label><input type="text" class="admin-input"></div>
            <div class="admin-form-group"><label class="admin-label">نص السؤال</label><input type="text" class="admin-input"></div>
            <div class="form-card-actions">
                <button type="submit" class="btn-modal-confirm">حفظ السؤال</button>
                <button type="reset" class="btn-modal-cancel">إلغاء</button>
            </div>
        </form>
    </div>
</div>