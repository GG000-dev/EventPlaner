<?php
if (isset($_GET['notify'])) {
    file_get_contents('https://ntfy.sh/mytopic', false, stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-Type: text/plain',
            'content' => 'Button was clicked!',
        ],
    ]));
}
?>
