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
<section class="addCustomer pt-5 pb-5">
    <div class="container  shadow  ">
        <h1 class="title mb-0">Add New Customer</h1>
        <p class="require">Please enter the information below</p>
        <hr>
        <form action="{{route('customer.store')}}" method="POST" >
            @csrf
            <div class="companyInput mb-3">
                <label for="company">Company</label><br>
                <input  value="{{old('company')}}" class="form-control" name="company" id="company" type="text"  aria-label="Company">
                @error('company')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="contactPersonInput mb-3">
                <label for="contactPerson">Contact Person</label><br>
                <input value="{{old('contact_person')}}" class="form-control" name="contact_person" id="contactPerson" type="text"  aria-label="Contact Person">
                @error('contact_person')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="emailAddressInput mb-3">
                <label for="emailAddress">Email Address</label><br>
                <input value="{{old('email')}}"  class="form-control" name="email" id="emailAddress" type="email"  aria-label="Email Address">
                @error('email')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="phoneInput mb-3">
                <label for="phone">Phone</label><br>
                <input value="{{old('phone')}}" class="form-control" name="phone" id="phone" type="text" aria-label="Phone">
                @error('phone')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="addressInput mb-3" >
                <label for="address">Address</label><br>
                <input value="{{old('address')}}" class="form-control" name="address" id="address" type="text"  aria-label="Address">
                @error('address')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="cityInput mb-3">
                <label for="city">City</label><br>
                <input value="{{old('city')}}" class="form-control" name="city" id="city" type="text" aria-label="City">
                @error('city')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="stateInput mb-3">
                <label for="state">State</label><br>
                <input value="{{old('state')}}" class="form-control" name="state" id="state" type="text"  aria-label="State">
                @error('state')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="postalCodeInput mb-3">
                <label for="postalCode">Postal code</label><br>
                <input value="{{old('postal_code')}}" class="form-control" name="postal_code" id="postalCode" type="text"   aria-label="Postal code">
                @error('postal_code')
                    <small>
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="countryInput pb-3">
                <label for="country">Country</label><br>
                <input value="{{old('country')}}" class="form-control" name="country" id="country" type="text"  aria-label="Country">
                @error('country')
                    <small >
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class=" pb-3 text-center">
                <button type="submit"  class="bt btn-primary p-2 ">Add Customer</button>
            </div>
        </form>
    </div>
</section>
@endsection
