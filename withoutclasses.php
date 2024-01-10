<?php

// Define the items and their quantities and prices
$basket = array(
    'Bananas' => array('quantity' => 6, 'price' => 1),
    'Apples' => array('quantity' => 3, 'price' => 1.5),
    'Bottles_of_wine' => array('quantity' => 2, 'price' => 10)
);

// Function to calculate the total cost of the basket
function calculateTotalCost($basket)
{
    $totalCost = 0;

    foreach ($basket as $item => $details) {
        $totalCost += $details['quantity'] * $details['price'];
    }

    return $totalCost;
}

// Function to calculate the tax amount based on item type
function calculateTax($item, $quantity, $price)
{
    // Define tax rates
    $fruitTaxRate = 0.06; // 6%
    $wineTaxRate = 0.21;  // 21%

    // Determine tax rate based on item type
    $taxRate = (strpos($item, 'wine') !== false) ? $wineTaxRate : $fruitTaxRate;

    // Calculate and return the tax amount
    return $quantity * $price * $taxRate;
}

// Display the items in the basket and their quantities
echo "Basket Contents:\n";
foreach ($basket as $item => $details) {
    echo "{$details['quantity']} {$item}(s) - €{$details['price']} each\n";
}

// Calculate and display the total cost of the basket
$totalCost = calculateTotalCost($basket);
echo "\nTotal Cost: €{$totalCost}\n";

// Calculate and display the tax amount for each item
echo "\nTax Breakdown:\n";
foreach ($basket as $item => $details) {
    $taxAmount = calculateTax($item, $details['quantity'], $details['price']);
    echo "{$details['quantity']} {$item}(s) - Tax: €{$taxAmount}\n";
}

// Calculate and display the overall tax amount
$totalTax = array_sum(array_map(function ($item) use ($basket) {
    return calculateTax($item, $basket[$item]['quantity'], $basket[$item]['price']);
}, array_keys($basket)));

echo "\nTotal Tax: €{$totalTax}\n";
?>
