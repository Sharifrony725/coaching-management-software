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
                        <h4 class="text-center font-weight-bold font-italic mt-3">Edit School</h4>
                    </div>
                </div>
         <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('schools.update',$school->id) }}" method="post">
                   @csrf
                    @method('PUT')
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center"
                            style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="school_name" class="col-form-label col-sm-3 text-right">
                                            School Name</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control"
                                                name="school_name" value="{{ $school->school_name }}" id="school_name"
                                                placeholder="Write school name here">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                             <tr>
                                <td><button type="submit" class="btn btn-block my-btn-submit">Update</button></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection

