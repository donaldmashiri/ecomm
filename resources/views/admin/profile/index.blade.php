@extends('admin.layouts.master')


@section('content')

<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">

      <div class="row mt-sm-4">

        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form method="POST" class="needs-validation" action="{{ route('admin.profile.update')}}" enctype="multipart/form-data">
                @csrf
              <div class="card-header">
                <h4>Update Profile</h4>
              </div>
              <div class="card-body">

                  <div class="row">
                    <div class="form-group col-12">
                        <div>
                            <img src="{{ asset(Auth::user()->image)}}" alt="Profile Photo" class="rounded-circle profile-widget-picture">
                        </div>

                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                        <div class="invalid-feedback">
                          Please fill in the first name
                        </div>
                      </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" value="{{ Auth::user()->name}}" required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" value="{{ Auth::user()->email}}" required="">
                      <div class="invalid-feedback">
                        Please fill in the last name
                      </div>
                    </div>
                  </div>

              </div>

              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
