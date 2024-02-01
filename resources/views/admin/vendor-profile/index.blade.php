@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
      <h1>Vendor Profile</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4> Update Vendor Profile</h4>
            </div>

        
            <div class="card-body">
                <form method="POST" action="{{route('admin.vendor-profile.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="from-group">
                        <label>Preview</label><br>
                        <img src="{{asset($profile->banner)}}" alt="">
                    </div>

                    <div class="from-group">
                      <label>Banner</label>
                         <input type="file" name="banner" class="form-control">
                  </div>

                    <div class="from-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$profile->phone}}">
                    </div>

                    <div class="from-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" value="{{$profile->email}}">
                  </div>

                    <div class="from-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{$profile->address}}">
                    </div>

                    <div class="from-group">
                        <label>Description</label>
                        <textarea class="summernote"name="description">{{$profile->description}}</textarea>
                    </div>

                    <div class="from-group">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="fb_link" value="{{$profile->fb_link}}">
                    </div>

                    <div class="from-group">
                        <label>Twitter</label>
                        <input type="text" class="form-control" name="tw_link" value="{{$profile->tw_link}}">
                    </div>

                    <div class="from-group">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="insta_link" value="{{$profile->insta_link}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            
            </div>
            
          </div>
        </div>
      
      </div>

    </div>
  </section>
    
@endsection 