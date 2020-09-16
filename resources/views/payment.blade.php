<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>FINCARE BANK - Payment Gateway</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
      <style>
         .card-product .img-wrap {
         border-radius: 3px 3px 0 0;
         overflow: hidden;
         position: relative;
         height: 220px;
         text-align: center;
         }
         .card-product .img-wrap img {
         max-height: 100%;
         max-width: 100%;
         object-fit: cover;
         }
         .card-product .info-wrap {
         overflow: hidden;
         padding: 15px;
         border-top: 1px solid #eee;
         }
         .card-product .bottom-wrap {
         padding: 15px;
         border-top: 1px solid #eee;
         }
         .label-rating { margin-right:10px;
         color: #333;
         display: inline-block;
         vertical-align: middle;
         }
         .card-product .price-old {
         color: #999;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <article class="bg-secondary mb-3">
         <div class="card-body text-center">
            <h4 class="text-white">Welcome to Payment Gateway<br>  </h4>
          
         </div>
      </article>  
         <hr>
         <div class="row">
            <div class="col-md-4">
               <figure class="card card-product">
                  <div class="img-wrap"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ9LPyjk-Yo3u_zPidz5vaCjPh4Vx2dExTwiw&usqp=CAU"></div>
                  <figcaption class="info-wrap">
                     <h4 class="title">Donate 1 RS</h4>
                     
                     <!-- rating-wrap.// -->
                  </figcaption>
                  <div class="bottom-wrap">
                     <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="1" data-id="1">Order Now</a> 
                     <div class="price-wrap h5">
                        <span class="price-new">₹1</span>
                     </div>
                     <!-- price-wrap.// -->
                  </div>
                  <!-- bottom-wrap.// -->
               </figure>
            </div>
            <!-- col // -->
            <div class="col-md-4">
               <figure class="card card-product">
                  <div class="img-wrap"><img src="https://i.colnect.net/f/5494/416/10-Rupees-3rd-Indo-Africa-Forum-Summit.jpg"> </div>
                  <figcaption class="info-wrap">
                     <h4 class="title">Donate 10 RS</h4>
                     
                     <!-- rating-wrap.// -->
                  </figcaption>
                  <div class="bottom-wrap">
                     <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="10" data-id="2">Order Now</a> 
                     <div class="price-wrap h5">
                        <span class="price-new">₹10</span> 
                     </div>
                     <!-- price-wrap.// -->
                  </div>
                  <!-- bottom-wrap.// -->
               </figure>
            </div>
            <!-- col // -->
            <div class="col-md-4">
               <figure class="card card-product">
                  <div class="img-wrap"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQQ9wIXHWvfycXtY9MrbUzMBRzGqp8aBhTinw&usqp=CAU"> </div>
                  <figcaption class="info-wrap">
                     <h4 class="title">Donate 20 RS</h4>                     
                     <!-- rating-wrap.// -->
                  </figcaption>
                  <div class="bottom-wrap">
                     <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="20" data-id="3">Order Now</a> 
                     <div class="price-wrap h5">
                        <span class="price-new">₹20</span> 
                     </div>
                     <!-- price-wrap.// -->
                  </div>
                  <!-- bottom-wrap.// -->
               </figure>
            </div>

            <!-- col // -->
         </div>
         <!-- row.// -->
      </div>
      <!--container.//-->
      <br><br><br>
      
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <script>
var SITEURL = '{{URL::to('')}}';
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
}); 
$('body').on('click', '.buy_now', function(e){
var totalAmount = $(this).attr("data-amount");
var product_id =  $(this).attr("data-id");
var options = {
//"key": "rzp_live_ILgsfZCZoFIKMb",
"key":"rzp_test_l39Z1FYn0U7Sba",
"amount": (totalAmount*100), // 2000 paise = INR 20
"name": "Tutsmake",
"description": "Payment",
"image": "https://www.clipartmax.com/png/middle/166-1665569_fincare-small-finance-bank.png",
"handler": function (response){
$.ajax({ 
url: SITEURL + '/pay_success',
type: 'post',
dataType: 'json',
data: {
razorpay_payment_id: response.razorpay_payment_id , 
totalAmount : totalAmount ,product_id : product_id,
}, 
success: function (msg) { 
window.location.href = SITEURL + '/thank_you';
}
});
},
"prefill": {
"contact": '9845798957',
"email":   '108vrk@gmail.com',
},
"theme": {
"color": "#528FF0"
}
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
});
/*document.getElementsClass('buy_plan1').onclick = function(e){
rzp1.open();
e.preventDefault();
}*/
</script>
</body>
</html>