@extends('Front.master')
@section('title')
    Cart Details
@endsection
@section('body')
    <div class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('remove.from.cart') }}" method="post">
                        @csrf
                        <div class="cart-table-content">
                            <div class="table-content table-responsive">
                                <table id="cart">
                                    <thead>
                                    <tr>
                                        <th class="width-thumbnail"></th>
                                        <th class="width-name">Product</th>
                                        <th class="width-price"> Price</th>
                                        <th class="width-quantity">Quantity</th>
                                        <th class="width-subtotal">Subtotal</th>
                                        <th class="width-remove"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $total = 0 @endphp
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td class="product-thumbnail">
                                            <a href="product-details.html"><img src="{{ asset($details['image']) }}" alt=""></a>
                                        </td>
                                        <td class="product-name">
                                            <h5><a href="">{{ $details['name'] }}</a></h5>
                                        </td>
                                        <td class="product-cart-price"><span class="amount">{{ $details['price'] }}</span></td>
                                        <td class="cart-quality">
                                            <div class="product-quality">
                                                <input type="number" data-id="{{$id}}" class="cart-plus-minus-box input-text qty text updatecart" name="qtybutton" value="{{ $details['quantity'] }}">
                                            </div>
                                        </td>
                                        <td class="product-total"><span>{{ $details['price'] * $details['quantity'] }}</span></td>
                                        <td class="actions">
                                            <button class="btn btn-danger btn-sm remove-from-cart"> <i class=" ti-trash "></i></button>
                                        </td>
                                    </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update btn-hover">
                                        <a href="#">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear-wrap">
                                        <div class="cart-clear btn-hover">
                                            <button>Update Cart</button>
                                        </div>
                                        <div class="cart-clear btn-hover">
                                            <a href="#">Clear Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="grand-total-wrap">
                        <div class="grand-total-content">
                            <div class="grand-total">
                                <h4>Total <span>${{ $total }}</span></h4>
                            </div>
                        </div>
                        <div class="grand-total-btn btn-hover">
                            <a class="btn theme-color" href="checkout.html">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('front-js')
    <script>
        $('.updatecart').change(function (e) {
            e.preventDefault();
            var ele = $(this).data('id');
            var qty = $(this).val();

          $.ajax({
              url:'{{ route('update.cart') }}',
              method: 'POST',
              data:{
                  _token: '{{ csrf_token() }}',
                  id: ele,
                  quantity: qty
              },
              success: function (response) {
                  window.location.reload();
              },
              error:function(response){
                  console.log(response)
              }
          });

        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("are you sure?")){
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").data('id')
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection

