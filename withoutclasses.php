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

?>
