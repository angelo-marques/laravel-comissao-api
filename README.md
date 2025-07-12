<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

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
Padrão RESTful API.
Arquitetura Limpa (Clean Architecture).
Teste de Unidade da Regra de Negócio. 
Teste de Unidade do Repositório ou Teste de Persistencia.

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

### Caso do Teste
Execute os testes de API com comendo:
````
php artisan test
````
Obs.: há um teste de gravação de dados que dará erro se não alterar a rota do arquivo, pois ele funciona de uma forma online e de outra localmente, devido à localidade de quem está executando. Esse foi o único ponto que não consegui resolver. <br/> 
Motivo: estou de mudança e precisarei de tempo para analisar todos os pontos.  <br/> 
Portanto, peço desculpas por esse problema, mas são apenas dois testes de persistência. <br/> 

### Ambiguidades
Pontos utilizados para resolver ou evitar ambiguidades: <br>
Modularidade: O sistema, embora simples, seguiu o padrão de divisão em partes com responsabilidades bem definidas, como pastas e nomes fortemente tipados, o que facilita a compreensão e a manutenção. <br>
Testabilidade: Ou seja, os testes definidos foram elaborados para prevenir e analisar a funcionalidade do projeto, o que facilita a criação de testes automatizados posteriormente, garantindo novos comportamentos esperados. <br>

### Sobre os Testes
Foram adicionados testes para melhor ilustrar um cenário real e também para ajudar aqueles que dizem não ser possível testar persistência, muitas vezes com receio de adicionar dados, mas no fundo é o tipo de teste que sempre será necessário. Portanto, é melhor automatizá-lo. Além disso, os testes de serviços, funções e endpoints são bons padrões para o desenvolvimento de APIs. Assim, faço essa ressalva, pois acredito ser essencial a prática de testes.
Gostaria de poder fazer testes de concorrência e outras coisas, mas o tempo é curto para realizar tudo que desejo.

### Considerações finais
A alteração na ordem da demonstração foi feita para manter uma evolução do projeto em etapas, refletindo melhor o processo de análise e criação de um escopo. Assim, acredito que mesmo após sua criação, ela será útil para a posteridade, podendo servir para estudo, melhoria ou até mesmo para compreender partes de uma documentação.




