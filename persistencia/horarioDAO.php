<?php

class horarioDAO
{

    private $idpelicula;

    private $idhorario;

    private $horario;

    function horarioDAO($idpelicula = "", $idhorario = "", $horario = "")
    {
        $this->idpelicula = $idpelicula;
        $this->idhorario = $idhorario;
        $this->horario = $horario;
    }

    function registrar()
    {
        return "insert into horarios
                ( pelicula_idpelicula, horario)
                values ('" . $this->idpelicula . "', '" . $this->horario . "')";
    }

    // function actualizar(){
    // return "update pelicula set
    // titulo = '" . $this -> titulo . "',
    // sinopsis='" . $this -> sinopsis . "',
    // reparto ='" . $this -> reparto . "',
    // director='" . $this -> director . "',
    // genero_idgenero='" . $this -> idgenero . "',
    // idioma_ididioma='" . $this -> ididioma . "'

    // where idpelicula=" . $this -> idpelicula;
    // }

    // function actualizarImagen(){
    // return "update pelicula set
    // imagen = '" . $this -> imagen . "'
    // where idpelicula=" . $this -> idpelicula;
    // }

    function consultar() {
    return "select idhorarios, pelicula_idpelicula, horario
    from horarios
    where idpelicula =" . $this -> idpelicula;
    }

    // function existeTitulo(){
    // return "select idpelicula from pelicula
    // where titulo = '" . $this->titulo . "'";
    // }

    // function consultarTodos(){
    // return "select p.idpelicula,p.titulo, p.director,g.nom_genero,i.nom_idioma
    // from pelicula p,genero g,idioma i
    // where p.genero_idgenero=g.idgenero
    // and p.idioma_ididioma=i.ididioma
    // order by titulo";
    // }
}

?>