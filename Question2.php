<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function checkDiscount($purchaseValue) {
    if ($purchaseValue >= 500) {
        echo "Purchase Value is $purchaseValue , discount is 10%\n";
    } elseif ($purchaseValue >= 100) {
        echo "Purchase Value is $purchaseValue , discount is 5%\n";
    } else {
        echo "Purchase Value is $purchaseValue , there are no discount.\n";
    }
}

checkDiscount(300);  // Outputs: Purchase Value is 300 , discount is 5%
checkDiscount(80);   // Outputs: Purchase Value is 80 , there are no discount.
checkDiscount(600);  // Outputs: Purchase Value is 600 , discount is 10%
checkDiscount(200);  // Outputs: Purchase Value is 200 , discount is 5%
    ?>
</body>
</html>