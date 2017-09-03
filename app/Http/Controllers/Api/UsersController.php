<?php

namespace Cookiesoft\Http\Controllers\Api;

use Cookiesoft\Http\Requests\UserRequest;
use Cookiesoft\Repositories\UserRepository;
use Cookiesoft\Http\Controllers\Controller;

class UsersController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(UserRequest $request){
        $user = $this->repository->create($request->all());
        return response()->json($user,201);
    }
}
