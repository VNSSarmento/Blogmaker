<?php
require_once './app/controller/controller.php';

$rota = $_GET['rota'] ?? 'admin.php';
$postEdit;

switch($rota){
    case 'admin.php':
        $user = new Usercontroller;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Excluir
            if (isset($_POST['excluir_id'])) {
                $id_post = $_POST['excluir_id'];
                $user->deletarPost($id_post);

            // Editar
            } else if (isset($_POST['editar_id'], $_POST['titulo'], $_POST['assunto'], $_POST['id_categoria'])) {
                $id_post = $_POST['editar_id'];
                $titulo = $_POST['titulo'];
                $assunto = $_POST['assunto'];
                $id_categoria = $_POST['id_categoria'];
                $user->atualizarPost($id_post, $titulo, $assunto, $id_categoria);
            }else if(isset($_POST['nome_categoria'])){
                $nome_categoria = $_POST['nome_categoria'];
                $user->novaCategoria($nome_categoria);
            }
        }

        $user->newPost();
        $listas = $user->listarPosts();
        $listarcatg = $user->listaDeCategorias();
        include './app/views/admin.php';
        break;
    case 'blog':
        $user = new Usercontroller;
        if(isset($_GET['categoria'])){
            $listas = $user->listaDePostsID($_GET['categoria']);
        }else{
            $listas = $user->listarPosts();
        }
        $listarcatg = $user->listaDeCategorias();
        include './app/views/blog.php';
        $user->navmain();

}