<?php
/**
 * 
 */
class MaquinaController
{
	private dao;
	function __construct(dao) {
		$this->dao = dao;
	}

	public function updateMaquina(maquina){
		return $this->dao.updateMaquina(maquina);
	}
}
?>