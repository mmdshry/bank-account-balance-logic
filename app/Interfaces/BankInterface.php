<?php

namespace App\Interfaces;

use ErrorException;
use Illuminate\Http\Client\Response;
use JsonException;

interface BankInterface
{
    /**
     * Returns bank api url response
     *
     * @return Response
     */
    public function getClient(): Response;

    /**
     * Returns json export out of bank api url response
     *
     * @return mixed
     * @throws JsonException
     */
    public function parseData(): mixed;

    /**
     * Returns balance of given bank
     *
     * @return mixed
     * @throws ErrorException
     */
    public function getBalance(): int;

    /**
     * Returns exclusive way of getting balance from given bank api
     *
     * @return int
     */
    public function getDataStructure();
}