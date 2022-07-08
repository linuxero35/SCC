<?php

$alert = False;

if (isset($_GET['alert'])) {
    $alert = boolval($_GET["alert"]);
}

if ($alert) {
    echo '<div class="container-fluid alertmessage">'.
    '<div class="row" style="width: 50%;margin-left: 20%;">'.
        '<div class="alert alert-success" role="alert">'.
        $_GET['mensaje'].
      '</div>'.
        '</div>'.
'</div>';
}

?>