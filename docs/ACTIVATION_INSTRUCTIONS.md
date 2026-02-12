# WordPress Theme Activation Instructions

## Placeholders

| Placeholder | Опис | Приклад |
|-------------|------|---------|
| `[domain]` | Домен сайту | `futurepointone.de` |
| `[project-slug]` | Child theme slug | `futurepointone` |
| `[parent-theme-handle]` | CSS/JS handle в parent theme | `cargo-trucking-frontend` |
| `[theme-options-prefix]` | DB prefix для theme options | `cmsmasters_cargo-trucking_` |

> **Примітка:** Parent theme папка завжди `munas-custom-theme`, але внутрішні defines, handles та DB prefixes зберігають оригінальну назву purchased theme.

---

## ФАЗА 6: WordPress Admin Activation

### Крок 1: Login to WordPress Admin

```
URL: https://[domain]/wp-admin
(або ваш локальний URL)
```

### Крок 2: Navigate to Themes

```
WordPress Admin → Appearance → Themes
```

Ви побачите:
- **munas-custom-theme** (parent theme — rebrand purchased theme)
- **[project-slug]** (child theme)
- Можливо інші default WordPress themes

### Крок 3: Activate Child Theme

**Клікніть "Activate" на child theme `[project-slug]`.**

WordPress автоматично:
- Активує child theme `[project-slug]`
- Встановить parent theme як `munas-custom-theme`
- Оновить database опції:
  - `template` = `munas-custom-theme`
  - `stylesheet` = `[project-slug]`

### Крок 4: Reactivate Companion Plugins (якщо CMSMasters theme)

> **CMSMasters Note:** CMSMasters companion plugins **автоматично деактивують себе** під час folder rename. Вони перевіряють наявність `CMSMASTERS_THEME_VERSION` на кожному `admin_init` — якщо parent theme хоча б на мить не loadable, плагін self-deactivates і НЕ включається назад автоматично.

Без цих плагінів: **header, footer і блоки не рендеруються**.

**Варіант 1 — Скрипт (якщо є):**
```bash
docker compose run --rm wpcli wp eval-file \
  /var/www/html/wp-content/themes/munas-custom-theme/admin/scripts/reactivate-cmsmasters-plugins.php \
  --allow-root
```

**Варіант 2 — Вручну:**
WordPress Admin → `Plugins` → Activate всі плагіни зі статусом Inactive.

**Verify:** Всі companion плагіни мають статус "Active".

> **Якщо НЕ CMSMasters theme** — цей крок можна пропустити. Перевірте чи всі плагіни активні.

### Крок 5: Verify Activation

Після активації перевірте:

**В WordPress Admin:**
- [ ] Child theme `[project-slug]` marked as "Active"
- [ ] `munas-custom-theme` shown as parent

---

## ФАЗА 7: Testing & Verification

### Frontend Tests

**1. Homepage:**
```
https://[domain]
```

Перевірити:
- [ ] Page loads without errors
- [ ] CSS styles applied correctly
- [ ] Images/logos display
- [ ] Navigation menu works
- [ ] Footer displays correctly

**2. Open Browser Console (F12):**
- [ ] No JavaScript errors
- [ ] No 404 errors for assets
- [ ] Check Network tab for failed requests

**3. Custom Post Types:**
- [ ] Services pages load
- [ ] Portfolio/Projects load (if applicable)
- [ ] Blog posts display

**4. WooCommerce (if applicable):**
- [ ] Shop page loads
- [ ] Product pages display
- [ ] Cart functionality works

### Admin Panel Tests

**1. Theme Options:**
```
WordPress Admin → Theme Options (or Customize)
```
- [ ] Panel loads without errors
- [ ] Settings display correctly
- [ ] Can save changes

**2. Customizer:**
```
WordPress Admin → Appearance → Customize
```
- [ ] Customizer loads
- [ ] Preview works
- [ ] Theme controls available

**3. Widgets:**
```
WordPress Admin → Appearance → Widgets
```
- [ ] Widget areas display
- [ ] Can add/remove widgets

**4. Menus:**
```
WordPress Admin → Appearance → Menus
```
- [ ] Can edit menus
- [ ] Menu locations available

### Elementor Tests (if used)

**1. Edit Page with Elementor:**
- [ ] Click "Edit with Elementor" on any page
- [ ] Editor loads without errors
- [ ] Preview mode works

**2. Theme Styles (Kits):**
```
Elementor → Site Settings → Global Colors/Fonts
```
- [ ] Theme colors available
- [ ] Theme fonts available
- [ ] Custom controls visible

**3. Custom Widgets:**
- [ ] Theme-specific widgets available in Elementor panel
- [ ] Custom controls work

### Plugin Compatibility

Verify критичні plugins:
- [ ] Companion plugins — Active & working
- [ ] **Advanced Custom Fields** (if used) — Fields display
- [ ] **Forminator** (if used) — Forms work
- [ ] **Contact Form 7** (if used) — Forms work

### Technical Verification

**1. Check Enqueued Assets:**

Open Browser DevTools → Network tab:

Verify що завантажуються:
- [ ] `[parent-theme-handle].css` (parent theme CSS)
- [ ] `[parent-theme-handle].js` (parent theme JS)
- [ ] `[project-slug]/style.css` (child theme)
- [ ] `[project-slug]/assets/css/custom.css`
- [ ] `[project-slug]/assets/js/custom.js`

**2. Check HTML Source:**

Right-click → View Page Source

Verify в `<head>`:
```html
<link ... href=".../themes/munas-custom-theme/assets/..." />
<link ... href=".../themes/[project-slug]/assets/..." />
```

**3. WordPress CLI Verification (optional):**

```bash
# Check active themes
docker compose run --rm wpcli theme list --status=active

# Should show:
# [project-slug]  active  1.0.0
# (with parent: munas-custom-theme)
```

---

## Troubleshooting

### Issue: "The parent theme is missing"

**Error Message:** "The parent theme is missing. Please install the 'munas-custom-theme' parent theme."

**Причина:** WordPress не знайшов parent theme folder

**Рішення:**
1. Перевірити що папка існує: `wp/wp-content/themes/munas-custom-theme/`
2. Перевірити `Template:` в child theme style.css має бути `munas-custom-theme`
3. Refresh themes page (Ctrl+F5)

### Issue: CSS не завантажується

**Symptom:** Site виглядає "ламано", без стилів

**Рішення:**
1. Clear browser cache (Ctrl+Shift+Del)
2. Clear WordPress cache:
   ```bash
   docker compose run --rm wpcli cache flush
   docker compose run --rm wpcli transient delete --all
   ```
3. Disable any caching plugins temporarily
4. Check Browser Console для 404 errors

### Issue: "Template missing" errors

**Error:** "Template file missing: header.php, footer.php, etc."

**Причина:** Parent theme files не знайдені

**Рішення:**
1. Verify папка повністю перейменована (всі files intact)
2. Check file permissions: `chmod -R 755 wp/wp-content/themes/munas-custom-theme`
3. Verify symlinks працюють (if applicable)

### Issue: Elementor не працює

**Symptom:** "Edit with Elementor" не завантажується

**Рішення:**
1. Deactivate & reactivate Elementor plugin
2. Regenerate Elementor CSS:
   ```
   Elementor → Tools → Regenerate CSS
   ```
3. Clear Elementor cache:
   ```
   Elementor → Tools → Clear Cache
   ```
4. Verify companion Elementor addon is active

### Issue: Theme Options порожній

**Symptom:** Theme Options panel показує defaults або порожній

**Рішення:**
- Перевірити що внутрішні defines (theme name, options prefix) **не змінені** — вони мають зберігати оригінальну назву purchased theme
- Якщо settings загубилися — restore з backup database

### Issue: Header/Footer зникли (CMSMasters)

**Причина:** Companion plugins auto-deactivated. Див. Крок 4 вище.

**Рішення:** Reactivate companion plugins.

---

## Performance Monitoring

### Перші 24 години

**Monitor:**
- [ ] WordPress debug log: `wp-content/debug.log`
- [ ] Page load times (compare with before)
- [ ] Browser Console for JS errors

**Quick Performance Check:**
```bash
# Measure page load time
curl -o /dev/null -s -w "Time: %{time_total}s\n" https://[domain]

# Check for PHP errors (Docker)
docker compose exec -T wordpress tail -50 /var/www/html/wp-content/debug.log
```

### Week 1 Monitoring

- [ ] Day 1: Immediate monitoring (every hour)
- [ ] Day 2-3: Check 2-3 times per day
- [ ] Day 4-7: Daily check
- [ ] Week 2+: Normal monitoring schedule

---

## Rollback Instructions (if needed)

### Quick Rollback

```bash
# 1. Restore from git tag
git reset --hard pre-rename-backup

# 2. Restore database (if needed)
docker compose run --rm wpcli db import backups/backup-before-rename-YYYYMMDD-HHMMSS.sql

# 3. Clear caches
docker compose run --rm wpcli cache flush

# 4. Refresh WordPress Admin → Themes
# 5. Activate child theme
```

**Time to rollback:** ~5 хвилин

---

## Success Checklist

Після успішної активації та тестування:

- [ ] Site loads без помилок
- [ ] All pages accessible
- [ ] CSS/JS працює
- [ ] Navigation menus work
- [ ] Elementor editor functional (if used)
- [ ] Theme Options accessible
- [ ] All plugins compatible
- [ ] No errors in Browser Console
- [ ] No errors in WordPress debug log
- [ ] Performance acceptable
- [ ] Documentation updated

---

**Останнє оновлення:** 2026-02
**Версія інструкції:** 2.0 (universal)
**Автор:** Munas-Print
