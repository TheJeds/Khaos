<x-khaos-layout>
    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url({{asset('layout/img/bg-img/bg-1.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h2>Nueva Coleccion</h2>
                        <a href="/producto" class="btn essence-btn">ver coleccion</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('layout/img/bg-img/bg-2.jpg')}});">
                        <div class="catagory-content">
                            <a href="/producto">Toda</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('layout/img/marca-img/nike_marca.png')}});">
                        <div class="catagory-content">
                            <a href="/producto/marca/1">Nike</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('layout/img/marca-img/adidas_marca.png')}});">
                        <div class="catagory-content">
                            <a href="/producto/marca/2">Adidas</a>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('layout/img/marca-img/ca_marca.png')}});">
                        <div class="catagory-content">
                            <a href="/producto/marca/5">C&A</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('layout/img/marca-img/hm_marca.jpg')}});">
                        <div class="catagory-content">
                            <a href="/producto/marca/4">H&M</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('layout/img/marca-img/zara_marca.jpeg')}});">
                        <div class="catagory-content">
                            <a href="/producto/marca/3">ZARA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Productos</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">

                        @foreach($productos as $producto)
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="{{asset('layout/img/product-img/product-1.jpg')}}" alt="">
                                    <!-- Hover Thumb -->
                                    <img class="hover-img" src="{{asset('layout/img/product-img/product-2.jpg')}}" alt="">
                                    <!-- Favourite -->
                                    <div class="product-favourite">
                                        <a href="#" class="favme fa fa-heart"></a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <span>{{ $producto->marca->nombre }}</span>
                                    <a href="{{route('producto.show', $producto->id)}}">
                                        <h6>{{ $producto->nombre }}</h6>
                                    </a>
                                    <p class="product-price">${{ $producto->precio }}</p>

                                </div>
                            </div>
                        @endforeach
                        <!-- Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->
        
    </section>
    <!-- ##### New Arrivals Area End ##### -->
</x-khaos-layout>