    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    <div class="row">
    <div class="col-md-8">
        <form action="{{ isset($nomine) ? route('admin.nomine.update', ['nomine' => $nomine->id]) : route('admin.nomine.store') }}" method="POST" >
        @csrf
        @if(isset($nomine))
            @method('PUT')
        @endif
            <div class="mb-3">
                <label for="award" class="form-label">Award</label>
                <select class="form-control" name="award_id" id="award" required>
                    <option value="null" disabled>Selectionnez un Award</option>
                    @foreach ($awards as $award)
                        <option value="{{ $award->id }}"
                                @if (old('award_id', isset($nomine) ? $nomine->award_id : '') == $award->id) selected @endif>
                            {{ $award->nom }}
                        </option>
                    @endforeach
                </select>
                @error('award_id')
                <div class="error text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user" class="form-label">Utilisateur (Nominé)</label>
                <select class="form-control" name="user_id" id="user" required>
                    <option value="null" disabled>Selectionnez un Utilisateur</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                                @if (old('user_id', isset($nomine) ? $nomine->user_id : '') == $user->id) selected @endif>
                            {{ $user->pseudo }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="error text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <a href="{{ route('admin.nomine.index') }}" class="btn btn-danger mt-1">
        Cancel
    </a>
    <button class="btn btn-primary mt-1"> {{ isset($nomine) ? 'Update' : 'Create' }}</button>
 </form>
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


    </script>
    @endsection
