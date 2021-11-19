<x-khaos-layout>
    <div class="breadcumb_area bg-img" style="background-image: url({{asset('layout/img/bg-img/breadcumb.jpg')}})";>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>CREAR PRODUCTO</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="checkout_area section-padding-80">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="checkout_details_area mt-50 clearfix">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf <!-- {{ csrf_field() }} -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre">Nombre <span>*</span></label>
                                        <input type="text" name="nombre" class="form-control" id="nombre" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="precio">Precio <span>*</span></label>
                                        <input type="text" name="precio" class="form-control" id="precio" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="cantidad">Cantidad </label>
                                        <input type="text" name="cantidad" class="form-control" id="cantidad" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="tipo">Tipo <span>*</span></label>
                                        <select class="w-100" id="tipo" name="tipo">
                                            <option value="tenis">Tenis</option>
                                            <option value="ropa">Ropa</option>
                                            <option value="accesorios">Accesorios</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="marca">Marca <span>*</span></label>
                                        <select class="w-100" id="marca_id" name="marca_id">
                                            @foreach ($marcas as $marca)

                                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="imagen_path">Imagen <span>*</span></label>
                                        <input type="file" class="form-control" id="imagen_path" name="imagen_path" required>
                                    </div>
                                    @foreach ($cuidados as $cuidado)
                                        <label for="{{$cuidado->nombre_cuidado}}" class="col-3">
                                            {{$cuidado->nombre_cuidado}}
                                            <input type="checkbox" name="cuidado_id[]" value="{{$cuidado->id}}" id="{{$cuidado->nombre_cuidado}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    @endforeach
                                </div>
                                <div>
                                    <input type="submit" class="btn essence-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-khaos-layout>