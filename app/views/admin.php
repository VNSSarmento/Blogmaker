<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administração - Beauty Glam</title>
  <link rel="stylesheet" href="/app/assets/css/admin-style.css">

</head>

<body>
  <header class="admin-header">
    <div class="container">
      <h1>Beauty Glam - Painel Admin</h1>
      <nav>
        <a href="/?rota=blog" target="blank">← Voltar ao Blog</a>
        <a href="#">Sair</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="admin-section">
      <h2>Gerenciar Posts</h2>
      <button onclick="toggleForm()">+ Novo Post</button>

      <!-- Formulário oculto -->
      <form class="form-post" id="form-post" method="post" action="/index.php">
        <input type="hidden" id="editar_id" name="editar_id" value="">

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="conteudo">Assunto:</label>
        <textarea id="conteudo" name="assunto" rows="10" required></textarea>

        <label for="categorias">Categoria:</label>
        <select name="id_categoria" id="categorias">
          <option>Selecione uma Categoria</option>
          <?php foreach ($listarcatg as $categorias) { ?>
            <option id="categoria" value="<?= htmlspecialchars($categorias['id']) ?>">
              <?= $categorias['nome_categoria'] ?>
            </option>
          <?php } ?>
        </select>
        <div>
          <button type="submit" name="editar">Salvar</button>
          <button type="button" onclick="toggleForm()">Cancelar</button>
        </div>
      </form>



      <ul class="admin-list">
        <?php foreach ($listas as $post) { ?>
          <input type="hidden" name="id">
          <li class="post-item" style="cursor:pointer;">
            <strong><?= $post['titulo'] ?></strong> <?= $post['data_post'] ?>

            <p class="post-conteudo" style="display:none; margin-top: 5px;">
              <?= nl2br(htmlspecialchars($post['assunto'])) ?>
            </p>

            <span>
              <form method="POST" action="/index.php" style="display:inline;">
                <input type="hidden" name="editar_id" value="<?= $post['id'] ?>">
                <button type="button" onclick="editarPost('<?= htmlspecialchars(addslashes($post['titulo'])) ?>', '<?= htmlspecialchars(addslashes($post['assunto'])) ?>', <?= $post['id'] ?>)">Editar</button>

              </form>

              <form method="POST" action="/index.php" style="display:inline;">
                <input type="hidden" name="excluir_id" value="<?= $post['id'] ?>">
                <button type="submit" name="excluir">Excluir</button>
              </form>

            </span>
          </li>
        <?php } ?>
      </ul>
    </section>

    <section class="admin-section">
      <h2>Gerenciar Produtos</h2>
      <button onclick="toggleForm2()">+ Novo Produto</button>

      <!-- Formulário oculto -->
      <form class="form-post" id="form-post2" method="post" action="create_post.php">
        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" required>

        <label for="preco">Preço do Produto:</label>
        <input id="preco" name="preco" type="text" required>

        <label for="imagem_produto">Foto do produto:</label>
        <input id="imagem_produto" name="imagem_produto" type="text" required>

        <label for="imagem_produto">link de compra:</label>
        <input id="link" name="link_produto" type="text" required>

        <button type="submit">Salvar</button>
        <button type="button" onclick="toggleForm2()">Cancelar</button>
      </form>


      <ul class="admin-list">
        <li>
          <strong>Base Líquida Ultra HD</strong> — R$ 89,90
          <span>
            <button>Editar</button>
            <button>Excluir</button>
          </span>
        </li>
        <li>
          <strong>Paleta de Sombras Sunset</strong> — R$ 156,90
          <span>
            <button>Editar</button>
            <button>Excluir</button>
          </span>
        </li>
        <li>
          <strong>Batom Matte Longa Duração</strong> — R$ 45,90
          <span>
            <button>Editar</button>
            <button>Excluir</button>
          </span>
        </li>
      </ul>
    </section>

    <section class="admin-section">
      <h2>Categorias</h2>
      <button onclick="toggleForm3()">+ Nova Categoria</button>
      <form class="form-post" id="form-post3" method="post" action="/index.php">
        <input type="hidden" id="editar_categoria" name="editar_categoria" value="">
        <label for="titulo">Título da Categoria:</label>
        <input type="text" id="titulo" name="nome_categoria" required>
        <button type="submit">Salvar</button>
        <button type="button" onclick="toggleForm3()">Cancelar</button>
      </form>

      <ul class="admin-list">
        <?php foreach ($listarcatg as $categorias) { ?>
          <li><?= $categorias['nome_categoria'] ?> <button>Excluir</button></li>
        <?php    } ?>
      </ul>
    </section>
  </main>
  <footer class="admin-footer">
    <p>&copy; 2025 Beauty Glam Admin</p>
  </footer>

  <script src="/app/assets/js/script.js"></script>
</body>

</html>