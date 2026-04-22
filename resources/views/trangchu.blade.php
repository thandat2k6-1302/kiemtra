@extends('layouts.master')
@section('title', 'Trang chủ')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    @foreach($slides as $slide)
                    <!-- THE SLIDE -->
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18;">
                        <div class="slotholder" style="width:100%;height:100%;">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/source/image/slide/{{ $slide->image }}" data-src="/source/image/slide/{{ $slide->image }}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/source/image/slide/{{ $slide->image }}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->

<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($new_products)}} sản phẩm được tìm thấy</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @php $stt=0; @endphp
                            @foreach($new_products as $new_product)
                            @php $stt++; @endphp
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new_product->promotion_price != 0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{ route('banhang.chitiet', $new_product->id) }}"><img src="/source/image/product/{{$new_product->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new_product->name}}</p>
                                        <p class="single-item-price" style="font-size: 15px; font-weight: bold;">
                                            @if($new_product->promotion_price == 0)
                                            <span class="flash-sale">{{ number_format($new_product->unit_price) }} đồng</span>
                                            @else
                                            <span class="flash-del">{{ number_format($new_product->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{ number_format($new_product->promotion_price) }} đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart', $new_product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('banhang.chitiet', $new_product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @if($stt % 4 == 0)
                            <div class="space40">&nbsp;</div>
                            @endif
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mãi</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($promotion_products)}} sản phẩm được tìm thấy</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @php $sttp=0; @endphp
                            @foreach($promotion_products as $p_product)
                            @php $sttp++; @endphp
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    <div class="single-item-header">
                                        <a href="{{ route('banhang.chitiet', $p_product->id) }}"><img src="/source/image/product/{{$p_product->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$p_product->name}}</p>
                                        <p class="single-item-price" style="font-size: 15px; font-weight: bold;">
                                            <span class="flash-del">{{ number_format($p_product->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{ number_format($p_product->promotion_price) }} đồng</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart', $p_product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('banhang.chitiet', $p_product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @if($sttp % 4 == 0)
                            <div class="space40">&nbsp;</div>
                            @endif
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
