<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Constants
$item_tier_rarity = [1, 2, 3, 4, 5]; // 1 = common, 5 = legend
$vip_rank = ['vip 1', 'vip 2', 'vip 3', 'vip 4', 'vip 5']; // v1 = lowest rank

// Function to roll an item for a given VIP rank
function roll_item($vip_rank) {
    global $item_tier_rarity;
    
    // Determine the allowed rarities based on VIP rank
    $max_allowed_index = array_search($vip_rank, $GLOBALS['vip_rank']);
    $allowed_rarities = array_slice($item_tier_rarity, 0, $max_allowed_index + 1);
    
    // Generate a random item rarity
    $random_index = array_rand($allowed_rarities);
    return $allowed_rarities[$random_index];
}

// Function to simulate item distribution for each VIP rank
function simulate_distribution() {
    global $vip_rank;
    
    $results = [];
    
    // Perform 100 rolls for each VIP rank
    foreach ($vip_rank as $rank) {
        $distribution = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
        
        for ($i = 0; $i < 100; $i++) {
            $item_rarity = roll_item($rank);
            $distribution[$item_rarity]++;
        }
        
        $results[$rank] = $distribution;
    }
    
    // Print results
    echo "Array\n(\n";
    foreach ($results as $rank => $distribution) {
        echo "[{$rank}] => Array\n(\n";
        foreach ($distribution as $rarity => $count) {
            echo "    [{$rarity}] => {$count}\n";
        }
        echo ")\n\n";
    }
    echo ")\n";
}

// Simulate and print item distribution
simulate_distribution();

?>

</body>
</html>