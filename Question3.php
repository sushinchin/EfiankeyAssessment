<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$date1 = new DateTime('2024-06-15');
$date2 = new DateTime('2024-06-30');

$interval = $date1->diff($date2);
$days = $interval->days;

echo "Number of days between {$date1->format('Y-m-d')} and {$date2->format('Y-m-d')}: $days days\n";

$day = $date1->format('j'); // Get the day of the month as a number

if ($day % 2 == 0) {
    echo "Day $day of the month is even.";
} else {
    echo "Day $day of the month is odd.";
}
    ?>
</body>
</html>