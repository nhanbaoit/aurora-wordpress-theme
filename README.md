# Aurora — WordPress Redesign Theme

A clean, fast, fully responsive custom WordPress theme built as a portfolio piece for website redesign projects. It gives a content-driven WordPress site a modern visual identity while keeping **all existing content, menus and URLs untouched**.

> Full redesign brief covered: new visual style (colors, typography, spacing) applied site-wide, redesigned homepage / content / blog / contact pages, fully responsive on phones and tablets, clean optimized CSS.

## Highlights

- **Presentation-only redesign** — permalinks, menus, posts and pages stay exactly as they are. No URL changes, no redirects needed.
- **Design tokens** — all colors, typography and spacing are CSS custom properties. The accent color is changeable from the WordPress Customizer without touching code.
- **Fluid typography** — `clamp()` based type scale that scales smoothly between mobile and desktop.
- **Truly responsive** — 3 → 2 → 1 column grid, hamburger navigation below 768px, breakpoints at 64em / 48em / 30em, `prefers-reduced-motion` support.
- **Clean CSS** — one organized stylesheet, BEM naming, no framework, no page builder, no `!important`.
- **WordPress standards** — proper escaping/sanitizing everywhere, nonce-protected contact form, translation-ready (`aurora` text domain), GPL v2.

## What's inside

| File | Purpose |
|---|---|
| `style.css` | Theme declaration (required by WordPress) |
| `assets/css/main.css` | Full design system: tokens, layout, components, responsive rules |
| `assets/js/main.js` | Mobile nav toggle (Escape key + resize handling), sticky header — vanilla JS, zero dependencies |
| `functions.php` | Theme setup, asset enqueue, menus, widgets, Customizer settings (accent color + contact email), contact form handler |
| `header.php` / `footer.php` | Sticky header with dropdown nav, footer with menu |
| `front-page.php` | Homepage: hero + latest posts grid |
| `index.php` / `archive.php` | Blog index and archives with sidebar + pagination |
| `single.php` / `page.php` | Single post and static page templates |
| `page-contact.php` | "Contact Page" template: contact details + working mail form via `admin-post.php` |
| `template-parts/card.php` | Shared post card component |
| `preview/index.html` | Static HTML preview of the design (open in any browser, no WordPress needed) |

## Quick start

1. Copy the `aurora/` folder into `wp-content/themes/`.
2. WP Admin → **Appearance → Themes** → activate **Aurora**.
3. **Settings → Reading**: pick a static page as homepage (`front-page.php` takes over automatically).
4. Create a page named "Contact" and select the **Contact Page** template under Page Attributes.
5. **Appearance → Customize → Aurora Brand**: set the accent color and the email that receives contact messages.
6. Assign menus to the **Primary Menu** and **Footer Menu** locations.

## Preview

Open `preview/index.html` in any browser (no WordPress needed) to see the design instantly — resize the window to check the responsive behavior.

## Tech

- WordPress 6.0+, PHP 7.4+
- Vanilla HTML/CSS/JS — no build step, no dependencies
- Google Fonts: Fraunces (display) + Inter (body)

## License

GPL v2 or later — same as WordPress.
