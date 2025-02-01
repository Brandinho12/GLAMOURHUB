
//scriptdash.js
/*
function showSection(sectionId){
    //Hide all sections
    const sections =
    document.querySelectorAll('.section');
    sections.forEach(section => section.classList.remove('active'));
    //show the selected section
    const activeSection = document.getElementById(sectionId);
    activeSection.classList.add('active');
}
    */

/*const dashboardbutton = document.getElementById('tab1');
const profilebutton = document.getElementById('tab2');
const dashboardpage = document.getElementById('dashboard');
const profilepage = document.getElementById('profile');

profilebutton.addEventListener('click', function(){
    dashboardpage.style.display = "block";
    profilepage.style.display = "none";

}
)
dashboardbutton.addEventListener('click', function(){
    dashboardpage.style.display = "none";
    profilepage.style.display = "block";

}
)*/
function scrollToSection(sectionId){
    document.getElementById(sectionId).scrollIntoView({behaviour: 'smooth'};)
}