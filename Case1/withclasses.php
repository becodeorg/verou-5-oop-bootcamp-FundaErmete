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

class Basket {
    private $items = [];

    public function addItem(BasketItem $item) {
        $this->items[] = $item;
    }

    public function calculateTotalCost() {
        $totalCost = 0;

        foreach ($this->items as $item) {
            $totalCost += $item->getTotalCost();
        }

        return $totalCost;
    }

    public function calculateTotalTax() {
        $totalTax = 0;

        foreach ($this->items as $item) {
            $totalTax += $item->getTax();
        }

        return $totalTax;
    }

    public function displayBasket() {
        echo "Basket Contents:\n";

        foreach ($this->items as $item) {
            echo "{$item->getQuantity()} {$item->getName()}(s) - €{$item->getPrice()} each\n";
        }
    }
}

// Create basket items
$banana = new BasketItem('Bananas', 6, 1);
$apple = new BasketItem('Apples', 3, 1.5);
$wine = new BasketItem('Bottles_of_wine', 2, 10);

// Create a basket
$basket = new Basket();

// Add items to the basket
$basket->addItem($banana);
$basket->addItem($apple);
$basket->addItem($wine);

// Display the basket contents
$basket->displayBasket();

// Calculate and display the total cost of the basket
$totalCost = $basket->calculateTotalCost();
echo "\nTotal Cost: €{$totalCost}\n";

// Calculate and display the total tax amount
$totalTax = $basket->calculateTotalTax();
echo "\nTotal Tax: €{$totalTax}\n";


?>
