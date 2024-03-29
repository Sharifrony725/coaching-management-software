@extends('admin.master')
@section('main_content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
             @include('admin.includes.alert')
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">All Running Student List</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive  text-center" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>School</th>
                            <th>Father's Name</th>
                            <th>Father's Mobile</th>
                            <th>Mother's Name</th>
                            <th>Mother's Mobile</th>
                            <th>SMS Mobile</th>
                            <th>Student ID</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($students as $student )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->class_name }}</td>
                        <td>{{ $student->school_name }}</td>
                        <td>{{ $student->father_name }}</td>
                        <td>{{ $student->father_mobile }}</td>
                        <td>{{ $student->mother_name }}</td>
                        <td>{{ $student->mother_mobile }}</td>
                        <td>{{ $student->sms_mobile }}</td>
                        <td>{{ $student->id }}</td>
                        <td>
                            {{-- @if($student->status ==  1)
                                <a href="#" class="btn btn-sm btn-warning float-left"><span class="fa fa-arrow-down" title="Unpublished"></span></a>
                           @else
                             <a href="#" class="btn btn-sm btn-success float-left"><span class="fa fa-arrow-up" title="Published"></span></a>
                           @endif --}}
                           <a href="{{ route('students.show',$student->id) }}" class="btn btn-sm btn-dark float-left ml-2" title="Details"><span class="fa fa-eye"></span></a>
                            <a href="#" class="btn btn-sm btn-info float-left ml-2" title="Edit"><span class="fa fa-edit"></span></a>
                            <form action="" method="post">
                                @csrf
                                @method('delete')
                            <button  class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('If you want to delete this item,Press OK')"><span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--Content End-->
@endsection
