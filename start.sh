#!/bin/bash

# Script para facilitar o uso do ambiente Docker PHP

echo "🐳 Ambiente Docker PHP - MySQL - Nginx"
echo "======================================="

# Verificar se Docker e Docker Compose estão instalados
if ! command -v docker &> /dev/null; then
    echo "❌ Docker não está instalado. Por favor, instale o Docker primeiro."
    exit 1
fi

if ! command -v docker-compose &> /dev/null; then
    echo "❌ Docker Compose não está instalado. Por favor, instale o Docker Compose primeiro."
    exit 1
fi

# Função para exibir o menu
show_menu() {
    echo ""
    echo "🐳 Menu Docker PHP"
    echo "=================="
    echo ""
    echo "Opções:"
    echo "1) Iniciar"
    echo "2) Parar"
    echo "3) Reiniciar"
    echo "4) Status"
    echo "5) Logs"
    echo "6) Terminal PHP"
    echo "7) Terminal MySQL"
    echo "8) Testar"
    echo "9) Informações"
    echo "0) Sair"
    echo ""
}

# Função para exibir informações do ambiente
show_info() {
    echo "📊 Informações do Ambiente:"
    echo "=========================="
    
    if [ -f .env ]; then
        echo "📝 Configurações do .env:"
        grep -E "^(NGINX_PORT|PHPMYADMIN_PORT|MYSQL_PORT|MYSQL_DATABASE|MYSQL_USER)" .env | while IFS='=' read -r key value; do
            echo "   • $key: $value"
        done
    else
        echo "⚠️  Arquivo .env não encontrado"
    fi
    
    echo ""
    echo "🐳 Status dos Containers:"
    docker-compose ps
    
    echo ""
    echo "💾 Uso de Disco:"
    docker system df
    
    echo ""
    read -p "Pressione Enter para continuar..."
}

# Função para executar testes
run_tests() {
    echo "🧪 Executando testes do ambiente..."
    echo ""
    
    if [ -f src/test.php ]; then
        docker-compose exec -T php php /var/www/html/test.php
    else
        echo "❌ Arquivo test.php não encontrado"
    fi
    
    echo ""
    read -p "Pressione Enter para continuar..."
}

# Função para verificar se o arquivo .env existe
check_env_file() {
    if [ ! -f .env ]; then
        echo "⚠️  Arquivo .env não encontrado!"
        echo "📝 Criando arquivo .env a partir do exemplo..."
        cp .env.example .env
        echo "✅ Arquivo .env criado com configurações padrão."
        echo "🔄 Você pode editar o arquivo .env para personalizar as configurações."
        echo ""
    fi
}

# Função para iniciar o ambiente
start_environment() {
    echo "🔍 Verificando configurações..."
    check_env_file
    
    echo "🚀 Iniciando ambiente..."
    docker-compose up -d
    
    echo ""
    echo "⏳ Aguardando inicialização dos serviços..."
    sleep 5
    
    echo ""
    echo "🧪 Executando testes de validação..."
    docker-compose exec -T php php /var/www/html/test.php
    
    echo ""
    echo "✅ Ambiente iniciado com sucesso!"
    echo ""
    
    # Obter portas do .env
    NGINX_PORT=$(grep NGINX_PORT .env | cut -d'=' -f2)
    PHPMYADMIN_PORT=$(grep PHPMYADMIN_PORT .env | cut -d'=' -f2)
    
    echo "📡 Serviços disponíveis:"
    echo "   • Aplicação PHP: http://localhost:${NGINX_PORT:-8080}"
    echo "   • phpMyAdmin: http://localhost:${PHPMYADMIN_PORT:-8081}"
    echo ""
    echo "🔐 Credenciais phpMyAdmin:"
    echo "   • Usuário: root"
    echo "   • Senha: $(grep MYSQL_ROOT_PASSWORD .env | cut -d'=' -f2)"
}

# Função para parar o ambiente
stop_environment() {
    echo "🛑 Parando ambiente..."
    docker-compose down
    echo "✅ Ambiente parado!"
}

# Função para reiniciar o ambiente
restart_environment() {
    echo "🔄 Reiniciando ambiente..."
    docker-compose restart
    echo "✅ Ambiente reiniciado!"
}

# Função para verificar o status
check_status() {
    echo "📊 Status dos containers:"
    docker-compose ps
}

# Função para ver logs
view_logs() {
    echo "📝 Escolha o serviço para ver os logs:"
    echo "1) Todos"
    echo "2) Nginx"
    echo "3) PHP"
    echo "4) MySQL"
    echo "5) phpMyAdmin"
    read -p "Opção: " log_option
    
    case $log_option in
        1) docker-compose logs -f ;;
        2) docker-compose logs -f nginx ;;
        3) docker-compose logs -f php ;;
        4) docker-compose logs -f mysql ;;
        5) docker-compose logs -f phpmyadmin ;;
        *) echo "Opção inválida!" ;;
    esac
}

# Função para acessar terminal PHP
access_php_terminal() {
    echo "🐘 Acessando terminal do container PHP..."
    docker-compose exec php sh
}

# Função para acessar terminal MySQL
access_mysql_terminal() {
    echo "🐬 Acessando terminal do MySQL..."
    docker-compose exec mysql mysql -u app_user -p app_db
}

# Função para reconstruir imagem PHP
rebuild_php() {
    echo "🔨 Reconstruindo imagem PHP..."
    docker-compose build php
    echo "✅ Imagem PHP reconstruída!"
}

# Função para limpar ambiente
clean_environment() {
    echo "⚠️  ATENÇÃO: Isso irá remover todos os dados do banco de dados!"
    read -p "Tem certeza que deseja continuar? (s/N): " confirm
    
    if [[ $confirm =~ ^[Ss]$ ]]; then
        echo "🧹 Limpando ambiente..."
        docker-compose down -v
        echo "✅ Ambiente limpo!"
    else
        echo "❌ Operação cancelada."
    fi
}

# Loop principal
while true; do
    show_menu
    read -p "Digite sua opção: " option
    
    case $option in
        1) start_environment ;;
        2) stop_environment ;;
        3) restart_environment ;;
        4) check_status ;;
        5) view_logs ;;
        6) access_php_terminal ;;
        7) access_mysql_terminal ;;
        8) rebuild_php ;;
        9) clean_environment ;;
        10) run_tests ;;
        11) show_info ;;
        0)
            echo "👋 Até logo!"
            exit 0
            ;;
        *)
            echo "❌ Opção inválida! Tente novamente."
            ;;
    esac
    
    echo ""
    read -p "Pressione Enter para continuar..."
done