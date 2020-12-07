@extends('frontend.layout.app')
@section('content')
<style>
    .hero_in.tours_detail:before {
        background: url({{ url('images/agent/'.$data->banner) }});
        background-size: cover;
    }
</style>
<main>
    {{-- @php
        dd($agent)
    @endphp --}}
    <section class="hero_in tours_detail">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp">{{ $data->place }}</h1>
            </div>
            {{-- <span class="magnific-gallery">
                <a href="img/bali2.jpg" class="btn_photos" title="Photo title" data-effect="mfp-zoom-in">View
                    photos</a>
                <a href="img/pandawa.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
                <a href="img/bali.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
                <a href="img/kuta.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
            </span> --}}
        </div>
    </section>
    <!--/hero_in-->

    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    <section id="description">
                        <h2>Description</h2>
                        <p> 
                            {{ $data->description }}
                            <h3>Photos feed</h3>
                            <div class="grid">
                                <ul class="magnific-gallery">
                                    @foreach (explode('|', $data->pictures) as $item)
                                    @if ($item)
                                    <li>
                                        <figure>
                                            <img src="{{ url('images/agent/'.$item) }}" alt="">
                                            <figcaption>
                                                <div class="caption-content">
                                                    <a href="{{ url('images/agent/'.$item) }}" title="Photo title" data-effect="mfp-zoom-in">
                                                        <i class="pe-7s-albums"></i>
                                                    </a>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>

                            <hr>
                            <p>Agent Travel ini menyediakan berbagai pilihan <strong>tempat wisata</strong> yang akan dikunjungi dengan list sebagai berikut.</p>
                            <div class="row">
                                <div class="col-lg-12">
                                    {!! $data->destination !!}
                                </div>
                            </div>
                    </section>
                    <!-- /section -->

                </div>
                <!-- /col -->

                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail booking">
                        <div class="price">
                            <span>{{ $data->price }}<small>person</small></span>
                        </div>

                        <div class="paket">
                            <span>{{ $data->place }}</span>
                            <p>Include Fasilities :</p>
                            <div class="row">
                                {!! $data->facilities !!}
                                <small>Untuk informasi pemesanan paket Agent Tour silahkan hubungi kontak social
                                    media atau klik tombol dibawah ini dibawah ini.</small>
                                <div class="kontak">
                                    <small>
                                        {{ $agent->name }} | {{ $agent->phone }}<br>
                                        {{ $agent->address }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="share-buttons">
                        
                        <li><a class="gplus-share" href="https://api.whatsapp.com/send?phone=62{{ ltrim($agent->phone, $agent->phone[0]) }}"><i
                                    class="social_whatapp"></i>Send Message Whatsapp</a>
                    </ul>
                </aside>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->
</main>
@endsection
@push('script')
    
<script>
    $('.row>ul, .col-lg-12>ul').addClass("bullets");
</script>
@endpush