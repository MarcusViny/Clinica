<?php
class Especialidade extends Crud
{
    protected $tabela = 'Especialidade';
    private $idEsp;
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

    private $NomeEsp;
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
    private $SelecEsp;
    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getSelecEsp()
    {
        return $this->SelecEsp;
    }
    /**
     * @param mixed $SelecEsp
     * @return self
     */
    public function setSelecEsp($SelecEsp): self
    {
        $this->SelecEsp = $SelecEsp;
        return $this;
    }
    public function inserir()
    {
        $nome = $this->getNomeEsp();
        $seleciona = $this->getSelecEsp();
        $sqlInserir = "INSERT INTO $this->tabela (NomeEsp,SelecEsp) 
        VALUES ('$nome','$seleciona')";
        if (Conexao::query($sqlInserir)) 
        {
            header('location: especialidade.php');
        }
    }
    /**
     *
     * @param mixed $campo
     * @param mixed $id
     * @return mixed
     */
    public function atualizar($campo, $id)
    {
    }
}
