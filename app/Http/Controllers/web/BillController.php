<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Product;

class BillController extends Controller
{
    public function create(){
        $customers = Customer::select('id','company')->get();
        $products = Product::all();
        return  view('bills.create')->with(['customers'=>$customers, 'products'=>$products]);
      }

      public function store(BillRequest $bill ){
          $newBill = $bill->validated();
          if ($newBill = Bill::create($newBill)) {
            foreach ($bill->products as $product){
                $newBill->products($product)->attach($product);
            }

              return redirect()->back()->with('success', 'Success');
          }
          return redirect()->back()->with('failed', 'failed')->withInput();
        }
}
