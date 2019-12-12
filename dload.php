<?php
// cmail extension for YELLOW, https://github.com/bsnosi/yellow-extension-dload
// Copyright ©2019-now Norbert Simon, https://nosi.de for
// YELLOW Copyright ©2013-now Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// requires YELLOW 0.8.4 or higher

class YellowDLoad {
    const VERSION = "0.0.5";
    const TYPE = "feature";
    public $yellow;         //access to API
	   
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
	 
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="dload") {
            list($data, $area, $note) = $this->yellow->toolbox->getTextArgs($text);
		 if ($data<>"") {
			       $area = ($area <>"") ? ' id="'.$area.'" ' : "";
                         $output = '<div ' .$area. 'w3-include-html="'.$data.'">'. $note .'</div>'; 				
		}
		 else {
			 $output = null;
		 }
        }
        return $output;
	}
	// Handle page extra data
	public function onParsePageExtra($page, $name) {
        $output = null;
//      if ($name == "footer" && $page->isExisting("dload"))  {
          if ($name == "footer" && (strpos($this->yellow->page->getContent($rawFormat = true, $sizeMax = 0),"dload")))  {
		$extensionLocation = $this->yellow->system->get("serverBase").$this->yellow->system->get("extensionLocation");
   		$output = "<script src=\"{$extensionLocation}dload.js\"></script>\n";
		$output .= "<script>includeHTML();</script>\n";
        }
	  return $output;
	}
}
?>