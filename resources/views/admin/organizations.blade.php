<div class="page-header-row">
    <h2 class="page-title">الجهات</h2>
</div>
<div class="filter-tabs">
    <button type="button" class="filter-tab active" onclick="filterEntities('pending', this)">قيد المراجعة</button>
    <button type="button" class="filter-tab" onclick="filterEntities('approved', this)">مفعّلة</button>
</div>
<div class="table-container">
    <table class="data-table">
        <thead>
            <tr>
                <th>اسم الجهة</th>
                <th>النوع</th>
                <th>البريد</th>
                <th>الرابط الرسمي</th>
                <th>تاريخ الطلب</th>
                <th>الإجراء</th>
            </tr>
        </thead>
        <tbody id="entitiesTableBody">
            @forelse ($entities ?? [] as $entity)
                @php
                    $isApproved = (bool) ($entity->is_approved ?? false);
                @endphp
                <tr class="entity-row" data-status="{{ $isApproved ? 'approved' : 'pending' }}">
                    <td>{{ $entity->entity_name ?? $entity->name }}</td>
                    <td>{{ $entity->entity_type ?? '-' }}</td>
                    <td>{{ $entity->email }}</td>
                    <td>
                        @if (!empty($entity->website))
                            <a href="{{ str_starts_with($entity->website, 'http') ? $entity->website : 'https://' . $entity->website }}" target="_blank" rel="noopener">
                                {{ $entity->website }}
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ optional($entity->created_at)->format('d/m/Y') ?? '-' }}</td>
                    <td>
                        @if (!$isApproved)
                            <div class="action-buttons">
                                <button type="button" class="btn-accept" onclick="openApproveModal({{ $entity->id }})">قبول</button>
                                <button type="button" class="btn-reject">رفض</button>
                            </div>
                        @else
                            <span style="color: #2F855A; font-weight: 700;">مفعّلة</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">لا توجد جهات مسجلة حالياً.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function filterEntities(status, btn) {
        document.querySelectorAll('.filter-tabs .filter-tab').forEach(tab => tab.classList.remove('active'));
        btn.classList.add('active');

        document.querySelectorAll('.entity-row').forEach(row => {
            row.style.display = (row.dataset.status === status) ? '' : 'none';
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const activeTab = document.querySelector('.filter-tabs .filter-tab.active');
        if (activeTab) {
            filterEntities('pending', activeTab);
        }
    });
</script>