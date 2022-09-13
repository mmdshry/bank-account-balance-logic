<?php

namespace App\Banks;

use App\Abstracts\BankAbstract;
use JsonException;

class BankA extends BankAbstract
{
    //@todo Bank api url should be existed in database and not be entered manually.

    protected string $apiUrl = 'https://vandar.ir/mock/a';

    /**
     * @throws JsonException
     */
    public function getDataStructure(): int
    {
        return $this->parseData()->data->balance;
    }
}