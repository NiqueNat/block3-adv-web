

<?php

$palindrome = array("mom", "bib dad", "dud did");

foreach ($palindrome as $word) {
    // Split the word into an array of words
    $words = explode(" ", $word);

    // Check if the first word is the same as the last word
    if ($words[0] === $words[count($words) - 1]) {
        echo "$word is a palindrome<br>";
    } else {
        echo "$word is not a palindrome<br>";
    }
}

?>

/*check if the sentence reads the same forwards and backwords */

<?php

$palindrome = array("mom bob", "bib dad", "dud did");

foreach ($palindrome as $word) {

    // Get the length of the word
    $length = strlen($word);

    // Loop through the first half of the word and compare each character to its counterpart in the second half
    $is_palindrome = true;
    for ($i = 0; $i < $length / 2; $i++) {
        if ($word[$i] !== $word[$length - $i - 1]) {
            $is_palindrome = false;
            break;
        }
    }

    // Check if the word is a palindrome
    if ($is_palindrome) {
        echo "$word is a palindrome<br>";
    } else {
        echo "$word is not a palindrome<br>";
    }
}

?>