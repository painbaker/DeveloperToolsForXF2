CHANGELOG
==========================

## 1.5.1 (`1050170`)

- **Fix:** Template content is not displayed when editing template modification (#139)
- **Fix:** Unable to select hidden file-based email transport on XenForo 2.3 (#140)

## 1.5.0 (`1050070`)

- **New:** Add `tck-devtools:finder-class-properties` command to apply class properties to type hint relations in finder (#126)
- **New:** Add `tck-devtools:generate-schema-addon` command to generate schema for every entity at once (#128)
- **New:** Generate code event listener code using code generator (#130)
- **Change:** Require Standard Library v1.20.1 by @Xon
- **Fix:** Permission interface groups are not sorted correctly when building readme (#125)
- **Fix:** Error: Call to undefined method `XF\Api\Templater::logPermissionError()` (#127)
- **Fix:** Incompatible with XenForo 2.3 (#131)
- **Fix:** Incompatible with XenForo 2.1 (#132)

## 1.4.3 (`1040370`)

- **Fix:** Command `tck-dt:entity-class-properties` does not set getters and relations make use of `@property-read` tag as it should (#122)
- **Fix:** Error: Call to undefined method `XF\Mvc\Reply\Error::getParam()` (#123)

## 1.4.2 (`1040270`)

- **Fix:** Command `tck-dt:entity-class-properties` duplicates class hint for getters (#120)

## 1.4.1 (`1040170`)

- **Fix:** Command `tck-devtools:create-entity-from-table` marks auto increment primary key as required (#118)

## 1.4.0 (`1040070`)

- **New:** A new CLI command which will add class properties to entities similar to stock installation but with slight tweaks (#116)
- **New:** Prefer template type in title over the type set in URL when creating template (#114)
- **New:** Display style property group name and display order when viewing style properties (#113)
- **New:** Allow using full width page in admin control panel (#79)
- **Fix:** Creating class extension without any options provided throws unique add-on id required error (#115)

## 1.3.8 (`1030870`)

- **Fix:** `XF\Api\Templater` error message when calling API endpoints
- **Fix:** Inability to save phrases via admin control panel

## 1.3.7 (`1030770`)

- **Change:** On XF 2.2.7+ when minifying JS files go with the stock minifier service (#109)
- **Fix:** Exception thrown when the add-on assigned to permission interface has been removed (#108)
- **Fix:** Building readme with PHP 8.1 fails (#111)

## 1.3.6 (`1030670`)

- **Fix:** Large email HTML body causes "Data too long for column" exception to be thrown (#103)
- **Fix:** Building add-on from admin control panel does not rebuild data directory (#107)

## 1.3.5 (`1030570`)

- **Change:** Improvement to how `XF\PermissionCache` class is extended (#99) (Thanks @Xon)
- **Change:** Disable the "View template modifications" feature of this add-on if standard library 1.5.0+ is detected (#101)
- **Fix:** Many hard-coded text instead of using phrases in "View template modifications" page (#100)
- General code improvements and compatibility fixes

## 1.3.4 (`1030470`)

- **Fix:** Testing template modification for specific style does not work (#97)

## 1.3.3 (`1030370`)

- **Fix:** Exception related to `array_key_exists` is thrown when creating a new user (6e6307d75578180d8bb6340367df50a62e7d982f)
- **Fix:** Unable to save phrases if you accidentally clicked the "Add more phrase" button (#82)
- **Fix:** Undefined index exception is thrown when both permission group and permission does not exist (#92)
- **Fix:** Clamping version returns "No phrases or templates were updated" (#93)
- **Fix:** Decimal column types are not handled correctly when creating entity from table (#94)
- **Fix:** Class ProcessBuilder is deprecated and need to switch to Process (#95)

## 1.3.2 (`1030270`)

- **New:** Button to clear email logs (#90)
- **Change:** Options, Permissions and Style Properties are now grouped in the output rather than displaying group inline (#88)
- **Change:** Increase mails per-page to 100 (#89)
- **Fix:** Fix newline printing literally in the resulting Markdown code (#88)
- **Fix:** Cron entries that use "Day of the week" run schedule will now correctly generate readme entries (#87)

## 1.3.1 (`1030170`)

- **New:** Arguments must now be passed to `tck-devtools:build-readme` in order to build any of the 3 different output formats
- **New:** A new argument can be passed to `tck-devtools:build-readme` in order to copy the resulting file to the `_no_upload` directory
- **New:** Support for @Xon's `require-soft` recommendations parameter in `addon.json`
- **Change:** Stop building readme when building add-on (#83)
- **Change:** Changed the wording on the "Add more phrase" button to "Add another phrase" (#82)
- **Fix:** Suppress DOM errors when attempting to convert markdown to HTML (#81)
- **Fix:** Fix potential server error when attempting to copy files
- **Fix:** Fixed an error with building the list of requirements if the version was `*` instead of an array
- **Fix:** Potential server error when attempting to copy files
- **Fix:** Error with building the list of requirements if the version was `*` instead of an array

Some of the contributions were made by @[DragonByte Tech](https://xenforo.com/community/members/dragonbyte-tech.2478/)

## 1.3.0 (`1030070`)

- **New:** Allow viewing HTML and text sent via emails (#78)

## 1.2.3 (`1020370`)

- **Change:** Disable polyfill for JsMinifier closure (#74) (Thanks @[DragonByte Tech](https://xenforo.com/community/members/dragonbyte-tech.2478/))
- **Fix:** Argument 2 passed to `TickTackk\DeveloperTools\Listener::dispatcherPostRender()` must be of the type string, null given (#73)

## 1.2.2 (`1020270`)

- **Change:** Apply default sort order for entities that are fetched when building README files (#71)

## 1.2.1 (`1020170`)

- **Fix:** Style property description is same as title in README file (#67)
- **Fix:** CLI command `tck-devtools:build-readme` does not have descriptive description (#69)
- **Fix:** CLI command `tck-devtools:add-phrase` does not have description (#70)

## 1.2.0 (`1020070`)

- **New:** Handle in-line code tags when building README files (#64)
- **Change:** The `.idea` directory will now be excluded by default when building add-on release archive (#63)
- **Change:** Do not try to autodetect google closure compiler (#66)
- **Fix:** Excluded directories are not respected when building add-on release archive (#62)

## 1.2.0 Alpha 3 (`1020013`)

- **New:** CLI Command to create README file (#57)
  - The following information will be available in README with description whenever possible:
    - Add-on title
    - Add-on description
    - Add-on requirements
    - Options
    - Permissions
    - Admin permissions
    - BB codes
    - BB code media sites
    - Style properties
    - Advertising positions
    - Widget positions
    - Widget definitions
    - Cron entries
    - REST API scopes
    - CLI Commands
  - Further more, you can add your own blocks by creating HTML files named after the hook positions:
    - `BEFORE_TITLE`
    - `AFTER_TITLE`
    - `BEFORE_DESCRIPTION`
    - `AFTER_DESCRIPTION`
    - `BEFORE_REQUIREMENTS`
    - `AFTER_REQUIREMENTS`
    - `BEFORE_OPTIONS`
    - `AFTER_OPTIONS`
    - `BEFORE_PERMISSIONS`
    - `AFTER_PERMISSIONS`
    - `BEFORE_ADMIN_PERMISSIONS`
    - `AFTER_ADMIN_PERMISSIONS`
    - `BEFORE_BB_CODES`
    - `AFTER_BB_CODES`
    - `BEFORE_BB_CODE_MEDIA_SITES`
    - `AFTER_BB_CODE_MEDIA_SITES`
    - `BEFORE_STYLE_PROPERTIES`
    - `AFTER_STYLE_PROPERTIES`
    - `BEFORE_ADVERTISING_POSITIONS`
    - `AFTER_ADVERTISING_POSITIONS`
    - `BEFORE_WIDGET_POSITIONS`
    - `AFTER_WIDGET_POSITIONS`
    - `BEFORE_WIDGET_DEFINITIONS`
    - `AFTER_WIDGET_DEFINITIONS`
    - `BEFORE_CRON_ENTRIES`
    - `AFTER_CRON_ENTRIES`
    - `BEFORE_REST_API_SCOPES`
    - `AFTER_REST_API_SCOPES`
    - `BEFORE_CLI_COMMANDS`
    - `AFTER_CLI_COMMANDS`
  - When an add-on is built, following `README` variants will be created:
    - BB code version at `_dev/resource_description.txt` for resource descriptions
    - Markdown version at `README.md` for any VCS repository
- **Change:** Increase minimum XenForo version requirement to 2.1.7 (#59)
- **Change:** Increase minimum PHP version requirement to 7.3 (#60)
- **Fix:** When creating code event listener method, passed by reference state is not respected (#58)

## 1.2.0 Alpha 2 (`1020012`)

- **New:** Show callback execution order in code event listener list (#51)
- **New:** Allow clamping versions via CLI (#52) (Thanks @Xon)
- **Change:** Make execution order selectable in class extensions select (#50)

## 1.2.0 Alpha 1 (`1020011`)

- **New:** Show warnings when attempted to check for permissions or permission groups that do not exist (#34)
- **New:** Allow creating permission via permission interface even if permissions already exist (#35)
- **New:** Show class extension execution order in the list (#43)
- **New:** Show template modification execution order (#44)
- **Fix:** Upgrading to 1.1.0 does not migrate markdown files correctly (#45)
- **Fix:** Certain CLI commands have wrong namespace (#46)
- **Fix:** Doc block is before namespace instead of before class (#47)

## 1.1.3 (`1010370`)

- **Fix:** Custom listener callback class and and method are not respected (#40)

## 1.1.2 (`1010270`)

- **Fixed:** Code event listener creates invalid documentation (#36)

## 1.1.1 (`1010170`)

- **Fixed:** Fatal error thrown when code even listeners callback method use namespace alias for type hinting (#31)
- **Removed:** Even more XF 2.0 specific composer code (#32)

## 1.1.0 (`1010070`)

- **New:** Show style property group in breadcrumb
- **New:** Show option group when adding option
- **New:** Show template modification type in breadcrumb
- **New:** Ability to exclude files and directories using `exclude_files` and `exclude_directories` respectively via `build.json` (#25)
- **New:** Add `CHANGELOG.md` to release archive
- **New:** Class extensions will now have common classes already imported
- **New:** Allow creating multiple phrases via the add phrase page (#27)
- **New:** Automatically fill code event listener callback class and method based on selected event and add-on and create listener file / method as required (#28)
- **Changed:** Entity class extensions created via CLI command will now have `XF\Mvc\Entity\Structure` class aliased to `EntityStructure`
- **Changed:** Provided scripts now have `.sh` extension
- **Changed:** Developer options group will now only be shown in debug mode
- **Changed:** CLI commands have more consistent aliases
- **Changed:** Changed execution order for all listeners
- **Changed:** Increased minimum XenForo version requirement to 2.1.6 PL 1 (#30)
- **Fixed:** Template modification test failing
- **Fixed:** "View modifications" failing for templates
- **Fixed:** Path for `addon.json` is not shown when invalid add-on id is provided for class extension CLI command (#26)
- **Removed:** Dead class extension and phrases
- **Removed:** Removed PHPUnit integration which was borderline useless
- General code changes and improvements

## 1.0.0 (`1000070`)

- **New:** Enable hidden file-based email transport option
- **New:** Option to disable template watching (performance improvement)
- **New:** Option to disable file hash checking
- **New:** Add link to build add-on archive from add-on control menu
- **New:** Added CLI command to add phrase
- **New:** Added `_tests` to excluded directories
- **Changed:** Allow per-style analysis of how template modifications apply

**Contributions:** Some of the changes and bug-fixes were made by @Xon

## 1.0.0 Beta 5 (`1000035`)

- **New:** Added CLI commands `ticktackk-devtools:git-init`, `ticktackk-devtools:git-move`, `tdt:create-entity` and `tdt:schema-entity` (modified to round-trip better)
- **New:** Added method to get random entity based on an identifier for seeds
- **New:** Added post seed
- **New:** Option named "Custom Git repository location"
- **New:** Show template modifications which are applying (or failing) for a template
- **Changed:** Clear cache before adding files to the repository
- **Changed:** Update default `.gitignore` file contents to include `git.json`, `_metadata.json` and `.phpstorm.meta.php`
- **Changed:** More robust git-init
- **Changed:** Release build no longer removes `_data` after successfully creating a repository
- **Changed:** The CLI command `git-commit` will now make use of the new `ticktackk-devtools:git-move` command
- **Changed:** Move seeding process to Job to avoid timeouts
- **Changed:** Default branch is now `master` for `ticktackk-devtools:better-export` command
- **Changed:** Every seed will be now run as a random user
- **Fixed:** Git username and email not showing correctly
- **Fixed:** File not found error when FakeComposer attempts to load files
- **Fixed:** FakeComposer would fail on non-Windows OS
- **Fixed:** Setup not porting old settings correctly
- **Fixed:** `additional_files` directive saving incorrectly
- **Fixed:** When attempting to seed specific file, it would fail
- General bug fixes and improvements

**Contributions:** Some of the contributions were made by @Xon and @filliph 

## 1.0.0 Beta 4 (`1000034`)

- **New:** Faker integration
    * Check `_seeds` directory for sample
- **New:** Added CLI commands `ticktackk-devtools:create-class-extension` and `ticktackk-devtools:seed`
- **New:** Allows hosting the google minification closure compiler locally to avoid rate-limiting
- **New:** Some bash wrappers inside `scripts` directory

**Contributions:** Some of the contributions were made by @Xon

## 1.0.0 Beta 3 (`1000033`)

- **New:**: PHPUnit framework integration allows you to test add-on before releasing or pushing the new changes to VCS
- **New:**: Add-on specific git configuration (currently only name and email supported)
- **New:**: Ability to use packages made using composer without composer itself for your add-ons
- **New:**: Added new CLI commands `ticktackk-devtools:phpunit` and `ticktackk-devtools:rebuild-fake-composer`
- **Changed:**: Minimum PHP requirement has been bumped to `7.2`
- **Changed:**: Removed useless template from public side
- **Changed:**: The `_repo` directory now will be initialized if it hasn't already
- **Changed:**: Store developer options of add-on in `dev.json` instead of database
- **Changed:**: Store git configuration of add-on in `git.json` instead of database
- **Fixed:** Stop spamming `name` and `email` in `CONFIG` file for git

## 1.0.0 Beta 2 (`1000032`)

*Unreleased*

## 1.0.0 Beta 1 (PL 1) (`1000031`)

- **Changed:** Move `xf-addon:build-release` to the end in `ticktackk-devtools:better-export`
- **Fixed:** `[E_USER_WARNING] Accessed unknown getter 'gitignore'`

## 1.0.0 Beta 1 (`1000031`)

- **New:**: Added new CLI command `ticktackk-devtools:git-push <add-on id> <repo> <branch>` (thanks to @belazor)
- **New:**: New options for `ticktackk-devtools:better-export`
   - `--skip-export` Allows skipping exporting data before building release or moving files to `_repo` directory (thanks to @belazor)
   - `--commit` Allows committing changes (if any) to the local repository
   - `--push` Allows local repository to a branch (thanks to @belazor)
- **New:**: Added option to exclude directories when moving working files to `_repo` directory (thanks to @belazor)
- **New:**: Added option to copy additional files to `_repo` directory
   - Can be enabled/disabled per add-on (Default: disabled)
- **Changed:**: Developer options won't be shown in overlay
- General bug-fixes and code improvements

## 1.0.0 Alpha 6 (`1000016`)

- **New:** Copy additional files to repository directory
- **New:** Add "Save and exit" button for template modification editing process
- **New:** Both LICENSE.md and README.md are now copied to root directory
- **New:** Both LICENSE.md and README.md is now added to add-on archive as well
- **New:** New CLI commands `ticktackk-devtools:git-init` and `ticktackk-devtools:git-commit`
- **Changed:** LICENSE is now LICENSE.md
- **Changed:** Removed commit upon any developer output
- **Changed:** Moved all git related commands to separate CLI command

## 1.0.0 Alpha 5 (`1000015`)

- **Fixed:** Check if _repo directory exists before committing

## 1.0.0 Alpha 4 (`1000014`)

- **New**: Upon developer output for supported output types git commit command is called with supported commit type
    - Supported developer output types
        - Admin Navigation
        - Admin Permission
        - Advertising Position
        - BB Code
        - BB Code Media Site
        - Class Extension
        - Content type filed
        - Cron entry
        - Help page
        - Navigation
        - Option
        - Option Group
        - Permission
        - Permission Interface Group
        - Phrase
        - Route
        - Style Property
        - Style Property Group
        - Template
        - Template Modification
        - Widget Definition
        - Widget Position
    - Supported commit types
        - Export
        - Change
        - Delete

## 1.0.0 Alpha 3 (`1000013`)

- **New**: Added option --release for ticktackk-devtools:better-export which would release the add-on
- **Changed**: README.me location is now under add-on directory to avoid getting overwritten by other releases made from developer tools
- **Changed**: Removed template modification which wasn't required for anything
- **Changed**: xf-dev:export command will be called after xf-dev:entity-class-properties
- **Fixed**: Added a workaround for xf-dev:entity-class-properties command bug if no Entity directory was present

## 1.0.0 Alpha 2 (`1000012`)

- **New**: Added new command `ticktackk-devtools:better-export [addon_id]` which would run both `xf-addon:export` and `xf-dev:entity-class-properties` for the add-on id provided 
- **New**: Added support for testing template modifications against different style
- **Changed**: Updated description under `addon.json`
- **Fixed**: Fixed Setup file

## 1.0.0 Alpha 1 (`1000011`)

First alpha release.
