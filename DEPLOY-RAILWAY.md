# 🚂 DEPLOY AUTOMÁTICO NO RAILWAY

## 🎯 **LINK DIRETO PARA DEPLOY**

👆 **CLIQUE AQUI PARA DEPLOY AUTOMÁTICO:**
[![Deploy on Railway](https://railway.app/button.svg)](https://railway.app/template/mysql-php?referralCode=auto)

**OU use este link direto:**
```
https://railway.app/new/template?template=https://github.com/kazuo1212/sistema-rifas-online
```

---

## 🚀 **PROCESSO AUTOMÁTICO (5 MINUTOS)**

### **PASSO 1: Acesse o Railway**
1. 🌐 Acesse: [railway.app](https://railway.app)
2. 🔐 Faça login com GitHub
3. ✅ Autorize o Railway a acessar seus repositórios

### **PASSO 2: Deploy do Projeto**
1. 🚀 Clique em **"Start a New Project"**
2. 📂 Selecione **"Deploy from GitHub repo"**
3. 🔍 Encontre: **"sistema-rifas-online"**
4. ✅ Clique em **"Deploy"**

### **PASSO 3: Adicionar Database MySQL**
1. ➕ No painel, clique **"Add Service"**
2. 🗄️ Selecione **"Database"** → **"MySQL"**
3. ⏳ Aguarde 2-3 minutos para criação

### **PASSO 4: Configurar Variáveis de Ambiente**
1. ⚙️ Clique na **aplicação principal** (não no MySQL)
2. 📝 Vá em **"Variables"**
3. ➕ Adicione estas variáveis:

```env
# Database (copie do MySQL criado)
DB_HOST=${{MySQL.MYSQL_HOST}}
DB_USER=${{MySQL.MYSQL_USER}}
DB_PASSWORD=${{MySQL.MYSQL_PASSWORD}}
DB_NAME=${{MySQL.MYSQL_DATABASE}}
DB_PORT=${{MySQL.MYSQL_PORT}}

# Site
SITE_NAME=Minha Rifa Online
ADMIN_EMAIL=seu@email.com
BASE_URL=https://seu-projeto.railway.app

# Mercado Pago (seus dados)
MP_ACCESS_TOKEN=seu_access_token_aqui
MP_PUBLIC_KEY=sua_public_key_aqui

# Email (opcional)
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USER=seu@email.com
SMTP_PASS=sua_senha_app
```

### **PASSO 5: Inicializar Database**
1. 🔧 Vá em **"Deployments"**
2. 📱 Clique nos **3 pontos** → **"View Logs"**
3. ⏳ Aguarde deploy finalizar
4. 🌐 Acesse seu site e execute: `https://SEU_SITE.railway.app/setup-database.php`

---

## 🎉 **PRONTO! SEU SITE ESTÁ NO AR!**

### 📊 **URLs Importantes:**
- 🏠 **Site Principal:** `https://SEU_PROJETO.railway.app`
- 👑 **Admin:** `https://SEU_PROJETO.railway.app/admin`
- 🗄️ **Setup DB:** `https://SEU_PROJETO.railway.app/setup-database.php`

### 🔐 **Login Admin Padrão:**
- **Usuário:** `admin`
- **Senha:** `admin123`
- ⚠️ **ALTERE IMEDIATAMENTE APÓS LOGIN!**

---

## 🛠️ **CONFIGURAÇÕES PÓS-DEPLOY**

### **1. Configurar Mercado Pago**
1. 🏪 Acesse [developers.mercadopago.com](https://developers.mercadopago.com)
2. 🔑 Pegue suas credenciais
3. ⚙️ Configure no admin do site

### **2. Personalizar Site**
1. 📂 Admin → **Configurações**
2. 🖼️ Upload logo e favicon
3. 🎨 Personalizar cores e textos

### **3. SSL e Domínio**
1. 🌐 Railway fornece HTTPS automático
2. 🔗 Para domínio próprio: **Settings** → **Domains**

---

## 🆘 **PROBLEMAS COMUNS**

### ❌ **"Database not found"**
```bash
# Execute o setup:
https://SEU_SITE.railway.app/setup-database.php
```

### ❌ **"Permission denied"**
```bash
# Verifique as variáveis de ambiente
# DB_HOST, DB_USER, DB_PASSWORD devem estar corretas
```

### ❌ **"Page not found"**
```bash
# Verifique se .htaccess foi enviado
# Confirme mod_rewrite ativo
```

---

## 📞 **SUPORTE**

🐛 **Issues:** https://github.com/kazuo1212/sistema-rifas-online/issues
📧 **Email:** Configurado nas variáveis de ambiente
🚂 **Railway Docs:** https://docs.railway.app

---

**🎯 Tempo total estimado: 5-10 minutos**
**💰 Custo Railway: $5-10/mês (uso normal)**
**🚀 Deploy automático a cada commit!** 