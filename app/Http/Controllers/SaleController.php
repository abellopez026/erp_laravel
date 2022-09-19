<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SaleRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CustomerRepository;
use App\Models\Sale;

class SaleController extends Controller
{
    private $productRepository, $saleRepository;

    public function __construct
    (
        SaleRepository $saleRepository,
        ProductRepository $productRepository,
        CustomerRepository $customerRepository,

    ) {

        $this->productRepository = $productRepository;
        $this->customerRepository = $customerRepository;
        $this->saleRepository = $saleRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = $this->saleRepository->all();
        return view("admin.sales.index")->with("sales", $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->productRepository->all();
        $customers = $this->customerRepository->all();

        return view("admin.sales.new")
        ->with("products", $products)
        ->with("customers", $customers)
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new Sale($request->sale[0]);

        $sale = $this->saleRepository->save($sale);

        return redirect("admin/sales"); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
