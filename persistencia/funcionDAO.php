<?php

class funcionDAO {
    
    private $idpelicula;
    private  $fecha_inicial;
    private $fecha_final;
    private $idfuncion;
    
    
    function funcionDAO($idfuncion, $fecha_inicial, $fecha_final, $idpelicula){
        $this -> idpelicula = $idpelicula;
        $this -> fecha_inicial = $fecha_inicial;
        $this -> fecha_final = $fecha_final;
        $this -> idfuncion = $idfuncion;
        
    }
    
    function registrar(){
 
        return "insert into funcion
                (fecha_inicial, fecha_final, pelicula_idpelicula)
                values ('" . $this->fecha_inicial . "', '"
                    . $this->fecha_final . "', '"
                        . $this->idpelicula ."')";
    }
    
    function actualizar(){
        return "update funcion set
                fecha_inicial = '" . $this -> fecha_inicial . "',
                fecha_final='" . $this -> fecha_final . "'
                where pelicula_idpelicula=" . $this -> idpelicula;
    }
    
//     function actualizarImagen(){
//         return "update pelicula set
//                 imagen = '" . $this -> imagen . "'
//                 where idpelicula=" . $this -> idpelicula;
//     }
    
  
    
//     function existeTitulo(){
//         return "select idpelicula from pelicula
//                 where titulo = '" . $this->titulo . "'";
//     }

    
    function consultar(){
        return "select idfuncion, fecha_inicial, fecha_final, pelicula_idpelicula
                from funcion
                where pelicula_idpelicula =" . $this -> idpelicula;
    }
 }

?>
