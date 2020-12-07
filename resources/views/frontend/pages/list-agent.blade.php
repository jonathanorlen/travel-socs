@extends('frontend.layout.app')
@section('content')
<style>
    .hero_single.version_2:before {
        background: url({{ url('images/city/'.$city->image) }});
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
<main>
    <section class="hero_single version_2">
        <div class="wrapper">
            <div class="container">
                {{-- <h3>{{ $city->name }}</h3> --}}
                <p>Cari agen andalan anda</p>
            </div>
        </div>
    </section>
    <!-- /hero_single -->
    <div class="container container-custom margin_30_95">
        <section class="add_bottom_45">
            <div class="row">
                @foreach ($data as $item)
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <a href="{{ route('frontend-agent', $item->id) }}" class="grid_item">
                        <figure>
                            <img src="{{ url('images/agent/'.$item->profile) }}" class="img-fluid" alt="">
                            <div class="info">
                                <h3>{{ $item->name }}</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
</main>
@endsection
@push('script')
    
<script>
    $('.row>ul, .col-lg-12>ul').addClass("bullets");
</script>
@endpush