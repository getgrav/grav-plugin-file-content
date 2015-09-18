# Grav File Content Plugin

`File Content` is a simple [Grav][grav] plugin that adds a Twig extension to allow you to include a file into your template.

# Installation

Installing the File Content plugin can be done in one of two ways. Our GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

## GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's Terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install file-content

This will install the YouTube plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/file-content`.

## Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `file-content`. You can find these files either on [GitHub](https://github.com/getgrav/grav-plugin-file-content) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/file-content

# Config Defaults

```
enabled: true
allow_in_page: true                     # Allow files in the current page (e.g. sample.txt)
allow_in_grav: true                     # Allow files relative to Grav root (e.g. /user/custom/sample.txt)
allow_in_filesystem: false              # Allow files anywhere on filesystem (e.g. /users/myuser/myfolder/sample.txt)
allowed_extensions: [txt, html]         # Array of allowed file types to allow
```

If you need to change any value, then the best process is to copy the [file-content.yaml](file-content.yaml) file into your `users/config/plugins/` folder (create it if it doesn't exist), and then modify there.  This will override the default settings.

> Use with caution! This plugin could be dangerous if you let anyone have access to your templates or even page content.  They could include any file on your filesystem into your page.


# Usage

This plugin provides both a Twig **filter** and **function**.  To use them simply use the following syntax:

```
{{ filecontent('sample.txt') }}

or

{{ 'sample.txt'|filecontent }}

or 

{{ filecontent('/user/custom/sample.txt') }}
```

[grav]: http://github.com/getgrav/grav
