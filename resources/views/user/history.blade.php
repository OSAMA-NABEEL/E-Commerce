@extends("user.app")

@section("content")

    <div class="" style="background-image: url('/images/home_slider_1.jpg');height: 500px;background-size: cover">

        <div style="height: 75px;width: 100%;position: relative;top: 100px;left: 0px;font-size: 60px;color: #BBE432;
                font-family: 'Poppins', sans-serif ; text-align: center" >
            A-Commerce<br>
            {{ $user->name }} History
        </div>
        {{--$categoryies--}}


    </div>
@endsection
@section("boxes")
<style>
    .ASD{
        display: inline-block;
        padding: 5px 15px;
    }
</style>
    <nav class="navbar navbar-laravel" role="navigation">

        <div class="container-fluid">
            <div class="header_nav">
                <a href="{{route("home")}}"  class="navbar-brand">ACommerce</a>
            </div>
            <div style="display: inline-block; float: left;margin: auto">
                <ul >
                    <li class="ASD" id="orders-header"><a href="{{route('userHistoryOrders',Auth::user()->id)}}">Orders</a></li>
                    <li class="ASD" id="shopping-carts-header"><a href="{{route('userHistory',Auth::user()->id)}}">SHopping Carts</a></li>
                    <li class="ASD"><a href="#">may bae like</a></li>

                </ul>
            </div>
        </div>

    </nav>
    @isset($orders)

        <div id="orders" class="data-table container" style="color: #000000">
            <div class="alert alert-dark"> Orders</div>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12" style="width: 100%">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="text-align: center">Orders</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="color: #000000">
                                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-sm-6">

                                        </div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                    <div class="row" style="width: 90%">
                                        <div class="col-sm-12" style="color: #000000;width:100%">
                                            <table id="example2" style="color: #000000" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                                        ID
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        Total Amount
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        Shopping Code ()
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        User
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        Date
                                                    </th>
                                                </thead>
                                                <tbody>
                                                @foreach($user->oreders as $order)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{$order->id}}</td>
                                                        <td class="">${{$order->total_amount}}</td>
                                                        <td>{{$order->shopping_id}}</td>
                                                        <td><a href="#"> {{$order->user->name}} </a></td>
                                                        <td>{{$order->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>

                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                                        ID
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        Total Amount
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        Shopping Code ()
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        User
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        Date
                                                    </th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">

                                        </div>
                                        <div class="col-sm-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div>
    @endisset

    @isset($shoppingCarts)
        <div id="shopping-carts" class="data-table container">
            <div class="alert-dark alert" style="text-align: center">Shopping Carts</div>
            <div class="products">

                <div class="section_container">

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="products_container grid" style="position: relative; height: 1914.05px;">

                                @foreach($user->carts->where("orderd","<>",-1) as $cart)
                                    <!-- Product -->
                                        <div class="product grid-item hot " style="position: absolute; left: 0%; top: 0px;">
                                            <div class="product_inner">
                                                <div class="product_image">
                                                    <img src="/storage/product_images/{{$cart->product->img}}" alt=""
                                                         style="width: 272.66px;height: 371.02px">
                                                    @if($cart->product->discounted_price != 0)
                                                        <div class="product_tag">hot</div>
                                                    @endif
                                                </div>
                                                <div class="product_content text-center">
                                                    <div class="product_title"><a href="/product.html">{{$cart->product->name}}</a></div>
                                                    <div class="product_title"><a >Quantity {{$cart->product->QTY}} </a></div>
                                                    @if($cart->product->discounted_price == 0)
                                                        <div class="product_price">${{$cart->product->price}}</div>
                                                    @else
                                                        <div class="product_price">${{$cart->product->discounted_price}}</div>
                                                        <div class="product_price_offer">${{$cart->product->price}}</div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset


@endsection
<script src="/js/jquery-3.2.1.min.js"></script>
<script>
    $("#orders-header").click(function () {

        console.log("ASD");
        alert("ASD");
    })
    document.onload = function(){
        document.getElementById("orders-header").onclick = function () {
            console.log("A&A");
        }
    }

</script>
