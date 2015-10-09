#!/usr/bin/env bash

# Ops
#
# @author Hein Bekker <hein@netbek.co.za>
# @copyright (c) 2015 Hein Bekker
# @license http://www.gnu.org/licenses/gpl-2.0.txt GPLv2


G_HOME=`cd "${PWD}/../"; pwd`
G_MODE=""
G_CMD="$1"
G_CONFIG="${G_HOME}/ops/ops.conf"


# Load config
source ${G_CONFIG}

if [ -z "${G_PUBLIC_ROOT}" ]; then
    echo "Please provide a valid public root path in the config"
    exit 1
fi


# Install (also used to update)
function do_install () {
    if [ -z "${G_PUBLIC_ROOT}" ] || [ ! -d "${G_PUBLIC_ROOT}" ]; then
        echo "Please provide a valid public root path"
        exit 1
    fi

    do_unsecure

    local DIR="${G_HOME}/ops/tmp"
   local BRANCH="master"

    rm -fr "${DIR}"
    mkdir -p "${DIR}"

    cd "${DIR}"
    wget "https://github.com/liquidfridge/liquidfridge.co.za/archive/${BRANCH}.zip"
    unzip "${BRANCH}.zip"

    cd "liquidfridge.co.za-${BRANCH}/html"
    cp --force --preserve --recursive . "${G_PUBLIC_ROOT}"

    rm -fr "${DIR}"

    do_secure
}


# Set the file and directory permissions
function do_secure () {
    if [ -z "${G_PUBLIC_ROOT}" ] || [ ! -d "${G_PUBLIC_ROOT}" ]; then
        echo "Please provide a valid public root path"
        exit 1
    fi
    if [ -z "${G_USER}" ]; then
        echo "Please provide a valid user"
        exit 1
    fi
    if [ -z "${G_GROUP}" ]; then
        echo "Please provide a valid group"
        exit 1
    fi

    local DIR=""
    local DIRS=""

    # Remove unwanted files
    if [ "${G_MODE}" == "prod" ]; then
        DIR=${G_PUBLIC_ROOT}
        rm -f "${DIR}/sync.sh"
        rm -fr "${DIR}/src"
    fi

    # Set the ownership of directories and files
    do_own

    # Public, read-only
    cd ${G_PUBLIC_ROOT}
    chmod 444 .htaccess
    chmod 444 .htpasswd
    chmod 444 apple-touch-icon.png
    chmod 444 apple-touch-icon-57x57-precomposed.png
    chmod 444 apple-touch-icon-72x72-precomposed.png
    chmod 444 apple-touch-icon-76x76-precomposed.png
    chmod 444 apple-touch-icon-114x114-precomposed.png
    chmod 444 apple-touch-icon-120x120-precomposed.png
    chmod 444 apple-touch-icon-144x144-precomposed.png
    chmod 444 apple-touch-icon-152x152-precomposed.png
    chmod 444 apple-touch-icon-180x180-precomposed.png
    chmod 444 apple-touch-icon-192x192-precomposed.png
    chmod 444 apple-touch-icon-precomposed.png
    chmod 444 og-1200x630.png
    chmod 444 og-480x250.png
    chmod 444 favicon.ico
    chmod 444 crossdomain.xml
    chmod 444 index.html
    chmod 444 robots.txt

    # Public, read-only
    DIRS=("${G_PUBLIC_ROOT}/css" "${G_PUBLIC_ROOT}/img" "${G_PUBLIC_ROOT}/js" "${G_PUBLIC_ROOT}/svg")
    for DIR in ${DIRS[@]}; do
        cd ${DIR}
        echo "Changing permissions of all directories inside \"${DIR}\" to \"555\"..."
        find . -type d -exec chmod 555 {} \;
        echo -e "Changing permissions of all files inside \"${DIR}\" to \"444\"...\n"
        find . -type f -exec chmod 444 {} \;
    done
}


#
function do_unsecure () {
    if [ -z "${G_PUBLIC_ROOT}" ] || [ ! -d "${G_PUBLIC_ROOT}" ]; then
        echo "Please provide a valid public root path"
        exit 1
    fi
    if [ -z "${G_USER}" ]; then
        echo "Please provide a valid user"
        exit 1
    fi
    if [ -z "${G_GROUP}" ]; then
        echo "Please provide a valid group"
        exit 1
    fi

    local DIR=""

    # Set the ownership of directories and files
    do_own

    # Set the default permissions for all directories and files
    DIR=${G_PUBLIC_ROOT}
    cd ${DIR}
    echo "Changing permissions of all directories inside \"${DIR}\" to \"755\"..."
    find . -type d -exec chmod 755 {} \;
    echo -e "Changing permissions of all files inside \"${DIR}\" to \"644\"...\n"
    find . -type f -exec chmod 644 {} \;
}


#
function do_own () {
    if [ -z "${G_PUBLIC_ROOT}" ] || [ ! -d "${G_PUBLIC_ROOT}" ]; then
        echo "Please provide a valid public root path"
        exit 1
    fi
    if [ -z "${G_USER}" ]; then
        echo "Please provide a valid user"
        exit 1
    fi
    if [ -z "${G_GROUP}" ]; then
        echo "Please provide a valid group"
        exit 1
    fi

    local DIR=""

    # Set the ownership of all directories and files
    DIR=${G_PUBLIC_ROOT}
    cd ${DIR}

    local USER=""
    local GROUP=""

    # If dev mode, make vagrant owner
    if [ "${G_MODE}" == "dev" ]; then
        USER="vagrant"
        GROUP="vagrant"
    else
        USER="${G_USER}"
        GROUP="${G_GROUP}"
    fi

    echo -e "Changing ownership of all contents of \"${DIR}\" :\n user => \"${USER}\" \t group => \"${GROUP}\"\n"
    chown -R ${USER}:${GROUP} .
}


case "${G_CMD}" in
    "install")
        do_install
        exit 0
        ;;
    "own")
        do_own
        exit 0
        ;;
    "secure")
        do_secure
        exit 0
        ;;
    "unsecure")
        do_unsecure
        exit 0
        ;;
    *)
        echo "Usage: ops.sh [install|own|secure|unsecure]"
        exit 1
        ;;
esac
