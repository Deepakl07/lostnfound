document.addEventListener('DOMContentLoaded', function () {
    var galleryContainer = document.getElementById('gallery');

    // Fetch data from gallery.php
    fetch('gallery.php')
        .then(response => response.text())
        .then(data => {
            galleryContainer.innerHTML = data;
        })
        .catch(error => console.error('Error fetching data:', error));
});

document.addEventListener('DOMContentLoaded', function () {
    var galleryContainer = document.getElementById('found-gallery');

    // Fetch data from gallery.php
    fetch('found.php')
        .then(response => response.text())
        .then(data => {
            galleryContainer.innerHTML = data;
        })
        .catch(error => console.error('Error fetching data:', error));
});

