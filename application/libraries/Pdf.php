<?php defined('BASEPATH') OR exit('No direct script access allowed.');
 
class Pdf extends \mPDF {
 
    public function __construct($params = array()) {
	$params = $params['params'] ? $params['params'] : '"en-GB-x","A4","","",10,10,10,10,6,3';
	parent::__construct($param);
    }
 
}  
//- See more at: https://arjunphp.com/how-to-use-composer-with-codeigniter/#sthash.TBX0ABVH.dpuf