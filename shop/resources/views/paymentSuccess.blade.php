@extends('layouts.app')

@section('content')
<div class="container" style="margin-bottom: 100px">
    <div class="row justify-content-center" style="padding: 20px;margin-top: 40px;margin-left: 100px">
        <div class="col-md-8 col-md-offset-2">
            <div style="">
                <i class="fa fa-6x fa-check-circle" aria-hidden="true" style="text-align: center;margin-left: 120px;color:green ;padding: 20px"></i>

                <h2>
                    payment done successfully
                </h2>
                <p>Thank you for this great work you can continuo shoping<br> more and more</p><br>
                <a href="{{route('shop.index')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <a href="{{route('watchlater.index')}}" class="btn btn-success" style="margin-left: 10px"><i class="fa fa-angle-right"></i> Move to watchlater list</a>
            </div>
        </div>
    </div>
</div>
@endsection
