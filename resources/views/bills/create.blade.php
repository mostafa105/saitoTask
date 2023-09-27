@extends('layout')
@section('style')
    <style>
        small {
            color: red;
        }

        .ch {
            width: 100%;
        }
    </style>
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
            Success
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Failed
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section class="addSale pt-5 pb-5">
        <div class="container  shadow  ">
            <h1 class="title mb-0">Add Sale</h1>
            <p class="require">Please enter the information below</p>
            <hr>
            <form action="{{ route('bill.store') }}" method="POST">
                @csrf
                <div class="dateInput mb-3">
                    <label for="date">date</label><br>
                    <input value="{{ old('sold_at') }}" class="form-control" name="sold_at" id="date" type="date"
                        aria-label="name">
                    @error('sold_at')
                        <small>
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="customerInput mb-3">
                    <label for="price">customer</label><br>
                    <select name="customer_id" class="form-select append ch p-1" aria-label="Default select example">
                        <option value="" selected hidden disabled>chose customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->company }}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <small>
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">product desc</th>
                            <th scope="col">unit price</th>
                            <th scope="col">subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><input type="number" name="products[0][quantity]" class="quantity"min="1"
                                    max="1000">
                            </td>
                            <td>
                                <select name="products[0][product_id]" class=" products ch p-1" aria-label="Default select example">
                                    <option value="" selected hidden disabled>chose product</option>
                                    @foreach ($products as $product)
                                        <option id="{{ $product->price }}" value="{{ $product->id }}"
                                            {{ old('products[0][product_id]') == $product->id ? 'selected' : '' }}>
                                            {{ $product->details }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" readonly class="unitPrice"></td>
                            <td>
                                <input type="text" readonly class="subtotal" name="products[0][subtotal]">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>
                                <input type="number" name="products[1][quantity]" class="quantity"
                                    min="1"max="1000">
                            </td>
                            <td>
                                <select name="products[1][product_id]" class="ch products p-1" aria-label="Default select example">
                                    <option value="" selected hidden disabled>chose product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ old('products[1][product_id]') == $product->id ? 'selected' : '' }}>
                                            {{ $product->details }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" readonly class="unitPrice"></td>
                            <td><input type="text" readonly class="subtotal" name='products[1][subtotal]'></td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><input type="number" name="products[2][quantity]" class="quantity" min="1"
                                    max="1000"></td>
                            <td>
                                <select name="products[2][product_id]" class="products  ch p-1" aria-label="Default select example">
                                    <option value="" selected hidden disabled>chose product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ old('products[2][product_id]') == $product->id ? 'selected' : '' }}>
                                            {{ $product->details }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" readonly class="unitPrice"></td>
                            <td><input type="text" readonly class="subtotal" name='products[2][subtotal]'></td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button class="btn btn-success" id="incressRow">+</button>
                    <button class="btn btn-warning" id="decressRow">-</button>
                </div>
                <div class=" pb-3 text-center">
                    <button id="btnAddBill" class="bt btn-primary p-2 ">Add Product</button>
                </div>
            </form>
        </div>
    </section>
    @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
@endsection
@section('scripts')
    <script>
        $(function() {
            function seteventbill() {
                $($('.ch').select2({
                    theme: "classic",
                    width: '100%'
                })).change(function() {
                    if ($(this).hasClass('products')) {
                        let products = {{ Js::from($products) }}
                        let index = $(this).prop('selectedIndex') - 1
                        let price = products[index].price
                        let nextPriceElement = $(this).parent().parent().find('.unitPrice');
                        nextPriceElement.val(price);
                        let behaindQuantityElement = $(this).parent().parent().find('.quantity');
                        behaindQuantityElement.val(1);
                        let nextSubtotalElement = $(this).parent().parent().find('.subtotal');
                        let subtotal = behaindQuantityElement.val() * price;
                        nextSubtotalElement.val(subtotal)
                    }

                });

                // give the subtotal price
                $('.quantity').bind('input', function(e) {
                    var keyPressed = event.keyCode || event.which;
                    if (keyPressed === 13) {
                        alert("You pressed the Enter key!!");
                        event.preventDefault();
                        return false;
                    }
                    let nextPriceElement = $(this).parent().parent().find('.unitPrice');
                    let price = nextPriceElement.val();
                    if (price) {
                        let quantity = $(this).val();
                        let nextSubtotalElement = $(this).parent().parent().find('.subtotal');
                        let subtotal = quantity * price;
                        nextSubtotalElement.val(subtotal)
                    }
                });
            }
            var rowIndex = 3;
            seteventbill();
            $('#incressRow').click(function(e) {
                e.preventDefault();
                rowIndex++;
                $('tbody').append(
                    `  <tr>
                            <th scope="row">${rowIndex}</th>
                            <td><input type="number" name="products[2][quantity]" class="quantity" min="1"
                                    max="1000"></td>
                            <td>
                                <select name="products[2][product_id]" class="products  ch p-1" aria-label="Default select example">
                                    <option value="" selected hidden disabled>chose product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ old('products[2][id]') == $product->id ? 'selected' : '' }}>
                                            {{ $product->details }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" readonly class="unitPrice"></td>
                            <td><input type="text" readonly class="subtotal" name=products[2][subtotal]></td>
                        </tr>`
                );
                seteventbill();

            });

            $('#decressRow').click(function(e) {
                e.preventDefault();
                if (rowIndex > 1) {
                    $('tr:last-child').remove();
                    rowIndex--
                }
            });
            $("form").on("keypress", function(event) {
                var keyPressed = event.keyCode || event.which;
                if (keyPressed === 13) {
                    event.preventDefault();
                    return false;
                }
            });

            $("form").submit(function(e) {
                $('form input').each(function() {
                    var input = $(this).val();
                    if (!input) {
                        e.preventDefault();
                        alert(`invalid data
                        should be fill all the fields in the bill
                        ${input}`);
                        return false;
                    }
                })
            })
        });
    </script>
@endsection
