<thead>
    <tr>
        <th>Sl.</th>
        <th>Batch Name</th>
        <th>Student's Capacity</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>


    @php($i = 1)
    @foreach($batches as $batch)
    <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $batch->batch_name }}</td>
        <td>{{ $batch->student_capacity }}</td>
        <td>{{ $batch->status == 1 ? 'Published' : 'Unpublished' }}</td>
        <td>
            @if ($batch->status == 1)
                <button onclick='ubpublished("{{ $batch->id }}",{{ $batch->class_id }})' class="btn btn-sm btn-warning float-left">
                    <span class="fa fa-arrow-down" title="Unpublished"></span>
                </button>
            @else
                <button onclick='published("{{ $batch->id }}",{{ $batch->class_id }})' class="btn btn-sm btn-success float-left">
                    <span class="fa fa-arrow-up" title="Published"></span>
                </button>
            @endif
            <a href="{{ route('batches.edit' ,$batch->id) }}" class="btn btn-sm btn-info float-left ml-2">
                <span class="fa fa-edit" title="Edit"></span>
            </a>
            <button class="btn btn-sm btn-danger ml-2" onclick='batchDelete("{{ $batch->id }}",{{ $batch->class_id }})'>
                <span class="fa fa-trash" title="Delete"></span>
            </button>
        </td>
    </tr>
 @endforeach
</tbody>
<script>
    function ubpublished(batchId , classId) {
        var check = confirm('If you want to unpublish this item, press OK');
        if(check){
             $.get("{{route('batch.unpublished')}}", {batch_id:batchId , class_id:classId} ,function(data){
             $('#batch_list').html(data);
            })
        }else{
            return false;
        }
    }
    function published(batchId , classId) {
        var check = confirm('If you want to publish this item, press OK');
        if(check){
             $.get("{{route('batch.published')}}", {batch_id:batchId , class_id:classId} ,function(data){
             $('#batch_list').html(data);
            })
        }
    }
//delete
    function batchDelete(batchId , classId) {
        var check = confirm('If you want to delete this item, press OK');
        if(check){
             $.get("{{route('batch.delete')}}", {batch_id:batchId , class_id:classId} ,function(data){
             $('#batch_list').html(data);
            })
        }
    }


</script>
