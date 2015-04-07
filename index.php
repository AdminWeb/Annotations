<?php

require 'vendor/autoload.php';
use Annotations\Parser\Parser;

$p = new Parser();

class Teste
{
    /**
     * @Annotations\Parser\Column ({"name":"name","type":"varchar","length":123})
     * @Annotations\Parser\Form ({"field":"nome"})
     */
    private $nome;
    /**
     * @Annotations\Parser\Column ({"name":"idade","type":"int","length":123})
     * @Annotations\Parser\Form ({"field":"idade"})
     */
    private $idade;
}

$r = new \ReflectionClass(new Teste());
$props = $r->getProperties();
$array = array();
foreach($props as $prop){
    var_dump($p->parse($prop->getDocComment())->getParse());
    $array[$prop->getName()] = $p->parse($prop->getDocComment())->getParse();
}
echo '<pre>';
print_r($array['idade']['Annotations\Parser\Column']->getType());