<?php

require_once 'model/maquina.php';
require_once 'model/registro.php';
require_once 'buscador.php';

class MaquinaController {

    private $maquinaModel;
    private $registroModel;
    private $buscador;

    public function __CONSTRUCT() {
        $this->maquinaModel = new Maquina();
        $this->registroModel = new Registro();
        $this->buscador = new Buscador();
    }

    public function Index() {
        if (isset($_REQUEST['cantidadMl']) && isset($_REQUEST['fechaInicio']) && isset($_REQUEST['fechaFinal'])
        ) {
           $this->buscador->cantidadMl = $_REQUEST['cantidadMl'];
           $this->buscador->fechaInicio = $_REQUEST['fechaInicio'];
           $this->buscador->fechaFinal = $_REQUEST['fechaFinal'];
        } 
        require_once 'view/header.php';
        require_once 'view/maquina/registros.php';
        require_once 'view/footer.php';
    }

    public function Crud() {
        $alm = new Maquina();

        if (isset($_REQUEST['id'])) {
            $alm = $this->maquinaModel->Obtener($_REQUEST['id']);
        } else {
            $alm = $this->maquinaModel->Obtener(1);
        }

        require_once 'view/header.php';
        require_once 'view/maquina/maquina.php';
        require_once 'view/footer.php';
    }

    public function Buscar() {
        $this->Index();
    }

    public function Guardar() {
        $alm = new Maquina();

        $alm->id = $_REQUEST['id'];

        //var_dump(isset($_REQUEST['EstadoMotor']));
        $alm->IP = $_REQUEST['IP'];
        $alm->NombreMaquina = $_REQUEST['NombreMaquina'];
        $alm->EstadoMaquina = isset($_REQUEST['EstadoMaquina']) ? 1 : 0;
        $alm->EstadoMotor = isset($_REQUEST['EstadoMotor']) ? 1 : 0;
        $alm->Velocidad = $_REQUEST['Velocidad'];
        $alm->CantidadMl = $_REQUEST['CantidadMl'];

        $alm->id > 0 ? $this->maquinaModel->Actualizar($alm) : $this->maquinaModel->Registrar($alm);

        header('Location: index.php');
    }

    public function Listar() {
        if (isset($_REQUEST['cantidadMl']) && isset($_REQUEST['fechaInicio']) && isset($_REQUEST['fechaFinal'])
        ) {
            $result = $this->registroModel->ListarP($_REQUEST['cantidadMl'], $_REQUEST['fechaInicio'], $_REQUEST['fechaFinal']);
            //var_dump($result);
            return $result;
        } else {
            return $this->registroModel->Listar();
        }
    }

    public function Eliminar() {
        $this->maquinaModel->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

}
