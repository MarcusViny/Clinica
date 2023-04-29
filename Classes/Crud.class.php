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
    public function deletar($campo, $id)
    {
        $sqlDelete = " DELETE FROM {$this->tabela} WHERE $campo = {$id}";
        return Conexao::query($sqlDelete);
    }
    public function consultar($campo, $id)
    {
        if (isset($_POST['busca'])) {
            $busca = $_POST['busca'];
            // continuar com a busca
        }
    }
}
