<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie Awards</title>
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="./css/style.css">
    @vite('resources/css/app.css')

</head>
<body>
    <nav class="navBarre">
        <img src={logo} alt="logoTwinAward" />
        <ul class="list-group">
            <li class="list-group-item"><a class='link-list-group' href="{{route('welcome')}}">Présentation des Twinners</a></li>
            <li class="list-group-item"><a class='link-list-group' href="/">ChatBox</a></li>
        </ul>
        <div class="linkToConnectDiv">
            <a href="/" class="linkToConnect">Déconnexion</a>
        </div>
    </nav>
    <div class="back-categorie">
        <a href="{{route('welcome')}}"><ion-icon name="arrow-back" id="prev2"></ion-icon></a>
        <p>Toutes les catégories</p>
    </div>
    <div class="grid-container">
        <div class="last-main-categories">

            @if($awards->isEmpty())
                <h4 class="text-center text-2xl text-white">Aucune catégorie disponible.</h4>
            @else
                @foreach($awards as $award)
                    <div class="last-main-categories-item">
                        <div class="last-main-categories-item-top">
                            <h2 class="last-main-categories-item-title">Catégorie {{$award->idAward + 1}}</h2>
                        </div>
                        <div class="last-main-categories-item-bottom">
                            <h4>{{$award->nomAward}}</h4>
                            <p>{{$award->descriptionAward}}</p>
                            <a href='' class='linkToKnowMore'>En savoir plus <span><img src="./images/img/fleche.svg" alt="fleche" /></span></a>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>

    </div>
    <div class="pagination">
        @if($awards->isNotEmpty())
            <ion-icon name="arrow-dropleft" id="prev"></ion-icon>
            <span id="page-info"></span>
            <ion-icon name="arrow-dropright" id="next"></ion-icon>
        @endif
    </div>
    <script  src = "https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js" > </script>
    <script>
        const gridParPage = 6; //nbre d'elements par page
        let pageActuelle = 1; //la page actuelle
        const items = document.querySelectorAll('.last-main-categories-item') //prend les elts de la boxe
        const totalPages = Math.ceil(items.length /gridParPage) // Calcul du nombre total de pages
        function displayPage(page){
            const debutIndex = (page - 1) * gridParPage;
            const finIndex = debutIndex + gridParPage;
            items.forEach((item, index) => {
                item.style.display = (index >= debutIndex && index < finIndex) ? 'block' : 'none';

            });
            //mise à jour de l'affichage de la page
            document.getElementById('page-info').textContent = `${page} / ${totalPages}`;
        }

        //gestion des événements pour les boutons precedent et suivant
        document.getElementById('prev').addEventListener('click', () => {
            if (pageActuelle > 1) {
                pageActuelle--;
                displayPage(pageActuelle);
                }
        });

        document.getElementById('next').addEventListener('click', () => {
            if (pageActuelle < totalPages) {
                pageActuelle++;
                displayPage(pageActuelle);
                }
            });
        displayPage(pageActuelle);

        document.getElementById('prev2').addEventListener('click', () => {
            if (pageActuelle > 1) {
                pageActuelle--;
                displayPage(pageActuelle);
                }
        });
    </script>
</body>
</html>
