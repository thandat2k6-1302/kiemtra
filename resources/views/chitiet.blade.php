@extends('layouts.master')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm: {{$sanpham->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('banhang.index') }}">Trang chủ</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="/source/image/product/{{$sanpham->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{$sanpham->name}}</p>
                            <p class="single-item-price" style="font-size: 18px; font-weight: bold;">
                                @if($sanpham->promotion_price == 0)
                                <span class="flash-sale">{{ number_format($sanpham->unit_price) }} đồng</span>
                                @else
                                <span class="flash-del">{{ number_format($sanpham->unit_price) }} đồng</span>
                                <span class="flash-sale">{{ number_format($sanpham->promotion_price) }} đồng</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$sanpham->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-options">
                            <select class="wc-select" name="qty">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <a class="add-to-cart" href="{{ route('banhang.addtocart', $sanpham->id) }}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$sanpham->description}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>Chưa có nhận xét nào.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
