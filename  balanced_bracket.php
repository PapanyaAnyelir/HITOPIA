<?php
function isBalanced($string) {
    $stack = [];
    $pairs = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];
    
    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];
        
        if (in_array($char, ['(', '{', '['])) {
            // Jika karakter adalah salah satu tanda kurung pembuka
            array_push($stack, $char);
        } elseif (in_array($char, [')', '}', ']'])) {
            // Jika karakter adalah salah satu tanda kurung penutup
            if (empty($stack) || array_pop($stack) != $pairs[$char]) {
                return 'NO';
            }
        }
    }
    
    return empty($stack) ? 'YES' : 'NO';
}

// Sample inputs
$inputs = [
    "{ [ ( ) ] }",
    "{ [ ( ] ) }",
    "{ ( ( [ ] ) [ ] ) [ ] }"
];

// Function call and output
foreach ($inputs as $input) {
    echo "Input: $input\n Output: " . isBalanced($input) . "\n";
}
?>
