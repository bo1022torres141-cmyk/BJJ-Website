<?php
$storeName = "BJJ Gi Gear Store";
$bg_Color = "#F0F8FF";
$txt_Color = "#000080";
$discountThreshold = 5000;
$discountRate = 0.1;
$products = array(
    array("name" => "Jiu Jitsu Gi", "price" => 10000, "description" => "High-quality kimono for training"),
    array("name" => "Belt", "price" => 800, "description" => "Official colored belt for ranks"),
    array("name" => "Rash Guard", "price" => 3500, "description" => "Compression rash guard built for no-gi grappling"),
    array("name" => "Mouth Guard", "price" => 1200, "description" => "Good quality mouthguard for teeth and gum protection"),
);
$total = count($products);
$totalCost = 0;
$premiumCount = 0;
$i = 0;
do {
    $totalCost = $totalCost + $products[$i]["price"];
    if ($products[$i]["price"] > 6000) {
        $premiumCount = $premiumCount + 1;
    }
    $i = $i + 1;
} while ($i < $total);
$averagePrice = $totalCost / $total;
$haveDiscount = false;
$j = 0;
while ($j < $total) {
    if ($products[$j]["price"] > $discountThreshold) {
        $haveDiscount = true;
        break;
    }
    $j = $j + 1;
}
function calculateDiscountedPrice($price, $threshold, $rate) {
    if ($price > $threshold) {
        return $price * (1 - $rate);
    } else {
        return $price;
    }
}
function displayProduct($product, $threshold, $rate) {
    $discountedPrice = calculateDiscountedPrice($product["price"], $threshold, $rate);
    echo "<div class='product'>";
    echo "<strong>" . $product["name"] . "</strong><br>";
    if ($product["price"] > $threshold) {
        echo "Original Price: Php" . number_format($product["price"], 2) . "<br>";
        echo "Discounted Price: Php" . number_format($discountedPrice, 2) . "<br>";
    } else {
        echo "Price: Php" . number_format($product["price"], 2) . "<br>";
    }
    echo "Description: " . $product["description"];
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> BJJ Gi Gear store </title>
    <style>
        body {
            background-image: url('bjj.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: <?= $txt_Color; ?>;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .product {
            margin: 10px 0;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #4682B4;
            display: inline-block;
            width: 80%;
            text-align: left;
        }
        .summary {
            margin-top: 20px;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #4682B4;
            display: inline-block;
            width: 80%;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Welcome home to <?= $storeName; ?> your 3rd family.</h1>
    <p>Hey grappler! We have <?= $total; ?> essential gear items.</p>
    <?php if ($haveDiscount): ?>
        <p>Special offer: 10% off on items over Php<?= number_format($discountThreshold, 2); ?>!</p>
    <?php endif; ?>
    <?php
    $index = 0;
    while ($index < $total) {
        displayProduct($products[$index], $discountThreshold, $discountRate);
        $index = $index + 1;
    }
    ?>
    <div class="summary">
        <strong>Store Summary:</strong><br>
        Total Items: <?= $total; ?><br>
        Total Cost (Original): Php<?= number_format($totalCost, 2); ?><br>
        Average Price: Php<?= number_format($averagePrice, 2); ?><br>
        Premium Items: <?= $premiumCount; ?><br>
        <?php if ($totalCost > 20000): ?>
            <em>High-value inventory! Consider bulk discounts.</em>
        <?php else: ?>
            <em>Great deals for all our fighting grapplers!.</em>
        <?php endif; ?>
    </div>
</body>
</html>
