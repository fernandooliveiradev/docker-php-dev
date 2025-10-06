# Comandos do Ambiente Docker PHP

Este documento consolida todos os comandos disponíveis para gerenciar o ambiente Docker PHP.

## 📋 Sumário

- [Comandos Makefile (Recomendado)](#comandos-makefile-recomendado)
- [Comandos Docker Diretos](#comandos-docker-diretos)
- [Scripts Interativos](#scripts-interativos)
- [Comandos Úteis](#comandos-úteis)

## 🐳 Comandos Docker Diretos

Estes comandos usam o Docker Compose diretamente, sem o Makefile.

### Comandos Básicos

```bash
# Iniciar containers
docker-compose up -d

# Parar containers
docker-compose down

# Reiniciar containers
docker-compose restart

# Ver status dos containers
docker-compose ps

# Construir imagens
docker-compose build

# Reconstruir sem cache
docker-compose build --no-cache
```

### Comandos de Acesso

```bash
# Acessar terminal do PHP
docker-compose exec php sh

# Acessar terminal do MySQL
docker-compose exec mysql mysql -u app_user -p app_db

# Acessar terminal do phpMyAdmin
docker-compose exec phpmyadmin sh
```

### Comandos de Logs

```bash
# Ver logs de todos os serviços
docker-compose logs

# Ver logs em tempo real
docker-compose logs -f

# Ver logs de um serviço específico
docker-compose logs -f nginx
docker-compose logs -f php
docker-compose logs -f mysql
docker-compose logs -f phpmyadmin

# Ver logs com tail (últimas 100 linhas)
docker-compose logs --tail=100
```

### Comandos de Limpeza

```bash
# Parar e remover containers
docker-compose down

# Parar, remover containers e volumes (CUIDADO: remove dados!)
docker-compose down -v

# Remover imagens não utilizadas
docker image prune

# Remover todos os recursos não utilizados
docker system prune -a
```

## 📜 Scripts Interativos

### init.sh

Script de inicialização completa para primeira execução.

```bash
# Tornar executável (apenas primeira vez)
chmod +x init.sh

# Executar script de inicialização
./init.sh
```

O script `init.sh` realiza:
- Verificação de pré-requisitos (Docker, Docker Compose)
- Criação do arquivo `.env` a partir do `.env.example`
- Verificação de portas disponíveis
- Construção e inicialização dos containers
- Execução de testes de validação

### start.sh

Script interativo para gerenciamento do ambiente.

```bash
# Tornar executável (apenas primeira vez)
chmod +x start.sh

# Executar script interativo
./start.sh
```

O script `start.sh` oferece um menu com opções:
- Iniciar, parar, reiniciar ambiente
- Acessar terminais
- Ver logs e status
- Executar testes
- Limpar ambiente

## 🔧 Comandos Úteis

### Verificação do Ambiente

```bash
# Verificar se Docker está instalado
docker --version

# Verificar se Docker Compose está instalado
docker-compose --version

# Verificar status do Docker
docker info

# Listar containers em execução
docker ps

# Listar todos os containers
docker ps -a
```

### Gerenciamento de Recursos

```bash
# Ver uso de recursos do Docker
docker system df

# Ver uso de recursos por container
docker stats

# Limpar caches do Docker
docker system prune

# Limpar tudo (CUIDADO!)
docker system prune -a --volumes
```

### Configuração de Rede

```bash
# Ver redes do Docker
docker network ls

# Inspecionar rede do projeto
docker network inspect docker-php-dev_app-network

# Testar conectividade entre containers
docker-compose exec php ping mysql
```

### Backup e Restauração

```bash
# Criar backup do banco de dados
docker-compose exec mysql mysqldump -u root -p app_db > backup.sql

# Restaurar backup do banco de dados
docker-compose exec -T mysql mysql -u root -p app_db < backup.sql

# Copiar arquivos do container para o host
docker cp php-container:/var/www/html ./backup
```

## 🔄 Fluxo de Trabalho Recomendado

### Primeiro Uso

```bash
# Clonar o projeto
git clone <seu-repositorio>
cd docker-php-dev

# Configurar e iniciar o ambiente
./init.sh

# Ou manualmente
cp .env.example .env
chmod +x init.sh start.sh
./init.sh
```

### Uso Diário

```bash
# Iniciar ambiente
docker-compose up -d

# Verificar status
docker-compose ps

# Executar testes
docker-compose exec php php /var/www/html/test.php

# Parar ambiente
docker-compose down
```

### Desenvolvimento

```bash
# Iniciar ambiente
docker-compose up -d

# Acessar terminal PHP para desenvolvimento
docker-compose exec php sh

# Ver logs em tempo real
docker-compose logs

# Parar ambiente ao finalizar
docker-compose down
```

### Resolução de Problemas

```bash
# Verificar status dos containers
docker-compose ps

# Ver logs de todos os serviços
docker-compose logs

# Reiniciar ambiente
docker-compose restart

# Limpar e reconstruir tudo (em último caso)
docker-compose down -v
docker-compose build
docker-compose up -d