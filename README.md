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

### Colors
- `#0f1611`, `#00352f`, `#00594f`, `#92f6f8`, `#6a6e6b`, `#d3b89a`
- **Standard Border:** `#92f6f8 / 0.3`

### Typography
- **Font:** Inter (Google Fonts) - use `font-body` class
- **Weights:** 300, 400, 500, 600

### Icons
- **Library:** Phosphor Icons (Light weight only) - https://phosphoricons.com/?weight=light
- **Usage:** `<i class="ph ph-house text-cyan"></i>`

### Layout
- **Backgrounds:** Full viewport width
- **Container Max Width:** 1440px (inner content)
- **Flexible Width:** Some containers may be narrower based on design requirements

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
