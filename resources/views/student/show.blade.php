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
                        <h4 class="font-weight-bold text-center font-italic mt-3">Profile of {{ $student->student_name }}
                        </h4>
                        <img width="100%"
                            src="{{ $student->student_photo ? asset('admin/assets/avatar/' . $student->student_photo) : asset('admin/assets/avatar/default.png') }}"
                            alt="Profile Picture" class="img-thumbnail">
                        <hr>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <button data-target="#studentBasicInfoUpdate" data-toggle="modal" class="btn btn-block my-btn-submit">Edit Profile</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-9">
                        @include('student.basic_info')
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    {{-- modal --}}
    @include('student.edit')
@endsection

