<?php

class PeliculaDAO {

    private $idpelicula;
    private  $titulo;
    private $sinopsis;
    private $reparto;
    private $director;
    private $imagen;
    private $idgenero;
    private $ididioma;

    function PeliculaDAO($idpelicula="", $titulo="", $sinopsis="", $reparto="", $director="", $imagen="", $idgenero="",$ididioma=""){
        $this -> idpelicula = $idpelicula;
        $this -> titulo = $titulo;
        $this -> sinopsis = $sinopsis;
        $this -> reparto = $reparto;
        $this -> director= $director;
        $this -> imagen = $imagen;
        $this -> idgenero = $idgenero;
        $this -> ididioma = $ididioma;
        
    }

    function registrar(){
        return "insert into pelicula 
                (titulo, sinopsis, reparto, director, imagen, genero_idgenero, idioma_ididioma)
                values ('" . $this->titulo . "', '" 
                    . $this->sinopsis . "', '" 
                        . $this->reparto . "','" 
                            . $this->director . "', '" 
                                . $this->imagen . "', '" 
                                    . $this->idgenero . "','".$this -> ididioma."')";
    }

    function actualizar(){
        return "update pelicula set 
                titulo = '" . $this -> titulo . "',
                sinopsis='" . $this -> sinopsis . "', 
                reparto ='" . $this -> reparto . "',
                director='" . $this -> director . "',
                genero_idgenero='" . $this -> idgenero . "',
                idioma_ididioma='" . $this -> ididioma . "'
                 
                where idpelicula=" . $this -> idpelicula;
    }
    
    function actualizarImagen(){
        return "update pelicula set
                imagen = '" . $this -> imagen . "'
                where idpelicula=" . $this -> idpelicula;
    }

    function consultar() {
       
        return "select p.titulo, p.sinopsis, p.reparto, p.director,p.imagen, g.nom_genero,i.nom_idioma 
                from pelicula p,genero g,idioma i
                where p.genero_idgenero=g.idgenero
                and p.idioma_ididioma=i.ididioma
                and idpelicula=" . $this -> idpelicula. "
                order by titulo";
    }
    
    
    function existeTitulo(){
        return "select idpelicula from pelicula
                where titulo = '" . $this->titulo . "'";
    }

    function consultarTodos(){
        return "select p.idpelicula,p.titulo, p.director,g.nom_genero,i.nom_idioma 
                from pelicula p,genero g,idioma i
                where p.genero_idgenero=g.idgenero
                and p.idioma_ididioma=i.ididioma 
                order by titulo";
    }
    Function consultarActuales(){
        return "select DISTINCT p.idpelicula,p.titulo,p.imagen
                from pelicula p, funcion f
                where p.idpelicula=f.pelicula_idpelicula
                and   f.fecha_final > ".date("Y-m-d").
                " order by p.titulo";
    }
 }

?>