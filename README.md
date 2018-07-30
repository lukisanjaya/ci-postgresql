
# CI-PostgreSQL
Simple API menggunakan CodeIgniter dan PostgreSQL.

## Requirements
- robmorgan/phinx
- fzaninotto/faker
- cocur/slugify

## Setup
Clone projek lewat terminal.
``` bash
git clone https://github.com/lukisanjaya/ci-postgresql.git
```
Masuk folder application/third_party
Ketik perintah ini pada terminal
``` bash
composer install
```

Edit phinx.yml sesuai database anda.
```
    development:
        adapter: mysql
        host: localhost
        name: mydb
        user: root
        pass: ''
        port: 3306
        charset: utf8
```
Ketik perintah ini di terminal untuk jalankan migration database pada folder projek anda
```
php application/third_party/vendor/bin/phinx migrate
```
```
php application/third_party/vendor/bin/phinx seed:run
```
Edit database.php di folder application/config

```
	'hostname' => 'pgsql:host=localhost;dbname=mydb',
	'username' => 'postgres',
	'password' => '',
	'database' => 'mydb',
	'dbdriver' => 'pdo',
```
Buka browser web anda buka link : 
### list article
```
localhost/ci-postgresql?key=key&page=1&limit=5
```
### article detail
```
localhost/ci-postgresql/article/{slug}?key=key&page=1&limit=5
```
### category detail (article by category)
```
localhost/ci-postgresql/category/{slug}?key=key&page=1&limit=5
```
### tag detail (article by tag)
```
localhost/ci-postgresql/tag/{slug}?key=key&page=1&limit=5
```
### source detail (article by source)
```
localhost/ci-postgresql/source/{url}?key=key&page=1&limit=5
```
## Sample Response
``` json
{
  "results": [
    {
      "id": 2,
      "slug": "aut-molestias-excepturi-dolores-eaque-est",
      "title": "Aut molestias excepturi dolores eaque est.",
      "desciption": "Est et sit sit esse. Minima eos quae adipisci blanditiis et molestiae omnis.",
      "content": "Omnis ut autem et mollitia et cum. Quia debitis ut dolor enim aspernatur tenetur officia. Veritatis quam est voluptas itaque. Autem aliquid quia aliquid ut unde.",
      "thumbnail": "http://lorempixel.com/640/480/sports/1",
      "status": true,
      "published": "1946-09-03 05:33:01",
      "url_name": "Est reiciendis cum aut repellendus.",
      "url": "leffler.net",
      "tags": [
        {
          "name": "Qui odio voluptas aut dignissimos aliquam iure saepe.",
          "slug": "qui-odio-voluptas-aut-dignissimos-aliquam-iure-saepe"
        },
        {
          "name": "Ipsam voluptatem nisi nam fugit eligendi corrupti et.",
          "slug": "ipsam-voluptatem-nisi-nam-fugit-eligendi-corrupti-et"
        }
      ],
      "categories": [
        {
          "name": "Ut veritatis voluptas reprehenderit id.",
          "slug": "ut-veritatis-voluptas-reprehenderit-id"
        },
        {
          "name": "Laborum quo voluptates sed odio maxime.",
          "slug": "laborum-quo-voluptates-sed-odio-maxime"
        },
        {
          "name": "Molestiae eaque quidem sint et.",
          "slug": "molestiae-eaque-quidem-sint-et"
        },
        {
          "name": "Dolores harum est dolorum sit ut exercitationem accusamus fuga.",
          "slug": "dolores-harum-est-dolorum-sit-ut-exercitationem-accusamus-fuga"
        }
      ]
    }
  ],
  "meta": {
    "total": 100,
    "per_page": 1,
    "current_page": 1,
    "last_page": 100,
    "from": 1,
    "to": 1
  },
  "diagnostic": {
    "elapsetime": 0.0073
  }
}
```
