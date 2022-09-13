<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://cdn.vandar.io/public/logos/typo.svg" width="400" alt="Laravel Logo"></a></p>

## Description

- The scenario is we may have many banks api with a single purpose and that purpose is user `balance`
- The challenge is that banks api may have different data structures which enforce us for finding optimize way for
  fetching user balance with less modification.
- As we don't have database, in balance controller we add `bankList` which is for active banks which
  we have `BankA` and `BankB`.
- We should store some sensetive information like banks api in to the DB

- There are no tests because we must `mock` all URL's that make no sense here.

# Folder Structure

```
├── ...
├── app               
│   ├── Interfaces          # App interfaces
│       └── BankInterface   # Bank Interface with 4 methods
├── Abstracts               # App abstract classes
│   ├── BankAbstract        # Bank abstract class which fetch and process data and retruns balance
├── Banks
│   ├── ABank               # Bank class for bank A which extends BankAbstract
│   └── Bbank               # Bank class for bank B which extends BankAbstract
└── ... 
```

## Install

- Clone the repository and run `composer install`
- Run `php artisan serve` command
- Preform `http://127.0.0.1:8000/api/balance` get request

## Get Total Balance

The route below is for getting balance for each bank and response with sum of bank balances
`/api/balance`
