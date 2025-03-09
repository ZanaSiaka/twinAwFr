    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    <div class="row">
    <div class="col-md-8">
        <form action="{{ isset($user) ? route('admin.user.update', ['user' => $user->id]) : route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif    <div class="mb-3">
        <label for="matricule" class="form-label">Matricule</label>
        <input type="text"  placeholder="Matricule ..."  name="matricule" value="{{ old('matricule', isset($user) ? $user->matricule : '') }}" class="form-control" id="matricule" aria-describedby="matriculeHelp" required/>

        @error('matricule')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text"  placeholder="Email ..."  name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" class="form-control" id="email" aria-describedby="emailHelp" required/>

        @error('email')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>    <div class="mb-3">
        <label for="email_verified_at" class="form-label">Email_verified_at</label>
        <input type="text"  placeholder="Email_verified_at ..."  name="email_verified_at" value="{{ old('email_verified_at', isset($user) ? $user->email_verified_at : '') }}" class="form-control" id="email_verified_at" aria-describedby="email_verified_atHelp" required/>

        @error('email_verified_at')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>    

    <div class="mb-3">
        <label for="roles" class="form-label">Roles</label>
        <select class="form-control" name="roles[]" id="roles" multiple>
            <option value="null" disabled>Selectionnez un role </option>
            @foreach ($roles as $role)     
            <option value="{{ $role->id }}"
                value="{{ $role->id }}"
                @if (in_array($role->id, old('roles' , isset($user) ? $user->roles->pluck('id')->toArray() : []))) selected @endif>{{ $role->nom }}</option>
            @endforeach
        </select>
        @error('roles')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div> 

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" placeholder="Password ..." value="{{ old('password', isset($user) ? $user->password : '') }}" class="form-control" id="password" aria-describedby="passwordHelp" required/>

        @error('password')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>    <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text"  placeholder="Pseudo ..."  name="pseudo" value="{{ old('pseudo', isset($user) ? $user->pseudo : '') }}" class="form-control" id="pseudo" aria-describedby="pseudoHelp" required/>

        @error('pseudo')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>    <div class="mb-3">
        <button type="button" class="btn btn-success btn-file my-1" onclick="triggerFileInput('imageUrl')">
            Add file :  (ImageUrl)
        </button>
        <input type="file" name="imageUrl" value="{{ old('imageUrl', isset($user) ? $user->imageUrl : '') }}" class="visually-hidden form-control imageUpload" id="imageUrl" aria-describedby="imageUrlHelp"/>

        <div class="form-group d-flex" id="preview_imageUrl" style="max-width: 100%;">
        </div>
        @error('imageUrl')
            <div class="error text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>    <a href="{{ route('admin.user.index') }}" class="btn btn-danger mt-1">
        Cancel
    </a>
    <button class="btn btn-primary mt-1"> {{ isset($user) ? 'Update' : 'Create' }}</button>
 </form>
    </div>
    <div class="col-md-4">
    <a  class="btn btn-danger mt-1" href="{{ route('admin.user.index') }}">
    Cancel
</a>
<button class="btn btn-primary mt-1"> {{ isset($user) ? 'Update' : 'Create' }}</button>
    </div>
    </div>

    @section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

    <script>
        const textareas = document.querySelectorAll('textarea');
        textareas.forEach((textarea) => {
            ClassicEditor
                .create(textarea)
                .catch(error => {
                    console.error(error);
                });
        });

        $(document).ready(function() {
            $('select').select2();
        });
        function triggerFileInput(fieldId) {
            const fileInput = document.getElementById(fieldId);
            if (fileInput) {
                fileInput.click();
            }
        }

        const imageUploads = document.querySelectorAll('.imageUpload');
        imageUploads.forEach(function(imageUpload) {
            imageUpload.addEventListener('change', function(event) {
                event.preventDefault()
                const files = this.files; // Récupérer tous les fichiers sélectionnés
                console.log(files)
                if (files && files.length > 0) {
                    const previewContainer = document.getElementById('preview_' + this.id);
                    previewContainer.innerHTML = ''; // Effacer le contenu précédent

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        if (file) {
                            const reader = new FileReader();
                            const img = document.createElement('img'); // Créer un élément img pour chaque image

                            reader.onload = function(event) {
                                img.src = event.target.result;
                                img.alt = "Prévisualisation de l'image"
                                img.style.maxWidth = '100px';
                                img.style.display = 'block';
                            }

                            reader.readAsDataURL(file);
                            previewContainer.appendChild(img); // Ajouter l'image à la prévisualisation
                            console.log({img})
                            console.log({previewContainer})
                        }
                    }
                    console.log({previewContainer})
                }
            });
        });
    </script>
    @endsection