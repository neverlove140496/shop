@extends('layouts.home')
@section('title','Products list')
@section('main')
	  <div class="ps-container">
     <main class="ps-main">
      <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
          <div class="ps-section--offer mb-40">
            <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="{{url('public')}}/home/images/banner/banner-1.jpg" alt=""></a></div>
            <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="{{url('public')}}/home/images/banner/banner-2.jpg" alt=""></a></div>
          </div>

          <div class="ps-product-action">
            
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
          

            <div class="ps-pagination">
              <ul class="pagination">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="ps-product__columns">

          @foreach($category->Pro as $c)
             <div class="ps-product__column">
              <div class="ps-shoe mb-30">
                <div class="ps-shoe__thumbnail">
                       @if($c->sale_price>0)
                          <div class="ps-badge ps-badge--sale"><span>Sale</span></div>
                        @elseif($c->type==1)
                         <div class="ps-badge"><span>New</span></div> 
                        
                       @elseif($c->type!=1)  
                       
                       @endif
                  <a class="ps-shoe__favorite" href=""><i class="ps-icon-heart"></i></a>
                  <img src="{{url('uploads')}}/{{$c->image}}" alt="">
                  <a class="ps-shoe__overlay" href="{{route('view',['slug'=>$c->slug])}}"></a>
                </div>
                <div class="ps-shoe__content">
                  <div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal"><img src="{{url('uploads')}}/{{$c->image}}" alt="">
                      
                      @foreach($c->images as $img)
                         <img src="{{url('uploads')}}/{{$img->links}}" alt="">
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
                  <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{route('view',['slug'=>$c->slug])}}">{{$c->name}}</a>
                    <p class="ps-shoe__categories"><a href="#">Shoes</a> - <a href="#">{{$c->Cat->name}}</a></p>

                    @if($c->sale_price>0)
                      <span class="ps-shoe__price">
                        {{ number_format($c->sale_price) }} vnđ <br/>
                        <del>{{number_format($c->price) }} vnđ</del> 
                      </span>   
                    @else
                      <span class="ps-shoe__price">
                        {{number_format($c->price)}} vnđ
                      </span> 
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
         <!--  <div class="ps-product-action">
            <div class="ps-product__filter">
              <select class="ps-select selectpicker">
                <option value="1">Shortby</option>
                <option value="2">Name</option>
                <option value="3">Price (Low to High)</option>
                <option value="3">Price (High to Low)</option>
              </select>
            </div>
            <div class="ps-pagination">
              <ul class="pagination">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div> -->
        </div>
        <div class="ps-sidebar" data-mh="product-listing">
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Category</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                @foreach($list_cat as $cat)
                    @if($cat->slug==['slug'=>$cat->slug])
                     <li class="current" ><a href="{{route('view',['slug'=>$cat->slug])}}" >{{$cat->name}}</a></li> 
                    @else
                     <li><a href="{{route('view',['slug'=>$cat->slug])}}" >{{$cat->name}}</a></li>
                     @endif                 
                @endforeach
              </ul>
            </div>
          </aside>
<!--          
       
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Width</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li class="current"><a href="product-listing.html">Narrow</a></li>
                <li><a href="product-listing.html">Regular</a></li>
                <li><a href="product-listing.html">Wide</a></li>
                <li><a href="product-listing.html">Extra Wide</a></li>
              </ul>
            </div>
          </aside> -->
          <div class="ps-sticky desktop">
            <aside class="ps-widget--sidebar">
              <div class="ps-widget__header">
                <h3>Size</h3>
              </div>
              <div class="ps-widget__content">
                <table class="table ps-table--size">
                  <tbody>
                   @foreach($sizes as $size) 
                    <tr>
                       <td class="">{{$size->value}}</td>    
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </aside>
            <aside class="ps-widget--sidebar">
              <div class="ps-widget__header">
                <h3>Color</h3>
              </div>
              <div class="ps-widget__content">
                <ul class="ps-list--color">
                  @foreach($colors as $color)
                    <li><a href="#"></a></li>
                  @endforeach
                </ul>
              </div>
            </aside>
          </div>
          
          
        </div>
      </div>
     
    </main>
  </div>
@stop()
