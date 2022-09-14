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
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Class List</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Class Name</th>
                        <th>Status</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($classes as $class )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $class->class_name }}</td>
                        <td>{{ $class->status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            @if($class->status ==  1)
                                <a href="{{ route('class.unpublished',$class->id) }}" class="btn btn-sm btn-warning float-left"><span class="fa fa-arrow-down" title="Unpublished"></span></a>
                           @else
                                <a href="{{ route('class.published',$class->id) }}" class="btn btn-sm btn-success float-left"><span class="fa fa-arrow-up" title="Published"></span></a>
                           @endif
                            <a href="{{ route('classes.edit',$class->id) }}" class="btn btn-sm btn-info float-left ml-2"><span class="fa fa-edit" title="Edit"></span></a>

                            <form action="{{ route('classes.destroy',$class->id) }}" method="post">
                                @csrf
                                @method('delete')
                            <button  class="btn btn-sm btn-danger" onclick="return confirm('If you want to delete this item,Press OK')"><span class="fa fa-trash" title="Delete"></span></button>
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
