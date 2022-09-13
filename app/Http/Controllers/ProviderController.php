<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Repositories\ProviderRepository;
use Illuminate\Http\Request;
use Session;

class ProviderController extends Controller
{

    private $providerRepository;

    public function __construct(ProviderRepository $providerRepository) {

        $this->providerRepository = $providerRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = $this->providerRepository->all();

        return view("admin.providers.index")->with("providers", $providers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.providers.new");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider = new Provider($request->all());

        $provider = $this->providerRepository->save($provider);

        Session::flash("save", "Proveedor guardado");

        return redirect("admin/providers");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        $provider = $this->providerRepository->find($provider);

        return view("admin.providers.show")->with("provider", $provider);
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
    public function update(Request $request, Provider $provider)
    {
        $provider = $this->providerRepository->update($provider, $request->all());

        Session::flash("update", "Proveedor actualizado");

        return redirect("admin/providers");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider = $this->providerRepository->delete($provider);

        Session::flash("destroy", "Proveedor eliminado");

        return redirect('admin/providers');
    }
}
