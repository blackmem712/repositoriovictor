<?php
class Especialidade extends Crud
{
    protected $tabela = 'Especialidade';
    private $idEsp;
    private $NomeEsp;


    public function inserir()
    {
        $nome = $this->getNomeEsp();
       

        $sqlInserir = "INSERT INTO $this->tabela(nomeEsp)
        VALUES ('$nome')";
        

        if (Conexao::query($sqlInserir)) {
           header('location:pacientes.php');
         }


    }
    function atualizar($campo, $id)
    {
        $nomeEsp = $this->getNomeEsp();
        


        $sqlAtualizar = "UPDATE $this->tabela SET 
        nomeEsp'$nomeEsp'";
       
        if (Conexao::query($sqlAtualizar)) 
        {
            header('location:pacientes.php');
        }
    }


   
     

	/**
	 * @return mixed
	 */
	public function getIdEsp() {
		return $this->idEsp;
	}
	
	/**
	 * @param mixed $idEsp 
	 * @return self
	 */
	public function setIdEsp($idEsp): self {
		$this->idEsp = $idEsp;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNomeEsp() {
		return $this->NomeEsp;
	}
	
	/**
	 * @param mixed $NomeEsp 
	 * @return self
	 */
	public function setNomeEsp($NomeEsp): self {
		$this->NomeEsp = $NomeEsp;
		return $this;
	}
}






































?>