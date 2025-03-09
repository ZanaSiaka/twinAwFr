<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Nominés</title>
    <link rel="icon" href="../images/logo/logoOriginal.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/nomine.css">
</head>
<body>

    <nav class="navBarre">
        <img src='../images/logo/logoOriginal.svg' alt="logoTwinAward" />
        <ul class="list-group">
            <li class="list-group-item"><a class='link-list-group' href="{{ route('nomine') }}">Présentation des awards</a></li>
            {{-- <li class="list-group-item"><a class='link-list-group' href='/' style="color: #FFB700;">Vote</a></li> --}}
            <li class="list-group-item"><a class='link-list-group' href="/">ChatBox</a></li>
            <li class="list-group-item"><a class='link-list-group' href="/" >À propos</a></li>
        </ul>
        <div class="linkToConnectDiv">
            <a href="./connexion.html" class="linkToConnect">Déconnexion</a>
        </div>
    </nav>

    <main>
        <div class="entete">
            Les nominés
        </div>
        <div class="search">
            <select name="" id="" class="input">
                <option value="" class="option">Tous les nominés</option>
                <option value="" class="option">Meilleur dormeur</option>
                <option value="" class="option">Meilleur badeur</option>
            </select>
            <input type="text" placeholder="Recherchez un nominé..." class="input">
            <button class="btn"> <img src="../images/img/search.svg" alt=""> Rechercher</button>
        </div>
        @foreach ($awards as $award)
        <div class="gridCat">
            <div class="card">
                <div class="cardTop">
                    <img src="{{ asset('storage/' . $award->imageUrl) }}" alt="">
                    {{--ou  <img src="{{ Storage::url($award->imageUrl) }}" alt=""> --}}
                </div>
                <div class="cardBottom">
                    <p class="name">{{ $award->nom }}</p>
                    <div class="categorie">{{ $award->nom }}</div>
                    <button class="cardBtn"><img src="../images/img/voteBlack.svg" alt="voterIcon">Voter</button>
                </div>
            </div>
        </div>
            @endforeach

            {{-- <div class="card">
                <div class="cardTop">
                    <img src="../images/img/mrBusy.svg" alt="">
                </div>
                <div class="cardBottom">
                    <p class="name">Zana Siaka COULIBALY</p>
                    <div class="categorie">Meilleur Gbayeur</div>
                    <button class="cardBtn"><img src="../images/img/voteBlack.svg" alt="voterIcon">Voter</button>
                </div>
            </div>

            <div class="card">
                <div class="cardTop">
                    <img src="../images/img/mrBusy.svg" alt="">
                </div>
                <div class="cardBottom">
                    <p class="name">Zana Siaka COULIBALY</p>
                    <div class="categorie">Meilleur Gbayeur</div>
                    <button class="cardBtn"><img src="../images/img/voteBlack.svg" alt="voterIcon">Voter</button>
                </div>
            </div>

            <div class="card">
                <div class="cardTop">
                    <img src="../images/img/mrBusy.svg" alt="">
                </div>
                <div class="cardBottom">
                    <p class="name">Zana Siaka COULIBALY</p>
                    <div class="categorie">Meilleur Gbayeur</div>
                    <button class="cardBtn"><img src="../images/img/voteBlack.svg" alt="voterIcon">Voter</button>
                </div>
            </div> --}}
        
    </main>
    
    <footer class='footer'>
        <img src='../images/logo/logoWhite.svg' alt="logoFooterTwin"/>
        <ul>
            <li><a class="footerLink" href="#">Presentation des awards</a></li>
            <li><a class="footerLink" href="#" style="color: #FFB700">Vote</a></li>
            <li><a class="footerLink" href="#">ChatBox</a></li>
            <li><a class="footerLink" href="#" >À propos</a></li>
        </ul> <hr />
        <p>&copy; 2024 TwinAwards. Tous droits reservés.</p>
    </footer>
</body>
</html>