<?php
namespace Annotations\Parser;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parser
 *
 * @author Analista-02
 */
class Parser {
    private $parserClass;
    private $args;
    private $parse;
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
           //var_dump(end(explode("\\",$this->parserClass[$i])));      
           $this->parse[$this->parserClass[$i]] = 
                   new $this->parserClass[$i]($this->args[$i]);
       }
       return $this;
   }
   
   function getParserClass() {
       return $this->parserClass;
   }

   function getArgs() {
       return $this->args;
   }

      
   public function getData($name) {      
       return isset($this->parse[$name])?$this->parse[$name]:null;
   }
}
