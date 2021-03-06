<x-khaos-layout>
    <div class="breadcumb_area bg-img" style="background-image: url({{asset('layout/img/bg-img/breadcumb.jpg')}})";>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>SHOP</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">                        

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Marcas</h6>
                        </div>

                            <!-- Widget Title 2 -->
                            <div class="widget catagory mb-50">
                            <!-- Widget Title -->

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="sub-menu collapse show">
                                    <!-- Single Item -->
                                    <a href="{{ route('producto.index') }}" class="d-flex">
                                        <p>Todas</p>
                                    </a>
                                    <li data-toggle="collapse" data-target="#clothing">                                            
                                    @foreach ($marcas as $marca)
                                        <li><a href="{{ route('producto.index_marcas', $marca) }}">{{$marca->nombre}}</a></li>                                                                              
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span>{{sizeof($productos)}}</span> Productos encontrados</p>
                                    </div>
                                    @if(Route::has('login'))
                                        @auth
                                            @if(Auth::user()->utype === 'ADM')
                                                <form action="{{route('producto.create')}}">
                                                    @csrf <!-- {{ csrf_field() }} -->
                                                    <br>
                                                    <input type="submit" value="crear" class="btn essence-btn">
                                                </form>
                                            @endif
                                        @endif
                                    @endif
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <!-- Single Product -->
                            @for ($i = sizeof($productos)-1; $i >= 0; $i--)
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-wrapper">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <img src="{{asset('imagenes/' . $productos[$i]->imagen)}}" alt="">
                                            <!-- Product Badge -->
                                            @if($i === sizeof($productos) -1 || $i === sizeof($productos) -2 || $i === sizeof($productos) -3)
                                                <div class="product-badge new-badge">
                                                <span>New</span>
                                                </div>
                                            @endif
                                            <!-- Favourite -->
                                            <div class="product-favourite">
                                                <a href="#" class="favme fa fa-heart"></a>
                                            </div>
                                        </div>

                                        <!-- Product Description -->
                                        <div class="product-description">
                                            <span>{{ $productos[$i]->marca->nombre }}</span>
                                            <br>
                                            <span>{{ $productos[$i]->tipo }}</span>
                                            <a href="{{route('producto.show', $productos[$i])}}">
                                                <h6>{{ $productos[$i]->nombre }}</h6>
                                            </a>
                                            <p class="product-price">${{ $productos[$i]->precio }}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

</x-khaos-layout>