#!/usr/bin/env bash

vendor/bin/phpmd app,config,routes html phpmd-ruleset.xml --exclude /Users/srenner/Code/dcas-laravel55/app/NullProfile.php,/Users/srenner/Code/dcas-laravel55/app/NullUser.php,/Users/srenner/Code/dcas-laravel55/app/Modules/SupportDesk/Models/Null* > public/phpmd.html
