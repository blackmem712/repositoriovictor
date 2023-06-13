<?php
class Consulta extends Crud
{
    protected $tabela = 'consulta';
    private $idCon;
    private $pacienteCon;
    private $medicoCon;
    private $dataCon;
    private $horaCon;

	/**
	 * @return mixed
	 */
	public function getIdCon() {
		return $this->idCon;
	}
	
	/**
	 * @param mixed $idCon 
	 * @return self
	 */
	public function setIdCon($idCon): self {
		$this->idCon = $idCon;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPacienteCon() {
		return $this->pacienteCon;
	}
	
	/**
	 * @param mixed $pacienteCon 
	 * @return self
	 */
	public function setPacienteCon($pacienteCon): self {
		$this->pacienteCon = $pacienteCon;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMedicoCon() {
		return $this->medicoCon;
	}
	
	/**
	 * @param mixed $medicocon 
	 * @return self
	 */
	public function setMedicoCon($medicocon): self {
		$this->medicoCon = $medicocon;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDataCon() {
		return $this->dataCon;
	}
	
	/**
	 * @param mixed $dataCon 
	 * @return self
	 */
	public function setDataCon($dataCon): self {
		$this->dataCon = $dataCon;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getHoraCon() {
		return $this->horaCon;
	}
	
	/**
	 * @param mixed $horaCon 
	 * @return self
	 */
    /**
	 * @return mixed
	 */
	public function getTabela() {
		return $this->tabela;
	}
	
	/**
	 * @param mixed $tabela 
	 * @return self
	 */
	public function setTabela($tabela): self {
		$this->tabela = $tabela;
		return $this;
	}
	public function setHoraCon($horaCon): self {
		$this->horaCon = $horaCon;
		return $this;
	}

    public function inserir()
    {

        $paciente = $this->getPacienteCon();
        $medico = $this->getMedicoCon();
        $data = $this->getDataCon();
        $hora = $this->getHoraCon();
       
        $sqlInserir = "INSERT INTO $this->tabela(pacienteCon, medicoCon, dataCon, horaCon)
        VALUES ('$paciente','$medico','$data','$hora')";

          if (Conexao::query($sqlInserir)) {
            header('location:consulta.php');
            }
        


    }


    
    function atualizar($campo, $id)
    {
        $paciente = $this->getPacienteCon();
        $medico = $this->getMedicoCon();
        $data = $this->getDataCon();
        $hora = $this->getHoraCon();

        $sqlAtualizar = "UPDATE $this->tabela SET 
        pacienteCon ='$paciente',
        medicoCon = '$medico',
        dataCon = '$data',
        horaCon='$hora'";
        
       

        if (Conexao::query($sqlAtualizar)) {
           header('location:pacientes.php');
         }

}






    public function listar($where = null){

   $selectSql = "SELECT * FROM {$this->tabela} $where";
      return Conexao::query($selectSql);

}
 public function deletar($campo, $id){
    $sqlDelete = "DELETE FROM $this->tabela WHERE $campo = {$id}";

    if(Conexao::query($sqlDelete)){
        header('location: consulta.php');
    }
}



	
}

?>



























