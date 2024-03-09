# Teste Backend Adoorei 
### Teste para a vaga de backend na empresa Adoorei

### Tecnologias Usadas
<ul>
    <li>Docker</li>
    <li>PHP-FPM 8.3</li>
    <li>PHP Pest</li>
    <li>Laravel Sail</li>
    <li>Laravel Pint</li>
    <li>Nginx</li>
    <li>MySql</Li>
</ul>

<br>
<br>

# Instalação do projeto
- Vá ate o diretorio do projeto e execute os seguintes comando:
```bash
$ docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

```bash
$  ./vendor/bin/sail build
```
- Após o build rode o comando para iniciar os containers
```bash
$  ./vendor/bin/sail up -d
```
- Para rodar as migrations do banco de dados ja com os seeders digite:

```bash
$  ./vendor/bin/sail migrate --seed
```
- O projeto vem com testes feito com PestPHP para rodar digite:

```bash
$  ./vendor/bin/sail pest --coverage
```

# Endpoints
## Products
- [/api/products](#secao1)
- [/api/products/create](#secao2)
- [/api/products/{product}](#secao3)
- [/api/products/edit/{product}](#secao4)
- [/api/products/delete/{product}](#secao5)

## Sale
- [/api/sale](#secao6)
- [/api/sale/create](#secao7)
- [/api/sale/{sale}](#secao8)
- [/api/sale/edit/{sale}](#secao9)
- [/api/sale/delete/{sale}](#secao10)

## <a name="secao1">/api/product</a>
### Listar todos os produtos cadastrados
```bash
curl --request GET \
  --url http://localhost/api/product \
  --header 'Content-Type: application/json'
```
#### Retorno
```json
{
    "data": [
        {
            "id": 1,
            "name": "Iphone 15 pro max",
            "price": 6000,
            "description": "ola pessoas"
        },
        {
            "id": 2,
            "name": "Iphone 15 pro max",
            "price": 6000,
            "description": "ola pessoas"
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/product?page=1",
        "last": "http:\/\/localhost\/api\/product?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http:\/\/localhost\/api\/product?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http:\/\/localhost\/api\/product",
        "per_page": 15,
        "to": 2,
        "total": 2
    }
}
```

# <a name="secao2">/api/product/create</a>
### Cadastra um novo produto
```bash
curl --request POST \
  --url http://localhost/api/product/create \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --data '{
	"name" : "Play 5",
	"price" : 5000,
    "description" : "video game"
}'
```

#### Retorno

```json
{
    "data": {
        "id": 3,
        "name": "Play 5",
        "price": 5000,
        "description": "video game"
    }
}
```
#  <a name="secao3">/api/product/{product}</a>
### Mostra um produto em especifico
```bash
curl --request GET \
  --url http://localhost/api/product/2 \
```

#### Retorno

```json
{
    "data": {
        "id": 2,
        "name": "Iphone 15 pro max",
        "price": 6000,
        "description": "ola pessoas"
    }
}
```

#  <a name="secao4">/api/product/edit/{product}</a> 
### Edita um produto
```bash
curl --request PUT \
  --url http://localhost/api/product/edit/1 \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --data '{
	"name" : "Motorola",
	"price" : 1300,
    "description" : "nova descricao"
}'
```

#### Retorno

```json
{
	"data": {
		"id": 1,
		"name": "Motorola",
		"price": 1300,
        "description" : "nova descricao"
	}
}
```

# <a name="secao5">/api/product/delete/{product}</a>
### deleta o produto
```bash
curl --request DELETE \
  --url http://localhost/api/product/delete/2 \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
```

#### Retorno

```json
{
	"data": {
		"id": 2,
		"name": "Iphone 15 pro max",
		"price": 6000,
		"description": "ola pessoas"
	}
}
```

## <a name="secao6">/api/sale</a>
### Listar todos as vendas aprovadas cadastrados
```bash
curl --request GET \
  --url http://localhost/api/sale
```
#### Retorno
```json
{
    "data": [
        {
            "sale_id": 2,
            "amount": 27600,
            "status": "APPROVED",
            "products": [
                {
                    "product_id": 1,
                    "name": "Motorola",
                    "price": 1300,
                    "amount": 2
                },
                {
                    "product_id": 2,
                    "name": "Play 5",
                    "price": 5000,
                    "amount": 5
                }
            ]
        },
        {
            "sale_id": 3,
            "amount": 1300,
            "status": "APPROVED",
            "products": [
                {
                    "product_id": 1,
                    "name": "Motorola",
                    "price": 1300,
                    "amount": 1
                }
            ]
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/sale?page=1",
        "last": "http:\/\/localhost\/api\/sale?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http:\/\/localhost\/api\/sale?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http:\/\/localhost\/api\/sale",
        "per_page": 15,
        "to": 2,
        "total": 2
    }
}
```
# <a name="secao7">/api/sale/create</a>
### Cadastra uma nova Sale
```bash
curl --request POST \
  --url http://localhost/api/sale/create \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --data '{
	"products" : [
		{
			"id" : 1,
			"amount" : 2
		},
		{
			"id": 4,
			"amount": 5
		}
	]
}'
```

#### Retorno

```json
{
    "data": {
        "sale_id": 3,
        "amount": 27600,
        "status": "APPROVED",
        "products": [
            {
                "product_id": 1,
                "name": "Motorola",
                "price": 1300,
                "amount": 2
            },
            {
                "product_id": 4,
                "name": "Play 5",
                "price": 5000,
                "amount": 5
            }
        ]
    }
}
```
# <a name="secao8">/api/sale/{sale}</a> 
### Mostra uma Sale em especifico
```bash
curl --request GET \
  --url http://localhost/api/sale/2 \
  --header 'Content-Type: application/json' \
```

#### Retorno

```json
{
    "data": {
        "id": 2,
        "name": "Iphone 15 pro max",
        "price": 6000,
        "description": "ola pessoas"
    }
}
```
# <a name="secao9">/api/sale/edit/{sale}</a>
### Edita uma Sale
```bash
curl --request PUT \
  --url http://localhost/api/sale/edit/2 \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --cookie JSESSIONID=621236CBF721BC4B05D1419AC9965468 \
  --data '{
	"products" : [
		{
			"id" : 1,
			"amount" : 1
		},
		{
			"id": 2,
			"amount": 4
		}
	]
}'
```

#### Retorno

```json
{
	"data": {
		"sale_id": 2,
		"amount": 19000,
		"status": "APPROVED",
		"products": [
			{
				"product_id": 1,
				"name": "Iphone 15 pro max",
				"price": 6000,
				"amount": 1
			},
			{
				"product_id": 2,
				"name": "Motorola Edge",
				"price": 2000,
				"amount": 4
			},
			{
				"product_id": 3,
				"name": "Play 5",
				"price": 5000,
				"amount": 1
			}
		]
	}
}
```
# <a name="secao10">/api/sale/delete/{sale}</a>
### deleta o produto
```bash
curl --request DELETE \
  --url http://localhost/api/sale/delete/1 
```

#### Retorno

```json

{
	"data": {
		"sale_id": 1,
		"amount": 1300,
		"status": "CANCELLED",
		"products": [
			{
				"product_id": 1,
				"name": "Motorola",
				"price": 1300,
				"amount": 1
			}
		]
	}
}

```