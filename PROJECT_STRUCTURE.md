# Estrutura Técnica do Projeto

## Visão Geral da Estrutura

```
docker-php-dev/
├── src/                    # Código fonte da aplicação
│   ├── index.php         # Documentação interativa do ambiente
│   └── test.php          # Script de validação do ambiente
├── php/                   # Configurações do PHP
│   ├── Dockerfile        # Definição da imagem Docker do PHP
│   └── custom.ini        # Configurações personalizadas do PHP
├── nginx/                 # Configurações do Nginx
│   └── default.conf      # Configuração do servidor web
├── mysql/                 # Configurações do MySQL
│   └── init.sql          # Script de inicialização do banco
├── phpmyadmin/            # Configurações do phpMyAdmin
├── .vscode/               # Configurações do VS Code
├── .github/               # Configurações do GitHub
├── init.sh               # Script de inicialização completa
├── start.sh              # Script interativo de gerenciamento
├── docker-compose.yml    # Orquestração dos containers
├── docker-compose.override.yml # Sobrescritas locais
├── .env.example          # Modelo de variáveis de ambiente
├── .env                  # Variáveis de ambiente (criado pelo usuário)
├── .gitignore            # Arquivos ignorados pelo Git
├── .gitattributes        # Atributos do Git
├── CHANGELOG.md          # Histórico de alterações
├── LICENSE               # Licença do projeto
├── PROJECT_STRUCTURE.md  # Este arquivo
└── README.md             # Documentação principal
```

## Detalhes dos Diretórios e Arquivos

### Diretório `src/`
Contém o código fonte da sua aplicação PHP.
- **`index.php`**: Página inicial com documentação interativa do ambiente
- **`test.php`**: Script de validação que testa todos os componentes do ambiente

### Diretório `php/`
Configurações específicas do PHP.
- **`Dockerfile`**: Define a imagem Docker personalizada com PHP 8.3 e extensões
- **`custom.ini`**: Configurações personalizadas do PHP (memória, upload, timezone, etc.)

### Diretório `nginx/`
Configurações do servidor web Nginx.
- **`default.conf`**: Configuração do servidor web, com regras de rewrite e cache

### Diretório `mysql/`
Configurações do banco de dados MySQL.
- **`init.sql`**: Script executado na primeira inicialização, cria banco e tabelas de exemplo

### Scripts de Gerenciamento

#### `init.sh`
Script de inicialização completa para primeira execução:
- Verifica pré-requisitos (Docker, Docker Compose)
- Cria arquivo `.env` a partir do `.env.example`
- Verifica portas disponíveis
- Constrói e inicia containers
- Executa testes de validação

#### `start.sh`
Script interativo para gerenciamento do ambiente:
- Menu com opções para iniciar, parar, reiniciar
- Acessar terminais
- Ver logs e status
- Executar testes


### Arquivos de Configuração

#### `docker-compose.yml`
Arquivo principal de orquestração dos containers:
- Define serviços: nginx, php, mysql, phpmyadmin
- Configura volumes, redes, portas
- Estabelece dependências entre serviços

#### `docker-compose.override.yml`
Permite sobrescrever configurações localmente sem alterar o arquivo principal:
- Útil para desenvolvimento com configurações específicas

#### `.env.example` e `.env`
Variáveis de ambiente do projeto:
- Configurações de portas
- Credenciais do banco de dados
- Outras configurações personalizáveis

## Fluxo de Trabalho Recomendado

1. **Primeiro uso**:
   ```bash
   ./init.sh
   ```

2. **Uso diário**:
   ```bash
   docker-compose up -d
   # ou
   ./start.sh
   ```

3. **Desenvolvimento**:
   - Coloque seu código PHP em `src/`
   - Acesse http://localhost:8080 para ver sua aplicação
   - Use http://localhost:8081 para acessar o phpMyAdmin

4. **Testes**:
   ```bash
   docker-compose exec php php /var/www/html/test.php
   # ou acesse http://localhost:8080/test.php
   ```

Para uma lista completa de todos os comandos disponíveis, consulte o arquivo [COMMANDS.md](../COMMANDS.md).

## Integração com IDEs

### VS Code
O projeto inclui configurações para VS Code no diretório `.vscode/`:
- Extensões recomendadas
- Configurações de workspace

### Outras IDEs
Qualquer IDE com suporte a Docker e PHP pode ser utilizada:
- Configure o mapeamento de volumes para `src/`
- Utilize as configurações de Xdebug disponíveis na imagem PHP