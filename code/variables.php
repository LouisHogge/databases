<?php 

    $user = 
    [
        'username' => 'group22',
        'password' => 'wz3VvtYBlo'
    ];

    // Si le cookie est présent
    if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
        $loggedUser = [
            'username' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
        ];
    }


    //$option_memoire_filtrer = null;
    //$filtre_memoire_filtrer = null;

?>
