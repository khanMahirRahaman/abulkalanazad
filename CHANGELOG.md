# CHANGELOG

All laramagz changes are documented in this file.

## [v1.3.2-1] - 2022-07-24
### Fixed
- Display a blank image on the edit page

### Removed 
- Check php symlink extension

## [v1.3.2] - 2022-07-19
### Added
- Support RTL for dashboard.
- Support Dark Mode for theme.
- Image for category.
- shared hosting version and.
- Disk 'sharedhosting' on Filesystem Disks for custom storage.
- Env configuration for custom disk filesystem in env file.

### Changed
- Image upload view.
- Display of dashboard page headings and footers condensed for mobile screens.
- Storage using public path instead of storage path (for the shared hosting version).

### Fixed
- All issues found in previous versions.

### Removed
- The amount of data in the title on the page.

---

## [v1.3.1] - 2022-04-01
### Added
- Edit language name.

### Changed
- Translation key `label_translations` to `label_translation`.
- 'author' instead 'member' in `Helpers/Posts.php`.

### Fixed
- Issue when adding translations to posts and pages.
- Issue with slug in Page.
- Tag input on post page added translation.
- Route for multiple delete pages.
- Process of deleting posts and pages that have translations.
- Input so that it could support multiple characters, for example Arabic characters.
- Text on change image button in edit advertisement.
- Menu link and menu item submit button after editing.
- Language on related posts in post details.
- TTL on Frontend Theme.
- Tanslation edit.

---

## [v1.3.0] - 2022-03-05
### Added
- Mmlti-language feature.
- Descriptions to categories and tags.
- Localization Menu to manage language and translation.
- Color settings on the Socialmedia Menu.
- language selection settings.
- Supports RTL on Frontend Themes.
- Support Dark Mode on Dashboard. 
- Setting to show or hide language selection on frontend. 
- Set use_full_favicon to true.
- Roles cannot be changed and deleted, except Roles added by the user. 
- Bootstrap 5 on Theme Frontend.

### Changed
- Manager Menu.
- Superadmin role name to super-admin, and the member role name to author. 
- Name of Register Member to Register User. 
- Sitemap.
- Env-editor package from brotzka/laravel-dotenv-editor to geo-sot/laravel-env-editor.
- Social Media input in Settings > Web Contacts to be more dynamic.

### Fixed
- Fixed missing SupportLocales.json file in app/public/file storage.

### Removed
- Removed Menu to Set Permissions. Granting or changing permissions can be done via the Role Menu.

---

## [v1.2.3] - 2021-07-18

### Changed
- update laravel adminlte.

### Fixed
- Permalinks.
- Settings - web-properties.
- Meta description changed from string to text database migration.
- The grid column height on the home page of the latest news section.
- Search page.
- Error "Undefined array key 0" in dashboard for newly created Google Analytics.

---

## [v1.2.2] - 2021-06-07
### Added
- Page and Category Permalinks.
- 
### Fixed
- Login error when Post Permalink is set in Post name.
- Error when importing data files.

---

## [v1.2.1] - 2021-05-21
### changed
- Modified Sitemap: change the guid content from item id to url link.

### Fixed
- Fixed Error "Unsupported operand types: int - string".
- Fix youtube social media links in footer.
- Fix cannot upload images in post and page articles.

---

## [v1.2.0] - 2021-04-17
### Added 
- Sitemap.
- Feed RSS.
- Export data & storage file.
- Import data.
- User status feature. 
- dropdown on session by device and visitor & pageview to select Google Analytics for the day.

### changed
- Changing the way to enter the Google Adsense script (No longer inserting scripts).
- Update Package.

---

## [v1.1.1] - 2021-03-18
### Changed
- Member post edit.
- Hide link register member on register is not activated.
- Imagick driver image to GD.
- Appearance of Google Analytics on the dashboard.
- Blade :: component instead Blade :: aliasComponent for breadcrumb templates

### Fixed
- Image that does not appear in the edit gallery form

---

## [v1.1.0] - 2020-11-17
### Added 
- Private post feature in Post.
- Loading progress bar on the front end.
- Displays the name of the user who is currently logged in on the frontend.

### Changed
- Upgrade to Laravel 8.
- Change the redirect from dashboard to login after registering a new user on the register user page.
- library package.

### Fixed
- Social media on Add New User.
- Permission on Update Role when clicking the update role button.
- Open graph image thumbnail when uploading image in Web Properties settings.
- Thumbnail post image that did not appear when the web permalink was changed to the day and name.
- Bug.

---

## [v1.0.2-5] - 2020-10-01
### Changed
- Enhancement library package.
- Enhancement Advertising.
- Enhancement Favicon Settings.

### Fixed
- Bug changes to the website logo.
- Web contacts.
- The child menu in the frontend navigation menu.

---

## [v1.0.2] - 2020-09-09
### Added
- Custom permalink to the post.
- Video attribute to the text editor.
- Custom dashboard and login logo.

### Changed
- Enhancement Advertisement.
- Enhancement Permissions.

### Fixed
- User permissions.
- Change photo profile.
- Bugs.

---

## [v1.0.1-1] - 2020-08-11

### Added
- Customize Credit Footer on CMS.
- Themes information detail.
- Permalinks web config menu (settings).

### Changed
- Update Documentation
- Change file and folder themes structure.
- Add permalinks web config menu (settings).
- Update the latest package version.
- Analytics chart display changes.

### Fixed
- Bugs.

---

## [v1.0.0] - 2020-07-23

- Initial release.
