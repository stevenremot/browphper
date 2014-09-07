# Brophper - PHP Code browser

## Description

Browphper is a command-line program that aims to provide services like
you can find in IDEs, like finding symbols locations, getting auto
completions, symbol documentation, etc...

I want it to ideally depend on nothing more than php standard library,
using php reflection library and tokenizer.

It is currently in early development stage, so do not use it now.

## Instructions

First, you need to install composer and setup the project :

```sh
curl -sS https://getcomposer.org/installer | php
php composer.phar install
```

At the root of your project, write a script `.browphper.php` that
setup your project's autoload system. If you rely on composer, here is
an example :

```php
<?php
require_once __DIR__ . DIRECTORY_SEPARATOR .
    'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
```

The command-line programm is `bin/browphper`. Don't move it, but
launch it in your project's directory (or one of its subdirectories).

You can then enter commands in the formats `<command name> [argument]*`.

Recognized commands are :
- `exit` to quit the program
- `locate <symbol>` to get symbol location

## License

Browphper is released under the terms of the MIT license.
