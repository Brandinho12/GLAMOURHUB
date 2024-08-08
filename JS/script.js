const insertbutton = document.getElementById('insertbutton');
const uploadbutton = document.getElementById('uploadbutton');
const Uploadpage = document.getElementById('Upload_profile');
const Profilepage = document.getElementById('profile');

uploadbutton.addEventListener('click', function(){
    Uploadpage.style.display = "block";
    Profilepage.style.display = "none";

}
)
insertbutton.addEventListener('click', function(){
    Uploadpage.style.display = "none";
    Profilepage.style.display = "block";

}
)

fetch('registration_checking.php')
.then(response => response.json())
.then(data => {
    if(data.registered){
        document.getElementById('uploadbutton').style.display = "block";
    }
})
.catch(error => {
    console.error('error:'. error);
});


document.getElementById('UploadPic').addEventListener('change', function(){
    const file = this.files[0];
    if(file) {
        const reader = new FileReader();
        reader.onload = function(e){
            document.getElementById('profile_img').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});


