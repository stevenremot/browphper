composer-download: composer.phar
	curl -sS https://getcomposer.org/installer | php

composer-install: composer-download
	php composer.phar install

composer-update: composer-download
	php composer.phar update

atoum:
	vendor/bin/atoum -d tests/units -bf config/atoum.php
