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

    
    public function inserir()
    {
        $nome = $this->getNomeEsp();
        

        $sqlInserir = "INSERT INTO $this->tabela (NomeEsp) VALUES ('$nome')";
        if (Conexao::query($sqlInserir)) {
            header('location: especialidade.php');
        }
    }

    /**
     *
     * @param mixed $campo
     * @param mixed $id
     * @return mixed
     */
    public function atualizar($campo, $id){
        
    }

}
