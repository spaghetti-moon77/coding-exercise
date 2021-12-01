<?php

declare(strict_types=1);

namespace App\Service;

/**
 * Pangrams, anagrams and palindromes
 * 
 * Implement each of the functions of the Checker class. 
 * Aim to spend about 10 minutes on each function. 
 */
class CheckerService
{
    /**
     * A palindrome is a word, phrase, number, or other sequence of characters 
     * which reads the same backward or forward.
     *
     * @param string $word
     * @return bool
     */
    public function isPalindrome(string $word) : bool
    {
        $characterArray = str_split(strtolower($word));

        // divide total number of elements by 2, if it is a fraction then round down
        $halfNumberElements = (int) floor(count($characterArray) / 2);

        // Get first half of characters into new array
        $firstHalf = array_slice($characterArray, 0, $halfNumberElements);

        $secondHalf = array_slice($characterArray, -$halfNumberElements);

        // reverse second half
        $reversedSecondHalf = array_reverse($secondHalf);

        return $firstHalf === $reversedSecondHalf;
    }
    
    /**
     * An anagram is the result of rearranging the letters of a word or phrase 
     * to produce a new word or phrase, using all the original letters 
     * exactly once.
     * 
     * @param string $word
     * @param string $comparison
     * @return bool
     */
    public function isAnagram(
        string $word,
        string $comparison
    ) : bool {
        // strip whitespace
        $wordStripped = str_replace(' ', '', $word);
        $comparisonStripped = str_replace(' ', '', $comparison);

        $wordArray = str_split($wordStripped);
        $comparisonArray = str_split($comparisonStripped);

        sort($wordArray);
        sort($comparisonArray);

        // compare arrays
        $result = $wordArray === $comparisonArray;

        return $result;
    }

    /**
     * A Pangram for a given alphabet is a sentence using every letter of the 
     * alphabet at least once. 
     * 
     * @param string $phrase
     * @return bool
     */    
    public function isPangram(string $phrase) : bool
    {
        $alphabetArray = range('a', 'z');

        $phraseCharacterArray = str_split(strtolower($phrase));

        foreach ($alphabetArray as $letter) {
            if (!in_array($letter, $phraseCharacterArray)) {
                return false;
            }
        }

        return true;
    }
}