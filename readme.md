## Comandos para subir em sua maquina a aplicacao

->php artisan migrate

->php artisan db:seed

->php artisan serve

Endereço base "http://localhost:8000"

### Rotas criadas

- **Jornalistas**
	- **POST /api/register** (rota para criação de novos jornalistas)
	- **POST /api/login** parametros (email | password) ->Token e criado. 
	- **POST /api/me** (passar token como parametro)

- **Notícias** 
    - **GET /api/news/me** parametro (token)
    - **GET /api/news/type/{type_id}** parametros (tipo_id | token)
    - **POST /api/news/create** parametros (tipo_noticia_id | titulo | descricao | corpo_noticia | link_img)
    - **POST /api/news/delete/{news_id}** (Exclui uma notícia do jornalista)

## Rotas A criar

	- **POST /api/news/create** (Cria uma notícia)

	- **POST /api/news/update/{news_id}** (Altera uma notícia do jornalista)

	- **POST /api/news/delete/{news_id}** (Exclui uma notícia do jornalista)

	- **GET /api/news/type/{type_id}** (Lista todas as notícias do jornalista por tipo)

	- **POST /api/type/create** (Cria um novo tipo de notícia)

	- **POST /api/type/update/{type_id}** (Altera um tipo de notícia do jornalista)

	- **POST /api/type/delete/{type_id}** (Exclui um tipo de notícia do jornalista, uma exceção deverá ser lançada caso se tente deletar uma notícia que esteja sendo referenciada em Notícias)

	- **GET /api/type/me** (Lista todos os tipos notícias do jornalista)
