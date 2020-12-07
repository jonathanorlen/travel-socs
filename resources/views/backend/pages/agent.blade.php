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
                            <a href="{{route('agent-create')}}" class="btn btn-icon btn-lg btn-primary float-right"><i
                                    class="far fa-edit"></i>
                                Create
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Picture</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index=>$item)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td><img src="{{ url('images/agent/'.$item->profile) }}" alt="" width="120px"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{route('agent-package',$item->id)}}"
                                                class="btn btn-icon btn-info"><i class="fas fa-eye"
                                                    data-toggle="tooltip" title="Info {{ $item->name }} Agent"></i></a>
                                            <button data-confirm="Realy?|Do you want to continue to delete this data?"
                                                data-confirm-yes="window.location ='{{route('agent-delete',$item->id)}}'"
                                                class="btn btn-icon btn-danger" data-toggle="tooltip"
                                                title="Delete {{ $item->name }} Agent"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection

@push('page-scripts')

@endpush
