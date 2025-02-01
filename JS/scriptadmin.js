/*const searchInput = document.getElementById("search");
const companyList = document.getElementById("company-list");

function fetchCompanies(search){
    fetch('fetch_companies.php?search='+ search)
    .then(response=>response.json())
    .then(data=>{
        const li = document.createElement('li');
        li.textContent = company.company_name;
        companyList.appendChild(li);
    });
}
searchInput.addEventListener('input',()=>{
    fetchCompanies(searchInput.value);
});

//initial fetch
fetchCompanies('');
*/
function show(){
    document.querySelector('.hamburger').classList.
    toggle('open')
    document.querySelector('.navigation').classList.
    toggle('active')
}