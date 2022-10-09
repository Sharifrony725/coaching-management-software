@extends('admin.master')
@section('main_content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                @include('admin.includes.alert')
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Class Wise Student List</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <td>
                            <div class="form-group row mb-0">
                                <label for="classId" class="col-form-label col-sm-3 text-right">
                                    Class Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="class_id" id="classId" required autofocus>
                                        <option style="display: none">---Select Class---</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </td>
                    </div>
                    <div class="col-md">
                        <td>
                            <div class="form-group row mb-0">
                                <label for="typeId" class="col-form-label col-sm-3 text-right">
                                    Student Type</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="student_type_id" id="typeId" required autofocus>

                                    </select>
                                </div>
                            </div>
                        </td>
                    </div>
             </div>
            </div>
        </div>
    </section>
    <!--Content End-->
        @include('admin.includes.loader')
    <style>
        #overlay .loader{
            display: none;
        }
    </style>
    <script>
        $('#classId').change(function() {
            let classId = $(this).val();
            if(classId){
                $('#overlay .loader').show();
                $.get("{{ route('class.wise.student.type.list') }}",{ class_id:classId },function(data){
                     console.log(data);
                    $('#typeId').empty().html(data)
                    $('#overlay .loader').hide();
                })
            }
        });
        $('#typeId').change(function() {
           let classId = $(this).val();
            let typeId = $(this).val();
            if(classId && typeId){
                $('#overlay .loader').show();
                $.get("{{ route('class.and.type.wise.student.list') }}",{ class_id:classId,type_id:typeId },function(data){
                     console.log(data);
                    $('#overlay .loader').hide();
                })
            }
        })
    </script>
@endsection
