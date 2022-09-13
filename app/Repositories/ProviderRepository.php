<?php

namespace App\Repositories;

use App\Models\Provider;


class ProviderRepository {

    public function __construct() {
        $this->model = new Provider();
    }


    public function all() {
        return $this->model->all();
    }

    public function find(Provider $provider)
    {
        $provider->where('id', $provider->id)->first();
        return $provider;
    }

    public function save(Provider $provider) {
        $provider->save();
        return $provider;
    }

    public function edit($id) {

        $provider = Provider::find($id);

        return $provider;
    }


    public function update(Provider $provider, $data)
    {
        $provider-> fill($data);

        $provider->save();

        return $provider;
    }


    public function delete(Provider $provider) {

        $provider = $provider->delete();

        return $provider;
    }

}
