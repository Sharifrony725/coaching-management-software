@if(count($types)>0)
@foreach ($types as $type)
<input type="checkbox" class="mr-2" name="student_type[{{ $type->id }}]" id="" value="{{ $type->id }}">{{ $type->student_type }}
@endforeach
@else
<span class="text-danger">Please Add Some Type First</span>
@endif
