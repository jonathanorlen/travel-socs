@extends('backend.layouts.app')
@section('title', 'Events Form')
@section('content')
<style>
  .ratio {
      width: 100%;
      padding-top: 100%;
      /* 1:1 Aspect Ratio */
      position: relative;
      /* If you want text inside of it */
      background-size: cover;
      background-position: center
  }

</style>

<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Form</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('city') }}">City</a></div>
            <div class="breadcrumb-item active">Form</div>
        </div>
      </div>
      <div class="section-body">
          <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h4>Form</h4>
                  </div>
                  <form action="{{($data != null)?route('city-update', $data->id):route('city-store')}}"
                      method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{(isset($data->name))?$data->name:old('name')}}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Latitude</label>
                                      <input type="number" name="lat" id="lat"
                                          class="form-control @error('lat') is-invalid @enderror" value="{{(isset($data->lat))?$data->lat:old('lat')}}">
                                      @error('lat')
                                      <div class="invalid-feedback">
                                          {{$message}}
                                      </div>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Longitude</label>
                                      <input type="number" name="lon" id="lon"
                                          class="form-control @error('lon') is-invalid @enderror" value="{{(isset($data->lon))?$data->lon:old('lon')}}">
                                      @error('lon')
                                      <div class="invalid-feedback">
                                          {{$message}}
                                      </div>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" id="image"
                                        class="form-control @error('image') is-invalid @enderror" value="{{(isset($data->image))?$data->image:old('image')}}">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                          <button class="btn btn-primary mr-1" type="submit">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </section>
</div>

@endsection

@push('after-scripts')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endpush
