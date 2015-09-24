#!/usr/bin/env bash

VMNAME=$(basename $(readlink -f "$(dirname "$(readlink -f "$0")")/../../../"))
DOMAIN=$(basename $(readlink -f "$(dirname "$(readlink -f "$0")")/../"))
SRC="${PWD}"
DST="vagrant@${VMNAME}.local:/var/www/domains/${DOMAIN}"
CMD="${1}"
CLEAR_CACHE="${2}"

function do_full_sync () {
	cd ${PWD}/../../../
	vagrant rsync
}

function do_sync () {
	rsync --exclude '.git/' --exclude '.sass-cache/' --exclude 'node_modules/' --archive --delete --compress --chmod=ugo=rwX "${SRC}" "${DST}"
	echo "Synced files."
}

case $CMD in
	"full")
		do_full_sync
		exit 0
		;;
	"css")
		do_sync "${CLEAR_CACHE}"
		exit 0
		;;
	"js")
		do_sync "${CLEAR_CACHE}"
		exit 0
		;;
	"php")
		do_sync "${CLEAR_CACHE}"
		exit 0
		;;
	*)
		echo "Usage: sync.sh [full|css|php]"
		exit 1
		;;
esac
