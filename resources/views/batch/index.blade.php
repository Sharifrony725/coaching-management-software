@extends('admin.master')
@section('main_content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-12 pl-0 pr-0">
              @include('admin.includes.alert')
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Class & Type Wise Batch List</h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center"
                        style="width: 100%;">
                        <tr>
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
                                                    <option style="display: none">---Select Type---</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </div>
                            </div>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-cnter" id="batch_list">

                    </table>
                </div>
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
    <!-- Script Start -->
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
            $('#typeId').change(function() {
                 let studentTypeId = $(this).val();
                 let classId = $('#classId ').val();
                 if(classId && studentTypeId){
                      $('#overlay .loader').show();
                        $.get("{{route('batch.list.byajax')}}", {
                            'class_id':classId,
                            'student_type_id':studentTypeId
                        } ,function(data){
                            $('#overlay .loader').hide();
                            $('#batch_list').html(data);
                        })
                    }
                 })
        </script>
    <!-- Script End -->
    @endsection
