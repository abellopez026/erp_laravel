<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Session;

class ProductController extends Controller
{
    private $categoryRepository, $productRepository;

    public function __construct
    (
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    )
    {

        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->all();

        return view("admin.products.index")->with("products", $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view("admin.products.new")->with("categories", $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product($request->all());

        $product = $this->productRepository->save($product);

        Session::flash("save", "Producto guardado");

        return redirect("admin/products");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = $this->productRepository->find($product);

        return view("admin.products.show")->with("product", $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->all();
        $product = $this->productRepository->find($product);

        return view("admin.products.edit")
        ->with("categories", $categories)
        ->with("product", $product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = $this->productRepository->update($product, $request->all());

        Session::flash("update", "Producto actualizado");

        return redirect("admin/products");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = $this->productRepository->delete($product);

        Session::flash("destroy", "Producto eliminado");

        return redirect('admin/products');
    }
}
