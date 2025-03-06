let map;

document.addEventListener("DOMContentLoaded", function () {
    map = L.map('map').setView([50.1109, 10.7458], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
});

const routes = {
    vikingRoute: {
        name: "Viking Route: History of Scandinavia",
        points: [
            {
                coords: [57.1287, 15.5894],
                title: "Lindos Island, Sweden - Viking Island",
                photos: ["lindos1.jpg", "lindos2.jpg", "lindos3.jpg", "lindos4.jpg"],
                review: "A must-see for Viking history enthusiasts!"
            },
            {
                coords: [59.9070, 10.7302],
                title: "Viking Museum, Oslo, Norway",
                photos: ["viking-museum1.jpg", "viking-museum2.jpg", "viking-museum3.jpg", "viking-museum4.jpg"],
                review: "A great place to learn about Viking culture!"
            },
            {
                coords: [64.1355, -21.8954],
                title: "Reykjavik, Iceland - Viking City",
                photos: ["reykjavik1.jpg", "reykjavik2.jpg", "reykjavik3.jpg", "reykjavik4.jpg"],
                review: "A charming city with rich Viking heritage."
            },
            {
                coords: [70.6635, 23.6829],
                title: "Hammerfest, Norway - Viking Settlement",
                photos: ["hammerfest1.jpg", "hammerfest2.jpg", "hammerfest3.jpg", "hammerfest4.jpg"],
                review: "Incredible history and scenic beauty."
            }
        ]
    },
    castleRoute: {
        name: "Castle Tour Through France",
        points: [
            {
                coords: [48.8049, 2.1204],
                title: "Palace of Versailles, France",
                photos: ["versailles1.jpg", "versailles2.jpg", "versailles3.jpg", "versailles4.jpg"],
                review: "Magnificent palace and gardens."
            },
            {
                coords: [47.3419, 1.5181],
                title: "Château de Chambord, France",
                photos: ["chambord1.jpg", "chambord2.jpg", "chambord3.jpg", "chambord4.jpg"],
                review: "A stunning castle surrounded by lush forests."
            },
            {
                coords: [47.0302, 0.6126],
                title: "Château de Saint-Germain, France",
                photos: ["saint-germain1.jpg", "saint-germain2.jpg", "saint-germain3.jpg", "saint-germain4.jpg"],
                review: "A lovely historic site."
            },
            {
                coords: [44.8485, 1.2209],
                title: "Château de Castelnaud, France",
                photos: ["castelnaud1.jpg", "castelnaud2.jpg", "castelnaud3.jpg", "castelnaud4.jpg"],
                review: "Beautiful medieval architecture."
            },
            {
                coords: [43.2100, 2.3547],
                title: "Carcassonne Castle, France",
                photos: ["carcassonne1.jpg", "carcassonne2.jpg", "carcassonne3.jpg", "carcassonne4.jpg"],
                review: "An impressive fortress with rich history."
            }


        ]
    },
    italyRoute: {
        name: "Tourist Wonders of Italy",
        points: [
            {
                coords: [40.8213, 14.4262],
                title: "Mount Vesuvius, Naples, Italy",
                photos: ["vesuvius1.jpg", "vesuvius2.jpg", "vesuvius3.jpg", "vesuvius4.jpg"], // Змінено на масив
                review: "A historic volcano with amazing views."
            },

            {
                coords: [41.8902, 12.4922],
                title: "Colosseum, Rome, Italy",
                photos: ["colosseum1.jpg", "colosseum2.jpg", "colosseum3.jpg", "colosseum4.jpg"], // Змінено на масив
                review: "An iconic landmark of ancient Rome."
            },
            {
                coords: [43.7167, 10.4000],
                title: "Leaning Tower of Pisa, Italy",
                photos: ["pisa1.jpg", "pisa2.jpg", "pisa3.jpg", "pisa4.jpg"], // Змінено на масив
                review: "A world-famous monument with stunning views."
            },
            {
                coords: [43.7737, 11.2559],
                title: "Duomo, Florence, Italy",
                photos: ["florence1.jpg", "florence2.jpg", "florence3.jpg", "florence4.jpg"], // Змінено на масив
                review: "An architectural masterpiece."
            },
            {
                coords: [45.4341, 12.3388],
                title: "Piazza San Marco, Venice, Italy",
                photos: ["venice1.jpg", "venice2.jpg", "venice3.jpg", "venice4.jpg"], // Змінено на масив
                review: "A picturesque square with breathtaking architecture."
            }
        ]
    }
};

document.getElementById("vikingRoute").addEventListener("click", () => showRouteDetails(routes.vikingRoute));
document.getElementById("castleRoute").addEventListener("click", () => showRouteDetails(routes.castleRoute));
document.getElementById("italyRoute").addEventListener("click", () => showRouteDetails(routes.italyRoute));

function showRouteDetails(route) {
    map.eachLayer(layer => {
        if (layer instanceof L.Marker || layer instanceof L.Polyline) map.removeLayer(layer);
    });

    const latlngs = [];

    route.points.forEach(point => {
        latlngs.push(point.coords);
        const marker = L.marker(point.coords).addTo(map);

        let galleryHTML = `<b>${point.title}</b><br><p>${point.review}</p><div class="gallery">`;
        point.photos.forEach(photo => {
            galleryHTML += `<img src="../images/${photo}" onerror="this.src='../images/placeholder.jpg';" alt="${point.title}" style="width: 100px; height: 75px; margin: 5px; border-radius: 5px; cursor: pointer;" onclick="viewPhoto(this.src)">`;
        });
        galleryHTML += `</div>`;

        marker.bindPopup(galleryHTML);
        marker.on('click', () => marker.openPopup());
    });

    map.fitBounds(L.latLngBounds(latlngs));

    L.polyline(latlngs, {color: 'blue', weight: 3, dashArray: '5, 10'}).addTo(map);
}

function viewPhoto(src) {
    window.open(src, '_blank');
}
