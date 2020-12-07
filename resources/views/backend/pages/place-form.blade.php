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
                <div class="breadcrumb-item"><a href="{{ route('place') }}">Place</a></div>
                <div class="breadcrumb-item active">Form</div>
            </div>
        </div>
        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form</h4>
                    </div>
                    <form action="{{($data != null)?route('place-update', $data->id):route('place-store')}}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{(isset($data->name))?$data->name:old('name')}}">
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
                                        <label>Address</label>
                                        <input type="address" name="address" id="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{(isset($data->address))?$data->address:old('address')}}">
                                        @error('address')
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
                                        <label>Description</label>
                                        <textarea name="description"
                                            class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="10">
                                            {{(isset($data->description))?$data->description:old('description')}}
                                        </textarea>
                                        @error('description')
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
                                        <label>City</label>
                                        <select name="city_id"
                                            class="form-control @error('city_id') is-invalid @enderror" id="">
                                            <option value="">Select City</option>
                                            @foreach ($citys as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('address')
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
                                        <label>Picture</label>
                                        <input type="file" name="picture"
                                            class="form-control @error('picture') is-invalid @enderror">
                                        @error('picture')
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
