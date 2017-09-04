<?php

namespace Cookiesoft\Http\Controllers\Api;

use Illuminate\Http\Request;

use Cookiesoft\Http\Requests\BillpayRequest;
use Cookiesoft\Http\Requests\BillpayUpdateRequest;
use Cookiesoft\Repositories\BillpayRepository;
use Cookiesoft\Http\Controllers\Controller;


class BillpaysController extends Controller
{

    /**
     * @var BillpayRepository
     */
    protected $repository;

    public function __construct(BillpayRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->applyMultitenancy();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BillpayRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BillpayRequest $request)
    {
        $data = $request->except('done');
        $billpay = $this->repository->create($data);
        return response()->json($billpay,201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BillpayUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BillpayRequest $request, $id)
    {

        $billpay = $this->repository->update($request->all(), $id);
        return response()->json($billpay,200);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if($deleted){
            return response()->json([],204);
        }else{
            return response()->json([
                'error' => 'Resource can not be deleted'
            ],500);
        }
    }

    public function calculateTotal(){
        return $this->repository->calculateTotal();
    }
}
