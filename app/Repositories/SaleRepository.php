<?php

namespace App\Repositories;

use App\Models\Sale;


class SaleRepository {

    public function __construct() {
        $this->model = new Sale();
    }


    public function all() {
        return $this->model->all();
    }

    public function find(Sale $sale)
    {
        $sale->where('id', $sale->id)->first();
        return $sale;
    }

    public function save(Sale $sale) {
        $sale->save();
        return $sale;
    }

    public function edit($id) {

        $sale = Sale::find($id);

        return $sale;
    }


    public function update(Sale $sale, $data)
    {

        $sale-> fill($data);

        $sale->save();
        return $sale;
    }


    public function delete(Sale $sale) {

        $sale = $sale->delete();

        return $sale;
    }

}
