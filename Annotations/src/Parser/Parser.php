<?php
namespace Annotations\Parser;

use ArrayObject;

class Parser {
    
    private $parse;
    
    public function  __construct() {
        $this->parse = new ArrayObject();
    }

    public function parse($str){
       preg_match_all("/@(.*) \((.*)\)/\n", $str, $matches);
       $this->fill($matches[1],$matches[2]);
       return $this;
   }
      
   protected function fill(array $classes, array $args){
       $count = count($classes);
       for($i=0;$i<$count;$i++){     
           $this->parse->offsetSet($classes[$i], new $classes[$i]($args[$i]));
       }
       return $this;
   }
   
   function getParse() {
       return $this->parse;
   }
   
   public function getData($name) {      
       return $this->parse->offsetExists($name)?$this->parse->offsetGet($name):NULL;
   }
}
