# Zooey Changelog

## 2.0.5, 20260807

As the code was ported from Ileana 2.0.5, we skip Zooey version number 2.0.0 - 2.0.4 to match versioning with those themes.

This major theme update may cause 2 issues on an existing website:
	1. Icon images duotone not working correctly.
	   SOLUTION: Change "Primary"/"Secondary" duotone to "Primary, secondary"/"Secondary, primary".
	2. Broken image URL (when theme demo images used).
	   SOLUTION: Update the content to use your custom images. Or switch the block editor to code view and change 
	   `ileana/assets/images/starter/` to `ileana/assets/images/demo/`.
	3. Optionally update WooCommerce Cart and Checkout page content for new WooCommerce block content versions.
	   SOLUTION: Use patterns in "Page" category: simply delete the old page content and add new one.

### Added
- Icon block support
- Changelog viewer on Welcome page
- Compatibility with setting up fonts in classic theme mode (WordPress 7.0)
- Tag Cloud block font size setup (useful for block styles)
- CSS `accent-color` style
- "Inset" box shadow preset to block editor
- "Decorative" border radius preset to block editor
- Support for "vmax", "svh", "lvh", and "dvh" units in block editor
- New block patterns and block styles
- Mobile header patterns
- New duotones and gradients (to use in block editor)
- "Disable sticky position on mobile screens" block style for Group block
- "Navigation overlay" (WordPress 7.0) template part and pattern
- Related posts functionality
- New predefined styles and typography presets (for easier theme styling via Site Editor)
- Theme option to set various blog layouts
- Theme option to apply blog layout to archive pages
- Theme option to set "Decorative" border radius size globally
- Theme option to toggle theme auto-generated gradients
- Theme option to toggle block patterns (individually or whole pattern categories)
- Theme option to set single product layout variation (WooCommerce)
- View Transitions plugin, and Carousel Slider Block plugin compatibility
- Block editor rich text inline formats for accessibility
- Making special product list design available for any custom post loop

### Updated
- WordPress 7.0 compatibility
- Loading remote Welcome page features images
- Improving JavaScript
- Improving code organization
- Welcome page content and styles
- Improving blocks
- Starter (and demo) content
- Customizer functionality
- Improving theme options
- Disabling WordPress color palette by default
- Allowing additional colors via child theme
- Improving Navigation block output and styles
- Improving KSES and security
- Improving block patterns
- Improving auto-generated gradients and duotones from theme color palette
- Removing `condition` block attribute functionality
- Improving and fixing CSS styles
- Improving custom background (Customizer) functionality
- Using `color-mix` for border color and shaded background color
- Improving accessibility (visible mobile navigation submenus, color contrast calculation, skip links, `content` CSS values, removing `speak` CSS style)
- Improving compatibility with PHP8
- Improving and fixing button styles
- Removing obsolete code and adding helpful code comments
- Updating SCSS code
- Improving performance (using cached data wherever possible)
- Improving `theme.json/settings.custom` section for setting up various theme CSS variables (styles)
- Using border radius presets in patterns (instead of hard-coded values)
- Improving sticky position and page scroll offset
- Theme upgrade functionality
- WooCommerce: Updating products list design
- WooCommerce: Using WooCommerce blocks to display shop layouts
- WooCommerce: Using Product Collection block where appropriate
- WooCommerce: Optimizing and adding new Product Collection block variations
- WooCommerce: Improving and fixing styles
- Improving accessibility (passing updated WordPress accessibility requirements):
	- adding `accessibility.txt`,
	- updating button focus outline (and removing `.has-focus-alt` class),
	- updating `.screen-reader-text` class styles,
	- styling `:focus-visible` instead of `:focus`,
	- adding aria label for outbound links,
	- removing no-wrap styles from Site Title block,
	- changing "Read more" text in block patterns for "Change this text",
	- applying `aria-hidden="true"` on decorative arrow in "To the top" link,
	- adding `aria-label` to all navigational menus.
- Theme description text in `style.css`
- Enabling text indent in `theme.json`
- Improving WooCommerce options
- Removing obsolete code
- Using more suitable localization escaping functions
- Localization

### Fixed
- Improved compatibility with child themes and local development
- Using filter hook instead of action hook in Editor component
- Google Fonts functionality
- Scrollbar width CSS variable name
- Block variations Query block attributes
- Preventing Navigation block font size stacking issue (https://github.com/WordPress/gutenberg/issues/76416)
- Allowing styling buttons via Site Editor (to some extent)
- Patterns preview display
- Block patterns
- Button styling priority (button block → global styles → theme options)
- Decorative quotation mark setup (and localization/translation)
- Mobile navigation overlay automatic text color
- WooCommerce: Forcing Mini Cart block badge colors with CSS (as there is an issue with these colors in WooCommerce)
- Removing link from Cover block featured image when on singular page/post
- Flushing demo values cache on Customizer update

### File updates



## 1.2.5, 20260525

### Updated
- Removing `accessibility-ready` tag temporarily (until the theme passes new requirements)
- Theme description in `style.css`
- Improving skip links
- Updating `themedemos.webmandesign.eu` links
- Localization

### Fixed
- Accessibility issues reported at https://themes.trac.wordpress.org/ticket/270223#comment:3
- Search Query template

### File updates
	changelog.md
	readme.txt
	style.css
	theme.json
	assets/js/rich-text-format.js
	assets/scss/blocks.scss
	assets/scss/editor.scss
	assets/scss/global.scss
	assets/scss/blocks/button.scss
	assets/scss/blocks/site-title.scss
	includes/Content/Block.php
	includes/Content/Block_Pattern.php
	includes/Customize/Options.php
	languages/*.*
	parts/accessibility/menu-skip-links.php
	patterns/numbers/numbers-05.php
	patterns/portfolio/portfolio-00.php
	patterns/services/services-06.php
	patterns/site/footer-centered.php
	patterns/site/footer-minimal.php
	patterns/site/footer.php
	patterns/site/header-alt.php
	patterns/site/header.php
	patterns/site/query-search.php


## 1.2.4, 20260506

### Added
- `accessibility.txt` file

### File updates
	changelog.md
	style.css
	accessibility.txt


## 1.2.3, 20250619

### Fixed
- Text domain PHP notice in Customizer

### File updates
	changelog.md
	style.css
	includes/Content/Starter.php


## 1.2.2, 20250514

### Updated
- Caching block patterns
- Using site transient for theme update code
- Using `color-mix` to style `<mark>`

### File updates
	changelog.md
	style.css
	theme.json
	assets/scss/global.scss
	includes/Content/Block_Pattern.php
	includes/Setup/Upgrade.php


## 1.2.1, 20250418

### Fixed
- Localization warning

### Updated
- WordPress 6.8 compatibility:
	- Fixing patterns registration
	- Fixing Social Link editor styles
	- Fixing Search block styles
	- Updating Navigation Link block styles
- Improving year in demo content texts
- Block styles
- Localization

### File updates
	changelog.md
	style.css
	assets/scss/editor.scss
	assets/scss/blocks/navigation-link.scss
	assets/scss/blocks/search.scss
	includes/Content/Block_Pattern.php
	includes/Content/Block_Style.php
	includes/Customize/Options.php
	languages/zooey.pot


## 1.2.0, 20250123

### Added
- `accessibility-ready` tag (https://themes.trac.wordpress.org/ticket/173979#comment:31)

### File updates
	changelog.md
	style.css


## 1.1.9, 20250118

### Updated
- Beaver Builder upgrade link
- Numbers 05 pattern spacing

### File updates
	changelog.md
	readme.txt
	style.css
	includes/Plugin/Beaver_Builder/Component.php
	patterns/numbers/numbers-05.php
	

## 1.1.8, 20241016

### Updated
- Removing fixed mobile navigation block style applied by default on Navigation block
- Search block CSS styles to fix the width in no-wrap row

### File updates
	changelog.md
	style.css
	assets/scss/blocks/search.scss
	patterns/site/header.php
	patterns/site/header-alt.php


## 1.1.7, 20240913

### Updated
- Improving custom fonts stylesheet versioning
- Improving responsive block styles within Navigation block: displays following navigation overlay state, not the screen size

### Fixed
- HTML error regarding search form
- Pagination styles (improving compatibility with plugins)
- Heading top margin in pattern preview in editor

### File updates
	changelog.md
	style.css
	assets/scss/blocks.scss
	assets/scss/editor.scss
	assets/scss/global.scss
	assets/scss/blocks/navigation.scss
	includes/Loop/Component.php
	includes/Loop/Pagination.php
	includes/Tool/Google_Fonts.php


## 1.1.6, 20240829

### Fixed
- Custom font in editor
- Right justified Navigation block submenu positioning

### File updates
	changelog.md
	style.css
	assets/scss/editor.scss
	assets/scss/blocks/navigation-submenu.scss
	includes/Assets/Editor.php


## 1.1.5, 20240802

### Updated
- Lowering automatic heading margin CSS specificity to pre-v1.1.0 value

### Fixed
- Zero margin on blocks following accessibly hidden blocks
- Button styles
- Theme tags in `style.css` file
- Social Links block SVG size
- Border radius styles

### File updates
	changelog.md
	style.css
	assets/scss/editor.scss
	assets/scss/global.scss
	assets/scss/blocks/button.scss
	assets/scss/blocks/social-links.scss


## 1.1.4, 20240801

### Added
- Theme option to toggle navigation accessibility fix

### Updated
- Fixing WordPress 6.6 compatibility
- Improving accessibility
- Improving, optimizing, fixing CSS styles
- Removing obsolete code
- Editor UI styles
- Reorganizing code
- Localization

### Fixed
- Site Editor links
- Patterns

### File updates
	style.css
	theme.json
	assets/scss/customize-controls.scss
	assets/scss/editor-ui.scss
	assets/scss/editor.scss
	assets/scss/global.scss
	assets/scss/blocks/_navigation-mobile.scss
	includes/Customize/Options.php
	includes/Entry/Component.php
	includes/Header/Body_Class.php
	includes/Setup/Media.php
	includes/Setup/Site_Editor.php
	languages/*.*
	parts/admin/welcome-feature--blog.php
	parts/admin/welcome-feature--site-editor.php
	parts/admin/welcome-guide--customize.php
	patterns/intro/intro-02.php
	patterns/services/services-01.php
	patterns/services/services-02.php
	patterns/testimonials/testimonials-03.php


## 1.1.3, 20240701

### Updated
- Preventing accessibility issues in mobile menu (Navigation block)
- `theme.json` version 3
- Updating patterns
- Localization

### Fixed
- Logo link missing focus outline
- H1 heading missing on blog homepage
- Navigation block styles
- Heading hierarchy in patterns

### File updates

	style.css
	theme.json
	assets/js/block-variations.js
	assets/scss/blocks.scss
	assets/scss/editor-ui.scss
	assets/scss/global.scss
	assets/scss/blocks/_navigation-megamenu.scss
	assets/scss/blocks/_navigation-mobile.scss
	assets/scss/blocks/_navigation-submenu-toggle.scss
	assets/scss/blocks/_navigation-submenu.scss
	assets/scss/blocks/comments.scss
	assets/scss/blocks/cover.scss
	assets/scss/blocks/latest-posts.scss
	assets/scss/blocks/navigation-submenu.scss
	assets/scss/blocks/navigation.scss
	assets/scss/blocks/page-list.scss
	assets/scss/blocks/rss.scss
	assets/scss/blocks/search.scss
	includes/Assets/Editor.php
	includes/Content/Block_Pattern.php
	includes/Content/Component.php
	includes/Content/Starter.php
	includes/Header/Body_Class.php
	languages/zooey.pot
	languages/sk_SK.*
	patterns/posts/posts-00.php
	patterns/site/header.php
	patterns/site/intro-blog.php


## 1.1.2, 20240601

### Updated
- Improving secondary navigation
- Enabling horizontal and vertical gap for Navigation block
- Localization

### Fixed
- Starter content page comments status (not sure what value should I use there...)

### File updates
	changelog.md
	style.css
	assets/js/block-mods.js
	includes/Content/Starter.php
	languages/sk_SK.*
	languages/zooey.pot
	patterns/site/header.php


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
