<?php

namespace App;
class Product
{
    private static function getProductsPath()
    {
        return base_path() . '/products.json';
    }
    public static function save($data)
    {
        $data['id'] = time();
        $tempArray = [];
        $exitingProducts = file_get_contents(self::getProductsPath());
        if(strlen($exitingProducts)>0){
            $tempArray = json_decode($exitingProducts);
        }


        // print_r($data);
        array_push($tempArray, $data);

        $jsonData = json_encode($tempArray);

        file_put_contents(self::getProductsPath(), $jsonData);
    }
    public static function get()
    {
        if(file_exists(self::getProductsPath())) {
            $products = file_get_contents(self::getProductsPath());
            if(strlen($products)>0) {
                return json_decode($products);
            } else {
                return [];
            }
        } else {
            return [];
        }
    }
    public static function update($input, $id) {
        $input['id']=time();
        $data = self::get();
        $product = [];
        foreach($data as $key=>$p) {
            if($p->id == (int)$id) {
                $data[$key] = $input;
            }
        }

        $jsonData = json_encode($data);

        file_put_contents(self::getProductsPath(), $jsonData);
    }
    public static function delete($id) {
        $data = self::get();
        $productKey = '';
        foreach($data as $key=>$p) {
            if($p->id==$id) {
                $productKey = $key;
            }
        }
        array_splice($data, $productKey, 1);

        // unset($data[$productKey]);
        if(!is_array($data)){
            $data=[];
        }
        $jsonData = json_encode($data);

        file_put_contents(self::getProductsPath(), $jsonData);


    }
    public static function getProduct($id) {
        $data = self::get();
        $product = [];
        foreach($data as $p) {
            if($p->id==$id) {
                $product = $p;
            }
        }
        return $product;
    }
}