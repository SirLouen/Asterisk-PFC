#!/bin/bash

SERVER="home-asterisk.local"
PORT="80"

echo "quit" | telnet $SERVER $PORT | grep "Escape character is"

if [ "$?" -ne 0 ]; then
  cp apache_warning.call apache_warning_temp.call
  mv apache_warning_temp.call /var/spool/asterisk/outgoing/
  exit 1
fi

