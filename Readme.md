# sciolism 2019 for WordPress
**sciolism 2019 for WordPress** is a port of the [Hugo](https://gohugo.io) theme [sciolism 2019](https://github.com/chemiker/sciolism-2019).

[![Maintainability](https://api.codeclimate.com/v1/badges/9724604a5bbdd5343a97/maintainability)](https://codeclimate.com/github/chemiker/sciolism-2019-for-wordpress/maintainability)

![sciolism 2019](https://github.com/chemiker/sciolism-2019-for-wordpress/raw/main/src/theme/screenshot.png)

## Installation
1. Download the latest [release](https://github.com/chemiker/sciolism-2019-for-wordpress/releases) of the theme or clone this repository and move the files in the `wp-content/themes` folder of your WordPress instance.
2. Activate the theme in your WordPress installation.

## Features (sciolism 2019 vs. sciolism 2019 for WordPress)
sciolism 2019 features a content focused design and has a lot of features that yield a modern and well performing experience of your website. That said it must be mentioned that the overall performance if used within WordPress does of course depend on the number of plugins installed etc.

In comparison with the Hugo version of the theme there are some differences in the featureset. While the apperance is nearly the same the differences are mostly due to the strict [differentiation](https://make.wordpress.org/themes/handbook/review/required/#presentation-vs-functionality) between plugin and theme functionality. 

* Use of WordPress [Dashicons](https://developer.wordpress.org/resource/dashicons/#search) instead of FontAwesome icons
* Several tweaks to support WordPress specific features (Blocks, Comments etc.)
* No build-in shortcodes and content-related functions
* Night mode is not yet included and might be shipped with a future version of the theme
* There are currently no plans to include a sidebar in the theme

### Menus & theme options
**sciolism 2019** features two menus in the footer. The first is the `main` menu thought for the website navigation. The second, `side` can be e.g. be used to link to your social media accounts. The configuration is done via the customizer on your WordPress installation. There are also other tweaks available which can be accessed via the customizer, too.

## Changelog

### 1.0.2
* Fixed broken JS link
* Fixed overlap of admin toolbar with header
* Code refactoring

### 1.0.1
* Skip links are shown on focus
* Show submit button of search form on focus
* Increase border-color contrast of comment form
* Visually indicate current page in main menu with an icon

### 1.0

* Initial release

## Development
### Requirements
* yarn

### Installation
1. Download the zip archive or clone the repository to your hugo development environment
2. run `yarn install`
3. run `yarn run gulp prepareDev` to compile all files required for development
4. run `yarn run gulp dev` to auto-update on any changes done to PHP and SASS files

For distribution you can run `yarn run gulp make`. This will create a `dist/` folder ready for production.

## License
This project is released under the [MIT license](LICENSE).

It contains software and fonts released under individual licenses:

normalize.css
Copyright (c) Nicolas Gallagher and Jonathan Neal
License: MIT License, https://opensource.org/licenses/MIT
Source: https://necolas.github.io/normalize.css/

Hack (Font)
Copyright (c) 2018 Source Foundry Authors
License: MIT and Bitstream Vera license, https://github.com/source-foundry/Hack/blob/master/LICENSE.md
Source: https://sourcefoundry.org/hack/

Open Sans (Font)
Copyright (c) Google Corporation
License: Apache License, Version 2.0., http://www.apache.org/licenses/LICENSE-2.0
Source: https://fonts.google.com/specimen/Open+Sans

Roboto Slab (Font)
Copyright (c) Google Corporation
License: Apache License, Version 2.0., http://www.apache.org/licenses/LICENSE-2.0
Source: https://fonts.google.com/specimen/Roboto+Slab

npm-font-open-sans
Copyright (c) Enrico Hoffmann
License: Apache License, Version 2.0., http://www.apache.org/licenses/LICENSE-2.0
https://www.google.de/search?q=npm-font-open-sans

roboto-slab_all
Copyright (c) Jan Bednar
License: MIT License, https://opensource.org/licenses/MIT
Source: https://www.npmjs.com/package/@openfonts/roboto-slab_all
