@extends('admin.master')
@section('main_content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
              @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Message : </strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Sliders List</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Slide Title</th>
                        <th>Slide Description</th>
                        <th>Slide Status</th>
                        <th>Slide Image</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($sliders as $slider )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $slider->slide_title }}</td>
                        <td>{{ $slider->slide_description }}</td>
                        <td>
                            {{ $slider->status ==  1 ? 'Published' :'Unpublished' }}
                        </td>
                        <td>
                            <img src="{{ asset('/').$slider->slide_image}}" width="100px" height="50px" alt="">
                        </td>

                        <td>
                            @if($slider->status ==  1)
                                <a href="{{ route('slider.unpublished',$slider->id) }}" class="btn btn-sm btn-warning float-left"><span class="fa fa-arrow-down" title="Unpublished"></span></a>
                           @else
                             <a href="{{ route('slider.published',$slider->id) }}" class="btn btn-sm btn-success float-left"><span class="fa fa-arrow-up" title="Published"></span></a>
                           @endif
                            <a href="{{ route('edit.slider',$slider->id) }}" class="btn btn-sm btn-info float-left ml-2"><span class="fa fa-edit"></span></a>
                            <form action="{{ route('delete.slider',$slider->id) }}" method="post">
                           @csrf
                                @method('delete')
                            <button  class="btn btn-sm btn-danger" onclick="return confirm('If you want to delete this item,Press OK')"><span class="fa fa-trash"></span></button>
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
