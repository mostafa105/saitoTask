<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(){
      return  view('customers.create');
    }

    public function store(CustomerRequest $request){
        $newCustomer = $request->validated();
        if ($newCustomer = Customer::create($newCustomer)) {
            return redirect()->back()->with('success', 'Success');
        }
        return redirect()->back()->with('failed', 'failed')->withInput();
      }
}
