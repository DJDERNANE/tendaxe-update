// button scroll to top

const scrollToTopBtn = document.getElementById("scrollToTopBtn");

window.onscroll = function() {
  showScrollButton();
};

function showScrollButton() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    scrollToTopBtn.style.display = "block";
  } else {
    scrollToTopBtn.style.display = "none";
  }
}

scrollToTopBtn.addEventListener("click", function() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
});

  

/* enable tooltip */

let tooltipelements = document.querySelectorAll("[data-bs-toggle='tooltip']");
tooltipelements.forEach((el) => {
    new bootstrap.Tooltip(el);
});
