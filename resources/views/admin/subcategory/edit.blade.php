@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
      <h1>Category</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Category</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.sub-category.update', $subcategory->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <div class="from-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $subcategory->name}}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control" name="category_id">
                          @foreach ($categories as $category)
                          <option {{$category->id == $subcategory->category_id? 'selected' : ''}}  value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option {{$subcategory->status ==1 ? 'selected': ''}} value="1">Active</option>
                          <option {{$subcategory->status ==0 ? 'selected': ''}} value="0">Inactive</option>
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


