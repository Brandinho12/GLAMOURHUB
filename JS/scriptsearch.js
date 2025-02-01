const searchInput = document.getElementById('searchInput');
const searchButton = document.getElementById('searchButton');
const searchResults = document.getElementById('searchResults');

searchButton.addEventListener('click', () =>{
    const searchTerm = searchInput.value.trim();
    //replace this with your actual data search logic, e.g., fetching data from server
    const searchResultsData = [
        {name: 'John Doe',email: 'johndoe@example.com', profileImage: 'profile1.jpg'},
        // other search results
    ];
    searchResults.innerHTML = '';
    searchResultsData.forEach(result =>{
        const card = document.createElement('div');
        card.classList.add('col-md-4','mb-3');
        card.innerHTML = 
        <div class="card">'
            <img src="profile/${result.profileImage}" class="card-img-top" alt="Profile Image"></img>
            <div class="card-body">
                <h5 class="card-title">${result.name}</h5>
                <p class="card-text">${result.email}</p>
            </div>
         ';
        </div>
        searchResults.appendChild(card);
    });
});
