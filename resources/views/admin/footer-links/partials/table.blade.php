<section class="admin-card professional-card">
    <div class="admin-card-header">
        <div>
            <p class="admin-eyebrow">{{ $eyebrow }}</p>
            <h2>{{ $title }}</h2>
        </div>
        <span class="admin-chip">{{ $items->count() }} items</span>
    </div>

    <div class="admin-table-wrap professional-table">
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Icon</th>
                    <th>Label</th>
                    <th>Handle</th>
                    <th>URL</th>
                    <th>Note</th>
                    <th>Class</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Save</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @forelse($items as $item)
                    <tr>
                        <form method="POST" action="{{ route('admin.footer-links.update', $item) }}">
                            @csrf
                            @method('PUT')

                            <td>
                                <select name="type">
                                    <option value="quick" {{ $item->type === 'quick' ? 'selected' : '' }}>Quick</option>
                                    <option value="social" {{ $item->type === 'social' ? 'selected' : '' }}>Social</option>
                                    <option value="legal" {{ $item->type === 'legal' ? 'selected' : '' }}>Legal</option>
                                </select>
                            </td>

                            <td>
                                <input name="icon" value="{{ $item->icon }}" placeholder="💜" style="min-width:70px;">
                            </td>

                            <td>
                                <input name="label" value="{{ $item->label }}" required style="min-width:150px;">
                            </td>

                            <td>
                                <input name="handle" value="{{ $item->handle }}" placeholder="@handle" style="min-width:150px;">
                            </td>

                            <td>
                                <input name="url" value="{{ $item->url }}" placeholder="https:// or /page" style="min-width:240px;">
                            </td>

                            <td>
                                <textarea name="note" rows="2" style="min-width:220px;">{{ $item->note }}</textarea>
                            </td>

                            <td>
                                <input name="css_class" value="{{ $item->css_class }}" placeholder="instagram" style="min-width:120px;">
                            </td>

                            <td>
                                <input type="number" name="sort_order" value="{{ $item->sort_order }}" min="0" style="min-width:80px;">
                            </td>

                            <td>
                                <label class="check-row">
                                    <input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }}>
                                    Active
                                </label>
                            </td>

                            <td>
                                <button>Save</button>
                            </td>
                        </form>

                        <td>
                            <form method="POST" action="{{ route('admin.footer-links.destroy', $item) }}" onsubmit="return confirm('Delete this footer item?')">
                                @csrf
                                @method('DELETE')
                                <button class="danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11">No footer items found yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
