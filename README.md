Configuração e Execução do Projeto

1. Pré-requisitos

Docker
PHP 8.3.15 ou superior

2. Configuração do Banco de Dados MySQL com Docker
Passo 1: Subir o MySQL com Docker
Execute o seguinte comando no terminal para criar e iniciar um container com o MySQL:

Copiar código
docker run --name chromasoft \
  -e MYSQL_ROOT_PASSWORD=gate_pos \
  -e MYSQL_DATABASE=chromasoft \
  -e MYSQL_USER=chromasoft \
  -e MYSQL_PASSWORD=gate_pos \
  -p 3306:3306 \
  -d mysql:latest

3. Instalar e Configurar o PHP
Passo 1: Instalar o PHP
Baixe e instale o PHP 8.3.15 a partir de https://www.php.net/downloads. Certifique-se de baixar a versão apropriada para seu sistema operacional.

Passo 2: Configurar Variáveis de Ambiente
Adicione o caminho do PHP à variável de ambiente Path:
Exemplo para Windows: C:\php
Reinicie o terminal para aplicar as alterações.
Passo 3: Habilitar a Extensão PDO MySQL
Localize o arquivo php.ini:
Renomeie o arquivo C:/php/php.ini-development para php.ini.
Abra o arquivo php.ini e habilite o PDO MySQL:
Encontre a linha:

;extension=pdo_mysql
Remova o ; para habilitar a extensão:

extension=pdo_mysql
Salve o arquivo.

4. Configurar o Banco de Dados
Passo 1: Executar o Script SQL
Acesse o banco de dados MySQL:

Copiar código
docker exec -it chromasoft mysql -u root -p
Digite a senha: gate_pos.

Crie as tabelas necessárias rodando os comandos do arquivo sql.txt:

5. Rodar a Aplicação
No terminal, vá até o diretório onde está localizado o projeto:

cd /caminho/do/projeto
Execute o seguinte comando para iniciar o servidor embutido do PHP:

php -S localhost:8000
Acesse a aplicação no navegador:

http://localhost:8000

6. Estrutura do Projeto
plaintext
.
├── /api              # Contém os scripts PHP para o backend
├── /css              # Estilos da aplicação (arquivos CSS)
├── /js               # Scripts JavaScript para interação no frontend
├── index.html        # Página inicial (listagem de usuários)
├── editar.html       # Página para edição de usuários
├── cadastro.html     # Página para cadastro de usuários
├── conexao.php       # Script para conexão com o banco de dados
└── sql.txt           # Script para criar tabelas e inserir dados no MySQL

7. Testar a Aplicação