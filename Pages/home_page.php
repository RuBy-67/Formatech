<?php
require_once(__DIR__ . '/../Layouts/header.php');

?>
<section class="w-full h-[400px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
    <h1 class="text-center mb-8">Formatech Futur</h1> 
    <p class="text-white text-h4 text-center">Explorez l'avenir technologique avec nous.</p>
</section>
<section class="container mb-12">
    <h2 class="text-center mb-8">À la Pointe de l'Excellence</h2>
    <div class="flex flex-col md:flex-row items-center">
        <p class="sm:w-max px-8 "> Notre approche éducative est résolument orientée vers la pratique.
        Nos étudiants bénéficient d'un accès privilégié à un laboratoire de technologies avancées, 
        équipé d'un accélérateur à particules, d'un centre de robotique, et d'un datacenter à ordinateurs quantiques 
        . Chez FormaTech FUTUR, nous transformons les idées en réalité.
        </p>
        <img src="/Assets/images/energie_02.png" alt="projet Neutron 2058" class="w-1/3 rounded-md ">
    </div>
</section>
<section class="container mb-12">
    <h2 class="text-center mb-8">Ambitions Démesurées, Recherche Logiciel Innovant</h2>
    <div class="flex flex-col md:flex-row items-center"> 
        <img src="/Assets/images/VR_02.png" alt="projet Neutron 2058" class="w-1/3 rounded-md ">
        <p class="sm:w-max px-8 "> 
            Poursuivre ses rêves nécessite une infrastructure à la hauteur. 
            FormaTech FUTUR est à la recherche d'un logiciel robuste et ambitieux, capable de soutenir l'étendue de nos aspirations éducatives. 
            Rejoignez-nous dans cette aventure où le futur se construit dès aujourd'hui.
        </p>
       
    </div>
    
    
</section>
<section class="container mb-8">
  
    <?php
        require_once(__DIR__ . '/../Templates/formation_list_public.php');
    ?>

</section>

<?php
require_once(__DIR__ . '/../Layouts/footer.php');
?>
