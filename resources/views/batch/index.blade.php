@extends('admin.master')
@section('main_content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-2 pl-0 pr-0">
                @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Message : </strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Class Wise Batch List</h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center"
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
                                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
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
    <!-- Script Start -->
        <script>
            $('#classId').change(function() {
                 var id = $(this).val();
                 if(id){
                        $.get("{{route('batch.list.byajax')}}", {id:id} ,function(data){
                            $('#batch_list').html(data);
                        })
                    }
                 })
        </script>
    <!-- Script End -->
    @endsection
