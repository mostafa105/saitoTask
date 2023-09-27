@extends('layout')
@section('style')
    <style>
        small
        {
            color: red
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
<section class="addProduct pt-5 pb-5">
    <div class="container  shadow  ">
        <h1 class="title mb-0">New Product</h1>
        <p class="require">Please enter the information below</p>
        <hr>
        <form action="{{route('product.store')}}" method="POST" >
            @csrf
            <div class="nameInput mb-3">
                <label for="name">name</label><br>
                <input  value="{{old('name')}}" class="form-control" name="name" id="name" type="text"  aria-label="name">
                @error('name')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="detailsInput mb-3">
                <label for="details">details</label><br>
                <textarea name="details" id="details" cols="20" style="width: 100%"></textarea>
                @error('details')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="priceInput mb-3">
                <label for="price">price</label><br>
                <input value="{{old('price')}}"  class="form-control" name="price" id="price" type="text"  aria-label="price">
                @error('price')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class=" pb-3 text-center">
                <button type="submit"  class="bt btn-primary p-2 ">Add Product</button>
            </div>
        </form>
    </div>
</section>
@endsection
