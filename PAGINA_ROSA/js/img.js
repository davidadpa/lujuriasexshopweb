// Obtener referencias a los elementos del DOM
const mainImage = document.getElementById('main-image');
const thumbnails = document.querySelectorAll('.thumbnail');

// Agregar evento click a cada miniatura
thumbnails.forEach(thumbnail => {
  thumbnail.addEventListener('click', () => {
    // Obtener la URL de la imagen grande mediante una petición AJAX a un archivo PHP
    const imageUrl = thumbnail.dataset.image;

    // Cambiar la imagen principal
    mainImage.src = imageUrl;
  });
});

// Agregar evento de zoom al pasar el mouse sobre la imagen principal
mainImage.addEventListener('mouseover', () => {
  mainImage.style.transform = 'scale(1.3)';
});

// Restaurar tamaño normal al quitar el mouse de la imagen principal
mainImage.addEventListener('mouseout', () => {
  mainImage.style.transform = 'scale(1)';
});
