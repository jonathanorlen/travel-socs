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
                <div class="breadcrumb-item"><a href="{{ route('agent') }}">Agent</a></div>
                <div class="breadcrumb-item"><a href="">Detail Package</a></div>
                <div class="breadcrumb-item active">Form</div>
            </div>
        </div>
        <div class="section-body">
            <form
                action="{{ ($data != null)?route('agent-package-update', ['id' => Request::segment(3),'package' => $data->id]):route('agent-package-store', Request::segment(3)) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="agent_id" value="{{ Request::segment(3) }}">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Package Name</label>
                                            <input name="place" id="place"
                                                class="form-control @error('place') is-invalid @enderror"
                                                value="{{ (isset($data->place))?$data->place:old('place') }}">
                                            @error('place')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="number" name="price" id="price"
                                                class="form-control @error('price') is-invalid @enderror"
                                                value="{{ (isset($data->price))?$data->price:old('price') }}">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <select name="city_id" id="city_id"
                                                class="form-control @error('city_id') is-invalid @enderror">
                                                <option value="">Pilih Kota</option>
                                                @foreach($citys as $item)
                                                    <option value="{{ $item->id }}" {{ (isset($data->city_id))?(($data->city_id == $item->id)?'selected':''):((old('city_id') == $item->id)?old('city_id'):'') }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('city_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Place</label>
                                            <select name="place_id" id="place_id"
                                                class="form-control @error('place_id') is-invalid @enderror">
                                                <option value="">Pilih Tempat</option>
                                                @foreach($places as $item)
                                                    <option value="{{ $item->id }}" {{ (isset($data->place_id))?(($data->place_id == $item->id)?'selected':''):((old('place_id') == $item->id)?old('place_id'):'') }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('place_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control summernote-simple @error('description') is-invalid @enderror" name="description" rows="20">
                                                {{ (isset($data->description))?$data->description:old('description') }}
                                            </textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Destination</label>
                                            <textarea class="form-control summernote-list @error('destination') is-invalid @enderror" name="destination" rows="20">
                                                {{ (isset($data->destination))?$data->destination:old('destination') }}
                                            </textarea>
                                            @error('destination')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Facilities</label>
                                            <textarea class="form-control summernote-list @error('facilities') is-invalid @enderror" name="facilities" rows="20">
                                                {{ (isset($data->facilities))?$data->facilities:old('facilities') }}
                                            </textarea>
                                            @error('facilities')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Picture</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Banner</label>
                                            <input type="file" name="banner" id="" class="form-control @error('banner') is-invalid @enderror">
                                            @error('banner')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Picture (1-6)</label>
                                            <input type="file" name="pictures[]" multiple id="" class="form-control @error('pictures') is-invalid @enderror">
                                            @error('pictures')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
</div>
</section>
</div>

@endsection

@push('after-scripts')
   
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.summernote-simple').summernote();
            $('.summernote-list').summernote({
                toolbar: [
                    ['para', ['ul']],
                ]
            });
        });
    </script>
@endpush

