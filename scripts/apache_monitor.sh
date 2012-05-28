#!/bin/bash

SERVER="home-asterisk.local"
PORT="80"
WORKDIR="/home/asterisk/repositorio/scripts"

echo "quit" | telnet $SERVER $PORT | grep "Escape character is"

if [ "$?" -ne 0 ]; then
  cp $WORKDIR/apache_warning.call $WORKDIR/apache_warning_temp.call
  mv $WORKDIR/apache_warning_temp.call /var/spool/asterisk/outgoing/
  exit 1
fi

