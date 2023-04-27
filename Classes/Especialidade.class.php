<?php
class Especialidade extends Crud
{
    protected $tabela = 'Especialidade';
    private $idEsp;
    private $NomeEsp;
    private $selecEsp;
    /**
     * @return mixed
     */
    public function getidEsp()
    {
        return $this->idEsp;
    }
    /**
     * @param mixed $idEsp 
     * @return self
     */
    public function setidEsp($idEsp): self
    {
        $this->idEsp = $idEsp;
        return $this;
    }
    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getNomeEsp()
    {
        return $this->NomeEsp;
    }
    /**
     * @param mixed $NomeEsp
     * @return self
     */
    public function setNomeEsp($NomeEsp): self
    {
        $this->NomeEsp = $NomeEsp;
        return $this;
    }
    // nao sei oq fazer 
    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getSelecEsp()
    {
        return $this->selecEsp;
    }
    /**
     * @param mixed $SelecEsp
     * @return self
     */
    public function setSelecEsp($SelecEsp): self
    {
        $this->selecEsp = $SelecEsp;
        return $this;
    }
    public function inserir()
    {
        $nome = $this->getNomeEsp();
        $seleciona = $this->getSelecEsp();

        $sqlInserir = "INSERT INTO $this->tabela (NomeEsp,selecEsp) 
        VALUES ('$nome','$seleciona')";
        if (Conexao::query($sqlInserir)) {
            header('location:especialidade.php');
        }
    }
    public function atualizar($campo, $id)
    {
        $nome = $this->getNomeEsp();
        $seleciona = $this->getSelecEsp();

        $sqlUpdate = " UPDATE {$this->tabela} SET
        NomeEsp = '$nome', selecEsp ='$seleciona' WHERE $campo = {$id}";
        if (Conexao::query($sqlUpdate)) {
            header('location: especialidade.php');
        }
    }
    /**
     *
     * @param mixed $campo
     * @param mixed $id
     * @return mixed
     */
}
