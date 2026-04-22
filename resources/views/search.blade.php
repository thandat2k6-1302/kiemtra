@extends('layouts.master')
@section('title', 'Kết quả tìm kiếm')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Kết quả tìm kiếm</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($product)}} sản phẩm được tìm thấy</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @php $stt=0; @endphp
                            @foreach($product as $new_product)
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
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
