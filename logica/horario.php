<?php
require 'persistencia/horarioDAO.php';
require_once 'persistencia/Conexion.php';

class horario{
    private $idpelicula;
    private  $idhorario;
    private $horario;
    private $horarioDAO;
    private $conexion;
    
    function getIdpelicula(){
        return $this -> idpelicula;
    }
    function getIdhorario(){
        return $this -> idhorario;
    }
    function getHorario(){
        return $this -> horario;
    }
    
    
    
    function horario($idpelicula="", $idhorario="", $horario=""){
        $this -> idpelicula = $idpelicula;
        $this -> idhorario = $idhorario;
        $this -> horario = $horario;
        $this -> conexion = new Conexion();
        $this -> horarioDAO = new horarioDAO($idpelicula, $idhorario, $horario);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> horarioDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
//     function actualizar(){
//         $this -> conexion -> abrir();
//         $this -> conexion -> ejecutar($this -> peliculaDAO ->actualizar());
//         $this -> conexion -> cerrar();
//     }
    
//     function actualizarImagen(){
//         $this -> conexion -> abrir();
//         $this -> conexion -> ejecutar($this -> peliculaDAO ->actualizarImagen());
//         $this -> conexion -> cerrar();
//     }
    
//     function existeTitulo(){
//         $this -> conexion -> abrir();
//         $this -> conexion -> ejecutar($this -> peliculaDAO -> existeTitulo());
//         if($this -> conexion -> numFilas() == 0){
//             $this -> conexion -> cerrar();
//             return false;
//         } else {
//             $this -> conexion -> cerrar();
//             return true;
//         }
//     }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> horarioDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        
        $this -> idpelicula = $resultado[0];
        $this -> idhorario = $resultado[1];
        $this -> horario = $resultado[2];
        
       
        $this -> conexion -> cerrar();
    }
    
//     function consultarTodos(){
//         $this -> conexion -> abrir();
//         $this -> conexion -> ejecutar($this -> peliculaDAO -> consultarTodos());
//         $resultados = array();
//         $i=0;
//         while(($registro = $this -> conexion -> extraer()) != null){
//             $resultados[$i] = new Pelicula($registro[0], $registro[1], "", "", $registro[2],"",$registro[3],$registro[4]);
//             $i++;
//         }
//         $this -> conexion -> cerrar();
//         return $resultados;
//     }
    
    
}