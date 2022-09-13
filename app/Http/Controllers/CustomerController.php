<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;
use App\Models\Customer;
use App\Http\Requests\CustomerFormRequest;
use Session;

class CustomerController extends Controller
{

    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository) {

        $this->customerRepository = $customerRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerRepository->all();

        return view('admin.customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerFormRequest $request)
    {
        $customer = new Customer($request->all());

        $this->customerRepository->save($customer);

        Session::flash("save", "Cliente guardado");

        return redirect("admin/customers");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer = $this->customerRepository->find($customer);

        return view("admin.customers.show")->with("customer", $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customer = $this->customerRepository->find($customer);

        return view('admin.customers.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerFormRequest $request, Customer $customer)
    {
        $customer = $this->customerRepository->update($customer, $request->all());

        Session::flash("update", "Cliente actualizado");

        return redirect("admin/customers");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer = $this->customerRepository->delete($customer);

        Session::flash("destroy", "Cliente eliminado");

        return redirect('admin/customers');
    }



}
