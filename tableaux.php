<?php

    $notes = [10, 20, 10, 9, 8];
    $eleves = ['Marc', 'Doe', [10, 20, 40]];
    $eleve = [
        'nom' => 'Doe',
        'prenom' => 'Marc',
        'notes' => [10, 20, 15]
    ];
    $eleve['classe'] = 'CM2-A';
    $classe = [
        [
            'nom' => 'Doe',
            'prenom' => 'Marc',
            'notes' => [10, 12, 14]
        ],
        [
            'nom' => 'Durant',
            'prenom' => 'Pierre',
            'notes' => [8, 13, 16]
        ]
    ];

    echo $notes[1];
    echo $eleves[2][1];
    echo $eleve['nom'];
    print_r($eleve);
    print_r($classe);

?>