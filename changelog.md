# Zooey Changelog

## 1.1.1, 20240531

### Added
- Custom aspect ratios to `theme.json`

### Updated
- Theme description text
- Patterns
- Starter content
- Localization

### File updates
	changelog.md
	style.css
	readme.txt
	theme.json
	includes/Content/Starter.php
	languages/sk_SK.*
	languages/zooey.pot
	patterns/intro/intro-06.php


## 1.1.0, 20240530

### Updated
- `theme.json` to version 3
- CSS styles
- Editor UI CSS styles
- Improving auto-calculated CSS variables setup
- Theme description text (the first sentence is used at WPORG theme preview as tagline)
- Localization

### Fixed
- Making the theme compatible with current Gutenberg 18.4.1 plugin (for WPORG theme preview):
	- Improving CSS variables root selector setup
	- Fixing issues with WordPress CSS specificity (due to using `:where()`)
	- Applying z-index on negative margin blocks
	- Fixing CSS styles
	- Removing "Dark" (any, all) global styles as they caused color issues on WPORG theme preview website (theme CSS variables were calculated as if the "Dark" global style was active, even though the default style was in use)
	- Logging Gutenberg issue tickets where needed
- Adding missing auto-calculated CSS variables
- Starter content home template
- Displaying site title in footer when no logo image set
- Patterns

### File updates
	changelog.md
	style.css
	readme.txt
	theme.json
	assets/js/customize-preview.js
	assets/scss/blocks-editor.scss
	assets/scss/blocks.scss
	assets/scss/editor-ui.scss
	assets/scss/editor.scss
	assets/scss/global.scss
	assets/scss/blocks/pullquote.scss
	assets/scss/blocks/search.scss
	assets/scss/blocks/site-title.scss
	includes/Assets/Editor.php
	includes/Content/Starter.php
	includes/Customize/CSS_Variables.php
	includes/Customize/Options.php
	includes/Customize/Preview.php
	includes/Customize/RGBA.php
	includes/Customize/Styles.php
	includes/Header/Body_Class.php
	languages/sk_SK.*
	languages/zooey.pot
	patterns/intro/intro-03.php
	patterns/site/footer.php
	patterns/site/header.php


## 1.0.7, 20240527

### Added
- Gradients and duotones from primary and secondary colors

### Updated
- Improving and fixing CSS styles
- Improving code organization
- Block modifications
- Custom settings in `theme.json`
- Improving theme options code
- Replacing text arrows with SVG
- Block styles
- Welcome page
- Localization
- Removing `accessibility-ready` tag to speed up theme review process

### Fixed
- Navigation block HTML modifications

### File updates
	changelog.md
	style.css
	theme.json
	assets/js/block-mods.js
	assets/scss/blocks.scss
	assets/scss/global.scss
	assets/scss/welcome.scss
	assets/scss/_extend/_others.scss
	assets/scss/blocks/button.scss
	assets/scss/blocks/calendar.scss
	assets/scss/blocks/code.scss
	assets/scss/blocks/comments.scss
	assets/scss/blocks/cover.scss
	assets/scss/blocks/file.scss
	assets/scss/blocks/group.scss
	assets/scss/blocks/latest-comments.scss
	assets/scss/blocks/latest-posts.scss
	assets/scss/blocks/navigation-link.scss
	assets/scss/blocks/navigation-submenu.scss
	assets/scss/blocks/navigation.scss
	assets/scss/blocks/page-list.scss
	assets/scss/blocks/post-author.scss
	assets/scss/blocks/post-excerpt.scss
	assets/scss/blocks/post-navigation-link.scss
	assets/scss/blocks/post-template.scss
	assets/scss/blocks/post-terms.scss
	assets/scss/blocks/rss.scss
	assets/scss/blocks/search.scss
	assets/scss/blocks/tag-cloud.scss
	includes/Autoload.php
	includes/Content/Block.php
	includes/Content/Block_Style.php
	includes/Customize/Options.php
	includes/Entry/Navigation.php
	includes/Loop/Pagination.php
	includes/Menu/Component.php
	includes/Setup/Component.php
	includes/Setup/Media.php
	includes/Tool/Arrow.php
	languages/*.*
	parts/admin/welcome-demo.php


## 1.0.6, 20240511

### Added
- Black and white gradients

### Updated
- Localization

### Fixed
- Block styles names
- Gradient control compatibility

### File updates
	changelog.md
	style.css
	theme.json
	includes/Content/Block_Style.php
	includes/Setup/Editor.php
	languages/zooey.pot


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
