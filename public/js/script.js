
  document.addEventListener("DOMContentLoaded", function () {
    const currentPage = location.pathname.split("/").pop(); 
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

    navLinks.forEach(link => {
      const linkPage = link.getAttribute("href");

  
    if (linkPage === "<?= BASE_URL ?>logout.php") return;

      if (linkPage === currentPage) {
        link.classList.add("text-warning", "fw-bold");
      }
    });
  });
