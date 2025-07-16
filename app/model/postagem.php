<?php

class Postagem
{
    private $id;
    private $titulo;
    private $assunto;
    private $dataedit;
    private $img;
    private $id_categoria;

    public function __construct($titulo = '', $assunto = '', $dataedit = null, $id_categoria = '')
    {
        $this->titulo = $titulo;
        $this->assunto = $assunto;
        $this->dataedit = date('Y-m-d H:i:s');
        $this->id_categoria = $id_categoria;
        ;
    }


    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setImg($img)
    {
        $this->img;
    }
    public function setAssunto($assunto)
    {
        $this->assunto;
    }
    public function setIdCategoria($id_categoria)
    {
        $this->id_categoria;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getImg()
    {
        return $this->img;
    }
    public function getAssunto()
    {
        return $this->assunto;
    }

    public function getDataatt()
    {
        return $this->dataedit;
    }

    public function getIdCategoria()
    {
        return $this->id_categoria;
    }
}
