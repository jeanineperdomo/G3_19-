<?php

header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Pedidos.php");
$pedidos=new Pedidos();

$body =json_decode(file_get_contents("php://input"),true);

switch($_GET["op"]){

    case "GetPedidos":
        $datos=$pedidos->get_pedidos();
        echo json_encode($datos);
        break;

        case "GetUno";
        $datos=$pedidos->get_pedido($body["ID_ma_pedidos"]);
        echo json_encode($datos);
        break;

        case "InsertPedido":
            $datos=$pedidos->insert_pedido($body["FECHA_PEDIDO"],$body["SUB_TOTAL"], $body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"],$body["DETALLE"],$body["ID"]);
            echo json_encode("Pedido Agregado");

            break;


        case "DeletePedido";
        $datos=$pedidos->delete_pedido($body["ID_ma_pedidos"] );
        echo json_encode("Pedido Eliminado");
        break;

        case "UpdatePedido":
            $datos=$pedidos->update_pedido($body["ID_ma_pedidos"],$body["FECHA_PEDIDO"],$body["SUB_TOTAL"], $body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"],$body["DETALLE"],$body["ID"]);
            echo json_encode("Pedido Actualizado");

            break;



        } 
        
        


        ?>  



