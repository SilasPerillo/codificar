# Desafio Técnico PHP - Cidadão de Olho

Este projeto foi desenvolvido utilizando PHP, Laravel, XAMPP e MySQL, com o objetivo de obter informações de uma API externa e armazenar o retorno em um banco de dados local. Além disso, criar rotas personalizadas tratando os dados ordenando e retornar em formato JSON.

## Instalação

### Clonando o projeto:

```sh
git clone git@github.com:SilasPerillo/codificar.git
```

### Entre na pasta do projeto

```sh
cd codificar
```

### Entre na pasta do projeto

```sh
cd codificar
```

Dentro da pasta copie o arquivo ".env.example" para ".env":

```sh
cp .env.example .env
```

Caso não tenha o `PHP` e o `composer` instalados, rode os seguintes comandos:

```sh
sudo apt install php
sudo apt install composer
composer update && npm install
```

### Popule os bancos com as Seeders

#### Todas as Seeders:

```sh
php artisan db:seed
```

#### Deputados as Seeders:

```sh
php artisan db:seed --class=DeputiesSeeder
```

#### Despesas as Seeders:

```sh
php artisan db:seed --class=ExpensesSeeder
```

#### Mídias as Seeders:

```sh
php artisan db:seed --class=MediaSeeder
```

## Comandos Artisan

Para coletar os dados necessários, utilizamos três comandos de console, cada um responsável por coletar dados de endpoints diferentes.

#### `app:fetch-deputies`:

Este comando é responsável por buscar e inserir no banco de dados os IDs e nomes de todos os deputados em mandato no ano de 2019.

#### `app:fetch-expenses`:

Este comando tem a função de buscar e inserir no banco de dados todas as verbas indenizatórias dos deputados, separadas por mês. Os deputados são identificados com base no comando app:fetch-deputies.

#### `app:fetch-medias`:

Este comando é utilizado para coletar e inserir no banco de dados as informações das redes sociais dos deputados em exercício.

```sh
php artisan db:seed --class=DeputiesSeeder
php artisan db:seed --class=ExpensesSeeder
php artisan db:seed --class=MediaSeeder
```

#### Migrations e Seeds:

Para maior comodidade, todos os dados da API foram replicados nos arquivos de seed e são inseridos no banco de dados com o envio das seeders.

## Documentação da API

```http
  GET /medias
```

Você pode usar esse comando para consultar:

```sh
curl http://codificar.test/medias
```

Exemplo de resposta:

```bash
{
  "message": "Ranking of the most used social networks among deputies, ordered in descending order.",
  "data": [
    {"mediaName": "Facebook", "count": 74},
    {"mediaName": "Instagram", "count": 73},
    {"mediaName": "Twitter", "count": 44},
    {"mediaName": "Youtube", "count": 24},
    {"mediaName": "WhatsApp", "count": 10},
    {"mediaName": "TikTok", "count": 8},
    {"mediaName": "Flickr", "count": 6},
    {"mediaName": "Telegram", "count": 4},
    {"mediaName": "LinkedIn", "count": 3},
    {"mediaName": "SoundCloud", "count": 2}
  ]
}
```

#### Para retornar os 5 deputados que mais pediram verba indenizatória por mês em 2019.

```sh
  GET /expenses/{month}
```

Este endpoint permite consultar os cinco deputados que mais solicitaram verba indenizatória durante um mês específico em 2019.

| Parâmetro | Tipo     | Descrição                                 |
| :-------- | :------- | :---------------------------------------- |
| `month`   | `number` | **Obrigatório**. O "month" (entre 1 e 12) |

Você pode usar o seguinte comando para fazer a consulta:

```sh
curl http://codificar.test/expenses/5
```

Exemplo de resposta:

```bash
[
    {"month": 5, "nome": "Charles Santos", "value": 39766},
    {"month": 5, "nome": "Professor Wendel Mesquita", "value": 37061},
    {"month": 5, "nome": "Leandro Genaro", "value": 35208},
    {"month": 5, "nome": "Marquinho Lemos", "value": 34663},
    {"month": 5, "nome": "Ulysses Gomes", "value": 33241}
]
```

#### Para retornar os 5 deputados que mais pediram verba indenizatória em cada mês de 2019.

```sh
  GET /expenses
```

Neste endpoint permite consultar os cinco deputados de todos os mes no ano de 2019

Você pode usar o seguinte comando para fazer a consulta:

```sh
curl http://codificar.test/expenses
```

Exemplo de resposta:

```bash
[
  [
    { "month": 1, "nome": "Mário Henrique Caixa", "value": 0 },
    { "month": 1, "nome": "Antonio Carlos Arantes", "value": 0 },
    { "month": 1, "nome": "Doorgal Andrada", "value": 0 },
    { "month": 1, "nome": "Arnaldo Silva", "value": 0 },
    { "month": 1, "nome": "Alencar da Silveira Jr.", "value": 0 }
  ],
  [
    { "month": 2, "nome": "Leandro Genaro", "value": 30939 },
    { "month": 2, "nome": "Fábio Avelar", "value": 29032 },
    { "month": 2, "nome": "Sávio Souza Cruz", "value": 29025 },
    { "month": 2, "nome": "Thiago Cota", "value": 28713 },
    { "month": 2, "nome": "Marquinho Lemos", "value": 27935 }
  ],
  [
    { "month": 3, "nome": "Thiago Cota", "value": 45427 },
    { "month": 3, "nome": "Leandro Genaro", "value": 34760 },
    { "month": 3, "nome": "Carlos Henrique", "value": 32671 },
    { "month": 3, "nome": "Professor Irineu", "value": 30633 },
    { "month": 3, "nome": "Arlen Santiago", "value": 30194 }
  ],
  [
    { "month": 4, "nome": "Léo Portela", "value": 43186 },
    { "month": 4, "nome": "Leandro Genaro", "value": 34445 },
    { "month": 4, "nome": "Doutor Jean Freire", "value": 27783 },
    { "month": 4, "nome": "Arlen Santiago", "value": 27146 },
    { "month": 4, "nome": "Betinho Pinto Coelho", "value": 26926 }
  ],
  [
    { "month": 5, "nome": "Charles Santos", "value": 39766 },
    { "month": 5, "nome": "Professor Wendel Mesquita", "value": 37061 },
    { "month": 5, "nome": "Leandro Genaro", "value": 35208 },
    ...
  ]
]
```
