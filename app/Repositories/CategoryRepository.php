<?php

namespace App\Repositories;

use App\Models\Category;


class CategoryRepository {

    public function __construct() {
        $this->model = new Category();
    }


    public function all() {
        return $this->model->all();
    }

    public function find(Category $category)
    {
        $category->where('id', $category->id)->first();
        return $category;
    }

    public function save(Category $category) {
        $category->save();
        return $category;
    }

    public function edit($id) {

        $category = Category::find($id);

        return $category;
    }


    public function update(Category $category, $data)
    {

        $category-> fill($data);

        $category->save();
        return $category;
    }


    public function delete(Category $category) {

        $category = $category->delete();

        return $category;
    }

}
