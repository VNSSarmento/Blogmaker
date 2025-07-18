
function toggleForm() {
    const form = document.getElementById('form-post');
    form.style.display = (form.style.display === 'block') ? 'none' : 'block';
}

function toggleForm2() {
    const form = document.getElementById('form-post2');
    form.style.display = (form.style.display === 'block') ? 'none' : 'block';
}

function toggleForm3() {
    const form = document.getElementById('form-post3');
    form.style.display = (form.style.display === 'block') ? 'none' : 'block';
}

function editarPost(titulo, assunto, postId, id_categoria) {
    document.getElementById('titulo').value = titulo;
    document.getElementById('conteudo').value = assunto;
    document.getElementById('editar_id').value = postId;
    document.getElementById('categorias').value = id_categoria;

    const form = document.getElementById('form-post');
    form.style.display = 'block';
    window.scrollTo({
        top: form.offsetTop - 20,
        behavior: 'smooth'
    });
}

document.querySelectorAll(".post-item").forEach(item => {
    item.addEventListener("click", function (e) {
        // evita que clique no botão também ative a exibição
        if (e.target.tagName.toLowerCase() === 'button') return;

        const p = this.querySelector(".post-conteudo");
        if (p) {
            p.style.display = (p.style.display === "none" || p.style.display === "") ? "block" : "none";
        }
    });
});