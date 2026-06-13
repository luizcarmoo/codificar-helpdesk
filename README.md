# Sistema de Controle de Chamados Internos

Desafio técnico desenvolvido para o processo seletivo da Codificar.

## Sobre o Projeto

Aplicação web para gerenciamento de chamados internos desenvolvida com Laravel 13.

O sistema permite:

* Cadastro de chamados
* Atribuição automática de responsáveis (implementação inicial)
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
├── Models
└── Services
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

* Seed inicial de responsáveis
* Atribuição automática de responsável ao criar chamado

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

# Arquitetura

O projeto segue uma arquitetura em camadas, promovendo a separação de responsabilidades e facilitando a manutenção, escalabilidade e testabilidade da aplicação.

## Camadas

### Controllers

Responsáveis por receber as requisições HTTP, delegar o processamento para as camadas apropriadas e retornar as respostas ao cliente.

### Requests

Responsáveis pela validação dos dados de entrada antes que sejam processados pela aplicação.

### DTOs (Data Transfer Objects)

Objetos utilizados para transportar dados entre as camadas da aplicação de forma estruturada e tipada.

**Exemplo:**

```php
CreateTicketDTO
```

### Actions

Responsáveis por orquestrar os casos de uso da aplicação, centralizando o fluxo de execução das operações.

**Exemplo:**

```php
CreateTicketAction
```

### Services

Responsáveis por encapsular regras de negócio reutilizáveis e operações específicas do domínio.

**Exemplo:**

```php
AssignResponsibleService
```

### Models

Representam as entidades da aplicação e realizam a interação com o banco de dados por meio do Eloquent ORM.

---

## Fluxo de Criação de Chamados

```text
HTTP Request
      │
      ▼
StoreTicketRequest
      │
      ▼
CreateTicketDTO
      │
      ▼
CreateTicketAction
      │
      ▼
AssignResponsibleService
      │
      ▼
Ticket Model
      │
      ▼
Database
```

---

## Estrutura Atual

```text
app
├── Actions
│   └── CreateTicketAction.php
│
├── DTOs
│   └── CreateTicketDTO.php
│
├── Enums
│   ├── TicketPriority.php
│   └── TicketStatus.php
│
├── Http
│   ├── Controllers
│   │   └── TicketController.php
│   │
│   └── Requests
│       ├── StoreTicketRequest.php
│       └── UpdateTicketRequest.php
│
├── Models
│   ├── Responsible.php
│   └── Ticket.php
│
└── Services
    └── AssignResponsibleService.php
```

---

## Decisões Técnicas

### Banco de Dados

Foi utilizado SQLite por ser uma solução leve e simples de configurar para o desafio técnico.

### Arquitetura

A lógica de negócio foi separada em DTOs, Actions e Services para manter os Controllers enxutos e facilitar testes futuros.

### Enums

Os campos de status e prioridade utilizam Enums nativos do PHP para evitar valores inválidos e melhorar a legibilidade do código.

---

# Próximas Melhorias

- Distribuição inteligente de chamados baseada em carga de trabalho
- Seleção manual de responsável na criação e edição de chamados
- Filtros por status, prioridade e responsável
- Ordenação da listagem
- Busca por título do chamado
- Testes unitários
- Testes de integração

---

# Status do Projeto

## ✅ Concluído

* Estrutura inicial com Laravel 13
* Configuração do banco de dados SQLite
* Migrations
* Seeders
* Models e relacionamentos
* Enums para status e prioridade
* CRUD completo de chamados
* Form Requests para validação
* Interface com Blade Templates
* Estilização com Tailwind CSS
* Paginação de registros
* Implementação de DTOs
* Implementação de Actions
* Implementação de Services
* Separação de responsabilidades por camadas
* Atribuição automática de responsáveis

## 🚧 Em Desenvolvimento

- Distribuição inteligente de chamados
- Seleção manual de responsável
- Filtros e busca na listagem
- Testes automatizados

```
```

---

## Requisitos Atendidos ✅

### Funcionais

- Cadastro de chamados
- Edição de chamados
- Exclusão de chamados
- Atualização de status
- Associação de responsável
- Listagem de chamados

### Técnicos

- Laravel 13
- PHP 8.3
- SQLite
- Blade Templates
- Tailwind CSS
- Arquitetura em camadas
- Validação com Form Requests
- Enums PHP
