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
            <span>{{ $producto->marca->nombre }}</span>
            <a href="cart.html">
                <h2>{{$producto->nombre}}</h2>
            </a>
            <p class="product-price">${{$producto->precio}}</p>
            <p class="product-desc">Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin.</p>
            <h5>Cuidados</h5>
            @foreach ($producto->cuidados as $cuidado)
                <li>
                    {{ $cuidado->nombre_cuidado }}
                </li>
            @endforeach
            <!-- Form -->
            @if (Route::has('login'))
                                                
                @auth
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="cart-form clearfix" action="{{ route('bolsa.store')}}" method="POST">
                <!-- Select Box -->
                @csrf <!-- {{ csrf_field() }} -->
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
                @else
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <a class="btn essence-btn" href="{{route('register')}}">Add to cart</a>                    
                @endauth
                
            @endif
            
            @if(Route::has('login'))
                @auth
                    @if(Auth::user()->utype === 'ADM')
                        <form action="{{route('producto.edit', $producto)}}">
                            @csrf <!-- {{ csrf_field() }} -->
                            <br>
                            <input type="submit" value="editar" class="btn essence-btn">
                        </form>
                        <form action="{{route('producto.destroy', $producto)}}" method="POST" onsubmit="return confirm('¿Estas seguro de eliminar el producto?')">
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
    <section>
        <div class="order-details-confirmation">
            <div class="row">
                <div class="col-12 col-md-15 col-lg-15 ml-lg-auto"> 
                    <h4>Comentarios</h4>
                    <hr>
                    @foreach ($comentarios as $comentario)
                        @if ($comentario->producto->id == $producto->id)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        
                                        <div class="desc">
                                            <h6>{{ $comentario->titulo }}</h6>
                                            <p class="comment">
                                            {{ $comentario->comentario }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <p>{{ $comentario->user->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @can('update', $comentario)
                                    <div class="mt-20">
                                        <form action="{{route('comentario.destroy', $comentario)}}" method="POST" onsubmit="return confirm('¿Estas seguro de eliminar el comentario?')">
                                            @method('DELETE')    
                                            @csrf                                          
                                            <input type="submit" value="Eliminar" class="btn essence-btn">
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        @endif
                        <hr>
                    @endforeach

                    <div class="order-details-confirmation">
                        <div class="row">
                            <div class="col-12 col-md-15 col-lg-15 ml-lg-auto"> 
                                <h5>Deja un comentario</h5>

                                @if (Route::has('login'))
                                                
                                    @auth
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form class="form-contact comment_form" action="{{route('comentario.store')}}" method="POST">
                                    @csrf <!-- {{ csrf_field() }} -->
                                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-control" name="titulo" type="text" required placeholder="Titulo">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control w-100" name="comentario" cols="30" rows="9" required placeholder="Deja tu comentario"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn essence-btn">Publica tu comentario</button>
                                        </div>
                                    </form>        
                                    @else
                                        <h6>-Debes registrarte para poder comentar</h6>
                                    @endauth
                                    
                                @endif

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-khaos-layout>