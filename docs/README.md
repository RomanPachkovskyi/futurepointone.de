# AI Instructions

> **Entry point для ШІ (Claude, Cursor, Copilot, etc.)**

---

## Читай в такому порядку

1. **`docs/SOP.md`** — стандарт роботи (Git, Docker, Deploy, правила)
2. **`PROJECT.md`** — база знань цього проекту (статус, tech stack, changelog)

---

## Структура проекту

```
[project]/
├── index.php          ← Router
├── wp/                ← WordPress
├── maintenance/       ← Landing page
├── workspace/         ← Робоча папка (обмін файлами)
├── docker-compose.yml ← Docker config
├── PROJECT.md         ← База знань проекту
├── SERVER_RULES.md    ← Правила хостингу
├── .env               ← Доступи/секрети (локально, НЕ в Git)
└── docs/              ← Універсальні документи (entry point)
    ├── README.md      ← Ти тут
    ├── SOP.md         ← Стандарт роботи
    ├── MIGRATION.md   ← Migration guide
    └── Movefile       ← Movefile config
```

---

## Quick Start

```bash
# Перевірити Docker
docker ps

# Запустити
cd ~/Project/[project-name]
docker-compose up -d

# Відкрити
open http://localhost:[port]
```

---

## Доступи (локально)

Чутливі дані зберігай у `.env` (root, НЕ в Git).

---

## ШІ зобов'язаний

1. Читати `docs/SOP.md` і `PROJECT.md` перед роботою
2. Вести `PROJECT.md` (changelog, tech stack, open questions)
3. Коментарі в коді — тільки англійською
4. Готувати детальні commit messages

---

## ШІ заборонено

- `git push`, `git merge`, `git rebase` (тільки власник!)
- Критичні дії без підтвердження
- Зміни на production без тестування

---

## STOP-RULE

**Зупинись і запитай якщо:**
- Інструкція неясна
- Дія може вплинути на production
- Потрібен push або критична зміна

---

**Далі:** Читай `docs/SOP.md` → `PROJECT.md`
