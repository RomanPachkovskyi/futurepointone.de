# SOP: WordPress + Git + Plesk

**Studio Standard Operating Procedure (v3.1)**

> Цей документ — універсальний стандарт. Скопіюй в будь-який WordPress проект — ШІ зрозуміє як працювати.

---

## 0. Фундамент

**Ключова умова:** Доступ до адмін-панелі сайту має ТІЛЬКИ власник проєкту. Клієнти та сторонні особи доступу не мають.

Це дозволяє контрольовану двосторонню синхронізацію БД за потреби.

---

## 1. Філософія

| Що | Де | Пріоритет |
|----|-----|-----------|
| **Код** | GitHub | Єдине джерело правди |
| **Контент / SEO / Медіа** | Production | Фінальні дані |
| **Розробка** | Локальне середовище | 90% роботи |

> Локалка ≠ копія продакшна. Локалка = майстерня.

---

## 2. Структура проєкту (Монорепозиторій)

```
[project-name]/
├── index.php                 ← Router (MODE switching) ✅ Git
├── .htaccess                 ← Routing rules ✅ Git
├── robots.txt                ← SEO (КОРІНЬ, не /wp/) ✅ Git
├── llms.txt                  ← AI context (Yoast SEO) ✅ Git
├── [project]-ai.txt          ← Кастомний AI context (опціонально) ✅ Git
├── .env                      ← ❌ НЕ Git (secrets)
├── wp/                       ← WordPress
│   ├── wp-content/
│   │   ├── themes/           ← ✅ Git (всі теми)
│   │   ├── mu-plugins/       ← ✅ Git
│   │   ├── plugins/custom-*  ← ✅ Git (тільки кастомні)
│   │   ├── plugins/[інші]    ← ❌ НЕ Git (встановлюються через WP Admin)
│   │   ├── uploads/          ← ❌ НЕ Git
│   │   └── languages/        ← ❌ НЕ Git (auto-downloaded)
│   ├── wp-admin/             ← ❌ НЕ Git (WP Core)
│   ├── wp-includes/          ← ❌ НЕ Git (WP Core)
│   └── wp-config.php         ← ❌ НЕ Git (env-specific)
├── maintenance/              ← Landing page ✅ Git
│   └── index.html
├── backups/                  ← DB dumps ❌ НЕ Git
├── logs/                     ← Hosting logs ❌ НЕ Git
├── workspace/                ← Робоча папка (обмін файлами ШІ/власник) ❌ НЕ Git
│   ├── screenshots/          ← Скріншоти для аналізу
│   ├── content/              ← Тексти, контент
│   ├── media/                ← Медіа для обробки
│   └── temp/                 ← Тимчасові файли
├── docs/                     ← Універсальні документи ❌ НЕ Git (тільки локально)
│   ├── README.md             ← Entry point для ШІ
│   ├── SOP.md                ← Універсальний SOP
│   ├── MIGRATION.md          ← Migration guide
│   ├── Movefile              ← Movefile config (редагувати під проект)
│   └── archive/              ← Історичні файли ❌ НЕ Git
├── docker-compose.yml        ← ❌ НЕ Git (dev only)
├── wp-config-local.php       ← ❌ НЕ Git (dev only)
├── wp-config-production.php  ← ❌ НЕ Git (security!)
├── PROJECT.md                ← ❌ НЕ Git (тільки локально)
└── SERVER_RULES.md           ← ❌ НЕ Git (тільки локально)
```

**Легенда:**
- ✅ Git = файл в репозиторії
- ❌ НЕ Git = файл НЕ в репозиторії (тільки локально)

---

## 2.1 Router + .htaccess (обовʼязково для WP в /wp)

**Правило для ШІ:** якщо WordPress фізично знаходиться в `/wp`, ШІ **зобовʼязаний** додати ці rewrite‑правила в root `.htaccess` **до першого deploy / одразу під час міграції**:

```apache
# .htaccess (root)
RewriteRule ^wp-content/(.*)$ /wp/wp-content/$1 [L,NC]
RewriteRule ^wp-includes/(.*)$ /wp/wp-includes/$1 [L,NC]
RewriteRule ^wp-admin/(.*)$ /wp/wp-admin/$1 [L,NC]
RewriteRule ^wp-login\.php$ /wp/wp-login.php [L,NC]
```

Це запобігає 404/504 для статичних файлів після міграції з кореня.

---

## 2.2 Workspace — Робоча папка

**Призначення:** Обмін файлами між власником і ШІ для виконання завдань.

**Структура:**
```
workspace/
├── screenshots/    ← Скріншоти UI/дизайну для аналізу
├── content/        ← Текстові файли, контент для перекладу/адаптації
├── media/          ← Зображення, відео для оптимізації/обробки
└── temp/           ← Тимчасові файли (можна чистити)
```

**Використання:**
1. Власник кладе файли в відповідну підпапку
2. ШІ читає і використовує для роботи
3. Після завершення — власник вирішує видаляти чи ні

**Правила:**
- ❌ Папка НЕ в Git
- 📋 Використовуй для тимчасових робочих файлів
- ⚠️ Не зберігай чутливі дані довготривало
- 🗑️ Періодично чисти `temp/`

**Приклади використання:**
- Скріншот дизайну → аналіз і реалізація
- Текстовий контент → переклад і адаптація
- Медіа файли → оптимізація і розміщення на сайті

---

## 2.3 SEO & AI Context Files — Розміщення в корені

**КРИТИЧНО: Ці файли МАЮТЬ БУТИ в корені домену, НЕ в /wp/**

```
[project-name]/
├── robots.txt          ← ✅ Git (корінь домену)
├── llms.txt            ← ✅ Git (AI контекст, Yoast SEO)
├── [project]-ai.txt    ← ✅ Git (кастомний AI контекст, якщо потрібен)
└── wp/
    └── robots.txt      ← ❌ НЕ Git (WordPress може генерувати, ігноруємо)
```

**Чому корінь, а не /wp/?**

1. **robots.txt** — за стандартом RFC 9309 пошукові системи шукають його **ТІЛЬКИ** за адресою `https://domain.com/robots.txt`
   - ❌ `https://domain.com/wp/robots.txt` — Google/Bing НЕ ПОБАЧАТЬ
   - ✅ `https://domain.com/robots.txt` — правильно

2. **llms.txt, *-ai.txt** — AI краулери (GPTBot, Claude-Web, etc.) очікують знайти контекст в корені домену
   - Стандартна практика для AI-оптимізації
   - Максимальна видимість для LLM-систем

**Правила для .gitignore:**

```gitignore
# SEO & AI Context Files в корені (ЗБЕРІГАТИ)
!/robots.txt
!/llms.txt
!/*-ai.txt

# WordPress може генерувати robots.txt в /wp/ (ІГНОРУВАТИ)
wp/robots.txt
```

**Правила для ШІ:**
- При створенні проекту: розмісти SEO/AI файли в корені
- При міграції: перевір, чи файли в корені, не в /wp/
- Після кожного deploy: перевір доступність `https://domain.com/robots.txt`

---

## 2.4 Universal docs (docs/)

**Правило:** усі універсальні документи зберігаються в `docs/`.

**Навіщо:** щоб можна було копіювати **одну папку** в новий проект і не забути файли.

**Що робити:**
1. **Копіюй `docs/`** при старті нового проекту.
2. **Онови `docs/Movefile`** (vhost, wordpress_path, db name) під поточний проект.
3. **Доступи/паролі** зберігай у `.env` (root, локально, НЕ в Git).

---

## 3. Git — правила

### 3.1 Що в Git

**✅ Зберігається в Git:**
- Router: `index.php`, `.htaccess`
- Теми: `wp/wp-content/themes/*` (всі, включно з parent)
- MU-плагіни: `wp/wp-content/mu-plugins/*`
- Кастомні плагіни: `wp/wp-content/plugins/custom-*`
- Maintenance: `maintenance/*`
- SEO/AI файли: `robots.txt`, `llms.txt`, `*-ai.txt` (в корені!)

**❌ НЕ зберігається в Git (тільки локально):**
- Uploads: `wp/wp-content/uploads/`
- Languages: `wp/wp-content/languages/`
- WP Core: `wp/wp-admin/`, `wp/wp-includes/`
- Active config: `wp/wp-config.php`
- Secrets: `.env`, `.env.*`
- Backups: `backups/`, `*.sql`
- Logs: `logs/`
- 3rd party plugins: `wp/wp-content/plugins/[plugin-name]/`
- Workspace: `workspace/`
- **Документація:** `docs/README.md`, `docs/SOP.md`, `docs/MIGRATION.md`, `docs/Movefile`, `PROJECT.md`, `SERVER_RULES.md`
- **Dev конфіги:** `docker-compose.yml`, `wp-config-local.php`, `wp-config-production.php`, `php.ini`

### 3.2 Плагіни — детальні правила

**✅ В Git:**
- `custom-*` — будь-які кастомні плагіни
- Плагіни створені студією з нуля
- Приватні плагіни (недоступні в WP repo)

**❌ НЕ в Git:**
- Публічні плагіни з wordpress.org
- Преміум плагіни (Elementor Pro, ACF Pro, etc.)
- Будь-які плагіни що можна встановити через WP Admin

**⚠️ Особливі випадки:**
- Якщо 3rd party плагін має customizations → fork + rename до `custom-*`
- Якщо плагін deprecated → обговорити з власником

### 3.3 Доступ

| Роль | Дозволено |
|------|-----------|
| **Власник** | `git push` (через GitHub Desktop) |
| **ШІ** | Редагувати файли, `git add`, `git commit` |

> ШІ **НЕ має права** виконувати `git push`, `git merge`, `git rebase`.

### 3.4 Гілки

- `main` — єдина продакшн-гілка, Plesk тягне її
- `feature/*` — опційно, для великих змін
- `dev` — **НЕ використовується**

---

## 4. Локальне середовище (Docker)

### 4.1 Стандартна конфігурація

```yaml
# docker-compose.yml
services:
  wordpress:
    image: wordpress:latest
    ports:
      - "[port]:80"
    volumes:
      - ./wp:/var/www/html:cached
      - ./php.ini:/usr/local/etc/php/conf.d/zzz-local.ini:ro
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_USER: wp
      WORDPRESS_DB_PASSWORD: wp
      WORDPRESS_DB_NAME: [project-name]

  db:
    image: mysql:8.0
    volumes:
      - db_data:/var/lib/mysql
    environment:
      MYSQL_DATABASE: [project-name]
      MYSQL_USER: wp
      MYSQL_PASSWORD: wp
      MYSQL_ROOT_PASSWORD: root

  phpmyadmin:
    image: phpmyadmin:latest
    ports:
      - "[port+1]:80"

  wpcli:
    image: wordpress:cli
    volumes:
      - ./wp:/var/www/html
      - ./php.ini:/usr/local/etc/php/conf.d/zzz-local.ini:ro
```

**Правило:** Локальна БД використовує прості credentials `wp`/`wp`. `DB_NAME` = назва проекту.

### 4.2 Команди

```bash
cd ~/Project/[project-name]

# Запуск
docker-compose up -d

# Зупинка
docker-compose down

# Логи
docker-compose logs -f wordpress

# Бекап БД
docker-compose exec -T db mysqldump -u wp -pwp [project-name] > backups/backup_$(date +%Y%m%d_%H%M%S).sql

# WP-CLI
docker-compose run --rm wpcli [command]
```

### 4.4 PHP ini (dev)

**Файл:** `php.ini` (root, локально, НЕ в Git)

**Підключення (Docker):**
```yaml
volumes:
  - ./php.ini:/usr/local/etc/php/conf.d/zzz-local.ini:ro
```

**Примітка:** якщо Docker мапить `./wp` → `/var/www/html`, то локальні
`WP_HOME` і `WP_SITEURL` мають бути **без** `/wp`.

### 4.5 .env (доступи, локально)

**Файл:** `.env` (root, локально, НЕ в Git)

**Навіщо:** швидкий доступ для скриптів/інструментів (FTP/DB/Plesk).

**Обовʼязково заповнити при старті проекту:**
```
PROD_URL=https://example.com
FTP_HOST=...
FTP_USER=...
FTP_PASS=...
FTP_PATH=/httpdocs
PROD_DB_NAME=...
PROD_DB_USER=...
PROD_DB_PASS=...
PROD_DB_HOST=...
```

**Примітка:** `.env` — єдине місце для доступів/секретів (локально).

### 4.3 Локальні URL

| Сервіс | URL |
|--------|-----|
| WordPress | `http://localhost:[port]` |
| WP Admin | `http://localhost:[port]/wp-admin` |
| phpMyAdmin | `http://localhost:[port+1]` |

---

## 5. Deploy

### 5.1 Ланцюжок

```
Local → GitHub (main) → Plesk manual pull → Production
```

**З Git деплоїться:**
- Router (`index.php`, `.htaccess`)
- Themes, mu-plugins, custom plugins
- Maintenance page
- Config templates, documentation

**НЕ деплоїться з Git:**
- WordPress Core (встановлюється через Plesk)
- Uploads (залишаються на хостингу)
- `wp-config.php` (створюється вручну на хостингу)
- 3rd party plugins (встановлюються через WP Admin)

### 5.1a Production wp-config стандарт

**Обовʼязково для production (`/httpdocs/wp/wp-config.php`):**
- `WP_HOME` і `WP_SITEURL` **задати явно**
- Debug **логувати у файл**, але **не показувати на екрані**
- `SAVEQUERIES` = `false`

```php
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'log_errors', 'On' );
@ini_set( 'error_log', __DIR__ . '/php-error.log' );
define( 'SAVEQUERIES', false );

// Використовуй PROD_URL з .env (скопіюй значення вручну для production)
$prodUrl = 'https://example.com';

if ( ! defined( 'WP_HOME' ) ) {
	define( 'WP_HOME', $prodUrl );
}
if ( ! defined( 'WP_SITEURL' ) ) {
	define( 'WP_SITEURL', $prodUrl . '/wp' );
}
```

**Правило:** якщо WordPress фізично в `/wp`, то `WP_SITEURL` має містити `/wp`, а `WP_HOME` — ні.  
**Правило:** у SOP **не хардкодити домен** — брати значення з `.env` (PROD_URL) і вставляти вручну в production.

### 5.2 Plesk Git Setup

**Крок 1:** Plesk → Domains → [domain] → Git

**Крок 2:** Repository settings:
- URL: `https://github.com/[user]/[project-name].git`
- Branch: `main`
- Deploy to: `/httpdocs`
- **Mode: MANUAL** (спочатку завжди Manual!)

**Крок 3:** SSH Keys (якщо приватний repo):
1. Plesk → Generate Key Pair
2. Copy Public Key
3. GitHub → Settings → Deploy keys → Add
4. Allow write access: **NO**

**Крок 4:** Тестовий Pull (БЕЗ deploy):
- Plesk → Git → "Pull Updates"
- Перевірити Output log

**Крок 5:** Перший Deploy:
1. **Зробити backup production!**
2. Plesk → Git → "Deploy"
3. Перевірити сайт

**Крок 6:** Після стабільної роботи (1-2 дні):
- Mode: Manual → Automatic (опційно)

### 5.3 Post-Deploy Checklist

**Після кожного deploy:**
1. Перевірити головну сторінку
2. Перевірити ключові сторінки
3. **Elementor: Regenerate CSS** (wp-admin → Elementor → Tools)
4. Hard refresh браузера (Ctrl+Shift+R)
5. Перевірити на mobile
6. Check Console для JS errors

---

## 6. Режими роботи (Router)

### 6.1 Два режими

**MODE = 'maintenance'**
| Відвідувач | Бачить |
|------------|--------|
| Публічний | `/maintenance/index.html` |
| Адмін (залогінений) | WordPress |
| Прямий `/wp/*` | WordPress |

**MODE = 'live'**
| Відвідувач | Бачить |
|------------|--------|
| Усі | WordPress |

### 6.2 Як перемикати

**Через Git (рекомендовано):**
1. Edit `index.php`:
   ```php
   define('MODE', 'live'); // або 'maintenance'
   ```
2. Commit + Push
3. Plesk → Deploy

**На хостингу (аварійно):**
- Plesk File Manager → `/httpdocs/index.php` → Edit
- ⚠️ Буде перезаписано при наступному deploy!

### 6.3 Default MODE

| Ситуація | MODE |
|----------|------|
| Новий проект (bootstrap) | `'maintenance'` |
| Міграція живого сайту | `'live'` |
| Міграція сайту в розробці | `'maintenance'` |

**⚠️ При міграції живого сайту — завжди `MODE = 'live'`!**

---

## 7. База даних

### 7.1 Ключове правило

**Будь-який перенос БД = заміна URL.**

| Напрям | Заміна |
|--------|--------|
| Production → Local | `https://[domain]` → `http://localhost:[port]` |
| Local → Production | `http://localhost:[port]` → `https://[domain]` |

### 7.2 URL Replacement

**WP-CLI (рекомендовано):**
```bash
docker-compose run --rm wpcli search-replace \
  'http://localhost:[port]' 'https://[domain]' \
  --skip-columns=guid --all-tables \
  --export=/backups/production.sql
```

**Better Search Replace (плагін):**
1. WP Admin → Tools → Better Search Replace
2. Search: `http://localhost:[port]`
3. Replace: `https://[domain]`
4. Dry run спочатку!

### 7.3 Backup

**Перед будь-якими DB операціями:**
```bash
# Local
docker-compose exec -T db mysqldump -u [prod-db-user] -p[prod-db-pass] [prod-db-name] > backups/backup_$(date +%Y%m%d).sql

# Production
# Plesk → Databases → Export
# або phpMyAdmin → Export
```

---

## 8. Міграція існуючих проектів

### 8.1 Ознаки старого проекту

- Папка `wordpress/` замість `wp/`
- Немає router файлів в root
- Немає `maintenance/` папки
- Git містить uploads/, languages/, 3rd party plugins
- Шляхи `~/GitHub/` замість `~/Project/`

### 8.2 Процес міграції (10 фаз)

```
Phase 0: Backup & Documentation     ← Обов'язково!
Phase 1: Create New Files           ← Router, templates, docs
Phase 2: Git Cleanup                ← Видалити languages, plugins
Phase 3: Structure Migration        ← wordpress/ → wp/
Phase 4: Docker Update              ← Оновити paths
Phase 5: Local Testing              ← Перевірити все працює
Phase 6: Git Finalization           ← Commit, push
Phase 7: Plesk Setup                ← Git deploy (MANUAL)
Phase 8: Production Deploy          ← ⚠️ Критична фаза!
Phase 9: Validation                 ← Monitoring 24-48h
```

### 8.4 FTP → Local (короткий чекліст)

1. FTP mirror `/httpdocs` → `workspace/temp/ftp-mirror/`
2. Перемістити WordPress у `/wp`
3. Додати router `index.php` + root `.htaccess` (rewrite rules для `/wp`)
4. Докачати `uploads/` і **перевірити повну** докачку преміум-плагінів
5. Імпортувати БД локально
6. `search-replace` домену → `http://localhost:[port]`
7. Вимкнути maintenance-плагіни локально
8. Якщо Docker мапить `./wp` → `/var/www/html` → `WP_SITEURL` **без** `/wp`
9. Перевірити `/wp-admin` доступ

**Детальна інструкція:** див. `docs/MIGRATION.md`

### 8.3 Rollback Plan

**Level 1: Git Rollback**
```bash
git revert HEAD
git push origin main
# Plesk → Git → Deploy
```

**Level 2: Full Rollback (Files + DB)**
```bash
# Plesk Backup Manager → Restore
```

---

## 9. Документація проекту

### 9.1 ШІ створює ці файли:

**PROJECT.md** — база знань проекту:
```markdown
# PROJECT: [project-name]

## Snapshot
| Environment | URL | Status |
|-------------|-----|--------|
| Production | https://[domain] | 🟢 LIVE / 🔴 Down |
| Local | http://localhost:[port] | 🟢 Running |

## Project State
**Current: [BUILD/LANDING/LIVE]**

## Tech Stack
- WordPress: [version]
- PHP: [version]
- Theme: [name]
- Key plugins: [list]

## Changelog
| Date | Change | By |
|------|--------|----|
| YYYY-MM-DD | [description] | AI/Owner |

## Open Questions
1. [question]

## DB Sync Notes
| Date | Direction | Reason | Notes |
|------|-----------|--------|-------|

## Deploy Notes
[specific deploy instructions for this project]
```

**SERVER_RULES.md** — правила хостингу:
```markdown
# SERVER_RULES: [project-name]

## Hosting Structure
[опис структури на хостингу]

## Server Info
- IP: [ip]
- SSL: [provider]
- PHP: [version]
- DB: [type and version]

## Access
- FTP: [yes/no]
- SSH: [yes/no]
- Plesk Panel: [yes/no]

## Modes
[опис MODE switching для цього проекту]

## Go-Live Checklist
- [ ] Content ready
- [ ] SEO configured
- [ ] SSL active
- [ ] MODE = 'live'
- [ ] Tested

## Rollback Checklist
- [ ] MODE = 'maintenance'
- [ ] Identify issue
- [ ] Restore from backup if needed
```

### 9.2 ШІ оновлює документацію

**Коли оновлювати PROJECT.md:**
- Після додавання нових сервісів (Redis, CDN, etc.)
- Після структурних змін
- Після кожної важливої зміни → Changelog
- Якщо щось незрозуміло → Open Questions

**Commit разом:**
```bash
git add [changed-files] PROJECT.md
git commit -m "feat: add feature X

- Added X to Y
- Updated Z

Tech Stack updated in PROJECT.md"
```

---

## 10. Правила для ШІ

### 10.1 ШІ зобов'язаний

1. **Читати перед роботою:** `docs/README.md` → `docs/SOP.md` → `PROJECT.md`
2. **На старті проекту:** попросити доступи/вхідні дані; чутливі дані — у `.env` (root, локально, НЕ в Git)
3. **Після локального старту:** нагадати про Git init + remote + перший commit + Plesk Git (MANUAL)
4. **Вести PROJECT.md:** оновлювати Changelog, Tech Stack, Open Questions
5. **Коментарі в коді:** тільки англійською
6. **Готувати commit messages:** детально, з описом змін

### 10.2 ШІ заборонено

- `git push`, `git merge`, `git rebase`
- Критичні дії без підтвердження власника
- Додавати в Git заборонені файли
- Робити зміни без документації

### 10.3 STOP-RULE

**Зупинись і запитай власника якщо:**
- Інструкція неясна або двозначна
- Бракує даних для виконання
- Дія може вплинути на production
- Потрібен Git push
- Критична зміна (DB import, MODE change, wp-config.php)

### 10.4 Критичні дії (тільки з підтвердженням)

- DB import у production
- Зміна MODE на `'live'` (Go-Live)
- Зміни `wp-config.php` на хостингу
- Force push
- Видалення production files

---

## 11. Troubleshooting

### Білий екран після deploy

1. Перевірити `wp/wp-config.php` paths
2. Увімкнути debug: `define('WP_DEBUG', true);`
3. Перевірити `wp/wp-content/debug.log`

### Стилі зламані

1. **Elementor:** wp-admin → Elementor → Tools → Regenerate CSS
2. Hard refresh: Ctrl+Shift+R
3. Clear browser cache

### Docker volume issues

1. `docker volume ls`
2. `docker-compose down && docker-compose up -d`
3. Restore DB from `backups/`

### 404 після deploy

1. Перевірити `.htaccess` в `/httpdocs`
2. Перевірити `WP_SITEURL` в `wp-config.php`
3. Plesk → Apache settings

### Git не розпізнає rename

```bash
git config merge.renameLimit 999999
git add -A
```

---

## 12. Quick Reference

### Старт сесії

```bash
# 1. Перевірити Docker
docker ps

# 2. Запустити якщо потрібно
cd ~/Project/[project-name] && docker-compose up -d

# 3. Відкрити сайт
open http://localhost:[port]
```

### Commit workflow

```bash
# 1. Перевірити зміни
git status
git diff

# 2. Stage
git add [files]

# 3. Commit (виконує ШІ)
git commit -m "type: description

Details of what changed

Co-Authored-By: Claude <noreply@anthropic.com>"

# 4. Push (тільки власник — GitHub Desktop)
git push origin main
```

### Deploy workflow

```bash
# 1. Local testing complete
# 2. Owner pushes to GitHub
# 3. Plesk → Git → Pull Updates
# 4. Plesk → Git → Deploy (MANUAL)
# 5. Check production site
# 6. Elementor → Regenerate CSS
# 7. Update PROJECT.md
```

---

## Версія

| Версія | Дата | Зміни |
|--------|------|-------|
| 1.x | — | 2 репозиторії |
| 2.0 | 2025-01 | Монорепозиторій, router в Git |
| 2.1 | 2026-01 | Модульна структура |
| **3.0** | **2026-01** | **Універсальний SOP, один файл** |
| **3.1** | **2026-02** | **Папка docs/ як пакет, чекліст доступів, php.ini mount** |

---

**Цей документ — універсальний стандарт.**

Скопіюй папку `docs/` в новий проект → ШІ прочитає → зрозуміє як працювати.

Заміни плейсхолдери:
- `[project-name]` — назва проекту
- `[domain]` — домен (example.com)
- `[port]` — Docker порт (8080)
- `[user]` — GitHub username
