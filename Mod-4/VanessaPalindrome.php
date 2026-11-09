<?php
// Vanessa Espino,  November 8 2026, Mod4
// Write a program that checks if a string is a palindrome
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome Checker</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .result-box { border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 5px; }
        .palindrome { background-color: #D9F0F0; border-color: #234A57; }
        .not-palindrome { background-color: #fce4d6; border-color: #c65911; }
        strong { color: #333; }
    </style>
</head>
<body>

    <h1>Palindrome Checker Results</h1>

    <?php
    function isPalindrome($str) {
        $cleanedStr = preg_replace("/[^A-Za-z0-9]/", "", $str);
        $cleanedStr = strtolower($cleanedStr);
        $reversedStr = strrev($cleanedStr);
        return $cleanedStr === $reversedStr;
    }

    $testStrings = ["Kayak", "Hannah", "Never odd or even", "Victoria", "I love anime", "Ms.Rachel"];

    foreach ($testStrings as $index => $currentString) {
        $cleanedDisplayStr = preg_replace("/[^A-Za-z0-9]/", "", $currentString);
        $cleanedDisplayStr = strtolower($cleanedDisplayStr);
        $reversed = strrev($cleanedDisplayStr);
        $checkPalindrome = isPalindrome($currentString);
        
        $class = $checkPalindrome ? "palindrome" : "not-palindrome";
        $statusText = $checkPalindrome ? "IS a palindrome" : "is NOT a palindrome";
        
        echo "<div class='result-box $class'>";
        echo "<p><strong>Test Case " . ($index + 1) . "</strong></p>";
        echo "<p>Original Order: \"" . htmlspecialchars($currentString) . "\"</p>";
        echo "<p>Reversed Order: \"" . htmlspecialchars($reversed) . "\"</p>";
        echo "<p><strong>Result:</strong> The function determined this string <strong>$statusText</strong>.</p>";
        echo "</div>";
    }
    ?>

</body>
</html>