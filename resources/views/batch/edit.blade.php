@extends('admin.master')
@section('main_content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">
               @include('admin.includes.alert')
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Edit Batch</h4>
                    </div>
                </div>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('batches.update', $batch->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center"
                            style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="classId" class="col-form-label col-sm-3 text-right">
                                            Class Name</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="class_id" id="classId" required autofocus>
                                                <option style="display: none">---Select Class---</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}"
                                                        {{ $class->id == $batch->class_id ? 'selected' : '' }}>
                                                        {{ $class->class_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="classId" class="col-form-label col-sm-3 text-right">
                                            Student type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="student_type_id" id="classId" required autofocus>
                                                <option style="display: none">---Select Type---</option>
                                                @foreach ($student_types as $student_type)
                                                    <option value="{{ $student_type->id }}"
                                                        {{ $student_type->id == $batch->student_type_id ? 'selected' : '' }}>
                                                        {{ $student_type->student_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="batch_name" class="col-form-label col-sm-3 text-right">
                                            Batch Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="batch_name"
                                                value="{{ $batch->batch_name }}" id="batch_name">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="studentCapacity" class="col-form-label col-sm-3 text-right">
                                            Student Capacity</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="student_capacity"
                                                value="{{ $batch->student_capacity }}" id="studentCapacity">
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><button type="submit" class="btn btn-block my-btn-submit">Update</button></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection
