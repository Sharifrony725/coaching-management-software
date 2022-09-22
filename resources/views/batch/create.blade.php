@extends('admin.master')
@section('main_content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">
@include('admin.includes.alert')
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Add Batch</h4>
                    </div>
                </div>
         <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('batches.store') }}" method="post">
                    @csrf
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
                                                @foreach ($classes as $class )
                                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="typeId" class="col-form-label col-sm-3 text-right">
                                            Student Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="student_type_id" id="typeId" required autofocus>
                                                <option style="display: none">---Select Type---</option>
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
                                            <input type="text"
                                                class="form-control"
                                                name="batch_name" value="{{ old('batch_name') }}" id="batch_name"
                                                placeholder="Write batch name here">
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
                                            <input type="text"
                                                class="form-control"
                                                name="student_capacity" value="{{ old('student_capacity') }}" id="studentCapacity"
                                                placeholder="Write student capacity here">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="description" class="col-form-label col-sm-3 text-right"
                                            for="title">Publication Status</label>
                                        <div class="col-sm-9 text-left">
                                            <div class="form-check col-form-label">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="1">
                                                <label class="form-check-label">Published</label>
                                            </div>
                                            <div class="form-check col-form-label">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="2">
                                                <label class="form-check-label">Unpublished</label>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                             <tr>
                                <td><button type="submit" class="btn btn-block my-btn-submit">Save</button></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
    <style>
        #overlay .loader{
            display: none;
        }
    </style>
    @include('admin.includes.loader')
    <script>
        $('#classId').change(function () {
           let classId = $(this).val();
           if(classId){
              $('#overlay .loader').show();
            $.get("{{ route('class.wise.student.type') }}" , {class_id:classId},function (data) {
                 $('#overlay .loader').hide();
                console.log(data);
                $('#typeId').empty().html(data);
            })
           }else{

           }
        })
    </script>
@endsection

