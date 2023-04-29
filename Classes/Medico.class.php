<?php

class Medico extends Crud
{
    protected $tabela = 'Medico';
    private $idMed;
    private $nomeMed;
    private $especialidadeMed;
    private $crmMed;
    private $emailMed;
    private $celularMed;
    public function getIdMed()
    {
        return $this->idMed;
    }

    /**
     * @param mixed $idMed 
     * @return self
     */
    public function setIdMed($idMed): self
    {
        $this->idMed = $idMed;
        return $this;
    }

    /**
     * @return mixed
     */

    public function getNomeMed()
    {
        return $this->nomeMed;
    }

    /**
     * @param mixed $nomeMed
     * @return self
     */ public function setNomeMed($nomeMed): self
    {
        $this->nomeMed = $nomeMed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEspecialidadeMed()
    {
        return $this->especialidadeMed;
    }

    /**
     * @param mixed $especialidadeMed
     * @return self
     */
    public function setEspecialidadeMed($especialidadeMed): self
    {
        $this->especialidadeMed = $especialidadeMed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCrmMed()
    {
        return $this->crmMed;
    }
    /**
     * @return mixed $crmMed
     * @return self
     */ public function setCrmMed($crmMed): self
    {
        $this->crmMed = $crmMed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailMed()
    {
        return $this->emailMed;
    }
    /**
     * @param mixed $emailMed
     * @return self
     */
    public function setEmailMed($emailMed): self
    {
        $this->emailMed = $emailMed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCelularMed()
    {
        return $this->celularMed;
    }
    /**
     * @param mixed $celularMed
     * @return self
     */
    public function setCelularMed($celularMed): self
    {
        $this->celularMed = $celularMed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function inserir()
    {
        $nome = $this->getNomeMed();
        $especialidade = $this->getEspecialidadeMed();
        $crm = $this->getcrmMed();
        $email = $this->getEmailMed();
        $celular = $this->getCelularMed();
        $sqlInserir = "INSERT INTO $this->tabela (nomeMed,especialidadeMed, crmMed, emailMed, celularMed) VALUES ('$nome','$especialidade', '$crm', '$email', '$celular')";
        if (Conexao::query($sqlInserir)) {
            header('location: medico.php');
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
        $nome = $this->getNomeMed();
        $especialidade = $this->getEspecialidadeMed();
        $crm = $this->getcrmMed();
        $email = $this->getEmailMed();
        $celular = $this->getCelularMed();
        $sqlUpdate = "INSERT INTO $this->tabela (nomeMed,especialidadeMed, crmMed, emailMed, celularMed) VALUES ('$nome','$especialidade', '$crm', '$email', '$celular')";
        if (Conexao::query($sqlUpdate)) {
            header('location: medico.php');
        }
        if (Conexao::query($sqlUpdate)) {
            header('location: medico.php');
        }
    }
}
