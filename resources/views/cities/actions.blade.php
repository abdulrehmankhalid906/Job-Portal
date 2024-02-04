<a href="{{ route('cities.edit', $row->id) }}" class="btn btn-sm btn-success btn-icon waves-effect waves-light">
    <i class="fa-solid fa-pencil"></i>
</a>
<a href="{{ route('cities.destroy', $row->id) }}" data-rowid="{{ $row->id }}" data-table="cities-data-table"
    class="btn btn-sm btn-danger btn-icon waves-effect waves-light">
    <i class="fa-solid fa-trash"></i>
</a>
