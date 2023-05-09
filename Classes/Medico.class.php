<?php
class Medico extends Crud
{
    protected $tabela = 'medico';
    private $idMed;
    private $EspecialidadeMed;
    private $nomeMed;
    private $crmMed;
    private $emailMed;
    private $celularMed;
 

	/**
	 * @return mixed
	 */
	public function getIdMed() {
		return $this->idMed;
	}
	
	/**
	 * @param mixed $idMed 
	 * @return self
	 */
	public function setIdMed($idMed): self {
		$this->idMed = $idMed;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEspecialidadeMed() {
		return $this->EspecialidadeMed;
	}
	
	/**
	 * @param mixed $EspecialidadeMed 
	 * @return self
	 */
	public function setEspecialidadeMed($EspecialidadeMed): self {
		$this->EspecialidadeMed = $EspecialidadeMed;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNomeMed() {
		return $this->nomeMed;
	}
	
	/**
	 * @param mixed $nomeMed 
	 * @return self
	 */
	public function setNomeMed($nomeMed): self {
		$this->nomeMed = $nomeMed;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCrmMed() {
		return $this->crmMed;
	}
	
	/**
	 * @param mixed $crmMed 
	 * @return self
	 */
	public function setCrmMed($crmMed): self {
		$this->crmMed = $crmMed;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmailMed() {
		return $this->emailMed;
	}
	
	/**
	 * @param mixed $emailMed 
	 * @return self
	 */
	public function setEmailMed($emailMed): self {
		$this->emailMed = $emailMed;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCelularMed() {
		return $this->celularMed;
	}
	
	/**
	 * @param mixed $celularMed 
	 * @return self
	 */
	public function setCelularMed($celularMed): self {
		$this->celularMed = $celularMed;
		return $this;
	}
    public function inserir()
    {
        $especialidade = $this->getEspecialidadeMed();
        $nome = $this->getNomeMed();
        $crm = $this->getCrmMed();
        $email = $this->getEmailMed();
        $celular = $this->getCelularMed();
       

        $sqlInserir = "INSERT INTO $this->tabela(EspecialidadeMed, nomeMed, crmMed, emailMed, celularMed)
        VALUES ('$especialidade','$nome','$crm','$email','$celular')";
        

        if (Conexao::query($sqlInserir)) {
           header('location:medico.php');
         }


    }
    function atualizar($campo, $id)
    {
        $especialidade = $this->getEspecialidadeMed();
        $nome = $this->getNomeMed();
        $crm = $this->getCrmMed();
        $email = $this->getEmailMed();
        $celular = $this->getCelularMed();
       

        $sqlAtualizar = "UPDATE $this->tabela SET 

        EspecialidadeMed ='$especialidade',
        nomeMed = '$nome',
        crmMed = '$crm',
        emailMed='$email, 
        celularMed='$celular'"; 
      

        if (Conexao::query($sqlAtualizar)) {
            header('location:medico.php');
        }
        

}
}

?>