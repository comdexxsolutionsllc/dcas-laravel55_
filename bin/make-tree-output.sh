#!/usr/bin/env bash

echo "Running Project Tree Discovery"
tree -f -I "bootstrap|bower|storage|docs|vendor|node_modules|*.md|_ide_helper.php|*.txt|*lock*" > tree.txt
sleep 1
echo "Discovery done.  Output to tree.txt."
