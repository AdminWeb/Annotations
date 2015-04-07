<?php

namespace Annotations\Parser;
class Column {
   private $name;
   private $type;
   private $length;
   
   function __construct($args) {
       $parse = json_decode($args);
       $this->setLength($parse->length);
       $this->setName($parse->name);
       $this->setType($parse->type);
   }
   
   function getName() {
       return $this->name;
   }

   function getType() {
       return $this->type;
   }

   function getLength() {
       return $this->length;
   }

   function setName($name) {
       $this->name = $name;
   }

   function setType($type) {
       $this->type = $type;
   }

   function setLength($length) {
       $this->length = $length;
   }



}
