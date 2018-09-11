@extends('layouts.home')
@section('title','Checkout')
@section('main')
	  <main class="ps-main">
      <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
          <form class="ps-checkout__form" action="" method="post">
            <div class="row">
                 
              @if(Auth::check())
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__billing">
                      <h3>Billing Detail</h3>
             
                    <form action="" method="POST" role="form">
                      
                    
                      <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Full name"
                        value="{{Auth::user()->name}}" 
                        >
                      </div>
                      <div class="form-group" >
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Address email"
                        value="{{Auth::user()->email}}" 
                        >
                      </div>
                      <div class="form-group" >
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address">
                      </div>

                                   
                      <div class="form-group">
                          
                            <label>Order Notes</label>
                            <textarea class="form-control" rows="3" name="note" placeholder="Ghi chú thêm về đặt hàng.."></textarea>     
                      </div> 

                    </div>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__order">
                      <header>
                        <h3>Your Order</h3>
                      </header>
                      <div class="content">
                        <table class="table ps-checkout__products">
                          <thead>
                            <tr>
                              <th class="text-uppercase">Product</th>
                              <th class="text-uppercase">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          @foreach($cart->items as $item) 
                            <tr>
                              <td> {{$item['name']}} x {{$item['quantity']}}</td>
                              <td>{{number_format($item['price']*$item['quantity'])}} vnđ</td>
                            </tr>
                          @endforeach 
                          <tr>
                              <td>
                                <select name="ship" class="form-control" required="required">
                                  <option value="shipper">Shipper</option>
                                  <option value="express delivery">Chuyển phát nhanh</option>
                                  <option value="post office">Bưu điện</option>
                                </select>
                              </td>
                              <td>0 vnđ</td>
                            </tr>
                          <tr>
                              <td>Order Total</td>
                              <td>{{number_format($cart->total_amount)}} vnđ</td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                      <footer>
                       
                   
                        <h3>Payment Method</h3>

                        <div class="form-group cheque">
                          <div class="ps-radio">
                            <input class="form-control" type="radio" id="rdo01" name="payment" checked>
                            <label for="rdo01">Payment</label>
                            <p>Thanh toán trực tiếp khi nhận hàng.</p>
                          </div>
                        </div>
                        <div class="form-group paypal">
                          <div class="ps-radio ps-radio--inline">
                            <input class="form-control" type="radio" name="payment" id="rdo02">
                            <label for="rdo02">Paypal</label>
                          </div>
                          <ul class="ps-payment-method">
                            <li><a href="#"><img src="{{url('public')}}/home/images/payment/1.png" alt=""></a></li>
                            <li><a href="#"><img src="{{url('public')}}/home/images/payment/2.png" alt=""></a></li>
                            <li><a href="#"><img src="{{url('public')}}/home/images/payment/3.png" alt=""></a></li>
                          </ul>
                              {{ csrf_field()}}
                          <button type="submit" class="ps-btn ps-btn--fullwidth">Place Order<i class="ps-icon-next"></i></button>
                        </form>
                        
                        </div>
                      </footer>
                    </div>
                    
                  </div>
              @else
                <main class="ps-main">
              <div class="ps-content pt-80 pb-80">
                <div class="ps-container">
                  <div class="ps-cart-listing">
                    <table class="table ps-cart__table">

                        <div class="jumbotron">
                          <div class="container" style="text-align: center;padding-bottom: 20px;">
                         <h1 >Error!</h1>
                          <h3>Please login now!</h3>
                            <p style="margin-top: 40px;">
                              <a  href="{{route('dangnhap')}}" class="btn btn-info btn-md">Login</a>
                            </p>
                          </div>
                        </div>
                    </table> 

                </div>
              </div>
            </div>
           
          </main>
              @endif   
            </div>
          </form>
        </div>
      </div>

    </main>

@stop()
