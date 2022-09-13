@extends('admin.master')
@section('main_content')
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
             @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Message:</strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Edit Header & Footer Info...</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                   <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </div>
            </div>
            <form method="POST" action="{{ route('update.header.footer') }}" class="form-inline">
            @csrf
                <div class="form-group col-12 mb-3">
                    <label for="title" class="col-sm-3 col-form-label text-right">Title</label>
                    <input type="hidden" name="id" value="{{ $header_footer->id }}">
                    <input id="title" type="text" class="col-sm-9 form-control" name="title" value="{{ $header_footer->title }}" placeholder="Title" required>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="sub_title" class="col-sm-3 col-form-label text-right">Sub Title</label>
                    <input id="sub_title" type="text" class="col-sm-9 form-control" name="sub_title" value="{{ $header_footer->sub_title }}" placeholder="Sub Title" required>
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="mobile" class="col-sm-3 col-form-label text-right">Address</label>
                    <input id="address" type="text" class="col-sm-9 form-control" name="address" value="{{ $header_footer->address }}" placeholder="Address" required>
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                    <input id="mobile" type="text" class="col-sm-9 form-control" name="mobile" value="{{ $header_footer->mobile }}" placeholder="8801xxxxxxxxx" required>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="copy_right" class="col-sm-3 col-form-label text-right">Copy Right</label>
                    <input id="copy_right" type="text" class="col-sm-9 form-control" name="copy_right" value="{{ $header_footer->copy_right }}" placeholder="Copy Right" required>
                </div>
                 <div class="form-group col-12 mb-3">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>

                    <select name="status" class="form-control col-sm-9" id="status">
                        <option value="" style="display:none">Select Status</option>
                         @if($header_footer->status == 'Active')
                             <option value="active" selected>Active</option>
                              <option value="inactive">Inactive</option>
                        @else
                         <option value="active">Active</option>
                            <option value="inactive" selected>Inactive</option>
                        @endif
                    </select>
                </div>

                <div class="form-group col-12 mb-3">
                    <label class="col-sm-3"></label>
                    <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

