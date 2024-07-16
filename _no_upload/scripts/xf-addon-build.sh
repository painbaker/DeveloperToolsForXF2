#!/bin/sh

if [[ "$#" -ne 1 ]]; then
    echo "Require an add-on name"
    exit 1;
fi

if [[ ! -d "src/addons/$1" ]]; then
    echo "Expect src/addons/$1  to exist"
    exit 1;
fi

php cmd.php xf-dev:rebuild-caches -v || exit 1
php cmd.php xf-dev:metadata-clean -v || exit 1
php cmd.php xf-addon:sync-json "$1" -v -f || exit 1
php cmd.php xf-addon:build-release "$1" -v || exit 1