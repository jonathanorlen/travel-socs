@extends('backend.layouts.app')
@section('title', 'Gallery')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active">Agent</div>
            </div>
        </div>
        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade" role="alert">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session()->get('success') }}
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible show fade" role="alert">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session()->get('error') }}
                </div>
                @endif
                <div class="card">
                    <div class="row pl-4 pr-4 pt-4">
                        <div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6">
                        </div>
                        <div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6">
                            <a href="{{route('agent-edit', $data->id)}}" class="btn btn-icon btn-lg btn-primary float-right"><i
                                    class="far fa-edit"></i>
                                Edit
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ (isset($data->name))?$data->name:old('name') }}" disabled>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Owner</label>
                                    <input type="text" name="owner" id="owner"
                                        class="form-control @error('owner') is-invalid @enderror"
                                        value="{{ (isset($data->owner))?$data->owner:old('owner') }}" disabled>
                                    @error('owner')
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
                                        value="{{ (isset($data->phone))?$data->phone:old('phone') }}" disabled>
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
                                    <input type="number" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ (isset($data->phone))?$data->phone:old('phone') }}" disabled>
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
                                        value="{{ (isset($data->province))?$data->province:old('province') }}" disabled>
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
                                        value="{{ (isset($data->address))?$data->address:old('address') }}" disabled>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" id="city"
                                        class="form-control @error('city') is-invalid @enderror"
                                        value="{{ (isset($data->city))?$data->city:old('city') }}" disabled>
                                    @error('city')
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
                                        value="{{ (isset($data->instagram))?$data->instagram:old('instagram') }}" disabled>
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
                                        value="{{ (isset($data->facebook))?$data->facebook:old('facebook') }}" disabled>
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
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="20" disabled>
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
        </div>
        
        <div class="row pl-md-3 pr-md-3">
            <div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6">
                <h2>Package List</h2>
            </div>
            <div class="col-md-6 mb-3">
                    <a href="{{route('agent-package-create', $data->id)}}" class="btn btn-icon btn-lg btn-primary float-right"><i
                            class="far fa-edit"></i>
                        Add Package
                    </a>
            </div>
            @foreach ($packages as $item)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        {{ $item->place }}
                    </div>
                    <div class="card-body">
                        <p>{{ $item->price }}</p>
                    </div>
                    <div class="card-footer align-right">
                        <a href="{{route('agent-package-edit', ['id' => $data->id,'package' => $item->id])}}"
                            class="btn btn-icon btn-warning"><i class="fas fa-pencil-alt"
                            data-toggle="tooltip" title="Edit {{ $item->name }} Package"></i>
                        </a>
                        <button data-confirm="Realy?|Do you want to continue to delete this data?"
                                                data-confirm-yes="window.location ='{{route('agent-package-delete',$item->id)}}'"
                                                class="btn btn-icon btn-danger" data-toggle="tooltip"
                                                title="Delete Gallery Category"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection

@push('page-scripts')

@endpush
