<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Repositories\BalancePackageRepository;

class BalancePackageController extends Controller
{
    private $balancePackageRepository;

    public function __construct(BalancePackageRepository $balancePackageRepository)
    {
        $this->balancePackageRepository = $balancePackageRepository;
    }

    public function index()
    {
        return $this->balancePackageRepository->all();
    }

    public function show($id)
    {
        return $this->balancePackageRepository->findById($id);
    }

}
