<html>
	<head>
		<style>
			html, body {
				margin: 0;
				font-family: helvetica, sans-serif;
			}
			.left {
				float: left;
				padding: 0 0.2em 0 0.2em;
			}

			table {
				color:#666;
				text-shadow: 1px 1px 0px #fff;
				background:#eaebec;
				margin:20px;
				border:#ccc 1px solid;

				-moz-border-radius:3px;
				-webkit-border-radius:3px;
				border-radius:3px;
			
				-moz-box-shadow: 0 1px 2px #d1d1d1;
				-webkit-box-shadow: 0 1px 2px #d1d1d1;
				box-shadow: 0 1px 2px #d1d1d1;
			}
			table th {
				padding: 2em;
				background: #ededed;
			}
			h2 {
				text-align: center;
			}
		</style>
	</head>
	<body>
		<?php
			// Include the file with the function in it.
			include('getWordFrequency.php');
			
			// Get a selection of arrays with various options from the function
			$arr_words = GetWordFrequency("README.md");
			$arr_words_case_sensitive = GetWordFrequency("README.md", true);
			$arr_words_alpha_numeric = GetWordFrequency("README.md", false, false);
			$arr_words_everything = GetWordFrequency("README.md", true, false);
			
			function arrayToList( $array ) 
			{
				$output = "<!-- table heading -->
				<table>
					<thead>
						<tr>
							<th>Word/Character</th>
     						<th>Frequency</th>
  						</tr>
 					</thead>
 				";
				foreach ( $array as $word => $frequency )
				{
					$output .= "<tr><td>$word</td><td>$frequency</td></tr>";
				}
				$output .= "</table>";
				
				return $output;
			}
		?>
		<h1>Example outputs</h1>
		
		<div class="left">
			<h2>Default Paramiters</h2>
			<?php echo arrayToList( $arr_words ); ?>
		</div>
		
		<div class="left">
			<h2>Case Sensitive</h2>
			<?php echo arrayToList( $arr_words_case_sensitive ); ?>
		</div>
		
		<div class="left">
			<h2>Include all characters/words</h2>
			<?php echo arrayToList($arr_words_alpha_numeric); ?>
		</div>
		
		<div class="left">
			<h2>Case Sensitive and non-alpha numeric</h2>
			<?php echo arrayToList($arr_words_everything); ?>
		</div>
	</body>
</html>