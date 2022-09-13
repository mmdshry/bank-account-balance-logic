<?php

namespace App\Http\Controllers;

use App\Banks\BankA;
use App\Banks\BankB;
use Illuminate\Http\JsonResponse;

class BalanceController
{
    //@todo All banks should be listed in database and not be entered manually.

    private array $bankList = [BankA::class, BankB::class];

    /**
     * @return JsonResponse
     */
    public function getBalance(): JsonResponse
    {
        $response = [];

        foreach ($this->bankList as $bank) {
            $bank                            = new $bank();
            $balance                         = $bank->getBalance();
            $response[class_basename($bank)] = $balance;
        }

        $response['total'] = collect($response)->sum();

        return response()->json($response);
    }
}