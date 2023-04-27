<?php
abstract class Crud
{
protected $tabela;
  abstract function inserir();
public abstract function atualizar($campo,$id);

public function listar()
{
$selectSql = "SELECT * FROM {$this->tabela}";
return Conexao::query($selectSql);
}

public function buscar($campo,$id)
{
$selctSql =  "SELECT * FROM {$this->tabela} WHERE $campo = $id";
$dados =  Conexao::query($selctSql);
return $dados->fetch_object();
}
}

?>