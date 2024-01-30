@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
      <h1>Brand</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Brand</h4>
            </div>

        
            <div class="card-body">
                <form method="POST" action="{{route('admin.brand.update', $brand->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="from-group">
                        <img src="{{asset($brand->logo)}}" width="100"><br>
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control">
                    </div>
                    <div class="from-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$brand->name}}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Is Featured</label>
                        <select id="inputState" class="form-control" name="is_featured">
                          <option value="">Select</option>
                          <option {{$brand->is_featured==1? 'selected': ''}} value="1">Yes</option>
                          <option {{$brand->is_featured==0? 'selected': ''}} value="0">No</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option value="">Select</option>
                          <option {{$brand->status==1? 'selected': ''}}  value="1">Active</option>
                          <option {{$brand->status==0? 'selected': ''}} value="0">InActive</option>
                        </select>
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