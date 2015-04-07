<?php

namespace Annotations\Parser;
class Form {
    private $field;
    function __construct($args) {
        $parser = json_decode($args);
        $this->setField($parser->field);
    }
    
    function getField() {
        return $this->field;
    }

    function setField($field) {
        $this->field = $field;
    }



}
