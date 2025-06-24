# 🚂 Deploy no Railway - Sistema de Rifas

## 📋 Pré-requisitos

- Conta no [Railway](https://railway.app)
- Git instalado
- Conta no GitHub/GitLab

## 🚀 Deploy Automático

### 1. Fork/Clone do Repositório
```bash
git clone seu-repositorio
cd SISTEMA-RIFA
```

### 2. Railway Setup

1. Acesse [railway.app](https://railway.app)
2. Clique em "Start a New Project"
3. Selecione "Deploy from GitHub repo"
4. Escolha seu repositório
5. Railway detectará automaticamente o Dockerfile

### 3. Configurar Database

1. No painel Railway, clique "Add Service"
2. Selecione "Database" → "MySQL"
3. Aguarde a criação do database

### 4. Variáveis de Ambiente

Configure as seguintes variáveis no Railway:

```env
# Database (Railway preenche automaticamente)
DB_HOST=${{MySQL.MYSQL_HOST}}
DB_USER=${{MySQL.MYSQL_USER}}
DB_PASSWORD=${{MySQL.MYSQL_PASSWORD}}
DB_NAME=${{MySQL.MYSQL_DATABASE}}

# Configurações do Sistema
RAILWAY_ENVIRONMENT=production
TZ=America/Sao_Paulo
```

### 5. Inicializar Banco de Dados

Após o primeiro deploy, execute:

```bash
# No terminal Railway ou local
php setup-database.php
```

## 🔧 Configurações Importantes

### URLs do Sistema
- Site: `https://seu-app.up.railway.app`
- Admin: `https://seu-app.up.railway.app/admin`
- Login: admin / albinodevs

### Estrutura de Arquivos
```
/
├── Dockerfile              # Container config
├── apache-config.conf      # Apache setup
├── railway.json           # Railway config
├── setup-database.php     # DB initialization
├── extrair/              # Application files
└── uploads/              # File uploads
```

## 🐛 Troubleshooting

### Erro de Conexão Database
```bash
# Verificar variáveis
echo $DB_HOST $DB_USER $DB_NAME

# Testar conexão
php -r "new mysqli('$DB_HOST', '$DB_USER', '$DB_PASSWORD', '$DB_NAME');"
```

### Erro de Permissões
```bash
# No Dockerfile já configurado:
chmod -R 755 /var/www/html/
chown -R www-data:www-data /var/www/html/
```

### URLs não funcionam
- Verificar arquivo `.htaccess`
- Conferir `apache-config.conf`
- Verificar `mod_rewrite` ativo

## 📊 Monitoramento

### Logs Railway
```bash
railway logs
```

### Status da Aplicação
- Health check: `/`
- Database check: `setup-database.php`

## 🔄 Updates

Para atualizar o sistema:

```bash
git add .
git commit -m "Update sistema"
git push origin main
```

Railway fará deploy automaticamente!

## 💡 Dicas de Performance

1. **CDN**: Configure Cloudflare
2. **Cache**: Implemente Redis
3. **Images**: Otimize uploads
4. **Database**: Use índices apropriados

## 🆘 Suporte

- Railway Docs: https://docs.railway.app
- Sistema Logs: `railway logs`
- Database Admin: Railway Dashboard 