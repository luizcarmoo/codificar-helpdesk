# Sistema de Controle de Chamados Internos

Aplicação web para gerenciamento de chamados internos desenvolvida como desafio técnico para o processo seletivo da Codificar.

O sistema permite o cadastro, acompanhamento e gerenciamento de chamados, incluindo atribuição automática ou manual de responsáveis, atualização de status, filtros avançados e indicadores operacionais.

---

# Objetivos do Projeto

Este projeto foi desenvolvido com foco em:

* Boas práticas de desenvolvimento com Laravel
* Separação de responsabilidades
* Arquitetura em camadas
* Organização e manutenibilidade do código
* Aplicação de recursos modernos do PHP
* Interface simples e funcional utilizando Blade e Tailwind CSS

---

# Funcionalidades

## Chamados

* Criar chamado
* Visualizar chamado
* Editar chamado
* Excluir chamado
* Listar chamados com paginação

## Responsáveis

* Cadastro inicial através de Seeders
* Associação automática de responsável
* Seleção manual de responsável na criação
* Alteração manual de responsável na edição

## Distribuição Inteligente

Quando nenhum responsável é selecionado durante a criação do chamado, o sistema realiza automaticamente a atribuição para o responsável com a menor quantidade de chamados ativos.

São considerados chamados ativos:

* Open
* In Progress

Chamados com status:

* Resolved
* Closed

não participam do cálculo de distribuição.

## Filtros

A listagem permite filtrar por:

* Status
* Prioridade
* Responsável

Os filtros são preservados durante a navegação entre páginas.

## Indicadores

A página principal apresenta métricas operacionais:

* Total de chamados
* Chamados abertos
* Chamados em andamento
* Chamados resolvidos

## Interface

* Layout responsivo
* Componentes Blade reutilizáveis
* Badges coloridas para status
* Badges coloridas para prioridade
* Mensagens de feedback
* Navegação simplificada

---

# Tecnologias Utilizadas

## Backend

* PHP 8.3
* Laravel 13
* SQLite
* Eloquent ORM

## Frontend

* Blade
* Tailwind CSS
* Vite

## Ferramentas

* Composer
* NPM
* Git

---

# Atendimento aos Requisitos do Desafio

| Requisito                              | Status         |
| -------------------------------------- | -------------- |
| CRUD de chamados                       | ✅ Implementado |
| Título, descrição, prioridade e status | ✅ Implementado |
| Associação de responsáveis             | ✅ Implementado |
| Três responsáveis pré-cadastrados      | ✅ Implementado |
| Distribuição automática de chamados    | ✅ Implementado |
| Seleção manual de responsável          | ✅ Implementado |
| Tela de listagem                       | ✅ Implementado |
| Filtros na listagem                    | ✅ Implementado |
| Indicadores de chamados                | ✅ Implementado |
| Documentação de instalação             | ✅ Implementado |
| Justificativa técnica e arquitetural   | ✅ Implementado |

---

# Arquitetura

O projeto segue uma arquitetura em camadas para promover:

* Baixo acoplamento
* Alta coesão
* Facilidade de manutenção
* Escalabilidade
* Testabilidade

## Estrutura

```text
app
├── Actions
├── DTOs
├── Enums
├── Filters
├── Http
├── Models
└── Services
```

---

## Controllers

Responsáveis por receber as requisições HTTP e delegar o processamento para as camadas apropriadas.

Exemplo:

```php
TicketController
```

---

## Requests

Responsáveis pela validação dos dados de entrada.

Exemplos:

```php
StoreTicketRequest
UpdateTicketRequest
```

---

## DTOs

Responsáveis pelo transporte de dados entre camadas de forma estruturada e tipada.

Exemplo:

```php
CreateTicketDTO
```

---

## Actions

Responsáveis por orquestrar os casos de uso da aplicação.

Exemplo:

```php
CreateTicketAction
```

---

## Services

Responsáveis por encapsular regras de negócio.

Exemplos:

```php
AssignResponsibleService
TicketMetricsService
```

---

## Filters

Responsáveis por aplicar filtros sem poluir os Controllers.

Exemplo:

```php
TicketFilter
```

---

## Models

Representam as entidades da aplicação e realizam a comunicação com o banco de dados.

```php
Ticket
Responsible
```

---

# Fluxo de Criação de Chamados

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

# Modelagem

## Responsibles

| Campo      | Tipo      |
| ---------- | --------- |
| id         | bigint    |
| name       | string    |
| created_at | timestamp |
| updated_at | timestamp |

---

## Tickets

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

# Relacionamentos

## Responsible

```php
Responsible hasMany Tickets
```

## Ticket

```php
Ticket belongsTo Responsible
```

---

# Enums

## TicketStatus

```text
open
in_progress
resolved
closed
```

## TicketPriority

```text
low
medium
high
```

---

# Estrutura Atual do Projeto

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
├── Filters
│   └── TicketFilter.php
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
    ├── AssignResponsibleService.php
    └── TicketMetricsService.php
```

---

# Instalação

## Clonar repositório

```bash
git clone https://github.com/luizcarmoo/codificar-helpdesk
cd codificar-helpdesk
```

---

## Instalar dependências

```bash
composer install

npm install
```

---

## Configurar ambiente

```bash
cp .env.example .env

php artisan key:generate
```

---

## Configurar banco SQLite

Criar o arquivo:

```text
database/database.sqlite
```

Configurar o arquivo `.env`:

```env
DB_CONNECTION=sqlite
```

---

## Executar migrations e seeders

```bash
php artisan migrate:fresh --seed
```

---

## Compilar assets

Produção:

```bash
npm run build
```

Desenvolvimento:

```bash
npm run dev
```

---

## Executar aplicação

```bash
php artisan serve
```

Acessar:

```text
http://127.0.0.1:8000
```

---

# Rotas

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

# Dados Iniciais

Ao executar os seeders, são criados automaticamente:

```text
João Silva
Maria Souza
Pedro Santos
```

---

# Decisões Técnicas

## SQLite

Foi escolhido por ser uma solução leve, simples de configurar e adequada para o contexto do desafio técnico.

## Enums

Status e prioridade utilizam Enums nativos do PHP para garantir integridade dos dados e evitar valores inválidos.

## DTOs

Utilizados para desacoplar a camada HTTP da lógica de negócio.

## Actions

Utilizadas para centralizar os fluxos de execução dos casos de uso.

## Services

Utilizados para encapsular regras de negócio reutilizáveis.

## Filters

Utilizados para manter Controllers enxutos e melhorar a legibilidade das consultas.

## Componentização Blade

Foi criado um componente reutilizável para exibição de badges de status e prioridade, reduzindo duplicação de código na camada de apresentação.

---

# Possíveis Evoluções

* Testes unitários
* Testes de integração
* Busca textual
* Ordenação da listagem
* Histórico de movimentações do chamado

---

# Status do Projeto

## Concluído

* CRUD completo de chamados
* Associação automática de responsáveis
* Seleção manual de responsáveis
* Distribuição inteligente de chamados
* Filtros por status
* Filtros por prioridade
* Filtros por responsável
* Paginação com preservação de filtros
* Métricas operacionais
* DTOs
* Actions
* Services
* Filters
* Enums
* Componentes Blade reutilizáveis
* Badges de status e prioridade
* Interface responsiva com Tailwind CSS

---

# Autor

**Luiz Nicolau Pereira do Carmo**

Engenharia de Software — Anhanguera

Belo Horizonte — MG

---

# Licença

Este projeto está licenciado sob a licença MIT. Consulte o arquivo `LICENSE` para mais informações.
