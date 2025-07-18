<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
require_once(__DIR__ . '/../model/userDAO.php');
require_once(__DIR__ . '/../model/postagem.php');

class navcontroler
{
    public function navadm()
    {
        include_once __DIR__ . '/../views/admin.php';
    }

    public function navmain()
    {
        include_once __DIR__ . '/../views/blog.php';
    }
}

class Usercontroller extends navcontroler
{
    public function newPost($titulo, $assunto, $id_categoria)
    {
        //tive problema aqui por nao utilizar a ! e o empty($_POST['editar_id']) é para saber se existe solicitalçãopm de edição se nao existir aplica
        $post = new UserDAO();
        $post->addPost($titulo, $assunto, $id_categoria);
        print_r($_POST);
        header("Location: /index.php?rota=admin.php");
        exit;
    }

    public function listarPosts()
    {
        $posts = new UserDAO();
        return $posts->listarPost();
    }

    public function deletarPost($id)
    {
        if (!empty($id)) {
            $posts = new UserDAO();
            $posts->excluirPost($id);
        }
    }

    public function atualizarPost($id, $titulo, $assunto, $id_categoria)
    {
        $post = new Postagem($titulo, $assunto, date('Y-m-d H:i:s'), $id_categoria);
        $post->setId($id);
        $postDAO = new UserDAO();
        $postDAO->atualizarPost($post);
    }

    public function novaCategoria($nome_categoria)
    {
        $catg =  new UserDAO();
        $catg->addCategorias($nome_categoria);
        header("Location: /index.php?rota=admin.php");
        exit;
    }

    public function listaDeCategorias()
    {
        $listacatg = new UserDAO();
        return  $listacatg->listarCategorias();
    }

    public function listaDePostsID($id)
    {
        $listacatg = new UserDAO();
        return  $listacatg->listarIDposts($id);
    }

    public function listaDeprodutos()
    {
        $listaprod = new UserDAO();
        return $listaprod->listaProdutos();
    }

    public function novoProduto($nome, $preco, $linkFoto, $link)
    {
        $produto = new UserDAO;
        $precofloat = str_replace(',', '.', $preco);
        $produto->novoProduto($nome, $precofloat, $linkFoto, $link);
        header("Location: /index.php?rota=admin.php");
        exit;
    }
}
