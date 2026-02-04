AOS.init({
    duration: 1000,
    once: true
});

// Navbar Toggler Animation
const toggler = document.querySelector('.custom-toggler');
if (toggler) {
    toggler.addEventListener('click', () => {
        toggler.classList.toggle('active');
    });
}