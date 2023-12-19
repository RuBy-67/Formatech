<?php

// Définition de la première classe
class MaClasse1 {
    private $valeur;

    public function __construct($valeur) {
        $this->valeur = $valeur;
    }

    public function afficher() {
        echo "La valeur est : {$this->valeur}\n";
    }
}

// Définition de la deuxième classe utilisant la première classe
class MaClasse2 {
    private $autreClasse;

    public function __construct(MaClasse1 $autreClasse) {
        $this->autreClasse = $autreClasse;
    }

    public function utiliserClasse() {
        $this->autreClasse->afficher();
    }
}

// Création d'une instance de la première classe
$objetClasse1 = new MaClasse1(42);

// Création d'une instance de la deuxième classe en utilisant la première classe
$objetClasse2 = new MaClasse2($objetClasse1);

// Appel d'une méthode de la deuxième classe qui utilise la première classe
$objetClasse2->utiliserClasse();

?>
