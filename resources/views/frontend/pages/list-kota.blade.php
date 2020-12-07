@extends('frontend.layout.app')
@section('content')
<main>
     <section class="hero_single version_2">
         <div class="wrapper">
             <div class="container">
                 <h3>Kota Destinasi</h3>
                 <p>Cari destinasi tujuan anda</p>
             </div>
         </div>
     </section>
     <!-- /hero_single -->
     <div class="container container-custom margin_30_95">
         <section class="add_bottom_45">
             <div class="row">
                  @foreach ($citys as $item)
                    <div class="col-xl-3 col-lg-6 col-md-6">
                         <a href="tempat-wisataa.html" class="grid_item">
                         <figure>
                              <img src="{{ url('images/city/'.$item->image) }}" class="img-fluid" alt="">
                              <div class="info">
                                   <h3>{{ $item->name }}</h3>
                              </div>
                         </figure>
                         </a>
                    </div>
                  @endforeach
             </div>
             <!-- /row -->
             <a href="restaurants-grid-isotope.html"><strong>View all (8) <i
                         class="arrow_carrot-right"></i></strong></a>
         </section>
 </main>
@endsection
@push('script')
    
<script>
    $('.row>ul, .col-lg-12>ul').addClass("bullets");
</script>
@endpush