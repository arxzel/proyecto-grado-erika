<?php

class Registro {

    private $pdo;
    public $id;
    public $FechaHora;
    public $CantidadMl;
    public $Velocidad;

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

            $stm = $this->pdo->prepare("SELECT * FROM registros");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarP($cantidadMl, $fechaInicio, $fechaFinal) {
        try {
            
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM registros "
                    . " WHERE "
                    . " CantidadMl >= ? "
                    . " AND "
                    . " FechaHora BETWEEN ? AND ?");
            $stm->execute(array($cantidadMl, $fechaInicio." 00:00:00", $fechaFinal." 23:59:59"));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM registros WHERE id = ?");

            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM registros WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE registros SET 
                FechaHora = ?, 
                CantidadMl = ?,
                WHERE id = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->FechaHora,
                                $data->CantidadMl,
                                $data->id
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Registro $data) {
        try {
            $sql = "INSERT INTO registros (FechaHora,CantidadMl,Velocidad) 
		        VALUES (now(), ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->CantidadMl,
                                $data->Velocidad
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
