function nextSlide() {
    const carousel = bootstrap.Carousel.getInstance(document.querySelector('#whyChooseCarousel'));
    carousel.next();
}

function prevSlide() {
    const carousel = bootstrap.Carousel.getInstance(document.querySelector('#whyChooseCarousel'));
    carousel.prev();
}

function goToSlide(index) {
    const carousel = bootstrap.Carousel.getInstance(document.querySelector('#whyChooseCarousel'));
    carousel.to(index);
}

document.addEventListener('DOMContentLoaded', () => {
    const carouselElement = document.querySelector('#whyChooseCarousel');
    if (!bootstrap.Carousel.getInstance(carouselElement)) {
        new bootstrap.Carousel(carouselElement);
    }
});
