<?php
$storeName = "BJJ Gi Gear Store";
$bg_Color = "#F0F8FF";
$txt_Color = "#000080";
$products = array(
    array("name" => "Jiu Jitsu Gi", "price" => 10000, "description" => "High-quality kimono for training"),
    array("name" => "Belt", "price" => 800, "description" => "Official colored belt for ranks"),
    array("name" => "Rash Guard", "price" => 3500, "description" => "Compression rash guard built for no-gi grappling"),
    array("name" => "Mouth Guard", "price" => 1200, "description" => "Good quality mouthguard for teeth and gum protection"),
    
);
$total = count($products);
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
    </style>
</head>
<body>
    <h1>Welcome home to <?= $storeName; ?> your 3rd family.</h1>
    <p>Hey grappler! We have <?= $total; ?> essential gear items.</p>
    <?php
    foreach ($products as $product) {
        echo "<div class='product'>";
        echo "<strong>" . $product["name"] . "</strong><br>";
        echo "Price: Php" . number_format($product["price"], 2) . "<br>";
        echo "Description: " . $product["description"];
        echo "</div>";
    }
    ?>
</body>
</html>
