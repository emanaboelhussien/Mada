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
            @forelse ($questions ?? [] as $question)
                <tr>
                    <td>{{ $question->question_text }}</td>
                    <td>{{ $question->field }}</td>
                    <td>{{ $question->skill }}</td>
                    <td>{{ $question->difficulty }}</td>
                    <td>
                        <div class="text-actions">
                            <form method="POST" action="{{ route('admin.questions.destroy', $question->id) }}" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذا السؤال؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-link delete" style="background:none;border:none;cursor:pointer;padding:0;">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">لا توجد أسئلة مضافة حالياً.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div id="qForm" class="form-card-wrapper">
    <div class="opportunity-form-card">
        <form action="{{ route('admin.questions.store') }}" method="POST">
            @csrf
            <div class="admin-form-group">
                <label class="admin-label">المجال</label>
                <input type="text" name="field" class="admin-input" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-label">المهارة</label>
                <input type="text" name="skill" class="admin-input" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-label">مستوى الصعوبة</label>
                <input type="text" name="difficulty" class="admin-input" value="متوسط">
            </div>
            <div class="admin-form-group">
                <label class="admin-label">نص السؤال</label>
                <input type="text" name="question_text" class="admin-input" required>
            </div>
            <div class="form-card-actions">
                <button type="submit" class="btn-modal-confirm">حفظ السؤال</button>
                <button type="reset" class="btn-modal-cancel">إلغاء</button>
            </div>
        </form>
    </div>
</div>