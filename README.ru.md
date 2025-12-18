# Среда сборки MODX с графическим интерфейсом
Язык: [![en](https://img.shields.io/badge/readme-EN-blue.svg)](https://github.com/dimasites/modx-build-environment-gui/blob/master/README.md)
[![ru](https://img.shields.io/badge/readme-RU-BBB.svg)](https://github.com/dimasites/modx-build-environment-gui/blob/master/README.ru.md)

Добавьте простой и удобный графический интерфейс для улучшения вашего опыта разработки и сделайте внесение изменений в пакеты MODX более удобным и быстрым:

![Screenshot with GUI](https://raw.githubusercontent.com/dimasites/modx-build-environment-gui/main/assets/screenshot-1-view-demo.png)
*Пакеты на скриншоте — это всего лишь пример, ваш список будет отображаться на основе подпапок вашего каталога **./_build/** *

## Как использовать
Добавьте этот репозиторий в качестве сабмодуля Git в свой сборщик MODX-пакета. 
(это легко, ниже пример, но на всякой случай можешь глянуть доку про git submodule: [EN](https://book.git-scm.com/book/en/v2/Git-Tools-Submodules) | [RU](https://book.git-scm.com/book/ru/v2/%D0%98%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B-Git-%D0%9F%D0%BE%D0%B4%D0%BC%D0%BE%D0%B4%D1%83%D0%BB%D0%B8) ) в ваш пакет в папку с именем "env" в качестве подпапки для каталога **./_build/** :

* URL: https://github.com/dimasites/modx-build-environment-gui
* Папка: _build/env

Я рекомендую добавить через простой GIT GUI [fork](https://git-fork.com/) (on screnshot) или [sourcetree](https://sourcetreeapp.com/) *(или [см. эттот commit](https://github.com/dimasites/modx-ckeditor/commit/e159384a66b9bb4a45fc6094158af3f15b412df5) for reference to manual code additions)*
![Скриншот как добавить через GIT GUI](https://raw.githubusercontent.com/dimasites/modx-build-environment-gui/main/assets/screenshot-2-add-submodule.png)

Затем залей файлы туда, где собираешь пакет, затем иди по URL **/_build/env** на твоём билд-MODX-сайте и используй этот супер функциональный GUI (надеюсь он станет таким в будущем) :)

Этот графический интерфейс будет особенно полезен, если вы загружаете файлы билдера пакетов в корневую папку вашей установки MODX!

## Функция быстрой загрузки собранных пакетов

Просто добавьте эти строки в конец вашего скрипта **build.transport.php**:

```php
$download_url = '/_build/env/index.php?getpackage='.PKG_NAME_LOWER.'-'.PKG_VERSION.'-'.PKG_RELEASE;
$modx->log(modX::LOG_LEVEL_INFO,"\n<br /><a target='_blank' href='{$download_url}'>[DOWNLOAD PACKAGE]</a><br />\n");
```
*Это проверено для MODX Revo 2.x сборщиков! Отпишите мне, если на 3.x есть проблемы*

---

Сделано для MODX RSC by [@dimasites](https://github.com/dimasites) и друзьями

Буду рад PR, доработкам, вопросам и пожеланиям!

---

Лиценизя открытая: Дмитрий Касаткин (aka @dimasites) <dimasites@yandex.com> -- можете свободно использовать в своих проектах, в т.ч. коммерческих.
