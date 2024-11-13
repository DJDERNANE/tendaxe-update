
/* maintenir le dropdown de categories ouvert */

/*$('.categories-dropdown button').click(
    function() {
        console.log($(this).parent().find('.dropdown-menu'))
        $(this).parent().find('.dropdown-menu').slideDown();
    }
);*/

$('.categories-dropdown').click(
    function() {
        $(this).find('.dropdown-menu').stop(true, true).delay().fadeIn();
        $(this).find('.dropdown-menu').children('.dropdown-menu').stop(true, true).fadeOut();
    },
    /*function() {
        $(this).find('.dropdown-menu').stop(true, true).delay().fadeOut();
    }*/
);


/*$('.categories-dropdown .dropdown-menu').click(
    function() {
        $(this).stop(true, true);
    },
    function() {
        $(this).stop(true, true).delay().fadeOut();
    }
);*/

/*$(document).click(function(event) {
  const clickedElement = event.target;
  const dropdownButton = $('.categories-dropdown');
  const dropdownMenu = dropdownButton.find('.dropdown-menu');

  if (!clickedElement.is(dropdownButton) && !dropdownMenu.has(clickedElement)) {
    dropdownMenu.fadeOut();
  
});*/


/*const dropdown = document.getElementById('dropdown');
dropdown.addEventListener('click', function(event) {
  event.preventDefault(); // Empêchez la fermeture du menu déroulant
  // Le code à exécuter lorsque l'utilisateur clique sur le menu déroulant
});*/

// slider for marques
var swiperMarques = new Swiper(".mySwiper", {
    slidesPerView: 4,
    grid: {
        rows: 1,
    },
    autoplay: {
       delay: 3000,
    },
    navigation: {
        nextEl: ".swiper-button-next1",
        prevEl: ".swiper-button-prev1",
    },
    loop: true,
    spaceBetween: 30,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 4,
            spaceBetween: 30,
        },
        // when window width is >= 1024px
        1024: {
            slidesPerView: 6,
            spaceBetween: 40,
        },
        // when window width is >= 1200px
        1200: {
            slidesPerView: 7,
            spaceBetween: 30,
        }
    }
});


// slider for stores
var swiperStores = new Swiper(".storesSwiper", {
    slidesPerView: 4,
    grid: {
        rows: 1,
    },
    autoplay: {
       delay: 3000,
    },
    navigation: {
        nextEl: ".stores-swiper-button-next1",
        prevEl: ".stores-swiper-button-prev1",
    },
    loop: true,
    spaceBetween: 30,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        // when window width is >= 1024px
        1024: {
            slidesPerView: 5,
            spaceBetween: 40,
        }
    }
});

// slider for categories in home page
var swiperCategories = new Swiper(".categoriesSwiper", {
    slidesPerView: 4,
    grid: {
        rows: 1,
    },
    autoplay: {
       delay: 3000,
    },
    navigation: {
        nextEl: ".categories-swiper-button-next1",
        prevEl: ".categories-swiper-button-prev1",
    },
    loop: true,
    spaceBetween: 30,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        // when window width is >= 1024px
        1024: {
            slidesPerView: 5,
            spaceBetween: 40,
        },
        // when window width is >= 1200px
        1200: {
            slidesPerView: 6,
            spaceBetween: 10,
        }
    }
});

// slider for testimonials
var swiperTestimonials = new Swiper(".testimonialsSwiper", {
    slidesPerView: 1,
    grid: {
        rows: 1,
    },
    autoplay: {
       delay: 3000,
    },
    navigation: {
        nextEl: ".testimonials-swiper-button-next1",
        prevEl: ".testimonials-swiper-button-prev1",
    },
    pagination: {
        el: ".testimonials-swiper-pagination",
        clickable: true,
    },
    loop: true,
    spaceBetween: 70,
    /*breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 10,
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 10,
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 1,
            spaceBetween: 30,
        },
        // when window width is >= 1024px
        1024: {
            slidesPerView: 1,
            spaceBetween: 40,
        },
        // when window width is >= 1200px
        1200: {
            slidesPerView: 1,
            spaceBetween: 10,
        }
    }*/
});



// drag & drop files
const dropzone = document.getElementById('dropzone');
const fileInput = document.getElementById('fileInput');
const fileInfos = document.getElementById('fileInfos');

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

    const documentEle = document.createElement('p');
    documentEle.className = 'document-name';
    documentEle.textContent = `${fileName}`;

    fileInfos.appendChild(documentEle);
}