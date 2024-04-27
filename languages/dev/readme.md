# How to generate POT file for block theme (with `theme.json` strings)

1. Open SSH and set location to the theme folder:
cd /var/www/wp.develop/wp-content/themes/zooey

2. For creating localization POT file use:
wp i18n make-pot . languages/zooey.pot
sudo wp i18n make-pot . languages/zooey.pot --allow-root

3. Change the POT file header in text editor if needed:
"Report-Msgid-Bugs-To: https://support.webmandesign.eu\n"
"Last-Translator: Oliver Juhas, WebMan Design\n"
"Language-Team: WebMan Design\n"


## JavaScript localization

1. Now create PO file and localize it to your language (see `../readme.md` for more info).

2. Create a backup copy of your localized PO file by appending `.bak` after file extension (has to be after!). Backup is required as the step #3 will remove JavaScript related translations from our PO file. (To prevent this removal we can append ` --no-purge` to command at step #3.)

3. For JavaScript localization to work, we need to generate translation JSON file(s) using:
wp i18n make-json languages
wp i18n make-json languages --no-purge

4. Rename generated `locale-md5.json` files to `zooey-locale-md5.json`.

---

More info: https://developer.wordpress.org/block-editor/how-to-guides/internationalization/#create-translation-file
