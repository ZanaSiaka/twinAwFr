<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À Propos</title>
    <link rel="stylesheet" href="../css/propos.css">
</head>
<body>
    
    <nav class="navBarre">
        <img src='../images/logo/logoOriginal.svg' alt="logoTwinAward" />
        <ul class="list-group">
            <li class="list-group-item"><a class='link-list-group' href="/">Présentation des awards</a></li>
            <li class="list-group-item"><a class='link-list-group' href='/'>Vote</a></li>
            <li class="list-group-item"><a class='link-list-group' href="/">ChatBox</a></li>
            <li class="list-group-item"><a class='link-list-group' href="/" style="color: #FFB700;">À propos</a></li>
        </ul>
        <div class="linkToConnectDiv">
            <a href="./connexion.html" class="linkToConnect">Déconnexion</a>
        </div>
    </nav>

    <main>
        <div class="entete">
            À PROPOS
        </div>
        <section>
            <div class="left">
                <h1>Que faut-il savoir sur TWIN AWARDS ?</h1>
                <p>
                    Les TWIN AWARDS sont bien plus qu'une simple compétition : c'est une célébration de la camaraderie et de la créativité initiée par les étudiants de la filière TWIN IT 11. Conçue pour égayer le quotidien académique, cette compétition permet à chacun de voter pour ses favoris dans différentes catégories amusantes et engageantes. Sous la direction de Coulibaly Zana, avec le soutien des dynamiques membres de l'équipe, notamment Bohoussou Aurel, N'dja Odi, Kouassi Marc Evan, Blay Yves Samuel, et Sidjane Osée, les TWIN AWARDS incarnent un esprit d'unité, de divertissement et de célébration des talents et des moments partagés entre camarades. Que vous soyez compétiteur, votant ou simple spectateur, les TWIN AWARDS vous promettent des instants mémorables où bonne humeur et amusement sont au rendez-vous. Préparez-vous à vivre une expérience unique et à découvrir qui remportera les trophées tant convoités de cette édition !
                </p>
            </div>
            <div class="right">
                <img src="../images/logo/logoBlack.svg" alt="logo">
            </div>
        </section>
    </main>
    
    <footer class='footer'>
        <img src='../images/logo/logoWhite.svg' alt="logoFooterTwin"/>
        <ul>
            <li><a class="footerLink" href="#">Presentation des awards</a></li>
            <li><a class="footerLink" href="#">Vote</a></li>
            <li><a class="footerLink" href="#">ChatBox</a></li>
            <li><a class="footerLink" href="{{ route('apropos') }}" style="color: #FFB700">À propos</a></li>
        </ul> <hr />
        <p>&copy; 2024 TwinAwards. Tous droits reservés.</p>
    </footer>

</body>
</html>