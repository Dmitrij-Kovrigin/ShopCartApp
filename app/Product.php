<?php

namespace Product;

use App\App;

class Product
{
    public string $identifier;
    public string $name;
    public int $quantity;
    public ?float $price;
    public ?string $currency;

    public function __construct($identifier, $name, $quantity, $price, $currency)
    {
        $this->identifier = $identifier;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->currency = $currency;
        $this->price = round($this->convertToEur($price), 2);
    }

    public function convertToEur($price)
    {
        switch ($this->currency) {
            case 'GBP':
                $price = $price * 0.88;
                break;
            case 'USD':
                $price = $price * 1.14;
                break;
            default:
                $price = $price;
        }
        return $price;
    }
}
