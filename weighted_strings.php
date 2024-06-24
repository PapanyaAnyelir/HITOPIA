<?php
function calculateWeights($string) {
    $weights = [];
    $length = strlen($string);
    $currentChar = $string[0];
    $currentWeight = ord($currentChar) - ord('a') + 1;
    $currentCount = 1;

    // Initialize the first character weight
    $weights[$currentWeight] = true;

    for ($i = 1; $i < $length; $i++) {
        if ($string[$i] == $currentChar) {
            $currentCount++;
        } else {
            $currentChar = $string[$i];
            $currentCount = 1;
        }

        $currentWeight = ($currentCount) * (ord($currentChar) - ord('a') + 1);
        $weights[$currentWeight] = true;
    }

    return $weights;
}

function weightedStrings($string, $queries) {
    $weights = calculateWeights($string);
    $result = [];

    foreach ($queries as $query) {
        if (isset($weights[$query])) {
            $result[] = 'Yes';
        } else {
            $result[] = 'No';
        }
    }

    return $result;
}

// Sample input
$string = "abbcccd";
$queries = [1, 3, 9, 8];

// Function call and output
$result = weightedStrings($string, $queries);
print_r($result);
?>
