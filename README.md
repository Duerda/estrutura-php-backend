# Estrutura PHP Backend

Projeto acadêmico de backend PHP com PDO e arquitetura simples em MVC, baseado no repositório `estrutura-php-backend`.

## Integrantes da dupla

- Eduarda S.
- Errico S.

## Funcionalidades implementadas

- Cadastro, listagem, edição e exclusão de **Clientes** (`nome`, `email`, `telefone`).
- Cadastro, listagem, edição e exclusão de **Fornecedores** (`razao_social`, `email`, `telefone`).
- Métodos de pesquisa de clientes e fornecedores implementados na camada de backend.
- Formulários de edição preenchidos com os dados atuais.
- Persistência e pesquisa com PDO e prepared statements.
- Escape de dados exibidos em HTML com `htmlspecialchars`.
- CRUD original de Categorias preservado.

## Como executar

1. Tenha PHP 8.0+, MySQL/MariaDB e a extensão PDO MySQL instalados.
2. Crie o banco e as tabelas executando [`database/schema.sql`](database/schema.sql).
3. Ajuste usuário, senha e banco em [`model/Conn.php`](model/Conn.php), se necessário.
4. Aponte o servidor web para a pasta `views/` ou execute:

   ```bash
   php -S localhost:8000 -t views
   ```

5. Acesse `http://localhost:8000` e use os menus **Clientes** e **Fornecedores**.

## Rotas principais

- `?p=clientes`: listagem e pesquisa de clientes.
- `?p=fornecedores`: listagem e pesquisa de fornecedores.
- `?p=add/cliente` / `?p=add/fornecedor`: cadastro.
- `?p=editar/cliente&id=1` / `?p=editar/fornecedor&id=1`: edição.

A pesquisa foi implementada na camada de backend. Os controllers recebem o termo e os DAOs executam consultas parametrizadas com `LIKE`, retornando os registros ordenados pelo nome ou razão social. O front-end original foi preservado.

## Entrega complementar

- Métodos utilizados: [`metodos-utilizados.txt`](metodos-utilizados.txt).
- Script de banco: [`database/schema.sql`](database/schema.sql).
- Vídeo demonstrativo original: [`docs/demo-crud.mp4`](docs/demo-crud.mp4).
