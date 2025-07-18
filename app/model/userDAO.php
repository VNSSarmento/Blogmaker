<?php
require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../model/postagem.php');


class UserDAO {
    private $conn;

    public function __construct() {
        $conec = new Conn;
        $this->conn = $conec->getPdo();
    }

    public function addPost($titulo,$assunto,$id_categoria){
        $stmt = $this->conn->prepare("INSERT INTO posts(titulo,assunto,id_categoria) VALUES(?,?,?)");
        $stmt->execute([$titulo,$assunto,$id_categoria]);
    }

    public function listarPost(){
        $stmt = $this->conn->prepare("SELECT A.*,B.nome_categoria FROM posts  AS A INNER JOIN categorias AS B ON A.id_categoria = B.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirPost($id){
        $stmt = $this->conn->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getPost($id){
        $stmt = $this->conn->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarPost(Postagem $post){
        $stmt = $this->conn->prepare("UPDATE posts SET titulo = ?, assunto = ?, data_post = ? , id_categoria = ?  WHERE id = ? ");
        $stmt->execute([$post->getTitulo(), $post->getAssunto(),$post->getDataatt(), $post->getIdCategoria(),$post->getId()]);
    }

    public function addCategorias($nome_categoria){
        $stmt = $this->conn->prepare("INSERT INTO categorias(nome_categoria) VALUES(?)");
        $stmt->execute([$nome_categoria]);
    }

    public function listarCategorias(){
        $stmt = $this->conn->prepare("SELECT * FROM categorias");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        public function listarIDposts($id){
        $stmt = $this->conn->prepare("SELECT * FROM posts WHERE id_categoria = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listaProdutos(){
        $stmt = $this->conn->prepare("SELECT * FROM produtos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function novoProduto($nome,$preco,$linkFoto,$link){
        $stmt = $this->conn->prepare("INSERT INTO produtos(nome, preco, foto_link, link_compra) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $preco, $linkFoto, $link]);
    }
}