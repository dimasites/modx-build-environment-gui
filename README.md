# MODX build environment GUI

Add simple and useful GUI for improve your dev experience and make contributing on MODX packages more comfortable and fast:

![Screenshot with GUI](https://raw.githubusercontent.com/dimasites/modx-build-environment-gui/main/assets/screenshot-1-view-demo.png)
*packages on screenshot is just example, your list will be shown based on subfolders of **./_build/** directory*

## How to use
Just add this repo as git submodule (see docs: [EN](https://book.git-scm.com/book/en/v2/Git-Tools-Submodules) | [RU](https://book.git-scm.com/book/ru/v2/%D0%98%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B-Git-%D0%9F%D0%BE%D0%B4%D0%BC%D0%BE%D0%B4%D1%83%D0%BB%D0%B8) ) to to your package in folder named "env" as subfolder for ./_build/ ditectory:

* URL: https://github.com/dimasites/modx-build-environment-gui
* Folder: _build/env

I recommend very simple add with git GUI [fork](https://git-fork.com/) (on screnshot) or [sourcetree](https://sourcetreeapp.com/) *(or [see this commit](https://github.com/dimasites/modx-ckeditor/commit/e159384a66b9bb4a45fc6094158af3f15b412df5) for reference to manual code additions)*
![Screenshot with GUI](https://raw.githubusercontent.com/dimasites/modx-build-environment-gui/main/assets/screenshot-2-add-submodule.png)

And then, go to **/_build/env** URL on your MODX installation for using this super-multi-functional (in future i hope) GUI :)

This GUI will be useful especially if you uploading your package files into root folder of you MODX installation! 

## Quick package download feature

Just add this lines to end of your **build.transport.php** script:

```php
$download_url = '/_build/env/index.php?getpackage='.PKG_NAME_LOWER.'-'.PKG_VERSION.'-'.PKG_RELEASE;
$modx->log(modX::LOG_LEVEL_INFO,"\n<br /><a target='_blank' href='{$download_url}'>[DOWNLOAD PACKAGE]</a><br />\n");
```
*Its tested for MODX Revo 2.x builders!*

---

Made for MODX RSC by [@dimasites](https://github.com/dimasites) and friends

Feel free for contribute, fork, PR, issue and more!

---

Licensed with GPL by Dmitry Kasatkin (aka @dimasites)
<dimasites@yandex.com>
