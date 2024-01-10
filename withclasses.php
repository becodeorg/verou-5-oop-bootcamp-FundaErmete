<?php

class BasketItem {
    public $name;
    public $quantity;
    public $price;

    public function __construct($name, $quantity, $price) {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getTotalCost() {
        return $this->quantity * $this->price;
    }

    public function getName() {
        return $this->name;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getTax() {
        // Define tax rates
        $fruitTaxRate = 0.06; // 6%
        $wineTaxRate = 0.21;  // 21%

        // Determine tax rate based on item type
        $taxRate = (strpos($this->name, 'wine') !== false) ? $wineTaxRate : $fruitTaxRate;

        // Calculate and return the tax amount
        return $this->quantity * $this->price * $taxRate;
    }
}

?>
