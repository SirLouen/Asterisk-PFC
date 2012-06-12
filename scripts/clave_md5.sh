#! /bin/bash
REALM=":asterisk:"
echo -n $1$REALM$2 | md5sum
