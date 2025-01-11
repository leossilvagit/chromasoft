document.addEventListener('DOMContentLoaded', () => {
    fetch('/api/listagem.php')
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#userTable tbody');
            data.forEach(user => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${user.nome}</td>
                    <td>${user.email}</td>
                    <td>
                        <a href="editar.html?id=${user.id}">Editar</a>
                        <a href="#" onclick="excluirUsuario(${user.id})">Excluir</a>
                    </td>
                `;
                tbody.appendChild(row);
            });
        });
});

function excluirUsuario(id) {
    if (confirm('Tem certeza que deseja excluir este usuário?')) {
        fetch(`/api/excluir.php?id=${id}`, { method: 'GET' })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    alert(data.success);
                    location.reload();
                }
            })
            .catch(err => {
                console.error('Erro ao excluir usuário:', err);
                alert('Erro ao excluir usuário.');
            });
    }
}

