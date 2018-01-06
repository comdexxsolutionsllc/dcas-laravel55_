#!/usr/bin/env bash

echo "Updating bower components..."
node_modules/.bin/bower update
echo "Updated bower components..."
echo ""
echo "Updating npm components..."
npm update
echo "Updated npm components..."
echo ""
echo "Updating composer components..."
composer update
echo "Updated composer components..."
echo ""
echo ""
echo "Update Script complete."
