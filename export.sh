#!/bin/bash
set -eo pipefail

_os="$(uname)"
_now=$(date +"%m_%d_%Y")
_dir="wp-data"
_file="${_dir}/data_${_now}.sql"

# Create directory if it doesn't exist
mkdir -p "$_dir"

# Export dump with proper MySQL options for WordPress
docker-compose run --rm db \
    mysqldump --no-tablespaces \
    -u"root" \
    -p"$MYSQL_ROOT_PASSWORD" \
    "$MYSQL_DATABASE" > "$_file"

# Remove password warning line cross-platform
if [[ "$_os" == "Darwin"* ]]; then
    LANG=C sed -i '.bak' -e '/^Warning:/d' "$_file"
else
    LANG=C sed -i -e '/^Warning:/d' "$_file"
fi

echo "Successfully exported database to $_file"
