# ✈️ FlyMe

**FlyMe** é uma aplicação Full Stack para gerenciar pedidos de viagens corporativas. Desenvolvida com Laravel no back-end e Vue.js no front-end, a plataforma permite criar, listar, atualizar e cancelar pedidos de viagem, com autenticação de usuários, notificações e filtros avançados. O projeto é containerizado com Docker para facilitar a execução e segue boas práticas de código.
---

## 🚀 Tecnologias utilizadas

- **PHP e Laravel**
- **Docker & Docker Compose**
- **Nginx**
- **MySQL 8**
- **Composer**

---

## 🧭 Estrutura do projeto

```
├── docker/
│   ├── nginx/
│   │   └── default.conf
│   ├── php/
│   │   ├── Dockerfile
│   │   └── local.ini
├── src/                # Código-fonte Laravel
├── docker-compose.yml
└── README.md
```

---

## ⚙️ Pré-requisitos

Antes de iniciar, certifique-se de ter instalado:

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [Git](https://git-scm.com/)
- [WSL 2](https://learn.microsoft.com/pt-br/windows/wsl/install) (no Windows)

---

## 🧩 Clonando o projeto

```bash
git clone https://github.com/thayannecosta/fly-me.git
cd fly-me
```

---

## ⚙️ Configuração inicial

1. Copie o arquivo de exemplo `.env`:
   ```bash
   cp src/.env.example src/.env
   ```

2. Edite o arquivo `.env` dentro da pasta `src` e configure as variáveis de ambiente conforme o `docker-compose.yml`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=db
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=laraveluser
   DB_PASSWORD=laravelpass
   ```

---

## 🐳 Subindo os containers

Para iniciar o ambiente:

```bash
docker compose up -d
```

Verifique se os containers estão rodando:

```bash
docker ps
```

Containers esperados:
- `fly_me_app` → PHP/Laravel
- `fly_me_web` → Nginx
- `fly_me_db` → MySQL

---

## 🧰 Instalação das dependências

Acesse o container do Laravel:

```bash
docker exec -it fly_me_app bash
```

Dentro dele, execute:

```bash
composer install
php artisan key:generate
php artisan migrate
```

> Para popular o banco com dados iniciais:
> ```bash
> php artisan db:seed
> ```

---

## 🌐 Acessando o projeto

Após subir os containers, acesse o sistema no navegador:

👉 [http://localhost:8080](http://localhost:8080)

---

## 🧹 Comandos úteis

| Ação | Comando |
|------|----------|
| Subir containers | `docker compose up -d` |
| Parar containers | `docker compose down` |
| Ver logs | `docker compose logs -f` |
| Acessar o container PHP | `docker exec -it fly_me_app bash` |
| Rodar migrations | `php artisan migrate` |
| Rodar seeders | `php artisan db:seed` |

---

## 💾 Backup e persistência

Os dados do banco MySQL são armazenados no volume:
```
dbdata:/var/lib/mysql
```

## 🧠 Dica

Caso altere o `Dockerfile` ou o `docker-compose.yml`, reconstrua a imagem:
```bash
docker compose build --no-cache
docker compose up -d
```

---

## 👩‍💻 _Autora - **Thayanne Tenório**_



💻 **Software Engineer | Full Stack Developer | PHP | Javascript**  
📍 Localização: Brazil  
📧 Email: thayannecosta99@outlook.com
🔗 LinkedIn: [https://www.linkedin.com/in/thayanne-tenorio/](https://www.linkedin.com/in/thayanne-tenorio/)  
🔗 GitHub: [https://github.com/thayannecosta](https://github.com/thayannecosta)
