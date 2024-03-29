![Gerenciamento de Contatos](https://i.imgur.com/aAe9smc.png)

# Gerenciamento de Contatos

Este projeto utiliza o Laravel para gerenciar contatos, permitindo a realização de operações CRUD (Criar, Ler, Atualizar, Deletar), com autenticação para acessar determinadas funcionalidades.

## Rotas

- **Listar Contatos** (`GET /contacts`): Exibe todos os contatos. Suporta pesquisa por nome e e-mail.
- **Criar Contato** (`GET /contacts/create` e `POST /contacts`): Formulário para criação e armazenamento de um novo contato.
- **Visualizar Contato** (`GET /contacts/{contact}`): Detalhes de um contato específico.
- **Editar Contato** (`GET /contacts/{contact}/edit` e `PUT /contacts/{contact}`): Formulário para edição e atualização dos dados de um contato.
- **Deletar Contato** (`DELETE /contacts/{contact}`): Remove um contato específico.

## Lógica do Controller

O `ContactController` gerencia as operações relacionadas aos contatos. Aqui estão alguns destaques da sua implementação:

- `index()`: Lista os contatos, com suporte à pesquisa. A pesquisa pode filtrar por nome ou e-mail.
- `create()` e `store()`: Exibe o formulário para adição de um novo contato e processa a criação deste contato, respectivamente. Validações são aplicadas para garantir dados corretos.
- `show()`: Mostra os detalhes de um contato específico.
- `edit()` e `update()`: Gerenciam a edição de um contato. `edit()` exibe o formulário preenchido com os dados existentes do contato, e `update()` processa as alterações.
- `destroy()`: Remove um contato do banco de dados.

### Validações

- Nome: obrigatório e com mínimo de 6 caracteres.
- Contato (telefone): obrigatório, deve ter 9 dígitos e ser único no sistema.
- E-mail: obrigatório, deve ser um formato de e-mail válido e único no sistema.

### Feedback ao Usuário

Após operações de criação, atualização e exclusão, mensagens de sucesso são exibidas para informar o usuário sobre o resultado da operação.

## Pré-requisitos

Antes de iniciar, certifique-se de que você tem o seguinte instalado em sua máquina:

- PHP (versão compatível com o projeto)
- Composer (Gerenciador de dependências para PHP)
- Servidor de banco de dados (MySQL, PostgreSQL, etc.)
- Git (opcional, para clonar o repositório)

## Passos para Configuração

- php artisan migrate
- php artisan db:seed
- composer install

### Clonar o Projeto (se aplicável)

```bash
git clone https://github.com/kage3f/contacts-alfasoft-app
cd nome-da-pasta
