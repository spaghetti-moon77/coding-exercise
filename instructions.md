# Instructions

## Initial setup
* Run ```composer install``` to install any dependencies

## Running the commands

When running the below commands, the terminal will display a message indicating whether the result is ```true``` or ```false```.

### Checking if a string is a palindrome
* Run ```php bin/console app:checker:plaindrome string-to-check``` replacing ```string-to-check``` with the actual string you would like to check

### Checking if a string is a pangram
* Run ```php bin/console app:checker:pangram string-to-check``` with the actual string you would like to check

### Checking if a string is an anagram of another string
* Run ```php bin/console app:checker:anagram string-to-check comparison-string``` replacing ```string-to-check``` with the string you would like to check and ```comparison-string``` with the string you would like to compare it against