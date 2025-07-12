<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

> [!IMPORTANT]
> O Laravel é a base de referencia e fonte de pesquisa desse projeto.

### Escopo Proposto da Estrutura
Analisando o que é uma boa pratica, pelo tamanho do projeto o melhor a ser feito é uma aplicação com menimo de complexidade e aproveitando o que da, e menter as boas praticas.

```
laravel-comissao-api/ 
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── SaleController.php
│   ├── Domain/
│   │   └── Sale/
│   │       ├── Entities/
│   │       │   └── Sale.php
│   │       ├── Interfaces/
│   │       │   └── SaleRepositoryInterface.php
│   │       └── Services/
│   │           └── CalculatorCommission.php
│   └── Infrastructure/
│       └── Repositories/
│           └── InMemorySaleRepository.php
├── routes/
│   └── web.php
├── storage/
│   └── app/
│       ├── public/
│           └── sales.json
├── tests/
│   └── Feature/
│       └── Sale
|            └── CalculatorCommissionTest.php
|            └── InMemorySaleRepositoryTest.php
|            └── SaleApiStoreTest.php
└── README.md

```
### Regras de comissão

As regras estão muito claras então só uma ilustração para ajudar.
O resumo diz: Cada venda tem um valor_total e um tipo_venda (direta ou afiliada).
------------------------
### A comissão é distribuída conforme abaixo:
| Tipo de Venda | Plataforma | Produtor | Afiliado |
|---|---|---|---|
| Direta | 10% | 90% | 0% |
| Afiliada | 10% | 60% | 30% |
-------------------------
### Resalva nas Boas Práticas Aplicadas

Esse são os pontos que levei em consideração com base na estrutura de aquivos.
* Separação de Domínios: Organização clara da arquitetura em Serviços, Entidades e Repositórios.
* Injeção de Dependência: Implementada via construtores para desacoplamento.
* Uso de Contratos/Interfaces: Contratos e interfaces foram empregados para facilitar a testabilidade e a escalabilidade do projeto.
* Persistência Simulada: Dados armazenados em JSON no diretório storage/app.
* Testes Unitários: Foram desenvolvidos testes unitários para as regras de negócio e para as partes essenciais do código.
* E os requisitos solicitados como documentação clara no README.md com instruções e decisões tomadas
------------------------
### Laravel Comissão API

Este é um projeto de API construído com Laravel 12, e por esta versão ser altamente recomendada conforme informação no site official.
A API tem como objetivo a simulação de comissões de vendas digitais simples, abrangendo tanto cenários com afiliados quanto sem, e foi projetada para não incluir mecanismos de autenticação. 
O desenvolvimento seguiu princípios de arquitetura limpa (Clean Architecture) e boas práticas de código, com foco primordial na clareza do escopo, na organização estruturada e na aplicação de testes estratégicos.
------------------------
### Tecnologias Necessárias

PHP 8.4.10 | Caso necessário pode ser baixar no [PHP](https://www.php.net).
Composer   | Que pode ser baixado no [Composer](https://getcomposer.org).
Laravel 12 | Pode ser baixado e estudado na documentação oficial [Laravel](https://laravel.com/docs/12.x).
Todas os comandos para serem feitos também constam no site, logo é recomandado estudar caso seja necessário.
-------------------------
### Complementar

Requisito: JSON como armazenamento (sem banco de dados), essa foi a melhor forma para diminuir a complexidade.
Padrão RESTful API
Arquitetura Limpa (Clean Architecture)
-----------------------
### Como rodar o projeto

Comandos para serem execultados.
1. Clone o repositório:
```
git clone https://github.com/angelo-marques/laravel-comissao-api.git
```
2. Instale as dependências:
```
composer install
```
3. Configure o Laravel:
```
cp .env.example .env
php artisan key:generate
```
4. Rodar no servidor local:
````
php artisan serve
````







## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
