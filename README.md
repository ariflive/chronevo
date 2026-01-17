# Chronevo - Website Redesign & Redevelopment

## Project Overview

Complete redesign and redevelopment of **Chronevo.com** from scratch. Custom WordPress theme with clean, minimal aesthetic and high-contrast design tailored to Chronevo's creative identity.

**Business Model:** Bridges professional creative agency services with an automotive enthusiast platform, leveraging the Supercarbaldie brand to attract both B2B clients and automotive enthusiasts.

**Core Values:**
- Story-driven design approach
- High-quality visual content (photography and video)
- Combining technical expertise with creative passion
- Focus on the automotive luxury market niche

**Competitors for Review:**
- **Regional/UAE:** carbookmagazine.com, maqina.com, motoringme.com, middleeastcar.com, automiddleeast.com, motor283.com, gulfinsider.com
- **International:** topgear.com, autocar.co.uk, motortrend.com, caranddriver.com

---

## Design System

### Brand Colors

**Primary:** `#DCAF47`

**Secondary:** `#BCBDC0`

### Color Usage Rules

#### Primary (#DCAF47)
- **Use only for:**
  - Primary CTAs
  - Active states
  - Key highlights (icons, dividers, metrics)
- **Never use for:**
  - Body text
  - Large background fills
- Use darker variants for hover/active states.

#### Secondary (#BCBDC0)
- **Use for:**
  - Neutral UI surfaces
  - Borders and dividers
  - Disabled states
  - Secondary text backgrounds

### Derived Color Tokens (Must Be Used)

#### Primary Scale
- `primary-900`: `#8C7325` — active / pressed
- `primary-700`: `#B89438` — hover
- `primary-500`: `#DCAF47` — default
- `primary-300`: `#E8CD85` — subtle accents
- `primary-100`: `#F6EFD7` — background accents

#### Secondary Scale
- `secondary-900`: `#4F5053` — primary text
- `secondary-700`: `#7A7C80` — secondary text
- `secondary-500`: `#BCBDC0` — default neutral
- `secondary-300`: `#E1E2E4` — borders/dividers
- `secondary-100`: `#F6F7F8` — page background

### Accessibility
- All text must meet WCAG AA contrast.
- Do not place white text on primary-500.
- Use secondary-900 or darker text on light surfaces.
- Primary color is accent-only, never dominant.

### Typography

#### Font
- Use a modern sans-serif system font (Inter / SF Pro / Helvetica Neue).
- Fallback: Arial, sans-serif.

#### Text Hierarchy
- **Headings (H1–H4):**
  - Weight: 600–700
  - Color: secondary-900
- **Body text:**
  - Weight: 400–500
  - Color: secondary-700
- **Muted / helper text:**
  - Weight: 400
  - Color: secondary-500
- Primary color may be used only for short inline emphasis or numeric highlights.

### Buttons

#### Primary Button
- Background: primary-500
- Text: secondary-900
- Hover: primary-700
- Active: primary-900
- Disabled: primary-100 background + secondary-300 text

#### Secondary Button
- Background: transparent
- Border: secondary-300
- Text: secondary-700
- Hover background: secondary-100

### Forms
- Input background: white
- Border: secondary-300
- Focus ring: primary-500 at 40% opacity, 2px
- Error states use standard red (not derived from primary)

### Layout & Spacing
- Use a 4pt spacing system: 4 / 8 / 12 / 16 / 24 / 32 / 48 / 64
- Favor whitespace over color fills.
- Avoid dense or compact layouts.
- **Container Max Width:** 1440px (inner content)
- **Backgrounds:** Full viewport width
- **Flexible Width:** Some containers may be narrower based on design requirements

### Cards & Surfaces
- Page background: secondary-100
- Card background: white
- Borders: secondary-300
- Optional accent: 1–2px line in primary-500

### Icons
- **Library:** Phosphor Icons (Light weight only) - https://phosphoricons.com/?weight=light
- Default color: secondary-700
- Active/selected: primary-500
- Use stroke-based icons where possible.
- Avoid multi-color icons.
- **Usage:** `<i class="ph ph-house"></i>`

### Motion
- Transition duration: 150–250ms
- Easing: ease-out
- No playful or bouncy animations.
- Motion should feel restrained and premium.

### Visual Tone
- Elegant
- Premium
- Minimal
- High-contrast, low-saturation
- Primary color used sparingly as a luxury accent

---

## Technical Stack

### Platform
- **CMS:** WordPress
- **Custom Theme:** `wp-content/themes/chronevo`
- **Backend:** PHP 8.0+, MySQL, Apache

### Frontend
- **CSS:** Tailwind CSS via CDN (`https://cdn.tailwindcss.com`). Custom CSS in `./assets/css/main.css` only if Tailwind fails
- **JavaScript:** Vanilla JS (ES6+) only. Location: `./assets/js/main.js`
- **Rules:** No inline CSS/scripts, no `!important` declarations

### File Structure & Assets
```
wp-content/themes/chronevo/
└── [WordPress theme files only]

./assets/
├── css/main.css
├── js/main.js
└── images/
```

**IMPORTANT:** All assets (CSS, JS, images) MUST be stored in `./assets/*` - NEVER in `wp-content/themes/chronevo/assets/*`. Database schema: `./_db/*`

---

## Development Standards

### File Management
- **Modify ONLY files in:** `wp-content/themes/chronevo`
- **Never delete files** without permission
- **Always use native WordPress functions** before custom solutions

### HTML Structure
- **MANDATORY:** Every HTML element MUST have a unique reference class prefixed with `ref-` (e.g., `ref-login-btn`, `ref-hero-container`)
- **ref- classes are for identification ONLY** - DO NOT use for CSS styling or JS selectors
- **Place `ref-*` classnames ONLY in class attribute** (NOT in element IDs)
- **Always position `class="ref-*"` first**, followed by other classes (e.g., `class="ref-login-btn w-full px-4 py-3"`)
- **Use IDs only when required** for specific functionality

### Functionality & Interactions
- **MANDATORY:** Always use AJAX request/response for functionalities, unless page refresh or change is required
- **Use WordPress AJAX hooks** (`wp_ajax_` and `wp_ajax_nopriv_`) for server-side handling
- **Implement proper error handling, user feedback, and loading states** during AJAX operations (e.g., disable buttons, show "Sending..." text)

### Page Transitions
- **MANDATORY:** All page changes/transitions must include:
  - Small grey, less prominent circled loader with smooth transition
  - Next page shown with fadeout effect
- **Apply to all new and existing pages**

### Code Quality & Best Practices
- **Build from scratch** - No reused elements from current website
- **Brand alignment** - All design elements reflect Chronevo's creative identity
- **Propose simplified versions** of complex flows using minimal steps
- **Optimize page performance** (lazy loading, code splitting, asset optimization)
- **Write clear, usable product copy**
- **Optimize CTA placement** and follow button hierarchy with proper interaction states
- **Follow responsive layout rules** for mobile, tablet, desktop

---

## Git Workflow

1. **Review repo**
2. **Add all changes**
3. **Commit with message**
4. **Pre-Push Checklist:** Search for and remove all `console.log()` and `error.log()` WP/PHP server-side testing codes
5. **Push to origin/master**
