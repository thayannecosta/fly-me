# imagem base
FROM php:8.2-fpm

# variáveis de ambiente para evitar prompts
ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependências do sistema e extensões PHP comuns
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Instalar composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Criar diretório da aplicação
WORKDIR /var/www

RUN mkdir -p /var/www/storage /var/www/bootstrap/cache \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Copiar entrypoint (opcional) e corrigir permissões mais tarde
# Expor porta não é necessário para php-fpm
