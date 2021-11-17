<x-khaos-layout>
    <div class="breadcumb_area bg-img" style="background-image: url({{asset('layout/img/bg-img/breadcumb.jpg')}})";>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>PRODUCTO</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                <img src="{{asset('imagenes/' . $producto->imagen)}}" alt="">
                <img src="{{asset('imagenes/' . $producto->imagen)}}" alt="">
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
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
            <span>Marca</span>
            <a href="cart.html">
                <h2>{{$producto->nombre}}</h2>
            </a>
            <p class="product-price">${{$producto->precio}}</p>
            <p class="product-desc">Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin.</p>

            <!-- Form -->
            <form class="cart-form clearfix" action="{{ route('bolsa.store')}}" method="POST">
                <!-- Select Box -->
                @csrf <!-- {{ csrf_field() }} -->
                <div class="select-box d-flex mt-50 mb-30">
                    <select name="select" id="productSize" class="mr-5">
                        <option value="value">Size: XL</option>
                        <option value="value">Size: X</option>
                        <option value="value">Size: M</option>
                        <option value="value">Size: S</option>
                    </select>
                    <select name="select" id="productColor">
                        <option value="value">Color: Black</option>
                        <option value="value">Color: White</option>
                        <option value="value">Color: Red</option>
                        <option value="value">Color: Purple</option>
                    </select>
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->                                       
                        
                    <input type="hidden" name="id" value="{{ $producto->id }}">
                    <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
                    <input type="hidden" name="precio" value="{{ $producto->precio }}">
                    <button type="submit" name="addtocart" class="btn essence-btn">Add to cart</button>  
                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>   
            </form>
            @if(Route::has('login'))
                @auth
                    @if(Auth::user()->utype === 'ADM')
                        <form action="{{route('producto.edit', $producto)}}">
                            @csrf <!-- {{ csrf_field() }} -->
                            <br>
                            <input type="submit" value="editar" class="btn essence-btn">
                        </form>
                        <form action="{{route('producto.destroy', $producto)}}" method="POST">
                            @method('DELETE')    
                            @csrf
                            <br>
                            <input type="submit" value="eliminar" class="btn essence-btn">
                        </form>
                    @endif
                @endif
            @endif            
        </div>
    </section>
</x-khaos-layout>