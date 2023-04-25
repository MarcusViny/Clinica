<?php
abstract class Crud
{
    protected $tabela;
    abstract function inserir();
    abstract function atualizar($campo, $id);

    public function listar()
    {
        $selectSql = "SELECT * FROM {$this->tabela}";
        return Conexao::query($selectSql);
    }
    public function buscar($campo, $id)
    {
        $selectSql = "SELECT * FROM {$this->tabela} WHERE $campo = {$id}";
        
        $daddos = Conexao::query($selectSql);
        return $daddos->fetch_object();
    }
    public function deletar($campo,$idDel)
    {
        $selectSql="DELETE FROM {$this->tabela}where $campo={$idDel}";
    }
}
