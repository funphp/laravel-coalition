<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{

    /**
     * Submit
     *
     * @param Request
     * @return Response
     */
    public function save()
    {
        $data = Input::all();
        Product::save($data);

        return response()->json(['success'=>'ok']);

    }

    public function edit($id) {
        $product = Product::getProduct($id);

        return response()->json(['success'=>'ok', 'product'=>$product]);
    }
    public function update($id) {
        $data = Input::all();
        Product::update($data, $id);
        return response()->json(['success'=>'ok']);

    }

    public function delete($id) {
        Product::delete($id);
        return response()->json(['success'=>'ok']);
    }

    /**
     * Products listing
     *
     * @return Response
     */
    public function index()
    {
        $product = Product::get();
        usort($product, array($this,'sortProduct'));
        return response()->json(['success'=>'ok', 'product'=>$product]);
    }

    private  function sortProduct($x, $y) {
        return $x->id - $y->id;
    }
}
