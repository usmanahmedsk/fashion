
@extends('layout_master.master')
@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row g-1">
            @foreach ($items as $item)

                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="text-center"> <img src="https://i.pinimg.com/originals/23/d6/5c/23d65cfcbf27a44e867218f7e4ad9464.jpg" width="200"> </div>
                        <div class="product-details"> <span class="font-weight-bold d-block">{{$item['sales_price']}}</span><a href="detail/{{$item['id']}}"> <span>{{$item['name']}}</span></a>
                            <div class="buttons d-flex flex-row">
                                <div class="cart"><i class="fa fa-shopping-cart"></i></div> <button class="btn btn-success cart-button btn-block"><span class="dot">1</span>Add to cart </button>
                            </div>
                            <div class="weight"> <small>{{$item['description']}}</small> </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</div>
@endsection
