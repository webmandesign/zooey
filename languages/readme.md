# How to localize the theme into your language

Thorough online information can be found in [theme documentation](https://webmandesign.github.io/docs/zooey/#localization) and/or [knowledge base article](https://support.webmandesign.eu/localization/).

## WARNING! Do not place your translation files here.

Any translation files placed here will be deleted when you update the theme.


## Translating the theme

1. Make a copy of the original `zooey.pot` file.
2. You need to rename the copied file now: add hyphen followed with [your language code locale](https://translate.wordpress.org/), and change file extension to "po". So, the British English file would be named `zooey-en_GB.po`, for example.
3. Use [Poedit](https://www.poedit.net/) to translate the file and export (save) translation in `mo` file format.
4. Upload translated `zooey-en_GB.mo` and `zooey-en_GB.po` file into your WordPress languages directory, into `themes` folder (such as `/wp-content/languages/themes/zooey-en_GB.mo` - if the `themes` folder does not exist in your WordPress languages directory, create it).

### Generate JSON translation files

For JavaScript localization we need to [create additional JSON translation files](https://developer.wordpress.org/block-editor/how-to-guides/internationalization/#create-translation-file):

1. In your computer terminal/command line/SSH set the directory to `WORDPRESS_FOLDER/wp-content/languages/themes/`.
2. Using [WPCLI](https://wp-cli.org/) run this command to create the JSON file(s): `wp i18n make-json zooey-en_GB.po --no-purge`
3. If the `zooey-en_GB.po` file contains JavaScript translation strings, WPCLI should create `zooey-en_GB-{md5}.json` file(s) for you. You are done now.


## Contributing your translations back to the theme

If you have obtained the theme from **[WordPress.org themes repository](https://wordpress.org/themes/author/webmandesign/)**, please translate the theme by clicking the [Translate Zooey](https://translate.wordpress.org/projects/wp-themes/zooey) link in [theme page](https://wordpress.org/themes/zooey/) sidebar.

Otherwise, if you would like to help out translating the theme, please contribute in our [Support Center](https://support.webmandesign.eu/forums/forum/zooey/).
