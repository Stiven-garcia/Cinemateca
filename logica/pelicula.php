<?php
require 'persistencia/peliculaDAO.php';
require_once 'persistencia/Conexion.php';

class Pelicula{
   private $idpelicula;
   private  $titulo;
   private $sinopsis;
   private $reparto;
   private $director;
   private $imagen;
   private $idgenero;
   private $ididioma;
   
    private $peliculaDAO;
    private $conexion;
    
    function getIdpelicula(){
        return $this -> idpelicula;
    }
    function getTitulo(){
        return $this -> titulo;
    }
    function getSinopsis(){
        return $this -> sinopsis;
    }
    function getReparto(){
        return $this -> reparto;
    }
    function getDirector(){
        return $this -> director;
    }
    function getImagen(){
        return $this -> imagen;
    }
    function getIdgenero(){
        return $this -> idgenero;
    }
    function getIdidioma(){
        return $this -> ididioma;
    }
    
    
    function Pelicula($idpelicula="", $titulo="", $sinopsis="", $reparto="", $director="", $imagen="", $idgenero="",$ididioma=""){
        $this -> idpelicula = $idpelicula;
        $this -> titulo = $titulo;
        $this -> sinopsis = $sinopsis;
        $this -> reparto = $reparto;
        $this -> director= $director;
        $this -> imagen = $imagen;
        $this -> idgenero = $idgenero;
        $this -> ididioma = $ididioma;
        $this -> conexion = new Conexion();
        $this -> peliculaDAO = new PeliculaDAO($idpelicula, $titulo, $sinopsis, $reparto, $director, $imagen, $idgenero,$ididioma);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> peliculaDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> peliculaDAO ->actualizar());
        $this -> conexion -> cerrar();
    }
    
    function actualizarImagen(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> peliculaDAO ->actualizarImagen());
        $this -> conexion -> cerrar();
    }
    
    function existeTitulo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> peliculaDAO -> existeTitulo());
        if($this -> conexion -> numFilas() == 0){
            $this -> conexion -> cerrar();
            return false;
        } else {
            $this -> conexion -> cerrar();
            return true;
        }
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> peliculaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> titulo = $resultado[0];
        $this -> sinopsis = $resultado[1];
        $this -> reparto = $resultado[2];
        $this -> director = $resultado[3];
        $this -> imagen = $resultado[4];
        $this -> idgenero = $resultado[5];
        $this -> ididioma = $resultado[6];
        $this -> conexion -> cerrar();
    }
    
    
    function consultarActuales(){
        $this -> conexion -> abrir();
        echo $this -> peliculaDAO -> consultarActuales();
        $this -> conexion -> ejecutar($this -> peliculaDAO -> consultarActuales());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Pelicula($registro[0], $registro[1], "", "", "",$registro[2],"","");
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    
    function consultarTodos(){
        $this -> conexion -> abrir();
       
        $this -> conexion -> ejecutar($this -> peliculaDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Pelicula($registro[0], $registro[1], "", "", $registro[2],"",$registro[3],$registro[4]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    
}