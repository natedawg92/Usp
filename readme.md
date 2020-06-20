# USP Widget

## Description

A Magento 2 Widget to be able to add a USP Banner

## Install Instructions

### Install Via Composer (Recommended)
```BAASH
composer config repositories.nathanday/usp git git@github.com:natedawg92/usp.git
composer require nathanday/module-usp

php bin/magento module:enable NathanDay_Usp
```

### Install via Code Copy

1. Download the latest releases from:
    - [natedawg9/Usp](https://github.com/natedawg92/module-usp/releases)
2. Create the following Directory
    - `app/code/NathanDay/Usp`
3. Extract the downloaded files into the appropriate directory
4. run `php bin/magento module:enable NathanDay_Usp`

## Usage

### Create a USP Block

- navigate to your Magento Admin page
- Using the menu go to `Content` -> `Elements` -> `USP Blocks`
    - This page will resemble the CMS Blocks page and is used in exactly the same way
- Click `Add New Block`
    - Enter a Block Title
    - Enter a **Unique** Identifier
    - Choose an **Optional** Sort Order
        - _A higher sort order means this block will have a higher precedence over others._
    - Chose a Store View
    - Enter the Block content using the WYSIWYG Editor
- Repeat these steps for as many USP blocks as you want

### Add a USP Banner

- navigate to your Magento Admin page
- Using the menu go to `Content` -> `Elements` -> `Widgets`
- Click `Add Widget`
    - Select `USP Banner` from the Type dropdown
    - Select your current theme
    - Click Continue
    - Enter a Widget Title
    - Select your Store Views
    _ Add a Layout Update
        - A new Container has been added called **USP Container** this will add your USP Banner directly after the Website Navigation Menu
    - Select Widget Options from the left-hand menu
    - Select the USP Blocks that you want to show on your banner
    - Select how many USP Blocks you want to show on each of the following Viewports
        - Mobile <768px
        - Tablet >=768px <992px
        - Desktop >=992px <1200px
        - Large Desktop >=1200px
    - _Any USP Blocks that have been selected but not visible on a viewport will be rotated into view_
        - e.g. if 4 USP blocks are selected, but you have selected only 2 to be visible on a tablet viewport, then the USP blocks will rotate showing 2 at a time

## Credits

[Email](mailto:nathanday92@gmail.com)
[GitHub](https://github.com/natedawg92)
[LinkedIn](https://www.linkedin.com/in/nathanday92/)

## License
