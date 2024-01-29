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
                <form method="POST" action="{{route('admin.brand.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="from-group">
                        <label>Banner</label>
                        <input type="file" name="banner" class="form-control">
                    </div>

                    <div class="from-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" value="{{ old('type')}}">
                    </div>

                    <div class="from-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title')}}">
                    </div>

                    <div class="from-group">
                        <label>Starting Price</label>
                        <input type="text" class="form-control" name="starting_price" value="{{ old('starting_price')}}">
                    </div>

                    <div class="from-group">
                        <label>Button Url</label>
                        <input type="text" class="form-control" name="btn_url" value="{{ old('btn_url')}}">
                    </div>

                    <div class="from-group">
                        <label>Serial</label>
                        <input type="text" class="form-control" name="serial" value="{{ old('serial')}}">
                    </div>

                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                         
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
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