@extends('admin.master')
@section('main_content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Message : </strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="form-group">
                    <div class="float-right mb-2 mr-5">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                            Student Type</button>
                    </div>
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3" data-toggle="modal"
                            data-target="#studentTypeAddModal">Student Type List</h4>
                    </div>

                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center"
                        style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Class Name</th>
                                <th>Student type</th>
                                <th>Status</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="studentTypeTable">
                          @include('student_type.student_type_list')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--Content End-->

    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="studentTypeAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Student Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
             <form action="{{ route('student.type.store') }}" method="post" id="studentTypeStore">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
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
                        <div class="form-group row">
                                <label for="studentType" class="col-form-label col-sm-3 text-right">
                                    Student Type</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="student_type" value="{{ old('student_type') }}"
                                        id="student_type" placeholder="Write student type here">
                                </div>
                            </div>
                    </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" id="reset">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Modal End -->
<!-- Ajax Start-->
    <script>
        $("#studentTypeStore").submit(function (e){
            e.preventDefault();
            let url = $(this).attr('action');
            let data = $(this).serialize();
            let method = $(this).attr('method');
            $('#studentTypeAddModal #reset').click();
            $('#studentTypeAddModal').modal('hide');
            $.ajax({
                data : data,
                type : method,
                url  : url,
                success : function () {
                    $.get("{{ route('student.type.list') }}",function (data) {
                        $('#studentTypeTable').empty().html(data);
                  })
                }
            })
     })
    </script>
<!-- Ajax End-->

@endsection
