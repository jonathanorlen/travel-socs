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
                <div class="breadcrumb-item active">Form</div>
            </div>
        </div>
        <div class="section-body">
            <form
                action="{{ ($data != null)?route('agent-update', $data->id):route('agent-store') }}"
                method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form</h4>
                            </div>
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ (isset($data->name))?$data->name:old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Owner</label>
                                            <input type="text" name="owner" id="owner"
                                                class="form-control @error('owner') is-invalid @enderror"
                                                value="{{ (isset($data->owner))?$data->owner:old('owner') }}">
                                            @error('owner')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ (isset($data->email))?$data->email:old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Phone (WA)</label>
                                            <input type="number" name="phone" id="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ (isset($data->phone))?$data->phone:old('phone') }}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <select name="city_id" id="city_id"
                                                class="form-control @error('city_id') is-invalid @enderror">
                                                <option value="">Pilih Kota</option>
                                                @foreach($citys as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('city_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <input type="text" name="province" id="province"
                                                class="form-control @error('province') is-invalid @enderror"
                                                value="{{ (isset($data->province))?$data->province:old('province') }}">
                                            @error('province')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" id="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                value="{{ (isset($data->address))?$data->address:old('address') }}">
                                            @error('address')
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input type="text" name="instagram" id="instagram"
                                                class="form-control @error('instagram') is-invalid @enderror"
                                                value="{{ (isset($data->instagram))?$data->instagram:old('instagram') }}">
                                            @error('instagram')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook" id="facebook"
                                                class="form-control @error('facebook') is-invalid @enderror"
                                                value="{{ (isset($data->facebook))?$data->facebook:old('facebook') }}">
                                            @error('facebook')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror"
                                                name="description" rows="20">
                                                {{ (isset($data->description))?$data->description:old('description') }}
                                            </textarea>
                                            @error('description')
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
                                            <label>Logo</label>
                                            <input type="file" name="profile" id=""
                                                class="form-control @error('profile') is-invalid @enderror">
                                            @error('profile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Picture (1-6)</label>
                                            <input type="file" name="pictures[]" multiple id=""
                                                class="form-control @error('pictures') is-invalid @enderror">
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
@endpush
