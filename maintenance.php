<?php
    header("HTTP/1.1 503 Service Unavailable");
    header("Status: 503 Service Unavailable");
    header("Retry-After: 3600");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pizza Billy - Mode Maintenance</title>
        <meta name="robots" content="none" />
    </head>
    <body>
        <h1>Mode maintenance</h1>
    </body>
</html>