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
    @include('student_type.modal.add_form')
    @include('student_type.modal.edit_form')
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
     });
    // Unpublished
     function Unpublished(id) {
        $.get("{{ route('student.type.unpublished') }}",{type_id:id},function (data) {
           // console.log(data)
           $('#studentTypeTable').empty().html(data);
        });
    }
    //published
    function Published(id) {
        $.get("{{ route('student.type.published') }}",{type_id:id},function (data) {
           // console.log(data)
           $('#studentTypeTable').empty().html(data);
        });
    }
    //student Type Edit
     function studentTypeEdit(id , name) {
        $('#studentTypeEditModal').find('#student_type').val(name);
        $('#studentTypeEditModal').find('#typeId').val(id);
        $('#studentTypeEditModal').modal('show');
    }
    $('#studentTypeUpdate').submit(function (e) {
        e.preventDefault();
        let url = $(this).attr('action');
            let data = $(this).serialize();
            let method = $(this).attr('method');
            $('#studentTypeEditModal #reset').click();
            $('#studentTypeEditModal').modal('hide');
            $.ajax({
                data : data,
                type : method,
                url  : url,
                success : function (data) {
                    $('#studentTypeTable').empty().html(data);
            }
        })
    })
    //Student Type Delete
    function  studentTypeDelete(id) {
        let message = 'If you want to delete this item, press OK ';
        if(confirm(message)){
                $.get("{{ route('student.type.delete') }}",{type_id:id},function (data) {
                    //console.log(data);
                $('#studentTypeTable').empty().html(data);
            });
        }
    }
    </script>
<!-- Ajax End-->

@endsection
