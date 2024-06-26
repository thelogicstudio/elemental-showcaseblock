# SilverStripe Elemental Showcase Block

A Showcase block that is compatible with SilverStripe Elemental. This can be used to make a sponsor logo carousel or a banner.

## Installation

1. Add these in your composer.json file.

```
"require": {
        "dnadesign/silverstripe-elemental": "^5.0",
        "undefinedoffset/sortablegridfield": "^2.2",
        "thelogicstudio/elemental-showcaseblock": "*@dev"
},
"repositories": [
        { "type": "vcs", "url": "https://github.com/thelogicstudio/elemental-showcaseblock" }
],
```



2. Install from Composer

```
composer{PHP VERSION} require thelogicstudio/elemental-showcaseblock
```
e.g: composer82 require thelogicstudio/elemental-showcaseblock



3. Include the SCSS in YOUR-THEME/scss/bundle.scss

```
@import "thelogicstudio/elemental-showcaseblock/scss/_showcaseblock";
```

4. Add this to elements.yml

```
Page:
  extensions:
    - DNADesign\Elemental\Extensions\ElementalPageExtension
```

Note you'll need the Composer vendor folder set up in `includePaths` for SASS in your Gulpfile unless you are using the <a href="https://github.com/thelogicstudio/ss4-base-theme">SS4-BASE-THEME</a>.
