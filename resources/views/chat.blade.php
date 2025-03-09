<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Nominés</title>
    <link rel="icon" href="../images/logo/logoOriginal.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/chat_user.css">
    <link rel="stylesheet" href="../css/chat_admin.css">
</head>
<body>

    <nav class="navBarre">
        <img src='../images/logo/logoOriginal.svg' alt="logoTwinAward" />
        <ul class="list-group">
            <li class="list-group-item"><a class='link-list-group' href="{{ route('nomines') }}">Présentation des awards</a></li>
            {{-- <li class="list-group-item"><a class='link-list-group' href=''>Vote</a></li> --}}
            <li class="list-group-item"><a class='link-list-group' href="{{route('chatbox')}}">ChatBox</a></li>
            <li class="list-group-item"><a class='link-list-group' href="{{ route('apropos') }}">À propos</a></li>
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

        </div>
        <div class="chat-container">
            <div class="chat-title">
                <h5>@chatbox</h5>
                <p>envoie des messages anonymes</p>
            </div>
            <div class="chat-content">
                <form action="{{ route('chatbox.store') }}" method="POST">
                    @csrf
                    <textarea name="question" id="message" rows="3" required></textarea>
                    <div class="btns">
                        <button class="next">Envoyer</button>

                    </div>
                </form>
            </div>
        </div>


    </main>
    <div class="chat-container">
        <div class="chat-title">
            <h5>@chatbox</h5>
            <p>messages anonymes</p>
        </div>
        <div class="chat-content">
            @foreach($chat as $chat)
                <p>{{$chat->question}}</p>
            @endforeach

        </div>
    </div>

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
