<?php
require_once './app/controller/controller.php';

$rota = $_GET['rota'] ?? 'admin.php';
$postEdit;

switch ($rota) {
    case 'admin.php':
        $user = new Usercontroller;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['excluir_id'])) {
                $teste = 'if do excluir';
                $id_post = $_POST['excluir_id'];
                $user->deletarPost($id_post);

            } else if (!empty($_POST['titulo']) && !empty($_POST['assunto']) && empty($_POST['editar_id']) && !empty($_POST['id_categoria'])){
                $teste = 'if do adicionar';
                $titulo = $_POST['titulo'];
                $assunto = $_POST['assunto'];
                $id_categoria = $_POST['id_categoria'];
                $user->newPost($titulo,$assunto,$id_categoria);

            } else if (!empty($_POST['editar_id']) && isset($_POST['titulo']) && isset($_POST['assunto']) && isset($_POST['id_categoria'])) {
                $teste = 'if do editar';
                $id_post = $_POST['editar_id'];
                $titulo = $_POST['titulo'];
                $assunto = $_POST['assunto'];
                $id_categoria = $_POST['id_categoria'];
                $user->atualizarPost($id_post, $titulo, $assunto, $id_categoria);

            } else if (isset($_POST['nome_categoria'])) {
                $nome_categoria = $_POST['nome_categoria'];
                $user->novaCategoria($nome_categoria);

            }else if(isset($_POST['nome_produto'], $_POST['preco'], $_POST['imagem_produto'], $_POST['link_produto'])){
                $novoprod = [
                    'nome_produto'=> $_POST['nome_produto'],
                    'preco'=> $_POST['preco'],
                    'link_img'=> $_POST['imagem_produto'],
                    'link'=> $_POST['link_produto']
                ];

                $user->novoProduto($novoprod['nome_produto'],$novoprod['preco'],$novoprod['link_img'], $novoprod['link']);
            }
        }
        
        print_r($_POST);
        echo $teste;
        $listas = $user->listarPosts();
        $listarcatg = $user->listaDeCategorias();
        include './app/views/admin.php';
        break;
    case 'blog':
        $user = new Usercontroller;
        if (isset($_GET['categoria'])) {
            $listas = $user->listaDePostsID($_GET['categoria']);
        } else {
            $listas = $user->listarPosts();
        }
        $listarcatg = $user->listaDeCategorias();
        $listaprod = $user->listaDeprodutos();
        include './app/views/blog.php';
        $user->navmain();
}
