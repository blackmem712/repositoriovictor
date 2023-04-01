<?php
abstract class Crud
{
protected $tabela;
 public abstract function inserir();
abstract function atualizar($campo,$id);

}
?>