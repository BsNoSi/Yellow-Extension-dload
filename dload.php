<?php
// cmail extension for YELLOW, https://github.com/bsnosi/yellow-extension-dload
// Copyright ©2019-now Norbert Simon, https://nosi.de for
// YELLOW Copyright ©2013-now Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// requires YELLOW 0.8.4 or higher

class YellowDLoad {
  const VERSION = "0.5.0";
  public $yellow;
	   
  public function onLoad($yellow) {
    $this->yellow = $yellow;
  }
	 
  public function onParseContentShortcut($page, $name, $text, $type) {
    $output = null;
    if ($name=="dload") {
      list($data, $area, $note) = $this->yellow->toolbox->getTextArgs($text);
      if ($data<>"") {
       $output = '<div class="' . $area .'"><div id="replacespace" src="'. $data . '">' . $note .'</div></div>';
      }
	else {
	  $output = null;
	}
    }
    return $output;
  }
	
  public function onParsePageExtra($page, $name) {
    $output = null;
    
    if ($name == "footer" && $page->isExisting("dload"))  {
      $output = "<script>\n";
	$output .= "filetoopen = document.getElementById('replacespace').getAttribute('src');\n";
	$output .= "var xhr = typeof XMLHttpRequest != 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');xhr.open('get', filetoopen, true);xhr.onreadystatechange = function() {if (xhr.readyState == 4 && xhr.status == 200) {  document.getElementById('replacespace').innerHTML = xhr.responseText; } }\n";
	$output .= "xhr.send();\n";
	$output .= "</script>\n";
    }
    return $output;
  }
}
?>
