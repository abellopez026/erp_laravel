<?php

namespace App\Repositories;

use App\Models\Customer;


class CustomerRepository {

    public function __construct() {
        $this->model = new Customer();
    }


    public function all() {
        return $this->model->all();
    }

    public function find(Customer $customer)
    {
        $customer->where('id', $customer->id)->first();
        return $customer;
    }

    public function save(Customer $customer) {
        $customer->save();
        return $customer;
    }

    public function edit($id) {

        $customer = Customer::find($id);

        return $customer;
    }


    public function update(Customer $customer, $data)
    {

        $customer-> fill($data);

        $customer->save();
        return $customer;
    }


    public function delete(Customer $customer) {

        $customer = $customer->delete();

        return $customer;
    }

}
