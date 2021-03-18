<?php

ob_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set("America/Bogota");
/* if ($_SERVER["HTTPS"] != "on") {
  header("HTTP/1.1 301 Moved Permanently");
  header('Content-Type: text/html; charset=utf-8');
  header("Location: http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
  exit();
  } */
require_once '../model/database.php';
require_once '../model/registro.php';
require_once '../model/maquina.php';

$response = array("type" => "response");
$response["data"] = array("status" => "error", "message" => "No se reconoce el type asociado");

try {
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    if (isset($request->type)) {

        if (!isset($request->data->cantidad_ml) || !isset($request->data->velocidad)) {
            $response["data"] = array("status" => "error", "message" => "Faltan parámetros para el registro/maquina");
            echo json_encode($response);
            return;
        }

        if ($request->type === "registro") {
            $registroModel = new Registro();
            $registroModel->CantidadMl = $request->data->cantidad_ml;
            $registroModel->Velocidad = $request->data->velocidad;
            $registroModel->Registrar($registroModel);
            $response["data"] = array("status" => "success", "message"=>"registro ingresado con éxito");
        } else if ($request->type === "event_machine") {

            if (!isset($request->data->estado_maquina) || !isset($request->data->estado_motor)) {
                $response["data"] = array("status" => "error", "message" => "Faltan parámetros para maquina");
                echo json_encode($response);
                return;
            }

            $maquinaModel = new Maquina();
            $maquina = $maquinaModel->Obtener(1);
            $maquina->CantidadMl = $request->data->cantidad_ml;
            $maquina->Velocidad = $request->data->velocidad;
            $maquina->EstadoMaquina = $request->data->estado_maquina;
            $maquina->EstadoMotor = $request->data->estado_motor;
            $maquinaModel->Actualizar($maquina);
            $response["data"] = array("status" => "success", "message"=>"Máquina configurada con éxito");
        } else {
            $response["data"] = array("status" => "error", "message" => "No se reconoce el type asociado: " . $request->type);
        }
    }

    echo json_encode($response);
} catch (Exception $e) {
    $response["data"] = array("status" => "error", "message" => $e->getMessage());
    echo json_encode($response);
} 

ob_end_flush();
