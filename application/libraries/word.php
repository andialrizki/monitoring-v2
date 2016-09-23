<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."third_party/vendor/phpword/PHPWord.php";  
require_once APPPATH."third_party/vendor/phpword/PHPWord/Template.php";
class Word extends PHPWord { 
    public function __construct() { 
        parent::__construct(); 
    } 
}