@extends('layouts.home')
@section('title','Home')
@section('main')

            <form action="" method="GET" class="form-inline" role="form">
              <div  name="ordering" class="form-group" class="ps-product__filter">
                  <select class="ps-select selectpicker">
                   
                    <option value="name-asc">Name(ASC)</option>
                    <option value="name-desc">Name(DESC)</option>
                    <option value="price-asc">Price (Low to High)</option>
                    <option value="price-desc">Price (High to Low)</option>
                  </select>   
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
	<div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
       <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h3 class="ps-section__title" data-mask="News">- News Products</h3>
           <!--  <ul class="ps-masonry__filter">
              <li class="current"><a href="#" data-filter="*">All <sup></sup></a></li>
              <li><a href="#" data-filter=".new">News<sup>1</sup></a></li>
              <li><a href="#" data-filter=".men">Men <sup>1</sup></a></li>
              <li><a href="#" data-filter=".women">Women <sup>1</sup></a></li>
             
            </ul> -->
          </div>
          <div class="ps-section__content pb-50">
            <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
              <div class="ps-masonry">
                <div class="grid-sizer"></div>
                
               @foreach($news as $p)
                <div class="grid-item new">
                  <div class="grid-item__content-wrapper">
                    <div class="ps-shoe mb-30">
                      <div class="ps-shoe__thumbnail">
                      @if($p->type=='new') 
                        <div class="ps-badge ps-badge--new"><span>New</span></div>
                      @else($p->type='normal')                         
                      @endif

                      @if($p->sale_price!=0) 
                        <div class="ps-badge ps-badge--sale"><span>Sale</span></div>
                      @else($p->sale_price==0)     
                      @endif
                        <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                        <img src="{{url('uploads')}}/{{$p->image}}" alt="">
                        <a class="ps-shoe__overlay" href="{{route('view',['slug'=>$p->slug])}}"></a>
                      </div>
                      <div class="ps-shoe__content">
                        <div class="ps-shoe__variants">
                          <div class="ps-shoe__variant normal">
                            @foreach($p->images as $pp)
                              <img src="{{url('uploads')}}/{{$pp->links}}" alt="">
                            @endforeach
                           
                          </div>
                          <select class="ps-rating ps-shoe__rating">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="2">5</option>
                          </select>
                        </div>
                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{route('view',['slug'=>$p->slug])}}">{{$p->name}}</a>
                          <p class="ps-shoe__categories"><a href="#"> Shoes</a> - <a href="#">{{$p->Cat->name}}</p><span class="ps-shoe__price">
                            
                             @if($p->sale_price>0)
                              <span>
                                {{ number_format($p->sale_price) }} vnđ <br/>
                                <del>{{number_format($p->price) }} vnđ</del> 
                              </span>   
                            @else
                              <span>
                                {{number_format($p->price)}} vnđ
                              </span> 
                            @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               @endforeach 
              
              
                
              </div>
            </div>
          </div>
        </div>
    <!-- men -->    
             
 
   
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- banner bottom -->
    
      <div class="ps-section--offer">
        <div class="ps-column"><a class="ps-offer" href="product-listing.html">
          <img src="{{url('public')}}/home/images/banner/home-banner-1.png" alt=""></a></div>
        <div class="ps-column"><a class="ps-offer" href="product-listing.html">
          <img src="{{url('public')}}/home/images/banner/home-banner-2.png" alt=""></a></div>
      </div>

      
 
      <!-- Products Sale -->
      <div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="Top sales">- Top Sales</h3>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                  </div>
            </div>
          </div>

          <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
              
            @foreach($sales as $sale)
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                      @if($sale->sale_price!=0) 
                       <div class="ps-badge ps-badge--sale"><span>Sale</span></div>  
                      @endif
                    <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                    <img src="{{url('uploads')}}/{{$sale->image}}" alt="">
                    <a class="ps-shoe__overlay" href="{{route('view',['slug'=>$sale->slug])}}"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal">
                        <img src="{{url('uploads')}}/{{$sale->image}}" alt="">
                        <img src="{{url('uploads')}}/{{$sale->image}}" alt="">
                        <img src="{{url('uploads')}}/{{$sale->image}}" alt="">
                        <img src="{{url('uploads')}}/{{$sale->image}}" alt="">
                      </div>
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{route('view',['slug'=>$sale->slug])}}">{{$sale->name}}</a>
                      <p class="ps-shoe__categories"><a href="#"> Shoes</a> - <a href="#">{{$sale->Cat->name}}</a></p><span class="ps-shoe__price">
                        
                      @if($sale->sale_price>0)
                        <span>
                          {{ number_format($sale->sale_price) }} vnđ <br/>
                          <del>{{number_format($sale->price) }} vnđ</del> 
                        </span>   
                      @else
                        <span>
                          {{number_format($sale->price)}} vnđ
                        </span> 
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
   
      <!-- blogs -->
      <div class="ps-section ps-home-blog pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-mask="News">- Our Blog</h2>
           
          </div>
          <div class="ps-section__content">
            <div class="row">
              @foreach($blog as $bg)   
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      <div class="ps-post__thumbnail">
                        <a class="ps-post__overlay" href="{{route('blogs')}}"></a>
                        <img src="{{url('uploads')}}/{{$bg->image}}" alt="">
                      </div>
                      <div class="ps-post__content">
                        <a class="ps-post__title" href="{{route('blogs')}}">{{$bg->name}}</a>
                        <p class="ps-post__meta">
                          <span>By:<a class="mr-5" href="{{route('blogs')}}">{{$bg->author}}</a></span> -<span class="ml-5">{{ date('d/m/y',strtotime($bg->created_at ))}}</span></p>
                        <p>{!! $bg->content!!}</p><a class="ps-morelink" href="{{route('blogs')}}">Read more<i class="ps-icon-arrow-left"></i></a>
                      </div>
                    </div>
                  </div>
                 @endforeach 
            </div>
          </div>
        </div>
      </div>
      <!-- logos -->
      <div class="ps-home-partner">
        <div class="ps-container">
          <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="40" data-owl-nav="false" data-owl-dots="false" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="4" data-owl-item-md="5" data-owl-item-lg="6" data-owl-duration="1000" data-owl-mousedrag="on"><a href="#">
            <img src="{{url('public')}}/home/images/partner/p1.jpg" alt=""></a><a href="#">
              <img src="{{url('public')}}/home/images/partner/p2.jpg" alt=""></a><a href="#">
                <img src="{{url('public')}}/home/images/partner/p3.jpg" alt=""></a><a href="#">
                  <img src="{{url('public')}}/home/images/partner/p4.jpg" alt=""></a><a href="#">
                    <img src="{{url('public')}}/home/images/partner/p5.jpg" alt=""></a><a href="#">
                      <img src="{{url('public')}}/home/images/partner/p6.jpg" alt=""></a><a href="#">
                        <img src="{{url('public')}}/home/images/partner/p7.png" alt=""></a><a href="#">
                          <img src="{{url('public')}}/home/images/partner/p8.png" alt=""></a>
          </div>
        </div>
      </div>

      
@stop()
