
@extends('layout_master.master')
@section('content')
<div class="wrapper">
    <div class="container">
    <a class="btn btn-success btn-block" href="/"> Go Back </a>
        <div class="row g-1">
               <div class="col-md-3">
                    <div class="card p-3">
                        <div class="text-center"> <img src="https://i.pinimg.com/originals/23/d6/5c/23d65cfcbf27a44e867218f7e4ad9464.jpg" width="200"> </div>
                        <div class="product-details"> <span class="font-weight-bold d-block">{{$item['sales_price']}}</span><span>{{$item['name']}}</span>
                            <div class="buttons d-flex flex-row">
                                <div class="cart"><i class="fa fa-shopping-cart"></i></div>

                                <form action="/add_to_cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{$item['id']}}">
                                    <button class="btn btn-success cart-button btn-block"><span class="dot">1</span>Add to cart </button>
                                </form>

                            </div>
                            <div class="weight"> <small>{{$item['description']}}</small> </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
