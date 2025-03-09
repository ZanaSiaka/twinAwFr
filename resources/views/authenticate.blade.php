<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Connexion | TwinAward </title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="connexion">
        <h1>Connectez-vous</h1>
        <form action="{{ route('authenticateSave') }}" method="POST">
            @csrf
            <input type="text" placeholder="Matricule"  name="matricule" value="{{ old('matricule') }}" />
            <input type="password" placeholder="Mot de passe" name="password" />

            <button>Se connecter</button>
        </form>
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
