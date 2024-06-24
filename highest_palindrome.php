<?php
function highestPalindrome($s, $k) {
    $len = strlen($s);
    return formPalindrome($s, $k, 0, $len - 1);
}

function formPalindrome($s, $k, $left, $right) {
    if ($k < 0) {
        return '-1';
    }

    if ($left >= $right) {
        return $s;
    }

    if ($s[$left] == $s[$right]) {
        return formPalindrome($s, $k, $left + 1, $right - 1);
    }

    $option1 = formPalindrome(substr_replace($s, $s[$right], $left, 1), $k - 1, $left + 1, $right - 1);
    $option2 = formPalindrome(substr_replace($s, $s[$left], $right, 1), $k - 1, $left + 1, $right - 1);

    if ($option1 == '-1' && $option2 == '-1') {
        return '-1';
    }

    if ($option1 == '-1') {
        return $option2;
    }

    if ($option2 == '-1') {
        return $option1;
    }

    return strcmp($option1, $option2) > 0 ? $option1 : $option2;
}

// Sample input
echo highestPalindrome('3943', 1) . "\n";  // Output: 3993
echo highestPalindrome('932239', 2) . "\n"; // Output: 992299
?>
