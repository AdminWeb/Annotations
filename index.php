<?php

require 'vendor/autoload.php';
use Annotations\Parser\Parser;

$p = new Parser();

class_alias(\Annotations\Parser\Column::class, 'Column');
class_alias(\Annotations\Parser\Form::class, 'Form');
$init = microtime(true);
class Teste
{
    /**
     * @Column ({"name":"name","type":"varchar","length":123})
     * @Form ({"field":"nome"})
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
   // var_dump($p->parse($prop->getDocComment())->getParse());
    $array[$prop->getName()] = $p->parse($prop->getDocComment())->getParse();
}
$end = microtime(true);
echo $end - $init;
echo PHP_EOL;
echo '<pre>';
print_r($array['idade']['Column']->getType());
echo PHP_EOL;
print_r($array['idade']['Form']->getField());
echo PHP_EOL;