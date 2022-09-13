<?php

namespace App\Abstracts;

use App\Interfaces\BankInterface;
use ErrorException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use JsonException;
use Throwable;

abstract class BankAbstract implements BankInterface
{
    /**
     * Bank api url
     *
     * @var string
     */
    protected string $apiUrl;


    /**
     * Returns exclusive way of getting balance from given bank api
     *
     * @return int
     */
    abstract public function getDataStructure(): int;

    /**
     * Returns balance of given bank
     *
     * @return mixed
     * @throws ErrorException
     */
    public function getBalance(): int
    {
        try {
            return $this->getDataStructure();
        } catch (Throwable $e) {
            report($e);
            throw new ErrorException('Something went wrong!');
        }
    }

    /**
     * Returns json export out of bank api url response
     *
     * @return mixed
     * @throws JsonException
     */
    public function parseData(): mixed
    {
        return json_decode($this->getClient(), false, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * Returns bank api url response
     *
     * @return Response
     */
    public function getClient(): Response
    {
        return Http::get($this->apiUrl);
    }

}