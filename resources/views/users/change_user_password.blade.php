@extends('admin.master')
@section('main_content')
    <section class="container-fluid">
        <div class="row content registration-form">
            <div class="col-12 pl-0 pr-0">
                @if (Session::get('error_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Error :</strong> {{ Session::get('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Change Your Password</h4>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </div>
                </div>
                <form method="POST" action="{{ route('update.user.password') }}" class="form-inline">
                    @csrf
                    <div class="form-group col-12 mb-3">
                        <label for="password" class="col-sm-3 col-form-label text-right">Old Password</label>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input id="password" type="password" class="col-sm-9 form-control" name="password"
                            placeholder="Old Password" required>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="new_password" class="col-sm-3 col-form-label text-center">New Password</label>
                        <input id="new_password" type="password" class="col-sm-9 form-control" name="new_password"
                            placeholder="New Password" required>
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
