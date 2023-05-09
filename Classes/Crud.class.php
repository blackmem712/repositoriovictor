<?php
abstract class Crud
{
protected $tabela;
  abstract function inserir();
public abstract function atualizar($campo,$id);

public function listar($where = null)
{
$selectSql = "SELECT * FROM {$this->tabela} $where";
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