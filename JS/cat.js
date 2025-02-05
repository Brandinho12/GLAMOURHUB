document.addEventListener('DOMContentLoaded', () => {
    fetch('fetch_categories.php')
        .then(response => response.json())
        .then(data => {
            const categoriesContainer = document.getElementById('categories-container');
            categoriesContainer.innerHTML = ''; // Clear any placeholder content

            data.forEach(category => {
                const categoryCard = document.createElement('div');
                categoryCard.classList.add('category-card');

                categoryCard.innerHTML = `
                    <img src="${category.image}" alt="${category.name}">
                    <h3>${category.name}</h3>
                `;

                categoriesContainer.appendChild(categoryCard);
            });
        })
        .catch(error => console.error('Error fetching categories:', error));
});
