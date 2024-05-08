# Zooey Changelog

## 1.0.5, 20240508

### Updated
- Removing obsolete block styles
- Localization

### File updates
	changelog.md
	style.css
	assets/scss/blocks.scss
	assets/scss/blocks/cover.scss
	assets/scss/blocks/post-excerpt.scss
	includes/Content/Block_Style.php
	languages/sk_SK.*
	languages/zooey.pot


## 1.0.4, 20240507

### Updated
- Improving patterns
- Sticky post CSS styles

### File updates
	changelog.md
	style.css
	assets/scss/blocks/post-template.scss
	patterns/site/taxonomy-category-select.php
	patterns/testimonials/testimonials-01.php


## 1.0.3, 20240505

### Fixed
- Localization issue introduced in version 1.0.2

### File updates
	changelog.md
	style.css
	includes/Customize/Options.php
	languages/sk_SK.*
	languages/zooey.pot


## 1.0.2, 20240505

### Added
- `show-if-no-logo` class functionality for Site Title block

### Updated
- Changing main font from Ubuntu to Ubuntu Sans
- Serving fonts locally from the theme
- Reorganizing code
- Fixing/improving JavaScript files dependencies
- Improving theme options
- Improving block patterns
- Localization

### File updates
	changelog.md
	style.css
	theme.json
	assets/scss/editor.scss
	assets/scss/global.scss
	assets/scss/blocks/site-title.scss
	includes/Assets/Editor.php
	includes/Content/Block.php
	includes/Customize/Options.php
	includes/Customize/Control/Text.php
	includes/Setup/Site_Editor.php
	languages/zooey.pot
	patterns/site/header-alt.php
	patterns/site/header.php


## 1.0.1, 20240504

### Added
- New intro pattern

### Updated
- Not hiding global styles elements color controls so user can still set "Link" color (other controls are obsolete)
- Improving patterns for demo website
- Removing WP.org not-allowed links
- Localization
- Screenshot

### Fixed
- Editor gradient control colors
- Pattern titles

### File updates
	changelog.md
	style.css
	includes/Assets/Editor.php
	includes/Content/Block_Pattern.php
	includes/Setup/Editor.php
	languages/sk_SK.*
	languages/zooey.pot
	patterns/intro/intro-01.php
	patterns/intro/intro-05.php
	patterns/intro/intro-06.php
	patterns/page/home-1.php
	patterns/site/footer.php
	patterns/site/header.php
	patterns/site/sidebar.php


## 1.0.0, 20240504

- Initial release.

### Updated

Starter theme prefix placeholders were replaced with these values:

| Placeholder  | Replacement  |
|--------------|--------------|
| `Themename`  | Zooey        |
| `theme-slug` | zooey        |
| `theme_slug` | zooey        |
| `THEME_SLUG` | ZOOEY        |
| `Theme_Slug` | Zooey        |
| `themeSlug`  | zooey        |
| `__1.0.0`    | 1.0.0        |
