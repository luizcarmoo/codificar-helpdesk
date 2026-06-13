# Sistema de Controle de Chamados Internos

Desafio técnico desenvolvido para o processo seletivo da Codificar.

## Sobre o Projeto

Aplicação web para gerenciamento de chamados internos desenvolvida com Laravel 13.

O sistema permite:

* Cadastro de chamados
* Distribuição automática de responsáveis
* Atualização de status
* Visualização detalhada
* Edição de chamados
* Exclusão de chamados
* Paginação da listagem

---

## Tecnologias Utilizadas

### Backend

* PHP 8.3
* Laravel 13
* SQLite
* Eloquent ORM

### Frontend

* Blade
* Tailwind CSS
* Vite

### Ferramentas

* Composer
* NPM
* Git

---

## Estrutura do Projeto

```text
app
├── Actions
├── DTOs
├── Enums
├── Http
│   ├── Controllers
│   └── Requests
├── Models
├── Services
└── ViewModels
```

---

## Modelagem

### Responsibles

Responsáveis pelo atendimento dos chamados.

| Campo      | Tipo      |
| ---------- | --------- |
| id         | bigint    |
| name       | string    |
| created_at | timestamp |
| updated_at | timestamp |

### Tickets

Chamados cadastrados no sistema.

| Campo          | Tipo        |
| -------------- | ----------- |
| id             | bigint      |
| title          | string      |
| description    | text        |
| priority       | string      |
| status         | string      |
| responsible_id | foreign key |
| created_at     | timestamp   |
| updated_at     | timestamp   |

---

## Relacionamentos

### Responsible

```php
Responsible hasMany Tickets
```

### Ticket

```php
Ticket belongsTo Responsible
```

---

## Enums

### TicketStatus

```text
open
in_progress
resolved
closed
```

### TicketPriority

```text
low
medium
high
```

---

## Funcionalidades Implementadas

### Chamados

* Criar chamado
* Listar chamados
* Visualizar chamado
* Editar chamado
* Excluir chamado

### Responsáveis

* Seed inicial automático
* Associação automática ao criar chamado

### Interface

* Layout principal Blade
* Formulário compartilhado
* Paginação
* Mensagens de sucesso

---

## Seed Inicial

Ao executar os seeders, são criados automaticamente:

```text
João Silva
Maria Souza
Pedro Santos
```

---

## Instalação

### Clonar repositório

```bash
git clone <url-do-repositorio>
cd codificar-helpdesk
```

### Instalar dependências

```bash
composer install
npm install
```

### Configurar ambiente

```bash
cp .env.example .env
php artisan key:generate
```

### Banco SQLite

Criar arquivo:

```text
database/database.sqlite
```

Configurar:

```env
DB_CONNECTION=sqlite
```

### Executar migrations

```bash
php artisan migrate:fresh --seed
```

### Compilar frontend

```bash
npm run build
```

Para desenvolvimento:

```bash
npm run dev
```

### Executar aplicação

```bash
php artisan serve
```

Acessar:

```text
http://127.0.0.1:8000
```

---

## Rotas

```text
GET     /tickets
GET     /tickets/create
POST    /tickets
GET     /tickets/{ticket}
GET     /tickets/{ticket}/edit
PUT     /tickets/{ticket}
DELETE  /tickets/{ticket}
```

---

## Estrutura de Views

```text
resources/views
│
├── layouts
│   └── app.blade.php
│
└── tickets
    ├── _form.blade.php
    ├── create.blade.php
    ├── edit.blade.php
    ├── index.blade.php
    └── show.blade.php
```

---

## Próximas Melhorias

* Refatoração para Services
* Implementação de DTOs
* Implementação de Actions
* ViewModels
* Distribuição inteligente de chamados
* Testes automatizados
* Dashboard de métricas

---

## Status do Projeto

### Concluído

* Estrutura inicial Laravel
* Banco SQLite
* Migrations
* Seeders
* Models
* Enums
* CRUD de chamados
* Validações
* Blade Templates
* Tailwind CSS
* Paginação

### Em desenvolvimento

* Arquitetura em camadas
* Regras de negócio avançadas
* Testes automatizados
