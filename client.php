<?php

$file = "/tmp/myclient.sock";
unlink($file);

$socket = socket_create(AF_UNIX, SOCK_DGRAM, 0);

if (socket_bind($socket, $file) === false) {
    echo "bind failed";
}

socket_sendto($socket, "Hello world!", 12, 0, "/tmp/myserver.sock", 0);
echo "sent\n";

if (socket_recvfrom($socket, $buf, 64 * 1024, 0, $source) === false) {
    echo "recv_from failed";
}
echo "received: [" . $buf . "]   from: [" . $source . "]\n";
