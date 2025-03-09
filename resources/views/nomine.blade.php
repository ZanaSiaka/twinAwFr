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
            <li class="list-group-item"><a class='link-list-group' href="{{ route('welcome') }}">Acceuil</a></li>
            {{-- <li class="list-group-item"><a class='link-list-group' href='/' style="color: #FFB700;">Vote</a></li> --}}
            <li class="list-group-item"><a class='link-list-group' href="{{route('chatbox')}}">ChatBox</a></li>
            <li class="list-group-item"><a class='link-list-group' href="{{route('apropos')}}">À propos</a></li>
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

    <main>
        <div class="entete">
            Les nominés
        </div>
        <form class="search" action="{{ route('nomines') }}" method="GET">
            <select name="category" id="category" class="input" onchange="this.form.submit()">
                <option value="" class="option">Tous les nominés</option>
                @foreach ($awards as $award)
                    <option value="{{ $award->nom }}" class="option"
                            @if(request('category') == $award->id) selected @endif>
                        {{ $award->nom }}
                    </option>
                @endforeach
            </select>
        </form>

    @foreach ($nomines as $nomine)
        <div class="gridCat">
            <div class="card">
                <div class="cardTop">
                    @if($award->user && $award->user->imageUrl)
                    <img src="{{ asset('storage/' . $award->user->imageUrl) }}" alt="">
                    @else
                        <h2>Aucune photo</h2>
                    @endif
                    {{--ou  <img src="{{ Storage::url($award->imageUrl) }}" alt=""> --}}
                </div>
                <div class="cardBottom">
                    <p class="name">{{  $nomine->user->pseudo }}</p>
                    <div class="categorie">{{ $nomine->award->nom }}</div>
                    <a href="{{ route('voter', $nomine->id) }}" class="cardBtn"><img src="../images/img/voteBlack.svg" alt="voterIcon">Voter</a>
                </div>
            </div>
        </div>
            @endforeach


    </main>

    <footer class='footer'>

        <img src='../images/logo/logoWhite.svg' alt="logoFooterTwin"/>
        <ul>
            <li><a class="footerLink" href="#" style="color: #FFB700">Presentation des awards</a></li>
            <li><a class="footerLink" href="{{route('chatbox')}}">ChatBox</a></li>
            <li><a class="footerLink" href="{{route('apropos')}}" >À propos</a></li>
        </ul> <hr />
        <p>&copy; 2024 TwinAwards. Tous droits reservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error',
            })
        </script>
    @endif

</body>
</html>
