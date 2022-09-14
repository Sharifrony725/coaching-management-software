<thead>
    <tr>
        <th>Sl.</th>
        <th>Batch Name</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @php($si = 1)
    @foreach($batche as $batch)
    <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $batch->batch_name }}</td>
        <td>
            @if ($batch->status == 1)
                <a href="{{ route('batch.unpublished', $batch->id) }}" class="btn btn-sm btn-warning float-left"><span
                        class="fa fa-arrow-down" title="Unpublished"></span></a>
            @else
                <a href="{{ route('batch.published', $batch->id) }}" class="btn btn-sm btn-success float-left"><span
                        class="fa fa-arrow-up" title="Published"></span></a>
            @endif
            <a href="{{ route('batch.edit', $batch->id) }}" class="btn btn-sm btn-info float-left ml-2"><span
                    class="fa fa-edit" title="Edit"></span></a>

            <form action="{{ route('batch.destroy', $batch->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger"
                    onclick="return confirm('If you want to delete this item,Press OK')"><span class="fa fa-trash"
                        title="Delete"></span></button>
            </form>
        </td>
    </tr>
 @endforeach
</tbody>
