<?php
require_once 'modelos/funciones.php';
//  -- controladores --
require_once 'controladores/controlador.plantilla.php';

require_once 'controladores/controlador.usuarios.php';
require_once 'controladores/controlador.profesores.php';
// require_once 'controladores/controlador.instituciones.php';
// require_once 'controladores/controlador.solicitudesSuplente.php';
// require_once 'controladores/controlador.zonasSupervision.php';

// //  -- modelos --
require_once 'modelos/modelo.usuarios.php';
require_once 'modelos/modelo.profesores.php';
// require_once 'modelos/modelo.instituciones.php';
// require_once 'modelos/modelo.solicitudesSuplente.php';
// require_once 'modelos/modelo.zonasSupervision.php';

//  -- plantilla --
$plantilla = new ControladorPlantilla();
$plantilla -> ctrMostrarPlantilla();