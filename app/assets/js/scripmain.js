// Smooth scrolling para navegação
document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});


document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault();
    const button = this.querySelector('button');
    const originalText = button.textContent;

    button.innerHTML = '<span class="loading"></span> Processando...';
    button.disabled = true;

    setTimeout(() => {
        button.textContent = 'Inscrito com sucesso! ✓';
        button.style.background = '#27ae60';

        setTimeout(() => {
            button.textContent = originalText;
            button.disabled = false;
            button.style.background = 'linear-gradient(135deg, #ff6b9d, #c44569)';
            this.reset();
        }, 3000);
    }, 2000);
});

window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const hero = document.querySelector('.hero');
    hero.style.transform = `translateY(${scrolled * 0.5}px)`;
});

function toggleConteudo(event, el) {
    event.preventDefault();

    const artigo = el.closest('.post');
    const conteudoExtra = artigo.querySelector('.conteudo-extra');

    if (conteudoExtra.style.display === 'none' || conteudoExtra.style.display === '') {
        conteudoExtra.style.display = 'block';
        el.textContent = 'Ler menos';
    } else {
        conteudoExtra.style.display = 'none';
        el.textContent = 'Leia mais →';
    }
}