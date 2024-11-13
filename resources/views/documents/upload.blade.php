@extends('layouts.storelayout')

@section('title', 'Dcuments')

@section('styling')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/uploadDocument.css') }}">
 <!-- custom css -->
 <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
@endsection
@section('content')
<div class="mt-0 mt-md-5 pt-5">
          <!-- start button scroll to top -->

          <button class="scroll-top" id="scrollToTopBtn">
            <i class="bi bi-arrow-up"></i>
        </button>

        <!-- end button scroll to top -->




        <!-- start section : upload-document -->

        <section class="upload-document">
            <div class="container">
                <h2>importation de documents</h2>

                <div class="upload-document-wrapper">
                    <form action="{{ route('specifications.newdoc') }}" method="POST" class="document-form" id="documentForm" enctype="multipart/form-data">
                        @csrf
                        <div id="fileInfos">
                            <label for="documentTitle">titre <sup class="star-required">*</sup></label>
                            <input name='title' type="text" class="form-control" id="documentTitle" value="" required>
                            <label for="documentDescription">description</label>
                            <textarea name="description" class="form-control" id="documentDescription"></textarea>
                            <select name="type" class="form-select document-category form-select-lg" id="documentCategoriesSelect">
                                <option value="0">Séléctionner une catégorie</option>
                                <option value="specification">Cahier des charges</option>
                                <option value="doc">Document utiles</option>
                                <option value="veille">Veille administratif</option>
                            </select>
                        </div>
                        <div id="dropzone">
                            <input name="image" type="file" id="fileInput" style="display: none;">
                            <svg width="48" height="38" viewBox="0 0 48 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M36.1041 9.39458C35.645 9.39458 35.1873 9.4207 34.7337 9.47305C34.1868 7.21537 32.9862 5.15908 31.2533 3.55398C29.0485 1.51175 26.1784 0.387207 23.1714 0.387207C17.6392 0.387207 12.9238 4.16492 11.6266 9.3977C5.19112 9.54204 0.000976562 14.822 0.000976562 21.2914C0.000976562 27.8517 5.33791 33.1887 11.8979 33.1887H18.5312V33.7068C18.5312 35.8611 20.2839 37.6138 22.4382 37.6138H25.5638C27.7181 37.6138 29.4707 35.8611 29.4707 33.7068V33.1887H36.1041C42.664 33.1887 48.001 27.8517 48.001 21.2914C48.001 14.7316 42.6639 9.39458 36.1041 9.39458ZM31.0708 26.133C30.7824 26.6861 30.2103 27.033 29.5863 27.033H27.2382V33.9699C27.2382 34.8946 26.4884 35.6443 25.5638 35.6443H22.4382C21.5135 35.6443 20.7638 34.8946 20.7638 33.9699V27.033H18.4156C17.7917 27.033 17.2196 26.6861 16.931 26.133C16.6425 25.5798 16.6853 24.9122 17.0422 24.4005L22.6276 16.3939C22.9408 15.945 23.4536 15.6774 24.0011 15.6774C24.5482 15.6774 25.061 15.9449 25.3743 16.3939L30.9596 24.4006C31.3165 24.9123 31.3595 25.5798 31.0708 26.133Z" fill="#11A3AB"/>
                            </svg>
                            <p>Déposez vos fichiers ici ou cliquez pour les sélectionner</p>
                            <p class="document-uploaded" id="documentUploadedName"></p>
                        </div>
                        <button type="submit" class="document-submit" name="terminer" value="terminer">Terminer</button>
                        <button type="button" class="document-delete" id="documentDelete" name="supprimer" value="supprimer">Supprimer</button>
                    </form>
                </div>
            </div>
        </section>

        <!-- end section : upload-document -->

    </div>
@endsection
@section('scripts')
<script>
            
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('fileInput');
    const documentForm = document.getElementById('documentForm');

    // Gestion du drag & drop
    dropzone.addEventListener('dragover', function(event) {
        event.preventDefault();
        dropzone.classList.add('hover');
    });

    dropzone.addEventListener('dragleave', function(event) {
        dropzone.classList.remove('hover');
    });

    dropzone.addEventListener('drop', function(event) {
        event.preventDefault();
        dropzone.classList.remove('hover');

        const files = event.dataTransfer.files;

        for (const file of files) {
            displayFileInfo(file);
        }
    });

    // Gestion du clic sur la zone de dépôt
    dropzone.addEventListener('click', function() {
        fileInput.click();
    });

    // Gestion de la sélection de fichiers
    fileInput.addEventListener('change', function(event) {
        const files = event.target.files;

        for (const file of files) {
            displayFileInfo(file);
        }
    });

    // Fonction pour afficher les informations d'un fichier
    function displayFileInfo(file) {
        const fileName = file.name;
        const documentUploadedName = document.getElementById("documentUploadedName");
        documentUploadedName.textContent += ` ${fileName} `;

    }
    const btnDelete = document.getElementById('documentDelete');
    btnDelete.addEventListener('click', function() {
        documentForm.querySelectorAll('input, textarea').forEach(element => {
                switch (element.type) {
                  case 'text':
                  case 'textarea':
                    element.value = '';
                    break;
                  case 'file':
                    element.nextElementSibling.nextElementSibling.nextElementSibling.textContent = ""
                    break;
                }
        });
        window.location.reload();
        let text = document.getElementById("documentCategoriesSelect").options[document.getElementById('documentCategoriesSelect').selectedIndex].text;
            text = "Séléctionner une catégorie";
    });
    
</script>
@endsection
