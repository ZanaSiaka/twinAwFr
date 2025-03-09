<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/categorie.css">

</head>
<body>
    <nav class="navBarre">
        <img src={logo} alt="logoTwinAward" />
        <ul class="list-group">
            <li class="list-group-item"><a class='link-list-group' href="{{route('welcome')}}">Présentation des Twinners</a></li>
            <li class="list-group-item"><a class='link-list-group' href="{{route('chatbox')}}">ChatBox</a></li>
        </ul>
        <div class="linkToConnectDiv">
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class='linkToConnect linkToConnectDiv'>Se deconnecter
                    </button>
                </form>
            @else
                <a href='{{ route('authenticate') }}'   class=''>Connectez-vous
                </a>
            @endauth
        </div>
    </nav>
    <a href="{{route('welcome')}}" class="back-categorie">
        <ion-icon name="arrow-back" id="prev2"></ion-icon>
        {{-- <p>Toutes les catégories</p> --}}
    </a>
    <div class="grid-container">

        @foreach($awards as $award)
        <div class="box1">
            <img src="{{ Str::startsWith($award->imageUrl, 'http') ? $award->imageUrl : Storage::url($award->imageUrl) }}" alt="">
            <p>{{$award->nom}}</p>
            <a href="{{ route('nomines', ['category' => $award->nom]) }}" class="voir-plus">Voir plus</a>
        </div>
        @endforeach


    </div>
    <div class="pagination">
        <ion-icon name="arrow-dropleft" id="prev"></ion-icon>
        <span id="page-info"></span>
        <ion-icon name="arrow-dropright" id="next"></ion-icon>
    </div>
    <script  src = "https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js" > </script>
    <script>
        const gridParPage = 6; //nbre d'elements par page
        let pageActuelle = 1; //la page actuelle
        const items = document.querySelectorAll('.box1') //prend les elts de la boxe
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
