<?php

    if ( 0 < $_FILES['myFile']['error'] ) {
        echo 'Error: ' . $_FILES['myFile']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['myFile']['tmp_name'], 'uploads/' . $_FILES['myFile']['name']);
    }

?>