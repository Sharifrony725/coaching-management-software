  @if (count($student_types) > 0)
      @php $i = 1; @endphp
      @foreach ($student_types as $student_type)
          <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $student_type->class_name }}</td>
              <td>{{ $student_type->student_type }}</td>
              <td>{{ $student_type->status == 1 ? 'Published' : 'Unpublished' }}</td>
              <td>
                  @if ($student_type->status == 1)
                      <button onclick="Unpublished('{{ $student_type->id }}')" class="btn btn-sm btn-warning float-left"><span class="fa fa-arrow-down"
                              title="Unpublished"></span></button>
                  @else
                      <button onclick="Published('{{ $student_type->id }}')" class="btn btn-sm btn-success float-left"><span class="fa fa-arrow-up"
                              title="Published"></span></button>
                  @endif
                  <button onclick="studentTypeEdit('{{ $student_type->id }}','{{  $student_type->student_type }}')" class="btn btn-sm btn-info float-left ml-2"><span class="fa fa-edit"
                          title="Edit"></span></button>

                  <form action="#" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-sm btn-danger mr-1"
                          onclick="return confirm('If you want to delete this item,Press OK')"><span class="fa fa-trash"
                              title="Delete"></span></button>
                  </form>
              </td>
          </tr>
      @endforeach
  @else
      <tr class="text-danger">
          <td colspan="5">Student Type Not Found...</td>
      </tr>
  @endif

