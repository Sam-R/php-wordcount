<?php

/** Gets the frequency of a word occuring in a text file
 * @var file string the file name and path to be used
 * @var caseSensitive bool should the count be case sensitive
 * @var alphaNumericOnly bool should the count allow only alphanumeric chars
 * @return array (word=>no. occurances)
 */
function GetWordFrequency($file, $caseSensitive=false, $alphaNumericOnly = true)
{
	// Get the file contents and store it as a string
	$strFileContents = file_get_contents($file, 'r');
	
	// Check to see if we're using a case sensitive check
	if(!$caseSensitive)
	{
		// if case insensitve, convert the string to lowercase
		$strFileContents = strtolower($strFileContents);
	}
	
	if($alphaNumericOnly)
	{
		//Allow alphanumberic and spaces only.
		$strFileContents = ereg_replace("[^A-Za-z0-9 ]", "", $strFileContents );
	}

  
	// Count the number of words in the file and convert to an array
	// Note: use the word as the KEY so we can ksort later
	$arrWords = str_word_count($strFileContents, 1);
	
	
	// Get the frequency of each word in the array
	$arrFrequency = array_count_values($arrWords);
	
	// Now use the ever useful ksort to organise by key value
	ksort($arrFrequency);
	
	// Return sorted data as an array so it can be formatted later...
	return $arrFrequency;
}

$arr_words = GetWordFrequency("README.md");
?>
<h1>Example output</h1>
<pre>
<?php print_r($arr_words); ?>
</pre>