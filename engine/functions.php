<?php

function render ($file, $variables=[]) {
    if (!is_file($file)) {
        echo 'Templates "' . $file . '" doesnt exist';
        exit();    
    }
    if (filesize($file)===0) {
       echo 'Templates "' . $file . '" is empty';
        exit(); 
    }

//вывод на экран

 $templateContent = file_get_contents($file);
	if (empty($variables)) {
		return $templateContent;
    }

foreach ($variables as $key => $value) {
		if (empty($value) || !is_string($value)) {
			continue;
		}
      $key = '{{' . strtoupper($key) . '}}';
    $templateContent = str_replace($key, $value, $templateContent);
  }
return $templateContent;
  }
    

?>


<!--
//var_dump($key);
//die;
-->
