# SilverStripe Showcase Block

A Showcase block that is compatible with SilverStripe Elemental.

## Installation

First you will need to add these in your composer.json file.

```
"require": {
        "thelogicstudio/elemental-showcaseblock": "dev-main"
},
"repositories": [
        { "type": "vcs", "url": "https://github.com/thelogicstudio/elemental-showcaseblock" }
],
```

Install from Composer:

```
composer{PHP VERSION} require thelogicstudio/elemental-showcaseblock
```
e.g: composer82 require thelogicstudio/elemental-showcaseblock

Then include the SCSS:

```
@import "thelogicstudio/elemental-showcaseblock/scss/showcaseblock";
```

Note you'll need the Composer vendor folder set up in `includePaths` for SASS in your Gulpfile unless you are using the <a href="https://github.com/thelogicstudio/ss4-base-theme">SS4-BASE-THEME</a>.
