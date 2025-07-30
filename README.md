# 📚 Cadastro de Livros
Um sistema simples de gerenciamento de livros com funcionalidades de : Cadastra e logar os usuário além de cadatrar , editar e excluir livros. 

#🚀 Começando
Estas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e testes.

Consulte a seção 📦 Implantação para saber como colocar o projeto em produção.

#📋 Pré-requisitos
Para rodar este projeto localmente, você precisará:

PHP 7.4+

Servidor XAMPP.

MySQL

Navegador Web



# 🔧 Instalação
1. Clone o repositório
bash
Copiar
Editar
git clone https://github.com/PietraMassarotti/CadastroLivros.git
2. Configure o ambiente
Crie um banco de dados no MySQL:

sql
Copiar
Editar
CREATE DATABASE cadastro_livros;
Importe o script SQL (se existir) ou crie a tabela de livros e usuários com base nos arquivos DAO e Models.

# 🎲 Script do Banco de Dados

CREATE DATABASE sistema_login;
USE sistema_login;


CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (email, senha_hash) 
VALUES ('usuario@exemplo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');







3. Configure a conexão com o banco
Edite o arquivo config/Database.php com os dados do seu MySQL:

php
Copiar
Editar
private $host = "localhost";
private $db_name = "cadastro_livros";
private $username = "root";
private $password = "Sua senha do Banco de Dados";
4. Inicie o servidor local
Se estiver usando XAMPP ou Laragon, mova a pasta para htdocs ou www e acesse no navegador:

http://localhost/cadastrodelivros/public/

# 💡 Como Usar
Faça login ou crie um usuário.

Acesse a área de livros.

Cadastre, edite, visualize ou delete os livros conforme necessário.

# ⚙️ Executando os testes
Atualmente, o projeto não possui testes automatizados. Você pode realizar testes manuais:

Testar o login com dados válidos/ inválidos.

Criar, editar e deletar livros.

Verificar mensagens de erro e sucesso.

# 🔩 Testes de ponta a ponta
A lógica é validada nas camadas:

UsuarioDAO / LivroDAO fazem a comunicação com o banco.

form_*.php contém formulários de entrada e redirecionamento.

Validação manual de dados inseridos.

# ⌨️ Testes de estilo de codificação
O código segue o padrão estrutural MVC básico:

Models: Lógica das entidades.

DAOs: Manipulação de dados no banco.

Public: HTML e PHP das páginas acessíveis.

Utils: Scripts auxiliares de validação e segurança.

# 📦 Implantação
Para implantar este sistema em um ambiente ativo (ex: servidor VPS ou hospedagem):

Envie os arquivos via FTP/SFTP.

Configure corretamente o banco de dados no servidor.

Aponte o domínio para a pasta public/.

Configure o .htaccess se necessário para URLs amigáveis.

# 🛠️ Construído com
PHP - Linguagem principal

MySQL - Banco de dados

HTML/CSS - Estrutura visual

VSCode - Editor de código

XAMPP/Laragon - Ambiente local recomendado

# 📁 Estrutura de Pastas

CadastroDeLivros/
├── config/
│   └── Database.php
│
├── models/
│   ├── Livro.php
│   ├── LivroDAO.php
│   ├── Usuario.php
│   └── UsuarioDAO.php
│
├── public/
│   ├── livros/
│   │   ├── css/
│   │   │   ├── form.css
│   │   │   └── tabela.css
│   │   ├── criar_livro.php
│   │   ├── deletar_livro.php
│   │   ├── editar_livro.php
│   │   ├── form_criar.php
│   │   ├── form_editar.php
│   │   ├── index.php
│   │   └── logout.php
│   │
│   ├── login/
│   │   ├── css/
│   │   │   ├── form.css
│   │   │   └── tabela.css
│   │   ├── cadastro.php
│   │   ├── criar_user.php
│   │   ├── index.php
│   │   ├── login.php
│   │   └── process_login.php
│
├── utils/
│   ├── Sanitizacao.php
│   ├── SenhaValidacao.php
│   └── ver_senha.php
│




# ✒️ Autores
BackEnd - Pietra Massarotti 

FrontEnd - Maria Cecília

Documentação - Julia Júlio do Carmo

