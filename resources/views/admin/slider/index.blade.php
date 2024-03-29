@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
      <h1>Slider</h1>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">Table</h2>
      <p class="section-lead">Example of some Bootstrap table components.</p> --}}

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Slider</h4>
              <div class="card-header-action">
                <a href="{{ route('admin.slider.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Creat New</a>
              </div>
            </div>

        
            <div class="card-body">
            {{ $dataTable->table()}}
            </div>
            
          </div>
        </div>
      
      </div>

    </div>
  </section>
    
@endsection 

@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush