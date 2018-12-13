<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style type="text/css">
        /* font Awesome http://fontawesome.io*/

@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);
/* Animation.css*/
@import url(https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css);

.col-item {
  border: 1px solid #E1E1E1;
  background: #FFF;
  margin-bottom:12px;
}
.col-item .options {
  position:absolute;
  top:6px;
  right:22px;
}
.col-item .photo {
  overflow: hidden;
}
.col-item .photo .options {
  display:none;
}
.col-item .photo img {
  margin: 0 auto;
  width: 100%;
}

.col-item .options-cart {
  position:absolute;
  left:22px;
  top:6px;
  display:none;
}
.col-item .photo:hover .options,
.col-item .photo:hover .options-cart {
  display:block;
  -webkit-animation: fadeIn .5s ease;
  -moz-animation: fadeIn .5s ease;
  -ms-animation: fadeIn .5s ease;
  -o-animation: fadeIn .5s ease;
  animation: fadeIn .5s ease;
}
.col-item .options-cart-round {
  position:absolute;
  left:42%;
  top:22%;
  display:none;
}
.col-item .options-cart-round button {
  border-radius: 50%;
  padding:14px 16px;
  
}
.col-item .options-cart-round button .fa {
  font-size:22px;
}
.col-item .photo:hover .options-cart-round {
  display:block;
  -webkit-animation: fadeInDown .5s ease;
  -moz-animation: fadeInDown .5s ease;
  -ms-animation: fadeInDown .5s ease;
  -o-animation: fadeInDown .5s ease;
  animation: fadeInDown .5s ease;
}
.col-item .info {
  padding: 10px;
  margin-top: 1px;
}
.col-item .price-details {
  width: 100%;
  margin-top: 5px;
}
.col-item .price-details h1 {
  font-size: 14px;
  line-height: 20px;
  margin: 0;
  float:left;
}
.col-item .price-details .details {
  margin-bottom: 0px;
  font-size:12px;
}
.col-item .price-details span {
  float:right;
}
.col-item .price-details .price-new {
  font-size:16px;
}
.col-item .price-details .price-old {
  font-size:18px;
  text-decoration:line-through;
}
.col-item .separator {
  border-top: 1px solid #E1E1E1;
}

.col-item .clear-left {
  clear: left;
}
.col-item .separator a {
  text-decoration:none;
}
.col-item .separator p {
  margin-bottom: 0;
  margin-top: 6px;
  text-align: center;
}

.col-item .separator p i {
  margin-right: 5px;
}
.col-item .btn-add {
  width: 60%;
  float: left;
}
.col-item .btn-add a {
  display:inline-block !important;
}
.col-item .btn-add {
  border-right: 1px solid #E1E1E1;
}
.col-item .btn-details {
  width: 40%;
  float: left;
  padding-left: 10px;
}
.col-item .btn-details a {
  display:inline-block !important;
}
.col-item .btn-details a:first-child {
  margin-right:12px;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
                <img src="img/products/camera-1.jpg" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>equivalent points</h3>
                    <p class="description"></p>
                    <div class="clearfix">
                        <div class="pull-left price"></div>
                       <form method="post" action="">
                           {{csrf_field()}}
                             <button class="btn btn-success pull-right" type="submit" style="margin: auto;">Replace</button>
                       
                       <!-- <a href="#" class="btn btn-success pull-right" role="button" style="margin: auto;">Replace</a>-->
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
                <img src="../../img/products/camera-1.jpg" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>equivalent points</h3>
                    <p class="description"></p>
                    <div class="clearfix">
                        <div class="pull-left price"></div>
                        <form method="post" action="">
                           {{csrf_field()}}
                             <button class="btn btn-success pull-right" type="submit" style="margin: auto;">Replace</button>
                       
                       <!-- <a href="#" class="btn btn-success pull-right" role="button" style="margin: auto;">Replace</a>-->
                        </form>

                    </div>
                </div>
            </div>
        </div>
         <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
                <img src="../img/products/camera-1.jpg" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>equivalent points</h3>
                    <p class="description"></p>
                    <div class="clearfix">
                        <div class="pull-left price"></div>
                        <form method="post" action="">
                           {{csrf_field()}}
                             <button class="btn btn-success pull-right" type="submit" style="margin: auto;">Replace</button>
                       
                       <!-- <a href="#" class="btn btn-success pull-right" role="button" style="margin: auto;">Replace</a>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </div> 

    

</body>
</html>