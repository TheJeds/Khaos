<x-khaos-layout>

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{asset('layout/img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>BOLSA DE COMPRA</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->

    
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-15 col-lg-15 ml-lg-auto">
                    <div class="order-details-confirmation">
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
                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        @if(Cart::count() > 0)
                            <h2>{{Cart::count()}} Producto en la bolsa</h2>

                        <ul class="order-details-form mb-4">    
                            <li><span>Product</span> <span>Total</span></li>
                            @foreach(Cart::content() as $item)
                                <li><a href="{{ route('producto.show', $item->model->id) }}"><img src="{{asset('imagenes/' . $item->model->imagen)}}" width="50" height="50" alt=""></a>
                                <a href="{{ route('producto.show', $item->model->id) }}"><h6>{{$item->model->nombre}}</h6></a>
                                <form action="{{ route('bolsa.destroy', $item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn essence-btn">Remove</button>
                                </form>
                                <span>${{$item->subtotal}}</span></li>
                            @endforeach
                            <li><span>Subtotal</span> <span>${{Cart::subtotal()}}</span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span>IVA(16%)</span> <span>${{Cart::tax()}}</span></li>
                            <li><span>Total</span> <span>${{Cart::total()}}</span></li>
                        </ul>

                        

                        <div id="paypal-button"></div>
                        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                        <script>
                            paypal.Button.render({
                                // Configure environment
                                env: 'sandbox',
                                client: {
                                    sandbox: 'demo_sandbox_client_id',
                                    production:'demo_production_client_id'
                                },
                                // Customize button (optional)
                                locale: 'en_US',
                                style: {
                                    size: 'small',
                                    color: 'gold',
                                    shape: 'pill',
                                },
                                // Set up a payment
                                payment: function (data, actions){
                                    return actions.payment.create ({
                                        transactions: [{
                                            amount: {
                                                total: '{{Cart::total()}}',
                                                currency: 'MXN'
                                            }
                                        }]
                                    });
                                },
                                // Execute the payment
                                onAuthorize: function (data, actions) {
                                    return actions.payment.execute().then(function() {
                                    // Show a confirmation message to the buyer
                                        window.alert('Thank you for your purchase!');
                                    }); 
                                }
                            }, '#paypal-button');
                            
                        </script>
                        

                    </div>
                @else

                    <h3>No hay productos en la bolsa</h3>
                    <a href="{{route('producto.index')}}" class="btn essence-btn">Continuar comprando</a>

                @endif
                </div>
            </div>
        </div>
    </div>
    @section('extra-js')
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            (function(){
                const classname = document.querySelectorAll('.cantidad')
                Array.from(classname).forEach(function(element) {
                    element.addEventListener('change', function() {
                        const id = element.getAttribute('data-id')
                        axios.patch(`/bolsa/${id}`, {
                            quantity: this.value
                        })
                        .then(function (response) {
                            // console.log(response);
                            window.location.href = '{{ route('bolsa.index') }}'
                        })
                        .catch(function (error) {
                            // console.log(error);
                            window.location.href = '{{ route('bolsa.index') }}'
                        });
                    })
                })
            })();
        </script>
    @endsection
</x-khaos-layout>