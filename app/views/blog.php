<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/assets/css/style.css">
    <title>Beauty Glam - Blog de Maquiagem</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="#" class="logo">Beauty Glam</a>
                <nav>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#tutoriais">Tutoriais</a></li>
                        <li><a href="#produtos">Produtos</a></li>
                        <li><a href="#dicas">Dicas</a></li>
                        <li><a href="#contato">Contato</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Desperte sua Beleza Interior</h1>
            <p>Descubra as melhores dicas de maquiagem, tutoriais exclusivos e produtos incríveis para realçar sua beleza natural!</p>
        </div>
    </section>

    <main class="container">
        <div class="main-content">
            <section class="blog-posts">
                <?php foreach ($listas as $post) {
                    $data_post = $post['data_post'] ?>

                    <article class="post">
                        <div class="post-image">
                            <span>💄 Make Noturna</span>
                        </div>
                        <div class="post-content">
                            <h3><?= $post['titulo'] ?></h3>
                            <div class="post-meta">Por Andriely Sarmento Tiburtino • <?= date('d M Y H:i:s', strtotime($data_post)) ?></div>
                            <p><?= substr($post['assunto'], 0, 50) . '...' ?></p>
                            <a href="" class="read-more" onclick="toggleConteudo(event, this)">Leia mais →</a>
                            <div class="conteudo-extra" style="display: none;">
                                <p><?= $post['assunto'] ?></p>
                            </div>
                        </div>
                    </article>

                <?php } ?>
            </section>

            <aside class="sidebar">
                <div class="widget">
                    <h3>Produtos em Destaque</h3>
                    <?php foreach ($listaprod as $produtos) { 
                        $arred = round($produtos['preco'],2);
                        $preco = str_replace('.',',',$arred);
                        ?>
                        <a href="<?= htmlspecialchars($produtos['link_compra']) ?>" target="_blank" style="text-decoration: none;">
                            <div class="product-item">
                                <div class="product-image" >  
                                    <img src="<?= htmlspecialchars($produtos['foto_link']) ?>" alt="Base HD">
                                </div>
                                <div class="product-info">
                                    <h4><?=$produtos['nome'] ?></h4>
                                    <div class="product-price">R$ <?=$preco ?></div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>

                <div class="widget">

                    <h3>Categorias</h3>
                    <?php foreach ($listarcatg as $catgs) { ?>
                        <a href="?rota=blog&categoria=<?php echo $catgs['id'] ?>" class="category-item"><?= $catgs['nome_categoria'] ?></a> <!-- para imprimir no cabeçario o ID tem que usar o echo -->
                    <?php } ?>
                    <a href="?rota=blog" class="category-item">Todas as categorias</a>
                </div>

                <div class="widget">
                    <h3>Newsletter</h3>
                    <p>Receba nossas dicas exclusivas diretamente no seu e-mail!</p>
                    <form style="margin-top: 1rem;">
                        <input type="email" placeholder="Seu e-mail" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 1rem;">
                        <button type="submit" style="width: 100%; padding: 0.8rem; background: linear-gradient(135deg, #ff6b9d, #c44569); color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; transition: all 0.3s ease;">
                            Inscrever-se
                        </button>
                    </form>
                </div>
            </aside>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="social-links">
                <a href="#" title="Instagram">IG</a>
                <a href="#" title="YouTube">YT</a>
                <a href="#" title="TikTok">TT</a>
                <a href="#" title="Pinterest">PT</a>
            </div>
            <p>&copy; 2025 Beauty Glam Blog. Todos os direitos reservados.</p>
            <p>Desenvolvido com 💄 para amantes da maquiagem</p>
        </div>
    </footer>

    <script src="/app/assets/js/scripmain.js"></script>
</body>

</html>