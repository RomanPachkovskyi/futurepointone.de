# Child Theme Setup Guide

## Quick Start

1. **Копіюй структуру** з попереднього проекту або створи нову:
   ```
   wp/wp-content/themes/[project-name]/
   ├── style.css
   ├── functions.php
   ├── assets/
   │   ├── css/custom.css
   │   └── js/custom.js
   ```

2. **Редагуй style.css header:**
   - Theme Name: [Project Name]
   - Theme URI: https://[domain]
   - Author: Munas-Print
   - Template: [parent-theme-slug]
   - Text Domain: [project-slug]

3. **Редагуй functions.php:**
   - Замінити префікс на `[project]_`
   - Оновити константи та namespace
   - Перевірити parent theme slug у dependencies

4. **Активація:**
   - WordPress Admin → Appearance → Themes
   - Activate child theme
   - Check site frontend
   - Elementor → Regenerate CSS

## Правила Custom Code

### CSS
- ✅ Тільки в `assets/css/custom.css`
- ❌ НЕ редагувати батьківську тему
- ❌ НЕ додавати CSS через Customizer (тільки для тестів)

### JavaScript
- ✅ Тільки в `assets/js/custom.js`
- ❌ НЕ додавати inline scripts в header/footer
- ✅ Використовувати jQuery через `(function($) {})(jQuery)`

### PHP Functions
- ✅ Додавати в `functions.php`
- ✅ Використовувати унікальний префікс: `[project]_function_name`
- ✅ Всі функції обгортати в `if ( ! function_exists() )`

### Template Overrides
- ✅ Копіювати файл з parent theme → child theme (зберігаючи структуру)
- ✅ Вести коментарі що саме змінено
- ⚠️ Використовувати тільки коли необхідно
- ✅ **Elementor-first**: спочатку спробувати через Elementor Theme Builder

## Elementor-First Підхід

**Пріоритет:** Elementor Theme Builder > Customizer > Child Theme Code

### Що робити в Elementor:
- ✅ Header/Footer шаблони → Elementor Theme Builder
- ✅ Single Post/Page layouts → Elementor Templates
- ✅ Archive layouts → Elementor Archive Templates
- ✅ Popup/модальні вікна → Elementor Popup Builder
- ✅ Кольори/типографіка → Elementor Site Settings

### Що робити в Child Theme:
- ✅ Глобальні CSS зміни (наприклад, змінні, що використовуються повсюди)
- ✅ Custom PHP функції (hooks, filters, post types)
- ✅ Enqueue scripts/styles
- ✅ Зміни, які неможливо зробити через Elementor

## Git Rules

Child theme **завжди в Git**:
```gitignore
# In .gitignore - allow child theme
!/wp/wp-content/themes/[project-name]/
!/wp/wp-content/themes/[project-name]/**
```

## Deployment

1. Local → GitHub
2. GitHub → Plesk
3. After deploy: Elementor → Regenerate CSS
4. Hard refresh browser (Ctrl+Shift+R)

## Troubleshooting

### Білий екран після активації
- Check `functions.php` syntax errors: `php -l functions.php`
- Enable debug: `WP_DEBUG`, check logs
- Деактивувати через DB: `wp theme activate [parent-theme]`

### Стилі не застосовуються
- Hard refresh: Ctrl+Shift+R
- Elementor → Regenerate CSS
- Check browser console for 404s
- Перевірити file permissions: `chmod 644 assets/css/custom.css`

### JS не працює
- Check browser console for errors
- Verify jQuery dependency в functions.php
- Check file paths (повинні бути відносні до theme URI)

### Parent theme styles пропали
- Перевірити dependencies: `array( 'parent-theme-handle' )`
- Перевірити enqueue priority: child = 20, parent = 10
- Очистити кеш: Elementor → Regenerate CSS

## PHP Syntax Validation (КРИТИЧНО!)

**Завжди** валідувати PHP перед активацією теми:

```bash
# Локально
php -l wp/wp-content/themes/[project-name]/functions.php

# Через Docker (якщо локальний PHP недоступний)
docker-compose exec -T wordpress php -l wp/wp-content/themes/[project-name]/functions.php
```

❌ **НІКОЛИ** не активувати тему якщо є syntax errors - це призведе до білого екрану!

## Шаблони

Використовуй готові шаблони з `docs/templates/child-theme/`:
- `style.css.template`
- `functions.php.template`
- `custom.css.template`
- `custom.js.template`

Замініть `{{PLACEHOLDERS}}` на реальні значення для проекту.
