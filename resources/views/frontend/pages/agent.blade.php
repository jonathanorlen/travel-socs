@extends('frontend.layout.app')
@section('content')
<main>
    <style>
        .hero_in.contacts:before {
            background: url({{ url('images/agent/'.$data->profile) }});
            background-size:cover;
            background-repeat:no-repeat;
        }
    </style>
     <section class="hero_in contacts">
         <div class="wrapper">
             <div c lass="container">
                 <h1 class="fadeInUp"><span></span>Kencana Tour Travel Agent</h1>
             </div>
         </div>
     </section>
     <!--/hero_in-->

     <div class="contact_info">
         <div class="container">
             <ul class="clearfix">
                 <li>
                     <i class="pe-7s-map-marker"></i>
                     <h4>Address</h4>
                     <span>{{ $data->address }}</span>
                 </li>
                 <li>
                     <i class="pe-7s-mail-open-file"></i>
                     <h4>Email address</h4>
                     <span>{{ $data->email }}</span>

                 </li>
                 <li>
                     <i class="pe-7s-phone"></i>
                     <h4>Contacts info</h4>
                     <span>{{ $data->phone }} (WA)</span>
                 </li>
             </ul>
         </div>
     </div>
     <!--/contact_info-->
     <!--/main-->

     <div class="container margin_60_35">
         <div class="row">
             <div class="col-lg-12">
                 <article class="blog wow fadeIn">
                     <div class="row no-gutters">
                         <div class="col-lg-6">
                             <figure>
                                 <img src="{{ url('images/agent/'.$data->profile) }}" alt="">
                             </figure>
                         </div>
                         <div class="col-lg-6">
                             <div class="post_info">
                                 {{-- <small>20 Nov. 2017</small> --}}
                                 <h3><a href="blog-post.html">Kencana Agent</a></h3>
                                 {{ $data->description }}
                                 <ul>
                                     <li>
                                         <div class="thumb"><img src="img/thumb_blog.jpg" alt=""></div>Michael Valdio
                                     </li>
                                     <li><i class=""></i> {{ $data->owner }}</li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </article>
                 <!-- /article -->
             </div>


             {{-- <div class="container margin_60_35">
                 <div class="row">
                     <div class="col-lg-12">
                         <section id="description">
                             <h2>Description</h2>
                             {{ $data->description }}
                             <hr>
                         </section>
                         <!-- /section -->
                     </div>
                     <!-- /col -->

                 </div>
                 <!-- /row -->
             </div> --}}

             <!-- /aside -->
         </div>
         <!-- /row -->
     </div>



     <div class="detail-agent mb-5">
         <div class="container">
             <div class="text-center">
                 <h4>Paket Wisata</h4>
             </div>
         </div>
     </div>

     <div class="m-paket">
         <div class="container">
             <div class="text-center" style=""><span class="judul-paket"></span>
             </div>
             <div class="row">
                 @foreach ($packages as $item)
                 <div class="col-lg-4" id="sidebar">
                     <div class="box_detail booking">
                         <div class="price">
                             <span>{{ $item->price }}<small>person</small></span>
                         </div>
                         <div class="paket">
                             <span>{{ $item->place }}</span>
                             <p>Include Fasilities :</p>
                             <div class="row">
                                {!! $item->facilities !!}
                                 <small>Untuk informasi pemesanan paket Agent Tour silahkan hubungi kontak social
                                     media dibawah ini.</small>
                             </div>
                        </div>
                        <a href="{{ route('frontend-package', $item->id) }}" class="btn btn-danger btn-block mt-4">Pilih</a>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </div>
     </main>
@endsection
@push('script')
    
<script>
    $('.row>ul, .col-lg-12>ul').addClass("bullets");
</script>
@endpush