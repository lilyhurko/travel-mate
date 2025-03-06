console.log(routeData);

function openRouteDetails(routeId) {
    console.log('Opening route details for ID:', routeId);

    const modal = document.getElementById('routeModal');
    const modalRouteName = document.getElementById('modalRouteName');
    const modalRouteDescription = document.getElementById('modalRouteDescription');
    const modalRouteImages = document.getElementById('modalRouteImages');
    const routeIdInput = document.getElementById('routeId');

    modalRouteName.textContent = '';
    modalRouteDescription.textContent = '';
    modalRouteImages.innerHTML = '';

    const route = routesDetails.find(route => route.id == routeId);
    console.log('Route found:', route);

    if (route) {
        modalRouteName.textContent = route.name || 'Unnamed Route';
        modalRouteDescription.textContent = route.details || 'No description available.';
        routeIdInput.value = route.id;

        if (route.images && Array.isArray(route.images) && route.images.length > 0) {
            route.images.forEach(image => {
                const imgElement = document.createElement('img');
                imgElement.src = image;
                imgElement.alt = route.name || 'Route Image';
                imgElement.classList.add('modal-image');
                modalRouteImages.appendChild(imgElement);
            });
        } else {
            const noImagesMessage = document.createElement('p');
            noImagesMessage.textContent = 'No images available for this route.';
            modalRouteImages.appendChild(noImagesMessage);
        }

        modal.style.display = 'block';
    } else {
        console.error('Route details not found!');
        alert('Route details not found.');
    }
}

document.getElementById('closeRouteModal').addEventListener('click', function () {
    document.getElementById('routeModal').style.display = 'none';
});

window.addEventListener('click', function (event) {
    const modal = document.getElementById('routeModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});

routesDetails.forEach(route => {
    if (!route.id || !route.details || !route.images) {
        console.warn('Route with missing keys:', route);
    }
});


document.getElementById('orderRouteForm').addEventListener('submit', async function (event) {
    event.preventDefault(); // Зупиняємо стандартну відправку форми

    const routeId = document.getElementById('routeId').value;
    console.log('Submitting form for route ID:', routeId);

    try {
        const response = await fetch(this.action, {
            method: 'POST',
            body: new FormData(this),
            headers: {
                'Accept': 'application/json',
            },
        });

        if (response.status === 200) {
            document.getElementById('orderSuccessMessage').style.display = 'block';
            setTimeout(() => {
                document.getElementById('orderSuccessMessage').style.display = 'none';
                document.getElementById('routeModal').style.display = 'none';
            }, 3000);
        } else {
            console.error('Error:', result.message);
            alert(result.message || 'An error occurred. Please try again later.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again later.');
    }
});