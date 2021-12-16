<?php

namespace App\Http\Controllers\Main;

use App\Product;
use App\Settings;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $tax = Settings::findOrFail(1)->vat;
        return view('main.cart.index')->withCart(Cart::content())->withGlobalTax(Cart::setGlobalTax($tax))->withTaxes(Cart::tax())->withSubTotal(Cart::subtotal())->withTotal(Cart::total());
    }

    public function store(Product $product, Request $request)
    {
        foreach(Cart::content() as $c)
        {
            if($c->model->user_id !== $product->user_id) { 
                Cart::remove($c->rowId);
            }
        }


        $options = array_combine(explode(",", $request->options),explode(",", $request->main_options));

        $product->discount > 0 ? $price = $product->discount : $price = $product->price;

        Cart::add($product->id, $product->name != "" ? $product->name : $product->name_ar, 1, $price, 0, $options)->associate('App\Product');
        return $request->type == 'buy_now' ? redirect()->to('cart') : redirect()->back();   
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        return redirect()->route('cart.index');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index');
    }
}
