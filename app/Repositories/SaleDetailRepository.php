<?php

namespace App\Repositories;

use App\Models\SaleDetail;


class SaleDetailRepository {

    public function __construct() {
        $this->model = new SaleDetail();
    }


    public function all() {
        return $this->model->all();
    }

    public function find(SaleDetail $sale)
    {
        $sale->where('id', $sale->id)->first();
        return $sale;
    }

    public function save(SaleDetail $sale) {
        $sale->save();
        return $sale;
    }

    public function edit($id) {

        $sale = SaleDetail::find($id);

        return $sale;
    }


    public function update(SaleDetail $sale, $data)
    {

        $sale-> fill($data);

        $sale->save();
        return $sale;
    }


    public function delete(SaleDetail $sale) {

        $sale = $sale->delete();

        return $sale;
    }

}
