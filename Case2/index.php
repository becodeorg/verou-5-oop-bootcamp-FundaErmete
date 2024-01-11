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

// Function to apply a discount to fruits
function applyFruitDiscount(&$basket)
{
    // Define the discount rate for fruits
    $fruitDiscountRate = 0.5; // 50%

    // Apply discount to each fruit in the basket
    foreach ($basket as $item => &$details) {
        if (strpos($item, 'Bananas') !== false || strpos($item, 'Apples') !== false) {
            $details['price'] *= (1 - $fruitDiscountRate);
        }
    }
}

// Display the items in the original basket and their quantities
echo "Original Basket Contents:\n";
foreach ($basket as $item => $details) {
    echo "{$details['quantity']} {$item}(s) - €{$details['price']} each\n";
}

// Calculate and display the total cost of the original basket
$totalCost = calculateTotalCost($basket);
echo "\nOriginal Total Cost: €{$totalCost}\n";

// Calculate and display the tax amount for each item in the original basket
echo "\nOriginal Tax Breakdown:\n";
foreach ($basket as $item => $details) {
    $taxAmount = calculateTax($item, $details['quantity'], $details['price']);
    echo "{$details['quantity']} {$item}(s) - Tax: €{$taxAmount}\n";
}

// Apply discount to fruits
applyFruitDiscount($basket);

// Display the items in the updated basket after applying the discount
echo "\nUpdated Basket Contents (with 50% off for fruits):\n";
foreach ($basket as $item => $details) {
    echo "{$details['quantity']} {$item}(s) - €{$details['price']} each\n";
}

// Calculate and display the total cost of the updated basket
$totalCostAfterDiscount = calculateTotalCost($basket);
echo "\nUpdated Total Cost: €{$totalCostAfterDiscount}\n";

// Calculate and display the tax amount for each item in the updated basket
echo "\nUpdated Tax Breakdown:\n";
foreach ($basket as $item => $details) {
    $taxAmount = calculateTax($item, $details['quantity'], $details['price']);
    echo "{$details['quantity']} {$item}(s) - Tax: €{$taxAmount}\n";
}

?>
