# 🚀 API teste SafeDataAnalytics 1.0 

Sistema de consultas baseado no SafeDataAnalytics para testes e validações de requisições via API.

## 📋 Visão Geral

O **API TESTE  SafeDataAnalytics** é um sistema desenvolvido em laravel que retornas resposta baseado no SDA

### 🏗️ Arquitetura

- **SDA**: API Laravel com PostgreSQL (consultas, APIs, permissões)
- **Tecbase**: Sistema SSO com SQL Server (usuários e autenticação)
- **Integração**: SDA consome usuários do Tecbase via conexão `sqlsrv2`

## 🚀 Features Principais

### 📊 Consultas Disponíveis
- **Porto Seguro** (IDs 1-2): Validação e Face/Biometria
- **APIs Individuais** (IDs 3-21): Veículos, Condutores, Dados Pessoais, etc.
- **Total**: 21 consultas configuradas

### 🔐 Sistema de Permissões
- **Grupos**: Consultas Porto, APIs Individuais
- **Permissões**: Consumo e Gerenciamento
- **Usuários Padrão**: AuditorSDA, CdcEsteiraPorto, OcrTecnol

### 📈 Monitoramento
- **Dashboard**: Métricas em tempo real
- **Logs**: Histórico completo de consultas
- **Alertas**: Notificações de erros e performance

### 🔄 Processamento em Lote
- **Jobs**: Processamento assíncrono
- **Filas**: Sistema de prioridades
- **Retry**: Tentativas automáticas em caso de falha

## 🛠️ Instalação

### Pré-requisitos
- PHP 8.1+
- PostgreSQL
- SQL Server (Tecbase)
- Composer
- Docker (opcional)

### 1. Clone o repositório
```bash
git clone https://github.com/sistemastecnol/safedataanalytics-api.git
cd safedataanalytics-api/src
```

### 2. Instale as dependências
```bash
composer install
```

### 3. Configure o ambiente
```bash
cp .env-example .env
# Configure as variáveis de ambiente
```

### 4. Configure os bancos de dados

#### PostgreSQL (SDA)
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=sda_database
DB_USERNAME=sda_user
DB_PASSWORD=sda_password
```

#### SQL Server (Tecbase)
```env
DB_CONNECTION_SQLSRV2=sqlsrv
DB_HOST_SQLSRV2=tecbase_server
DB_PORT_SQLSRV2=1433
DB_DATABASE_SQLSRV2=tecbase
DB_USERNAME_SQLSRV2=sa
DB_PASSWORD_SQLSRV2=password
```

### 5. Execute as migrações
```bash
php artisan migrate
```

### 6. Execute os seeders
```bash
# Cria usuários no Tecbase
php artisan db:seed --class=CriarUsuarioAuditorSeeder

# Configura consultas
php artisan db:seed --class=ConfigurarConsultasProducaoSeeder

# Configura permissões
php artisan db:seed --class=PermissoesPortoSeeder
```

## 🔧 Configuração

### Usuários Padrão
O sistema cria automaticamente os seguintes usuários:

| Usuário | Email | Senha | Função |
|---------|-------|-------|--------|
| AuditorSDA | auditor@safedataanalytics.com.br | AuditorSDA@2025 | Auditor |
| CdcEsteiraPorto | cdc.esteira@portoseguro.com.br | CdcPorto@2025 | Cliente Porto |
| OcrTecnol | ocr@tecnol.com.br | OcrTecnol@2025 | OCR |

### Consultas Configuradas
- **ID 1**: Validação (Porto)
- **ID 2**: Face/Biometria (Porto)
- **ID 3-21**: APIs Individuais (Veículos, Condutores, etc.)

## 📚 Uso

### Monitoramento
```bash
# Dashboard de monitoramento
php artisan apis:monitorar

# Com seeders
php artisan apis:monitorar --seeders
```

### Verificações
```bash
# Verificar usuários no Tecbase
php artisan tinker --execute="
DB::connection('sqlsrv2')->table('usuarios')
  ->whereIn('login', ['AuditorSDA', 'CdcEsteiraPorto', 'OcrTecnol'])
  ->get();
"

# Verificar consultas configuradas
php artisan tinker --execute="App\Models\Consulta::count();"

# Corrigir permissões do AuditorSDA
php artisan corrigir:permissoes-auditor

# Testar acesso do AuditorSDA
php artisan testar:acesso-auditor --api=4
```

## 🔄 Deploy

### Homologação
```bash
git checkout dev
php artisan migrate
php artisan db:seed
```

### Produção
```bash
# Deploy completo e seguro
./src/scripts/deploy-producao.sh

# Ou via Artisan
php artisan deploy:producao --backup

# Apenas validar ambiente
php artisan deploy:producao --validate

# Deploy da versão estável de homologação
git checkout v1.0.0-homologacao-estavel
./src/scripts/deploy-producao.sh
```

### Backup
```bash
# Criar tag de backup
git tag -a "backup-$(date +%Y%m%d)" -m "Backup antes do deploy"
git push origin --tags

# Versão estável de homologação
git tag -a "v1.0.0-homologacao-estavel" -m "Versão estável de homologação"
git push origin v1.0.0-homologacao-estavel
```

## 🚨 Troubleshooting

### Problemas Comuns

#### 1. Erro de Conexão Tecbase
```bash
# Verificar conexão
php artisan tinker --execute="DB::connection('sqlsrv2')->getPdo();"
```

#### 2. Usuário sem Permissão
```bash
# Verificar permissões
php artisan tinker --execute="
\$usuario = App\Models\Usuario::where('login', 'AuditorSDA')->first();
echo 'Permissões: ' . \$usuario->usuarioPermissao->count();
"
```

#### 3. Cache Desatualizado
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

## 📊 Estrutura do Banco

### SDA (PostgreSQL)
- `consultas` - Configuração das consultas
- `apis` - APIs externas
- `permissoes` - Sistema de permissões
- `usuarios` - Usuários do SDA
- `lotes` - Processamento em lote

### Tecbase (SQL Server)
- `usuarios` - Usuários do sistema
- `pessoas` - Dados das pessoas
- `pessoas_grupo` - Grupos de pessoas
- `pessoas_categoria` - Categorias

## 🤝 Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 📞 Suporte

Para suporte, entre em contato:
- **Email**: suporte@safedataanalytics.com.br
- **Documentação**: [docs/](docs/)

---

**🚀 Desenvolvido com ❤️ pela equipe TECNOL**

