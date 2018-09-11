@extends('layouts.home')
@section('title','Products detail')
@section('main')
	<main class="ps-main">
      <div class="test">
        <div class="container">
          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
          </div>
        </div>
      </div>
      <div class="ps-product--detail pt-60">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-10 col-md-12 col-lg-offset-1">
              <div class="ps-product__thumbnail">
                <div class="ps-product__preview">
                  <div class="ps-product__variants">

                  @foreach($product->images as $img)
                    <div class="item"><img src="{{url('uploads')}}/{{$img->links}}" alt=""></div>
                  @endforeach 
                  </div>
                </div>
                <div class="ps-product__image">
                  @foreach($product->images as $img) 
                    <div class="item">
                      <img class="zoom" src="{{url('uploads')}}/{{$img->links}}" alt="" data-zoom-image="{{url('uploads')}}/{{$img->links}}">
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="ps-product__thumbnail--mobile">
              @foreach($product->images as $img)
                <div class="ps-product__main-img">
                  <img src="{{url('uploads')}}/{{$img->links}}" alt="">
                </div>
                @endforeach

                <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                 
                 @foreach($product->images as $img)

                  <img src="{{url('uploads')}}/{{$img->links}}" alt="">
                    @endforeach
                </div>
              </div>
              <div class="ps-product__info">
                <div class="ps-product__rating">
                  <select class="ps-rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select><!-- <a href="#">(Read all {{count($product)}} reviews)</a> -->
                </div>
                <h1>{{$product->name}}</h1>
                <p class="ps-product__category"><a href="#">Shoes</a> - <a href="#">{{$product->Cat->name}}</a></p>

                  @if($product->sale_price>0)
                      <h3 class="ps-product__price">{{ number_format($product->sale_price) }} vnđ  <del>{{number_format($product->price) }} vnđ</del></h3>  
                    @else        
                         <h3 class="ps-product__price">{{number_format($product->price) }} vnđ</h3>
                    @endif
               
                <div class="ps-product__block ps-product__quickview">
                  
                  <h4>QUICK REVIEW</h4>
                  <p>Good</p>
                </div>
               <!--  <div class="ps-product__block ps-product__style">
                  <h4>CHOOSE YOUR STYLE</h4>
                  <ul>
                    <li><a href="product-detail.html"><img src="{{url('public')}}/home/images/shoe/sidebar/1.jpg" alt=""></a></li>
                    <li><a href="product-detail.html"><img src="{{url('public')}}/home/images/shoe/sidebar/2.jpg" alt=""></a></li>
                    <li><a href="product-detail.html"><img src="{{url('public')}}/home/images/shoe/sidebar/3.jpg" alt=""></a></li>
                    <li><a href="product-detail.html"><img src="{{url('public')}}/home/images/shoe/sidebar/2.jpg" alt=""></a></li>
                  </ul>
                </div> -->
                <div class="ps-product__block ps-product__size">
                  <h4>CHOOSE SIZE</h4>
                  <select class="ps-select selectpicker">
                    <option value="1">Select Size</option>
                  @foreach($sizes as $sis)
                    <option value="{{$sis->id}}">{{$sis->value}}</option>
                  @endforeach  
                  </select>
                  
                </div>
                <div class="ps-product__shopping"><a class="ps-btn mb-10" href="{{ route('add-cart',['id'=>$product->id])}}">Add to cart<i class="ps-icon-next"></i></a>
                 
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="ps-product__content mt-50">
                <ul class="tab-list" role="tablist">
                  <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Description</a></li>

                  @if(Auth::check())
                    <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Review</a></li>
                  @endif
                  <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">PRODUCT TAG</a></li>
                </ul>
              </div>
              <div class="tab-content mb-60">
                <div class="tab-pane active" role="tabpanel" id="tab_01">
                  {!!$product->description!!}
                </div>
                @if(Auth::check())
                  <div class="tab-pane" role="tabpanel" id="tab_02">
                    <form class="ps-product__review" action="">
                      <h4>ADD YOUR REVIEW</h4>
                      <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                              <div class="form-group">
                                <label>Name:<span>*</span></label>
                                <input class="form-control" type="text" placeholder="">
                              </div>
                              <div class="form-group">
                                <label>Email:<span>*</span></label>
                                <input class="form-control" type="email" placeholder="">
                              </div>
                              <div class="form-group">
                                <label>Your rating<span></span></label>
                                <select class="ps-rating">
                                  <option value="1">1</option>
                                  <option value="1">2</option>
                                  <option value="1">3</option>
                                  <option value="1">4</option>
                                  <option value="5">5</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                              <div class="form-group">
                                <label>Your Review:</label>
                                <textarea class="form-control" rows="6"></textarea>
                              </div>
                              <div class="form-group">
                                <button class="ps-btn ps-btn--sm">Submit<i class="ps-icon-next"></i></button>
                              </div>
                            </div>
                      </div>
                    </form>
                  </div>
                @endif
                <div class="tab-pane" role="tabpanel" id="tab_03">
                  <p>Add your tag <span> *</span></p>
                  <form class="ps-product__tags" action="" method="post">
                    <div class="form-group">
                      <input class="form-control" type="text" placeholder="">
                      <button class="ps-btn ps-btn--sm">Add Tags</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab_04">
                  <div class="form-group">
                    <textarea class="form-control" rows="6" placeholder="Enter your addition here..."></textarea>
                  </div>
                  <div class="form-group">
                    <button class="ps-btn" type="button">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="Related item">- Product other</h3>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                  </div>
            </div>
          </div>
          <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                    <div class="ps-badge"><span>New</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('public')}}/home/images/shoe/1.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal"><img src="{{url('public')}}/home/images/shoe/2.jpg" alt=""><img src="{{url('public')}}/home/images/shoe/3.jpg" alt=""><img src="{{url('public')}}/home/images/shoe/4.jpg" alt=""><img src="{{url('public')}}/home/images/shoe/5.jpg" alt=""></div>
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                      <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                    <div class="ps-badge"><span>New</span></div>
                    <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('public')}}/home/images/shoe/2.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal"><img src="{{url('public')}}/home/images/shoe/2.jpg" alt=""><img src="{{url('public')}}/home/images/shoe/3.jpg" alt=""><img src="{{url('public')}}/home/images/shoe/4.jpg" alt=""><img src="{{url('public')}}/home/images/shoe/5.jpg" alt=""></div>
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                      <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price">
                        <del>£220</del> £ 120</span>
                    </div>
                  </div>
                </div>
              </div>
              
                  
            </div>
          </div>
        </div>
      </div>
     
    </main>
@stop()
