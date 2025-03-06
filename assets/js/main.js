document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = document.querySelector('#testimonialsCarousel');
    if (myCarousel) {
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            ride: 'carousel'
        });
    }

    const form = document.getElementById('contact-form');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            mode: 'no-cors'
        })
            .then(response => {
                successMessage.style.display = 'block';
                form.reset();
            })
            .catch(error => {
                console.error('Мережевий збій:', error);
                errorMessage.style.display = 'block';
            });
    });

    var map = L.map('mapid').setView([51.23690, 22.54884], 20);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([51.23690, 22.54884]).addTo(map)
        .bindPopup("We are here!")
        .openPopup();
});
document.addEventListener('DOMContentLoaded', () => {
    console.log("menu.js is connected and working!");
    const hamburger = document.querySelector('.hamburger-menu');
    if (hamburger) {
        hamburger.addEventListener('click', () => {
            console.log("Hamburger menu clicked!");
            const nav = document.querySelector('nav');
            nav.classList.toggle('active');
        });
    } else {
        console.error("Element .hamburger-menu not found!");
    }
});
