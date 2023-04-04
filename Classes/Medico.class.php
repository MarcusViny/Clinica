<?php

class Medico extends Crud
{
    protected $tabela = 'Medico';
    private $idPac;
    private $nomeMed;
    private $crmMed;
    private $emailMed;
    private $celularMed;


    public function getNomeMed()
    {
        return $this->nomeMed;
    }

    /**
     * @param mixed $nomeMed
     * @return self
     */
    public function getcrmMed($crmMed): self
    {
        $this->crmMed = $crmMed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getemailMed()
    {
        return $this->emailMed;
    }

    /**
     * @param mixed $emailMed
     * @return self
     */
    public function getcelularMed($celularMed): self
    {
        $this->celularMed = $celularMed;
        return $this;
    }
    /**
     * @param mixed $emailMed
     * @return self
     */

    public function inserir()
    {
        $nome = $this->getNomeMed();
        $crm = $this->getcrmMed();
        $bairro = $this->getBairroPac();
        $email = $this->getemailMed();
        $celular = $this->getcelularMed();
        $foto = $this->getFotoPac();

        $sqlInserir = "INSERT INTO $this->tabela (nomePac, enderecoPac, bairroPac, cidadePac, estadoPac, cepPac, nascimentoPac, emailPac, celularPac, fotoPac) VALUES ('$nome', '$endereco', '$bairro', '$cidade', '$estado', '$cep', '$nascimento', '$email', '$celular', '$foto')";
        if (Conexao::query($sqlInserir)) {
            header('location: pacientes.php');
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
