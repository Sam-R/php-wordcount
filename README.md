# php-wordcount
PHP script that counts words in a file and returns an array

## How to use

The demo can be found in index.php, along with an example of calling the function and returning output to the screen.


### Include in existing project

The function itself is located in getWordFrequency.php and can be included quite easily into any other PHP project:


```
include('getWordFrequency.php');

$arr-word-frequency = getWordFrequency("myfile.txt");

```

### Function Params

The function has three paramiters:

Paramiter  | Required | Effect
------------- | ------------- | -------------
file  | Yes | The file to open and run the function on.
caseSensitive  | No | Defaults to false, defines whether the text should be scanned as case sensitive so words with upper case characters are counted seporately.
alphaNumericOnly | No | Defaults to true, defines whether the text should be scanned only for alpha-numeric characters. If false, any punctuation and formatting will be counted as well.