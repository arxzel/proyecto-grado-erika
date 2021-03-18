<?php

class Maquina {

    private $pdo;
    public $id;
    public $IP;
    public $NombreMaquina;
    public $EstadoMaquina;
    public $EstadoMotor;
    public $Velocidad;
    public $CantidadMl;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM maquina");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM maquina WHERE id = ?");

            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM maquina WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {

            //var_dump($data);
            $sql = "UPDATE maquina SET NombreMaquina = ?, IP = ?, 
                EstadoMaquina = ?, 
                EstadoMotor = ?, 
                Velocidad = ?, CantidadMl = ?
		WHERE id = ?";

            $this->pdo->prepare($sql)
                    ->execute(array($data->NombreMaquina, $data->IP,
                        $data->EstadoMaquina ? 1:0, 
                        $data->EstadoMotor ? 1:0,
                        $data->Velocidad, $data->CantidadMl, 
                        $data->id)
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Maquina $data) {
        try {
            $sql = "INSERT INTO maquina (NombreMaquina,IP,EstadoMaquina,EstadoMotor,Velocidad,CantidadMl) 
		        VALUES (?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->NombreMaquina,
                                $data->IP,
                                $data->EstadoMaquina,
                                $data->EstadoMotor,
                                $data->Velocidad,
                                $data->CantidadMl
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
