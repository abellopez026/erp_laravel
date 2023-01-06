<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SaleRepository;
use App\Repositories\SaleDetailRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CustomerRepository;
use App\Models\Sale;
use App\Models\SaleDetail;

class SaleController extends Controller
{
    private $productRepository, $customerRepository, $saleRepository, $saledetailRepository;

    public function __construct
    (
        SaleRepository $saleRepository,
        SaleDetailRepository $saledetailRepository,
        ProductRepository $productRepository,
        CustomerRepository $customerRepository,

    ) {

        $this->productRepository = $productRepository;
        $this->customerRepository = $customerRepository;
        $this->saleRepository = $saleRepository;
        $this->saledetailRepository = $saledetailRepository;

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

        return response()-json($request, 200); 

        /* $sale = new Sale($request->sale[0]);
        $sale = $this->saleRepository->save($sale);

        $details = array_filter($request->sale_detail);

        foreach($details as $d) {

            $saledetail = new SaleDetail($d);

            $saledetail->sale_id = $sale->id;

            $saledetail = $this->saledetailRepository->save($saledetail);

        } */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $sale = $this->saleRepository->find($sale);

        return view("admin.sales.show")->with("sale", $sale);
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
