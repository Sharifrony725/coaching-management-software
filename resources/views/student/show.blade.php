@extends('admin.master')
@section('main_content')
    <div class="row">
        <div class="col-12 pl-0 pr-0 content">
            @include('admin.includes.alert')
            <div class="form-group">
                <div class="col-sm-12">
                </div>
                <div class="row ml-0 mr-0">
                    <div class="col-md-3">
                        <h4 class="font-weight-bold text-center font-italic mt-3">Profile of {{ $student->student_name }}</h4>
                        <img width="100%"
                            src="{{ $student->student_photo ? asset('admin/assets/avatar/' . $student->student_photo) : asset('admin/assets/avatar/default.png') }}"
                            alt="Profile Picture" class="img-thumbnail">
                        <hr>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <a href="http://" class="btn btn-block my-btn-submit">Update Profile</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-9">
                        <div class="table-responsiv">
                            <table id="example" class="table  table-bordered">
                                <tr>
                                    <th>Student Name</th>
                                    <td>{{ $student->student_name ?? null }}</td>
                                </tr>
                                <tr>
                                    <th>Father's Name</th>
                                    <td>{{ $student->father_name }}</td>
                                </tr>
                                <tr>
                                    <th>Father's Profession</th>
                                    <td>{{ $student->father_profession }}</td>
                                </tr>
                                <tr>
                                    <th>Father's Mobile</th>
                                    <td>{{ $student->father_mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Mother's Name</th>
                                    <td>{{ $student->mother_name }}</td>
                                </tr>
                                <tr>
                                    <th>Mother's Profession</th>
                                    <td>{{ $student->mother_profession }}</td>
                                </tr>
                                <tr>
                                    <th>Mother's Mobile</th>
                                    <td>{{ $student->mother_mobile }}</td>
                                </tr>
                                <tr>
                                    <th>School Name</th>
                                    <td>{{ $student->school_name }}</td>
                                </tr>
                                <tr>
                                    <th>Class Name</th>
                                    <td>{{ $student->class_name }}</td>
                                </tr>
                                <tr>
                                    <th>SMS Mobile </th>
                                    <td>{{ $student->sms_mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Student Id </th>
                                    <td>{{ $student->id }}</td>
                                </tr>
                                <tr>
                                    <th>Password </th>
                                    <td>{{ $student->password }}</td>
                                </tr>
                                <tr>
                                    <th>E-Mail </th>
                                    <td>{{ $student->email_address ? $student->email_address : 'null@gmail.com' }}</td>
                                </tr>
                                <tr>
                                    <th>Address </th>
                                    <td>{{ $student->address }}</td>
                                </tr>
                                <tr>
                                    <th>Courses Info </th>
                                    <td>
                                         {{-- @foreach ($student as $data) --}}
                                         Course: {{ $student->student_type  ?? null}}, Batch: {{ $student->batch_name ?? null}}, Roll: {{ $student->roll ?? null}}
                                         {{-- @endforeach --}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
