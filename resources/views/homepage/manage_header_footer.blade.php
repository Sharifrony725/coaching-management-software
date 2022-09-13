@extends('admin.master')
@section('main_content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
            @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Message:</strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Manage Header & Footer</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Copyright</th>
                        <th>Status</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    <tr>
                        <td>{{ $i++  ?? null }}</td>
                        <td>{{ $header_footer_info->title ?? null }}</td>
                        <td>{{ $header_footer_info->sub_title ?? null }}</td>
                        <td>{{ $header_footer_info->address ?? null }}</td>
                        <td>{{ $header_footer_info->mobile ?? null }}</td>
                        <td>{{ $header_footer_info->copy_right ?? null }}</td>
                        <td>{{ $header_footer_info->status ?? null }}</td>
                        <td>
                            <a href="{{ route('edit.header.footer',$header_footer_info->id) }}" class="btn btn-sm btn-info float-left"><span class="fa fa-edit"></span></a>
                            <form action="{{ route('delete.header.footer',$header_footer_info->id) }}" method="post">
                                @csrf
                                @method('delete')
                            <button  class="btn btn-sm btn-danger mr-5"><span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--Content End-->
@endsection
