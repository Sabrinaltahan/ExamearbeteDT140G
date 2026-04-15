
/* header */
const menuToggle = document.getElementById("menuToggle");
const navbar = document.querySelector(".navbar");

if (menuToggle && navbar) {
  menuToggle.addEventListener("click", () => {
    navbar.classList.toggle("active");
  });
}



document.body.classList.add("js-enabled");

const animatedElements = document.querySelectorAll(
  ".scroll-animate, .scroll-left, .scroll-right"
);

function checkScroll() {
  const triggerBottom = window.innerHeight * 0.85;

  animatedElements.forEach((el) => {
    const elementTop = el.getBoundingClientRect().top;
    if (elementTop < triggerBottom) {
      el.classList.add("active");
    }
  });
}

window.addEventListener("scroll", checkScroll);
checkScroll();

const scrollContainer = document.getElementById("projectsRow");
const scrollLeftBtn = document.getElementById("scrollLeft");
const scrollRightBtn = document.getElementById("scrollRight");

if (scrollContainer && scrollLeftBtn && scrollRightBtn) {
  scrollRightBtn.addEventListener("click", () => {
    scrollContainer.scrollBy({
      left: 300,
      behavior: "smooth"
    });
  });

  scrollLeftBtn.addEventListener("click", () => {
    scrollContainer.scrollBy({
      left: -300,
      behavior: "smooth"
    });
  });
}