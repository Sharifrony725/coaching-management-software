@extends('admin.master')
@section('main_content')
<section class="container-fluid">
    <div class="row content registration-form">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Update User Info</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                   <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </div>
            </div>
            <form method="POST" action="{{ route('update.user.info') }}" enctype="multipart/form-data" class="form-inline">
            @csrf
                <div class="form-group col-12 mb-3">
                    <label for="name" class="col-sm-3 col-form-label text-right">Name</label>
                    <input type="hidden" name="user_id" value="{{ $user->id }}" >
                    <input id="name" type="text" class="col-sm-9 form-control" name="name" value="{{ $user->name }}" placeholder="Name" required>
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                    <input id="mobile" type="text" class="col-sm-9 form-control" name="mobile" value="{{ $user->mobile }}" placeholder="8801xxxxxxxxx" required>
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="email" class="col-sm-3 col-form-label text-right">E-Mail Address</label>
                    <input id="email" type="email" class="col-sm-9 form-control" name="email" value="{{ $user->email }}" placeholder="Email Address" required>
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

