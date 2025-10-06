# Changelog

Todas as mudanças notáveis neste projeto serão documentadas neste arquivo.

O formato é baseado em [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
e este projeto adere ao [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2024-10-06

### Adicionado
- **Documentação interativa completa** no `index.php` com interface moderna e comandos copiáveis
- **Sistema de variáveis de ambiente** com arquivos `.env` e `.env.example`
- **Makefile** com comandos fáceis de usar (`make start`, `make test`, etc.)
- **Script de testes automatizados** (`test.php`) para validar todo o ambiente
- **GitHub Actions** para testes automatizados em push/PR
- **Arquivo `.gitignore` completo** com proteção de arquivos sensíveis
- **Docker Compose override** para configurações locais personalizadas
- **LICENSE MIT** para uso livre
- **CHANGELOG.md** para documentar mudanças

### Melhorado
- **Segurança**: Removido hardcoded de senhas do `docker-compose.yml`
- **Configurabilidade**: Portas e credenciais agora são configuráveis via `.env`
- **Documentação**: README.md atualizado com novas instruções
- **Interface**: Nova documentação visual no index.php com tema escuro moderno
- **Estrutura**: Organização melhor dos arquivos e diretórios

### Corrigido
- Removido atributo `version` obsoleto dos arquivos Docker Compose
- Problemas de codificação UTF-8 totalmente resolvidos
- Melhor tratamento de erros e validações

### Removido
- Arquivos fantasmas que estavam abertos no VSCode mas não existiam
- Configurações hardcoded de segurança

## [1.0.0] - 2024-01-01

### Adicionado
- Ambiente Docker completo com PHP 8.3, MySQL 8.0, Nginx e phpMyAdmin
- Configuração UTF-8 em todos os serviços
- Script de inicialização (`start.sh`) interativo
- README.md completo com instruções
- Dockerfile otimizado para PHP com extensões essenciais
- Configuração Nginx com cache de arquivos estáticos
- Script SQL de inicialização com dados de exemplo
- Página inicial de exemplo com design moderno

### Tecnologias
- PHP 8.3 com FPM
- MySQL 8.0 com UTF-8
- Nginx 1.21
- phpMyAdmin
- Docker e Docker Compose
- Bootstrap 5
- Fonte Inter do Google Fonts