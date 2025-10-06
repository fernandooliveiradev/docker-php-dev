# 🐳 Ambiente Docker PHP

Ambiente completo de desenvolvimento com PHP 8.3, MySQL 8.0, Nginx e phpMyAdmin, totalmente configurado e pronto para uso.

📚 **Para uma visão completa da documentação, consulte [DOCUMENTATION.md](DOCUMENTATION.md)**

## 🚀 Início Rápido

### 1. Baixar o projeto
```bash
git clone <seu-repositorio>
cd docker-php-dev
```

### 2. Iniciar o ambiente
```bash
# Primeira vez - configurar tudo automaticamente
make install

# Ou manualmente
cp .env.example .env
make start
```

### 3. Acessar os serviços
- **Sua aplicação**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081
- **Testar ambiente**: http://localhost:8080/test.php

## 📋 Comandos Disponíveis

O projeto oferece várias formas de gerenciar o ambiente. Para uma lista completa de todos os comandos disponíveis, consulte o arquivo [COMMANDS.md](COMMANDS.md).

### Formas de uso:

1. **Docker direto**: `docker-compose up -d`, `docker-compose down`, etc.
2. **Scripts interativos**: `./init.sh` (primeira vez), `./start.sh` (menu interativo)

### Comandos essenciais:

```bash
# Primeiro uso
./init.sh

# Iniciar ambiente
docker-compose up -d

# Parar ambiente
docker-compose down

# Executar testes
docker-compose exec php php /var/www/html/test.php

# Menu interativo
./start.sh
```

## 🔧 Configuração

### Variáveis de ambiente
Edite o arquivo `.env` para personalizar:
- Portas (se já estiverem em uso)
- Senhas do banco de dados
- Nomes de usuário e banco de dados

Exemplo de configuração:
```bash
# Portas (modifique se necessário evitar conflitos)
NGINX_PORT=8080
PHPMYADMIN_PORT=8081
MYSQL_PORT=3306

# Configurações do MySQL
MYSQL_ROOT_PASSWORD=root123
MYSQL_DATABASE=app_db
MYSQL_USER=app_user
MYSQL_PASSWORD=app_password
```

### Credenciais padrão
- **MySQL Root**: usuário `root`, senha `root123`
- **MySQL App**: usuário `app_user`, senha `app_password`
- **Banco de dados**: `app_db`
- **phpMyAdmin**: usuário `root`, senha `root123`

## 🛠️ Stack de Tecnologias

### PHP 8.3 com extensões:
- MySQL (PDO e MySQLi)
- GD (imagens)
- cURL, OpenSSL
- Intl, Bcmath
- Imagick (ImageMagick)
- Zip, XML, SOAP
- OPcache
- E muitas outras

### Serviços:
- **Nginx** como servidor web
- **MySQL 8.0** como banco de dados
- **phpMyAdmin** para gerenciar o banco

## 📁 Estrutura do Projeto
```
docker-php-dev/
├── src/                    # Seu código PHP aqui
│   ├── index.php         # Documentação do ambiente
│   └── test.php          # Testes do ambiente
├── php/                   # Configurações do PHP
│   ├── Dockerfile        # Imagem Docker do PHP
│   └── custom.ini        # Configurações personalizadas
├── nginx/                 # Configurações do Nginx
│   └── default.conf      # Configuração do servidor
├── mysql/                 # Configurações do MySQL
│   └── init.sql          # Script de inicialização
├── init.sh               # Inicialização automática
├── start.sh              # Menu de gerenciamento
├── Makefile              # Comandos facilitados
├── docker-compose.yml    # Configuração dos containers
├── .env.example          # Configurações de exemplo
└── README.md             # Este arquivo
```

## 🆘 Problemas Comuns

### "Connection refused" no MySQL
Aguarde mais 30 segundos e tente novamente. O MySQL demora um pouco para iniciar.

### Portas já em uso
Edite o arquivo `.env` e mude as portas:
```bash
NGINX_PORT=8090
PHPMYADMIN_PORT=8091
MYSQL_PORT=3307
```

### Docker não encontrado
Instale o Docker e Docker Compose primeiro.

### Permissões negadas
Execute os comandos para dar permissão aos scripts:
```bash
chmod +x init.sh start.sh
```

## 📖 Documentação

### Documentação Interativa
Acesse http://localhost:8080 para ver a documentação completa com interface interativa, exemplos de código e comandos copiáveis.

### Documentação do Projeto
- **[DOCUMENTATION.md](DOCUMENTATION.md)** - Guia central para toda a documentação do projeto
- **[COMMANDS.md](COMMANDS.md)** - Lista completa de todos os comandos disponíveis
- **[PROJECT_STRUCTURE.md](PROJECT_STRUCTURE.md)** - Estrutura detalhada dos arquivos e diretórios
- **[CHANGELOG.md](CHANGELOG.md)** - Histórico de alterações do projeto

## 📄 Licença
MIT License - veja o arquivo LICENSE para detalhes.