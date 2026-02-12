# Child Theme Templates

Ці шаблони використовуються для швидкого створення child theme для нових проектів.

## Placeholders

Замініть наступні placeholder-и на реальні значення:

| Placeholder | Приклад значення | Опис |
|-------------|------------------|------|
| `{{PROJECT_NAME}}` | `Future Point One` | Human-readable назва проекту |
| `{{PROJECT_SLUG}}` | `futurepointone` | URL-friendly slug (lowercase, дефіси) |
| `{{PROJECT_PREFIX}}` | `fpo` | PHP функції префікс (lowercase, без дефісів) |
| `{{PROJECT_PREFIX_UPPER}}` | `FPO` | PHP константи префікс (UPPERCASE) |
| `{{PARENT_THEME}}` | `munas-custom-theme` | Parent theme folder name (завжди `munas-custom-theme`) |
| `{{DOMAIN}}` | `futurepointone.de` | Домен сайту |
| `{{AUTHOR}}` | `Munas-Print` | Автор теми |
| `{{VERSION}}` | `1.0.0` | Початкова версія |

## Використання

### Спосіб 1: Ручне копіювання

1. Копіювати файли з `templates/child-theme/` до робочої директорії
2. Перейменувати `.template` файли (прибрати `.template` суфікс)
3. Find & Replace всіх `{{PLACEHOLDERS}}` на реальні значення
4. Створити структуру `wp/wp-content/themes/{{PROJECT_SLUG}}/`
5. Скопіювати заповнені файли в theme директорію
6. Валідувати PHP: `php -l functions.php`
7. Активувати в WordPress Admin

### Спосіб 2: Автоматизований (якщо є скрипт)

```bash
# TODO: створити скрипт для автоматичної генерації child theme
./scripts/create-child-theme.sh [project-slug] [parent-theme]
```

## Важливо

**ЗАВЖДИ** перевірити parent theme handles перед використанням!

Знайти реальні handles в parent theme:
```bash
# Знайти enqueue calls в parent theme
grep -r "wp_enqueue_style\|wp_enqueue_script" wp/wp-content/themes/munas-custom-theme/
```

Оновити в `functions.php.template`:
- `array( '{{PARENT_THEME}}-frontend' )` → реальний handle parent CSS
- `array( 'jquery', '{{PARENT_THEME}}-frontend' )` → реальний handle parent JS

**Примітка:** `{{PARENT_THEME}}` в handles — це **оригінальний slug** purchased theme (наприклад `cargo-trucking`, `vintech`), тому що internal enqueue handles зберігають оригінальну назву. Папка теми завжди `munas-custom-theme`, але handles всередині — оригінальні.

## Структура Child Theme

```
wp/wp-content/themes/{{PROJECT_SLUG}}/
├── style.css                    ← Theme header (з style.css.template)
├── functions.php                ← Enqueue + functions (з functions.php.template)
├── assets/
│   ├── css/
│   │   └── custom.css          ← Custom styles (з custom.css.template)
│   └── js/
│       └── custom.js           ← Custom scripts (з custom.js.template)
└── screenshot.png/jpg          ← Опціонально (1200×900px)
```

## Після створення

1. ✅ Валідувати PHP: `php -l functions.php`
2. ✅ Активувати child theme в WordPress Admin
3. ✅ Перевірити сайт (frontend)
4. ✅ Elementor → Regenerate CSS
5. ✅ Hard refresh браузера (Ctrl+Shift+R)
6. ✅ Перевірити browser console (F12) на помилки
7. ✅ Git commit
