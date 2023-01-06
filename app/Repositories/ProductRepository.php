<?php

namespace App\Repositories;

use App\Models\Product;


class ProductRepository {

    public function __construct() {
        $this->model = new Product();
    }


    public function all() {
        return $this->model->all();
    }

    public function find(Product $product)
    {
        $product->where('id', $product->id)->first();
        return $product;
    }

    public function save(Product $product) {
        $product->save();
        return $product;
    }

    public function edit($id) {

        $product = Product::find($id);

        return $product;
    }


    public function update(Product $product, $data)
    {
        $product-> fill($data);

        $product->save();

        return $product;
    }


    public function delete(Product $product) {

        $product = $product->delete();

        return $product;
    }

}
