<?php
require_once 'modelos/funciones.php';
//  -- controladores --
require_once 'controladores/controlador.plantilla.php';

require_once 'controladores/controlador.usuarios.php';
require_once 'controladores/controlador.entrenadores.php';
require_once 'controladores/controlador.clientes.php';
require_once 'controladores/controlador.especialidades.php';
require_once 'controladores/controlador.planes.php';
require_once 'controladores/controlador.pagos.php';

// //  -- modelos --
require_once 'modelos/modelo.usuarios.php';
require_once 'modelos/modelo.entrenadores.php';
require_once 'modelos/modelo.clientes.php';
require_once 'modelos/modelo.especialidades.php';
require_once 'modelos/modelo.planes.php';
require_once 'modelos/modelo.pagos.php';

//  -- plantilla --
$plantilla = new ControladorPlantilla();
$plantilla -> ctrMostrarPlantilla();