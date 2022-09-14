@extends('admin.master')
@section('main_content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">

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
                        <h4 class="text-center font-weight-bold font-italic mt-3">Add Class</h4>
                    </div>
                </div>
         <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('classes.store') }}" method="post">
                    @csrf
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center"
                            style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="class_name" class="col-form-label col-sm-3 text-right">
                                            Class Name</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control"
                                                name="class_name" value="{{ old('class_name') }}" id="class_name"
                                                placeholder="Write class name here">
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
@endsection

