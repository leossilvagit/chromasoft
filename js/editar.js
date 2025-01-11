document.querySelector('#editarForm').addEventListener('submit', event => {
    event.preventDefault();

    const id = document.querySelector('#id').value;
    const nome = document.querySelector('#nome').value;
    const email = document.querySelector('#email').value;

    if (!id || !nome || !email) {
        alert('Todos os campos são obrigatórios.');
        return;
    }

    fetch('/api/editar.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id, nome, email })
    })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                alert(data.success);
                window.location.href = 'index.html';
            }
        })
        .catch(err => {
            console.error('Erro ao salvar as alterações:', err);
            alert('Erro ao salvar as alterações.');
        });
});
