<?php
namespace Annotations\Parser;

use ArrayObject;

class Parser {
    private $parserClass;
    private $args;
    private $parse;
    public function  __construct() {
        $this->parse = new ArrayObject();
    }

    public function parse($str){
       preg_match_all("/@(.*) \((.*)\)/\n", $str, $matches);
       $this->setParserClass($matches[1])->setArguments($matches[2])->fill();
       return $this;
   }
   
   protected function setParserClass(array $classes){
       $this->parserClass = $classes;
       return $this;
   }
   
   protected function setArguments(array $args){
       $this->args = $args;
        return $this;
   }
   
   protected function fill(){
       $count = count($this->getParserClass());
       for($i=0;$i<$count;$i++){     
           $this->parse->offsetSet(
                   $this->parserClass[$i],  
                   new $this->parserClass[$i]($this->args[$i])
                   );
       }
       return $this;
   }
   
   function getParserClass() {
       return $this->parserClass;
   }

   function getArgs() {
       return $this->args;
   }
   function getParse() {
       return $this->parse;
   }
   
   public function getData($name) {      
       return $this->parse->offsetExists($name)?$this->parse->offsetGet($name):NULL;
   }
}
