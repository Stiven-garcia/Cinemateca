<?php
require 'persistencia/FuncionDAO.php';
require_once 'persistencia/Conexion.php';

class Funcion{
   private $fecha_inicial;
   private  $fecha_final;
   private $idpelicula;
   private $idfuncion;
   
   
    private $peliculaDAO;
    private $conexion;
    
    function getIdpelicula(){
        return $this -> idpelicula;
    }
    function getFecha_inicial(){
        return $this -> fecha_inicial;
    }
    function getFecha_final(){
        return $this -> fecha_final;
    }
    function getIdfuncion(){
        return $this -> idfuncion;
    }
    
    
    
    function Funcion($idfuncion="", $fecha_inicial="", $fecha_final="", $idpelicula=""){
        $this -> idpelicula = $idpelicula;
        $this -> fecha_inicial = $fecha_inicial;
        $this -> fecha_final = $fecha_final;
        $this -> idfuncion = $idfuncion;
        $this -> conexion = new Conexion();
        $this -> funcionDAO = new funcionDAO($idfuncion, $fecha_inicial, $fecha_final, $idpelicula);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO ->actualizar());
        $this -> conexion -> cerrar();
    }
    
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
        $this -> conexion -> ejecutar($this -> funcionDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> idfuncion = $resultado[0];
        $this -> fecha_inicial = $resultado[1];
        $this -> fecha_final = $resultado[2];
        $this -> idpelicula = $resultado[3];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        echo $this -> funcionDAO -> consultarTodos();
        $this -> conexion -> ejecutar($this -> funcionDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Funcion($registro[0], $registro[1], $registro[2],$registro[3]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    
}