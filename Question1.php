<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function checkDownload($memberType) {
    static $nonMemberLastDownloadTime = null;
    static $memberLastDownloadTime = null;
    static $memberDownloadCount = 0;

    $currentTime = time();

    if ($memberType === 'nonmember') {
        // Non-members can download only if more than 5 seconds have passed since last download
        if ($nonMemberLastDownloadTime === null || $currentTime - $nonMemberLastDownloadTime >= 5) {
            $nonMemberLastDownloadTime = $currentTime;
            return "Your download is starting...";
        } else {
            return "Too many downloads";
        }
    } elseif ($memberType === 'member') {
        // Members can download up to 2 times consecutively without wait time
        // After the 2nd download, they must wait 5 seconds before downloading again
        if ($memberDownloadCount < 2) {
            $memberLastDownloadTime = $currentTime;
            $memberDownloadCount++;
            return "Your download is starting...";
        } elseif ($currentTime - $memberLastDownloadTime >= 5) {
            $memberLastDownloadTime = $currentTime;
            $memberDownloadCount = 1; // Reset count after waiting
            return "Your download is starting...";
        } else {
            return "Too many downloads";
        }
    } else {
        return "Invalid member type";
    }
}

// Testing the function with provided scenarios
function testCheckDownload($memberType, $timestamp) {
    echo date('H:i:s', $timestamp) . " execute checkDownload('$memberType') returns " . checkDownload($memberType) . "\n";
}

echo "\nNon-members:\n";
testCheckDownload('nonmember', strtotime('00:00:00')); 
testCheckDownload('nonmember', strtotime('00:00:03'));

echo "\nMembers:\n";
testCheckDownload('member', strtotime('00:00:00'));
testCheckDownload('member', strtotime('00:00:03'));
testCheckDownload('member', strtotime('00:00:05'));
    ?>
</body>
</html>