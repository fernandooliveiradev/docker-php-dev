# 🤝 Contribuindo para o Ambiente Docker PHP

Obrigado pelo seu interesse em contribuir para este projeto! Este documento fornece diretrizes e informações sobre como participar do desenvolvimento do Ambiente Docker PHP.

## 📋 Sumário

- [Como Contribuir](#como-contribuir)
- [Processo de Desenvolvimento](#processo-de-desenvolvimento)
- [Padrões de Código](#padrões-de-código)
- [Relatando Problemas](#relatando-problemas)
- [Solicitando Funcionalidades](#solicitando-funcionalidades)
- [Documentação](#documentação)

## 🚀 Como Contribuir

### 1. Faça um Fork do Projeto

Primeiro, faça um fork do repositório para a sua conta do GitHub:

```bash
# Faça um fork do projeto no GitHub
# Clone seu fork
git clone https://github.com/seu-usuario/docker-php-dev.git
cd docker-php-dev
```

### 2. Configure seu Ambiente

```bash
# Adicione o repositório original como upstream
git remote add upstream https://github.com/usuario-original/docker-php-dev.git

# Instale e configure o ambiente
make install
```

### 3. Crie uma Branch

Crie uma branch para sua contribuição:

```bash
# Crie uma nova branch para sua feature ou correção
git checkout -b feature/nome-da-feature

# Ou para correções de bugs
git checkout -b fix/corrigir-algo
```

## 🔄 Processo de Desenvolvimento

### 1. Faça suas Alterações

- Faça suas alterações no código
- Teste suas alterações com `make test`
- Verifique se a documentação precisa ser atualizada

### 2. Teste suas Alterações

```bash
# Execute os testes para garantir que tudo está funcionando
make test

# Verifique se a documentação está correta
make start
# Acesse http://localhost:8080 para verificar a documentação interativa
```

### 3. Faça o Commit das Alterações

```bash
# Adicione suas alterações
git add .

# Faça o commit com uma mensagem clara e descritiva
git commit -m "feat: adiciona nova funcionalidade X"

# Ou para correções
git commit -m "fix: corrige problema Y na funcionalidade Z"
```

### 4. Envie suas Alterações

```bash
# Envie suas alterações para o seu fork
git push origin feature/nome-da-feature
```

### 5. Crie um Pull Request

- Vá para a página do seu fork no GitHub
- Clique em "New Pull Request"
- Selecione sua branch e clique em "Create Pull Request"
- Preencha o título e a descrição do PR
- Aguarde a revisão

## 💻 Padrões de Código

### PHP

- Siga o padrão PSR-12
- Use type hints sempre que possível
- Documente funções e classes com PHPDoc

```php
/**
 * Exemplo de função documentada
 *
 * @param string $param1 Descrição do parâmetro
 * @param int $param2 Descrição do parâmetro
 * @return array Descrição do retorno
 */
function exampleFunction(string $param1, int $param2): array
{
    // Código da função
}
```

### Docker

- Mantenha os Dockerfiles otimizados
- Use imagens oficiais sempre que possível
- Documente todas as variáveis de ambiente

### Shell Scripts

- Use `/bin/bash` em vez de `/bin/sh`
- Adicione tratamento de erros com `set -e`
- Documente funções complexas

```bash
#!/bin/bash

# Habilita saída em caso de erro
set -e

# Função documentada
# 
# @param $1 Descrição do parâmetro
# @return Descrição do retorno
minha_funcao() {
    local param1="$1"
    
    # Código da função
    
    return 0
}
```

### Markdown

- Use markdown formatado
- Mantenha a consistência com os documentos existentes
- Atualize o índice quando adicionar novas seções

## 🐛 Relatando Problemas

### Como Reportar um Bug

1. Verifique se o bug já foi reportado
2. Use o template de issue para bug report
3. Forneça informações detalhadas:
   - Passos para reproduzir
   - Comportamento esperado vs. comportamento atual
   - Ambiente (SO, versões, etc.)
   - Logs e mensagens de erro

### Template de Bug Report

```markdown
## Descrição
Breve descrição do problema

## Passos para Reproduzir
1. Passo 1
2. Passo 2
3. Passo 3

## Comportamento Esperado
O que deveria acontecer

## Comportamento Atual
O que acontece de fato

## Ambiente
- Sistema Operacional: [ex: Ubuntu 20.04]
- Versão do Docker: [ex: 20.10.7]
- Versão do Docker Compose: [ex: 1.29.2]
- Outras informações relevantes:

## Logs e Mensagens de Erro
```
Cole logs e mensagens de erro aqui
```
```

## ✨ Solicitando Funcionalidades

### Como Solicitar uma Nova Funcionalidade

1. Verifique se a funcionalidade já foi solicitada
2. Use o template de issue para feature request
3. Forneça uma descrição clara da funcionalidade
4. Explique o caso de uso e o benefício

### Template de Feature Request

```markdown
## Título da Funcionalidade
Breve título descritivo

## Descrição
Descrição detalhada da funcionalidade

## Caso de Uso
Explique como esta funcionalidade seria usada
Qual problema ela resolveria?

## Proposta de Implementação (opcional)
Se tiver uma ideia de como implementar, descreva aqui

## Alternativas
Quais alternativas você já considerou?

## Contexto Adicional
Qualquer outra informação ou contexto relevante
```

## 📚 Documentação

### Como Contribuir com a Documentação

1. Verifique se a documentação precisa ser atualizada
2. Mantenha a consistência com o estilo existente
3. Atualize os índices e sumários
4. Teste os exemplos de código

### Estrutura da Documentação

- **README.md**: Visão geral e instruções rápidas
- **DOCUMENTATION.md**: Índice central da documentação
- **COMMANDS.md**: Lista completa de comandos
- **PROJECT_STRUCTURE.md**: Estrutura detalhada do projeto
- **CONTRIBUTING.md**: Diretrizes para contribuição (este arquivo)

### Diretrizes para Documentação

- Use linguagem clara e concisa
- Inclua exemplos práticos
- Mantenha a documentação atualizada
- Use formatação consistente

## 📝 Processo de Revisão

### O que acontece após um Pull Request

1. O PR será revisado pelos mantenedores
2. Testes automáticos serão executados
3. Pode ser solicitado que você faça alterações
4. Após aprovado, o PR será mesclado ao projeto

### Critérios de Aceitação

- O código segue os padrões do projeto
- Todos os testes passam
- A documentação está atualizada
- A funcionalidade está bem implementada
- Não introduz regressões

## 🤗 Comunicação

- Mantenha comunicação respeitosa e construtiva
- Seja paciente com o processo de revisão
- Esteja aberto a feedback e sugestões
- Ajude outros contribuidores quando possível

## 📄 Licença

Ao contribuir, você concorda que suas contribuições serão licenciadas sob a mesma licença do projeto (MIT License).

---

Obrigado por contribuir para o Ambiente Docker PHP! Sua ajuda é muito valiosa para a comunidade.