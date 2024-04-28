<?php

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=formatech", "formatech", "Formatech?$2024");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Inclusion des données depuis data.php
    include 'data.php';

    // Insertion des nouvelles données pour la table 'formation'
    foreach ($formations as $formation) {
        $query = "INSERT INTO formation (name, durationFormationInMonth, abbreviation, rncpLvl, accessibility) VALUES (:name, :duration, :abbreviation, :rncpLvl, :accessibility)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'name' => $formation['nom'],
            'duration' => $formation['duree'],
            'abbreviation' => $formation['abreviation'],
            'rncpLvl' => $formation['niveau'],
            'accessibility' => 1, // Vous pouvez ajuster cette valeur en fonction de vos besoins
        ]);
    }

    // Insertion des nouvelles données pour la table 'module'
    foreach ($modules as $module) {
        // Vous devrez remplacer 'formation_name' par le nom correct de la formation dans laquelle ce module appartient
        $query = "INSERT INTO module (name, durationModuleInHours) VALUES (:name, :duration)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'name' => $module['nom'],
            'duration' => $module['duree'],
        ]);
    }

    // Insertion des nouvelles données pour la table 'classroom'
    foreach ($salles as $salle) {
        $query = "INSERT INTO classroom (name, capacityMax, building) VALUES (:name, :capacity, :building)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'name' => $salle['nom'],
            'capacity' => $salle['capacite'],
            'building' => $salle['batiment'],
        ]);
    }

    echo "Les données ont été insérées avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>