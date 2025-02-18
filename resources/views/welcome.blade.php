<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twin Awards</title>
    <link rel="stylesheet" href="./css/style.css">
    @vite('resources/css/app.css')
</head>
<body id="body">
    <nav class="navBarre">
        <img src='./images/logo/logoOriginal.svg' alt="logoTwinAward" />
        <ul class="list-group">
            <li class="list-group-item"><a class='link-list-group' href="{{route('awards')}}">Présentation des awards</a></li>
            <li class="list-group-item"><a class='link-list-group' href='{{route('vote')}}'>Vote</a></li>
            <li class="list-group-item"><a class='link-list-group' href="/">ChatBox</a></li>
            <li class="list-group-item"><a class='link-list-group' href="{{route('a_propos')}}">À propos</a></li>
        </ul>
        <div class="linkToConnectDiv">
            <a href="./connexion.html" class="linkToConnect">Connexion</a>
        </div>
    </nav>

    <main>
        <section class='firstMain'>
			<div class="leftPart">
				<h1>TWIN AWARDS</h1>
				<p>
					Bienvenue dans le concours des twinners. <br />
					Êtes-vous prêt à plonger dans l'univers de ce jeu concours ?
				</p>
				<div class='divConnect'>
					<a href='#' class='linkToVoteOrConnect linkToVote'>Voter maintenant</a>
					<a href='./connexion.html' class='linkToVoteOrConnect linkToCo'>Connectez-vous</a>
				</div>
			</div>
			<div class="rightPart">
				<img src='./images/logo/logoBlack.svg' alt="logoBlackTwin" />
			</div>
		</section>

        <section class="second-main">
			<h1>Comment ça marche ?</h1>
			<div class="flexDiv">
				<div class="flexDivItem">
					<img src='./images/img/createAccount.svg' alt="firstIcon" />
					<h2>Créer un compte</h2>
					<p>Créer un compte est gratuit et rapide !</p>
				</div>
				<div class="flexDivItem" alt='secondIcon'>
					<img src="./images/img/img.svg" alt="secondIcon" />
					<h2>Être en Twin</h2>
					<p>Faire partir des étudiants de la filière TWIn de l'ESATIC</p>
				</div>
				<div class="flexDivItem" alt='thirdIcon'>
					<img src="./images/img/vote.svg" alt="thirdIcon" />
					<h2>Voter</h2>
					<p>Voter dans toutes les catégories et surtout le ou la TWINNER de cette édition</p>
				</div>
			</div>
		</section>

        <section class="third-main">
			<h1>Pourquoi Twin Awards ?</h1>
			<div class="divClass">
				<h1>Twin Awards</h1>
				<p>
					Twin awards a été créé et pensé par les étudiants de la twin dans le cadre de se divertir après une année scolaire très coincée. Elle vise à rassembler et créer les liens de famille entre les étudiants de la classe.
				</p>
			</div>
		</section>

        <section class="four-main">
			<div class="four-item sameNum">
				<h1>Quelques chiffres</h1>
			</div>
			<div class="four-item etud">
				<p>Effectif</p>
				<div class="text">
					<h1>22</h1>
					<h6>Étudiants</h6>
				</div>
			</div>
			<div class="four-item boys">
				<div class="text">
					<h1>19</h1>
					<h6>Garçons</h6>
				</div>
			</div>
			<div class="four-item girl">
				<div class="text">
					<h1>3</h1>
					<h6>Filles</h6>
				</div>
			</div>
		</section>

        <section class="five-main">
			<h1>Alors qu'attends-tu pour aller voter ?</h1>
			<p>Réjoins nous dans cette aventure en votant ton twinner dans chaque catégorie.</p>
			<a href='#' class='now-vote-link'>Voter maintenant</a>
		</section>

		<section class="last-main">
			<h1 class="last-main-title">Quelques catégories</h1>
			<p>Nous vous proposons quelques catégories de TWIN AWARDS</p>

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

            @if($awards->isNotEmpty())
                <a href='{{route('awards')}}' class='linkToShowMore'>Afficher plus</a>
            @endif

		</section>


    </main>

    <footer class='footer'>
        <img src='./images/logo/logoWhite.svg' alt="logoFooterTwin"/>
        <ul>
            <li><a class="footerLink" href="{{route('awards')}}">Presentation des awards</a></li>
            <li><a class="footerLink" href="{{route('vote')}}">Vote</a></li>
            <li><a class="footerLink" href="#">ChatBox</a></li>
            <li><a class="footerLink" href="{{route('a_propos')}}">À propos</a></li>
        </ul> <hr />
        <p>&copy; 2024 TwinAwards. Tous droits reservés.</p>
    </footer>

	<script src="./js/script.js"></script>
</body>
</html>
