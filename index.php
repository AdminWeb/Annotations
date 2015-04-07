<?php

require 'vendor/autoload.php';
use Annotations\Parser\Parser;
$str = <<<Ano
        @Annotations\Parser\Column ({"name":"name","type":"varchar","length":123})
        @Annotations\Parser\Form ({"field":"name"})
Ano;
$p = new Parser();
var_dump($p->parse($str)->getData('Annotations\Parser\Column'));
var_dump($p->parse($str)->getData('Annotations\Parser\Form'));