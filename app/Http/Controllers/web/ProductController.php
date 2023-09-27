<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        return  view('products.create');
      }

      public function store(ProductRequest $request){
          $newProduct = $request->validated();
          if ($newCustomer = Product::create($newProduct)) {
              return redirect()->back()->with('success', 'Success');
          }
          return redirect()->back()->with('failed', 'failed')->withInput();
        }
}
