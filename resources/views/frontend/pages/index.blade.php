@extends('frontend.layout.app')
@section('content')
        <main>
          <section class="hero_single version_2">
              <div class="wrapper">
                  <div class="container">
                      <h3>Search Travel U WANT</h3>
                      <p></p>
                      <form>
                          <div class="row no-gutters custom-search-input-2">
                              <div class="col-lg-9">
                                  <div class="form-group">
                                      <input class="form-control" type="text" placeholder="Hotel, City...">
                                      <i class="icon_pin_alt"></i>
                                  </div>
                              </div>
                              <div class="col-lg-3">
                                  <input type="submit" class="btn_search" value="Search">
                              </div>
                          </div>
                          <!-- /row -->
                      </form>
                  </div>
              </div>
          </section>
          <!-- /hero_single -->    

          <div class="container container-custom margin_30_95">
              <section class="add_bottom_45">
                  <div class="main_title_3">
                      <span><em></em></span>
                      <h2>City</h2>
                      <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                  </div>
                  <div class="row">
                       @foreach ($citys as $item)
                       <div class="col-xl-3 col-lg-6 col-md-6">
                         <a href="{{route('front-agent', $item->id)}}" class="grid_item">
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
              </section>
              <!-- /section -->

              <div class="banner mb-0">
                  <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                      <div>
                          <small>Adventure</small>
                          <h3>Your Perfect<br>Advenure Experience</h3>
                          <p>Activities and accommodations</p>
                          <a href="adventure.html" class="btn_1">Read more</a>
                      </div>
                  </div>
                  <!-- /wrapper -->
              </div>
              <!-- /banner -->

          </div>
          <!-- /container -->

          <div class="bg_color_1">
              <div class="container container-custom margin_80_55">
                  <div class="main_title_2">
                      <h2>Plan Your Trip Easly</h2>
                      <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                  </div>
                  <div class="row adventure_feat">
                      <div class="col-md-4">
                          <img src="img/adventure_icon_1.svg" alt="" width="75" height="75">
                          <h3>Itineraries studied in detail</h3>
                          <p>Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri.
                          </p>
                      </div>
                      <div class="col-md-4">
                          <img src="img/adventure_icon_2.svg" alt="" width="75" height="75">
                          <h3>Room and food included</h3>
                          <p>His in harum errem dissentias, has mutat facilisi ea, ubique possim praesent eum ea.</p>
                      </div>
                      <div class="col-md-4">
                          <img src="img/adventure_icon_3.svg" alt="" width="75" height="75">
                          <h3>Everything organized</h3>
                          <p>In ridens tamquam argumentum usu, ne ludus intellegebat vix. Eu inani omnes usu, an pri errem mucius.</p>
                      </div>
                  </div>
              </div>
              <!-- /container -->
          </div>
          <!-- /bg_color_1 -->
          <div class="call_section">
              <div class="container clearfix">
                  <div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
                      <div class="block-reveal">
                          <div class="block-vertical"></div>
                          <div class="box_1">
                              <h3>Enjoy a GREAT travel with us</h3>
                              <p>Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei mea primis ornatus disputationi. Menandri erroribus cu per, duo solet congue ut. </p>
                              <a href="#0" class="btn_1 rounded">Read more</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--/call_section-->
      </main>
      <!-- /main -->
@endsection