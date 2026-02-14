# Chronevo - Website Redesign & Redevelopment

## Project Overview

Custom WordPress theme for **Chronevo.com** - creative agency bridging professional services with automotive enthusiast platform (Supercarbaldie brand). Target: B2B clients and automotive enthusiasts in luxury market niche.

**Core Values:** Story-driven design, high-quality visual content (photography/video), technical expertise with creative passion.

**Visual Identity:** Elegant, premium, minimal aesthetic with high-contrast, low-saturation design. Primary color used sparingly as luxury accent.

---

## Design System

### Brand Colors

**Primary:** `#DCAF47` | **Secondary:** `#BCBDC0`

### Color Tokens

**Primary Scale:** `primary-900` (`#8C7325`) active/pressed → `primary-700` (`#B89438`) hover → `primary-500` (`#DCAF47`) default → `primary-300` (`#E8CD85`) accents → `primary-100` (`#F6EFD7`) backgrounds

**Secondary Scale:** `secondary-900` (`#4F5053`) text → `secondary-700` (`#7A7C80`) secondary text → `secondary-500` (`#BCBDC0`) neutral → `secondary-300` (`#E1E2E4`) borders → `secondary-100` (`#F6F7F8`) page background

### Color Usage

**Primary (#DCAF47):** ✅ CTAs, active states, highlights (icons, dividers, metrics) | ❌ Body text, large backgrounds | Use darker variants for hover/active

**Secondary (#BCBDC0):** Neutral surfaces, borders/dividers, disabled states, secondary backgrounds

**Accessibility:** WCAG AA contrast required. No white text on primary-500. Use secondary-900+ on light surfaces. Primary is accent-only.

### Typography

**Font:** Modern sans-serif (Inter / SF Pro / Helvetica Neue), fallback Arial.

**Hierarchy:** Headings (H1–H4) 600–700 weight, `secondary-900` | Body 400–500 weight, `secondary-700` | Muted 400 weight, `secondary-500` | Primary color only for short inline emphasis/numeric highlights

### Components

**Primary Button:** `primary-500` bg, `secondary-900` text | Hover `primary-700` | Active `primary-900` | Disabled `primary-100` bg + `secondary-300` text

**Secondary Button:** Transparent bg, `secondary-300` border, `secondary-700` text | Hover `secondary-100` bg

**Forms:** White input bg, `secondary-300` border | Focus ring `primary-500` 40% opacity, 2px | Error: standard red

**Cards & Surfaces:** Page `secondary-100` | Card white, `secondary-300` borders | Optional 1–2px `primary-500` accent line

**Icons:** Phosphor Icons (Light) - https://phosphoricons.com/?weight=light | Default `secondary-700`, Active `primary-500` | Stroke-based, avoid multi-color | `<i class="ph ph-house"></i>`

### Layout & Spacing

4pt spacing system: 4 / 8 / 12 / 16 / 24 / 32 / 48 / 64 | Container max 1440px | Full viewport backgrounds | Favor whitespace, avoid dense layouts

### Motion

150–250ms transitions, ease-out easing | No playful/bouncy animations | Restrained, premium feel

---

## Technical Stack

**Platform:** WordPress (`wp-content/themes/chronevo`), PHP 8.0+, MySQL, Apache

**Frontend:** Tailwind CSS CDN (`https://cdn.tailwindcss.com`), custom CSS `./assets/css/main.css` only if Tailwind fails | Vanilla JS (ES6+) `./assets/js/main.js` | No inline CSS/scripts, no `!important`

**File Structure:**
```
wp-content/themes/chronevo/  [Theme files only]
./assets/                    [CSS, JS, images - NEVER in theme/assets/]
./_db/                       [Database schema]
./media/                     [WordPress uploads when UPLOADS is set to 'media']
```

**⚠️ CRITICAL:** All assets MUST be in `./assets/*` - NEVER in `wp-content/themes/chronevo/assets/*`

**Tracked in Git (add, commit, push):** `wp-content/themes/chronevo/`, `./assets/`, `./_db/`, `./media/`, and `wp-config.php` when changed. Do **not** commit `wp-admin/` or `wp-includes/` (core).

---

## Development Standards

### File Management

Modify ONLY `wp-content/themes/chronevo` | Never delete without permission | Use native WordPress functions first

### HTML Structure

**MANDATORY:** Every element MUST have unique `ref-*` class (e.g., `ref-login-btn`)

- `ref-*` for identification ONLY (not CSS/JS selectors)
- Place `ref-*` first in class attribute (not IDs)
- Example: `class="ref-login-btn w-full px-4 py-3"`
- IDs only when required for functionality

### Functionality & Interactions

**MANDATORY:** Use AJAX for all functionalities (unless page refresh required)

- WordPress AJAX hooks: `wp_ajax_`, `wp_ajax_nopriv_`
- Error handling, user feedback, loading states (disable buttons, show "Sending...")

### Page Transitions

**MANDATORY:** All page changes require:
- Small grey circled loader with smooth transition
- Fadeout effect for next page
- Apply to all pages

### Code Quality

Build from scratch (no reused elements) | Optimize performance (lazy loading, code splitting, asset optimization) | Clear product copy | Responsive (mobile, tablet, desktop)

---

## Git Workflow

1. Review repo
2. Add **tracked** paths only: `wp-content/themes/chronevo/`, `./assets/`, `./_db/`, `./media/`, `README.md`, and `wp-config.php` if modified
3. Commit with message
4. **Pre-Push:** Remove all `console.log()` and `error.log()` testing codes
5. Push to origin/master
