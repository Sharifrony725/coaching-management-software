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
                    <h4 class="text-center font-weight-bold font-italic mt-3">School List</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>School Name</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($schools as $school )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $school->school_name }}</td>
                        <td>
                            <a href="{{ route('schools.edit',$school->id) }}" class="btn btn-sm btn-info float-left ml-3"><span class="fa fa-edit"></span></a>

                            <form action="{{ route('schools.destroy',$school->id) }}" method="post">
                                @csrf
                                @method('delete')
                            <button  class="btn btn-sm btn-danger float-left ml-3"><span class="fa fa-trash"></span></button>
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
