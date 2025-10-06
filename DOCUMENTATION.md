# 📚 Documentação do Ambiente Docker PHP

Este documento serve como um guia central para toda a documentação do projeto.

## 📋 Sumário da Documentação

### 🚀 Início Rápido
- **[README.md](README.md)** - Visão geral do projeto, instruções de instalação e uso básico
- **[PROJECT_STRUCTURE.md](PROJECT_STRUCTURE.md)** - Estrutura detalhada dos arquivos e diretórios do projeto

### 🛠️ Comandos e Operações
- **[COMMANDS.md](COMMANDS.md)** - Lista completa de todos os comandos disponíveis para gerenciar o ambiente

### 📖 Documentação Interativa
- **Acesse http://localhost:8080** - Documentação completa com interface interativa, exemplos de código e comandos copiáveis
- **[src/index.php](src/index.php)** - Código fonte da documentação interativa

### 🧪 Testes e Validação
- **[src/test.php](src/test.php)** - Script de validação para verificar se todos os componentes estão funcionando corretamente
- Acesse http://localhost:8080/test.php para executar os testes via navegador

### 📝 Configurações
- **[.env.example](.env.example)** - Modelo de variáveis de ambiente (copie para `.env` e personalize)
- **[docker-compose.yml](docker-compose.yml)** - Configuração principal dos containers Docker
- **[docker-compose.override.yml](docker-compose.override.yml)** - Sobrescritas locais de configuração

### 🔧 Configurações Técnicas
- **[php/Dockerfile](php/Dockerfile)** - Definição da imagem Docker do PHP com extensões
- **[php/custom.ini](php/custom.ini)** - Configurações personalizadas do PHP
- **[nginx/default.conf](nginx/default.conf)** - Configuração do servidor web Nginx
- **[mysql/init.sql](mysql/init.sql)** - Script de inicialização do banco de dados

### 📜 Scripts
- **[init.sh](init.sh)** - Script de inicialização completa para primeira execução
- **[start.sh](start.sh)** - Script interativo para gerenciamento do ambiente

### 📋 Histórico, Licença e Contribuição
- **[CHANGELOG.md](CHANGELOG.md)** - Histórico de alterações do projeto
- **[LICENSE](LICENSE)** - Licença de uso do projeto
- **[CONTRIBUTING.md](CONTRIBUTING.md)** - Diretrizes para contribuição no projeto

## 🎯 Como Começar

### Para Novos Usuários

1. Leia o **[README.md](README.md)** para uma visão geral do projeto
2. Execute o primeiro uso:
   ```bash
   ./init.sh
   ```
3. Acesse http://localhost:8080 para ver a documentação interativa

### Para Desenvolvimento Diário

1. Consulte o **[COMMANDS.md](COMMANDS.md)** para todos os comandos disponíveis
2. Use os comandos essenciais:
   ```bash
   docker-compose up -d    # Iniciar ambiente
   docker-compose exec php php /var/www/html/test.php    # Executar testes
   docker-compose down     # Parar ambiente
   ```
3. Coloque seu código PHP no diretório `src/`

### Para Personalização e Configuração Avançada

1. Consulte **[PROJECT_STRUCTURE.md](PROJECT_STRUCTURE.md)** para entender a estrutura do projeto
2. Personalize as variáveis de ambiente no arquivo `.env`
3. Modifique as configurações técnicas conforme necessário:
   - **[php/custom.ini](php/custom.ini)** para configurações do PHP
   - **[nginx/default.conf](nginx/default.conf)** para configurações do Nginx
   - **[mysql/init.sql](mysql/init.sql)** para estrutura inicial do banco

### Para Solução de Problemas

1. Execute os testes para verificar se tudo está funcionando:
   ```bash
   make test
   ```
2. Verifique os logs:
   ```bash
   make logs
   ```
3. Consulte o **[COMMANDS.md](COMMANDS.md)** para comandos de diagnóstico
4. Reinicie o ambiente se necessário:
   ```bash
   make restart
   ```

## 🔄 Fluxo de Trabalho Recomendado

### Primeiro Uso
```bash
# Clonar o projeto
git clone <seu-repositorio>
cd docker-php-dev

# Configurar e iniciar
./init.sh

# Verificar se tudo está funcionando
docker-compose exec php php /var/www/html/test.php
```

### Desenvolvimento Diário
```bash
# Iniciar ambiente
docker-compose up -d

# Desenvolver seu código em src/
# Acessar http://localhost:8080 para ver sua aplicação
# Acessar http://localhost:8081 para gerenciar o banco de dados

# Executar testes periodicamente
docker-compose exec php php /var/www/html/test.php

# Parar ambiente ao finalizar
docker-compose down
```

### Atualizações e Manutenção
```bash
# Atualizar imagens Docker
docker-compose pull

# Limpar ambiente se necessário
docker-compose down -v

# Reconstruir tudo
docker-compose down -v
docker-compose up -d --build
```

## 📞 Suporte

Se você encontrar problemas ou tiver dúvidas:

1. Consulte a documentação interativa em http://localhost:8080
2. Verifique os logs com `make logs`
3. Execute os testes com `make test`
4. Consulte o **[COMMANDS.md](COMMANDS.md)** para comandos de diagnóstico

---

Esta documentação foi organizada para fornecer acesso rápido às informações necessárias para diferentes níveis de uso do projeto, desde a instalação inicial até a personalização avançada.