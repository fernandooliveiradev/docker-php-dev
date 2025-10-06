#!/bin/bash

# Script de inicialização rápida do ambiente Docker PHP
# Este script configura tudo automaticamente para você

set -e

echo "🚀 Inicializador de Ambiente Docker PHP"
echo "======================================"
echo ""

# Cores para output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Função para imprimir mensagens coloridas
print_success() {
    echo -e "${GREEN}✅ $1${NC}"
}

print_warning() {
    echo -e "${YELLOW}⚠️  $1${NC}"
}

print_error() {
    echo -e "${RED}❌ $1${NC}"
}

# Verificar se Docker está instalado
check_docker() {
    if ! command -v docker &> /dev/null; then
        print_error "Docker não está instalado. Por favor, instale o Docker primeiro."
        echo ""
        echo "📋 Instalação do Docker:"
        echo "   Ubuntu/Debian: sudo apt-get install docker.io"
        echo "   CentOS/RHEL:   sudo yum install docker"
        echo "   macOS:         https://docs.docker.com/desktop/mac/install/"
        echo "   Windows:       https://docs.docker.com/desktop/windows/install/"
        exit 1
    fi
    
    if ! command -v docker-compose &> /dev/null; then
        print_error "Docker Compose não está instalado. Por favor, instale o Docker Compose primeiro."
        echo ""
        echo "📋 Instalação do Docker Compose:"
        echo "   Linux: sudo apt-get install docker-compose-plugin"
        echo "   macOS/Windows: Já vem com Docker Desktop"
        exit 1
    fi
    
    print_success "Docker e Docker Compose encontrados"
}

# Verificar se o Docker está rodando
check_docker_running() {
    if ! docker info &> /dev/null; then
        print_error "Docker não está rodando. Por favor, inicie o Docker."
        echo ""
        echo "📋 Iniciando Docker:"
        echo "   Linux: sudo systemctl start docker"
        echo "   macOS/Windows: Inicie o Docker Desktop"
        exit 1
    fi
    
    print_success "Docker está rodando"
}

# Criar arquivo .env se não existir
setup_env() {
    if [ ! -f .env ]; then
        print_warning "Arquivo .env não encontrado. Criando a partir do exemplo..."
        cp .env.example .env
        print_success "Arquivo .env criado com configurações padrão"
        echo ""
        echo "📝 Você pode editar o arquivo .env para personalizar:"
        echo "   • Portas (se já estiverem em uso)"
        echo "   • Senhas do banco de dados"
        echo "   • Nomes de usuário"
        echo ""
        read -p "Deseja editar o arquivo .env agora? (s/N): " edit_env
        
        if [[ $edit_env =~ ^[Ss]$ ]]; then
            if command -v nano &> /dev/null; then
                nano .env
            elif command -v vim &> /dev/null; then
                vim .env
            else
                print_warning "Nenhum editor de texto encontrado. Edite manualmente o arquivo .env"
            fi
        fi
    else
        print_success "Arquivo .env já existe"
    fi
}

# Tornar scripts executáveis
make_scripts_executable() {
    chmod +x start.sh 2>/dev/null || true
    chmod +x init.sh 2>/dev/null || true
    print_success "Scripts tornados executáveis"
}

# Verificar portas
check_ports() {
    print_warning "Verificando portas..."
    
    # Obter portas do .env
    NGINX_PORT=$(grep NGINX_PORT .env | cut -d'=' -f2)
    PHPMYADMIN_PORT=$(grep PHPMYADMIN_PORT .env | cut -d'=' -f2)
    MYSQL_PORT=$(grep MYSQL_PORT .env | cut -d'=' -f2)
    
    # Usar portas padrão se não encontradas
    NGINX_PORT=${NGINX_PORT:-8080}
    PHPMYADMIN_PORT=${PHPMYADMIN_PORT:-8081}
    MYSQL_PORT=${MYSQL_PORT:-3306}
    
    # Verificar se as portas estão em uso
    ports_in_use=""
    
    if netstat -tuln 2>/dev/null | grep -q ":$NGINX_PORT "; then
        ports_in_use="$ports_in_use $NGINX_PORT"
    fi
    
    if netstat -tuln 2>/dev/null | grep -q ":$PHPMYADMIN_PORT "; then
        ports_in_use="$ports_in_use $PHPMYADMIN_PORT"
    fi
    
    if netstat -tuln 2>/dev/null | grep -q ":$MYSQL_PORT "; then
        ports_in_use="$ports_in_use $MYSQL_PORT"
    fi
    
    if [ -n "$ports_in_use" ]; then
        print_warning "As seguintes portas já estão em uso:$ports_in_use"
        echo ""
        echo "💡 Soluções:"
        echo "   1. Pare os serviços que estão usando essas portas"
        echo "   2. Edite o arquivo .env e mude as portas"
        echo "   3. Use portas diferentes (ex: 8090, 8091, 3307)"
        echo ""
        read -p "Deseja continuar mesmo assim? (s/N): " continue_anyway
        
        if [[ ! $continue_anyway =~ ^[Ss]$ ]]; then
            print_error "Inicialização cancelada. Por favor, libere as portas ou edite o .env"
            exit 1
        fi
    else
        print_success "Portas disponíveis"
    fi
}

# Construir e iniciar containers
start_containers() {
    print_warning "Construindo e iniciando containers..."
    echo ""
    
    # Parar containers existentes
    docker-compose down 2>/dev/null || true
    
    # Construir imagens
    print_warning "Construindo imagens Docker..."
    docker-compose build
    
    # Iniciar containers
    print_warning "Iniciando containers..."
    docker-compose up -d
    
    print_success "Containers iniciados com sucesso"
}

# Aguardar inicialização
wait_for_services() {
    print_warning "Aguardando inicialização dos serviços..."
    echo ""
    
    # Aguardar MySQL
    print_warning "Aguardando MySQL..."
    for i in {1..30}; do
        if docker-compose exec -T mysql mysqladmin ping -h localhost --silent 2>/dev/null; then
            print_success "MySQL está pronto"
            break
        fi
        echo -n "."
        sleep 2
    done
    
    # Aguardar PHP
    print_warning "Aguardando PHP..."
    sleep 5
    
    print_success "Serviços prontos"
}

# Executar testes
run_tests() {
    print_warning "Executando testes de validação..."
    echo ""
    
    if docker-compose exec -T php php /var/www/html/test.php; then
        print_success "Todos os testes passaram!"
    else
        print_error "Alguns testes falharam. Verifique os logs."
        echo ""
        echo "📋 Para ver logs:"
        echo "   make logs"
        echo "   docker-compose logs"
    fi
}

# Mostrar informações finais
show_final_info() {
    echo ""
    echo "🎉 Ambiente Docker PHP configurado com sucesso!"
    echo "=============================================="
    echo ""
    
    # Obter portas do .env
    NGINX_PORT=$(grep NGINX_PORT .env | cut -d'=' -f2)
    PHPMYADMIN_PORT=$(grep PHPMYADMIN_PORT .env | cut -d'=' -f2)
    
    NGINX_PORT=${NGINX_PORT:-8080}
    PHPMYADMIN_PORT=${PHPMYADMIN_PORT:-8081}
    
    echo "📡 Serviços disponíveis:"
    echo "   • Aplicação PHP: http://localhost:$NGINX_PORT"
    echo "   • phpMyAdmin: http://localhost:$PHPMYADMIN_PORT"
    echo ""
    echo "🔐 Credenciais phpMyAdmin:"
    echo "   • Usuário: root"
    echo "   • Senha: $(grep MYSQL_ROOT_PASSWORD .env | cut -d'=' -f2)"
    echo ""
    echo "🛠️  Comandos úteis:"
    echo "   • ./start.sh     - Menu para gerenciar o ambiente"
    echo "   • docker-compose up -d    - Iniciar"
    echo "   • docker-compose down     - Parar"
    echo "   • docker-compose logs     - Ver logs"
    echo ""
    echo "📖 Documentação completa:"
    echo "   • Acesse http://localhost:$NGINX_PORT para ver esta documentação"
    echo "   • Leia o README.md para mais informações"
    echo ""
    print_success "Aproveite seu ambiente de desenvolvimento! 🚀"
}

# Função principal
main() {
    echo "📋 Verificando pré-requisitos..."
    check_docker
    check_docker_running
    
    echo ""
    echo "🔧 Configurando ambiente..."
    setup_env
    make_scripts_executable
    
    echo ""
    echo "🔍 Verificando portas..."
    check_ports
    
    echo ""
    start_containers
    wait_for_services
    
    echo ""
    run_tests
    
    echo ""
    show_final_info
}

# Executar função principal
main "$@"