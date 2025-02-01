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

document.getElementById('file-input').addEventListener('change', function(event){
    if(this.files && this.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            document.getElementById('profile_image').src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    }
});

//to set user permission.
/*
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
});*/

const registerButton = document.getElementById('main-regis');
const registerDifferentiation = document.getElementById('regis');

registerButton.addEventListener('click', function(){
    registerDifferentiation.style.display = "block";
    registerButton.style.display = "none";

})





const signUpform = document.getElementById('signupform');

signUpform.addEventListener('submit', payWithPaystack, false);
function payWithPaystack(e) {
    e-preventDefault();

    let handler = PaystackPop.setup({
        key: 'pk_test_26b88a00e93f857555ba59d38c424a48e75f6a44',
        email: document.getElementById('email').value,
        amount: document.getElementById('').value * 100,
        currency:"NGS",
        ref: ''+Math.floor((Math.random() * 100000) + 1),
        onclose: function(){
            alert('Window closed.');
        },
        callback: function(response){
            let message = 'Payment complete! Reference: ' + response.reference;
            alert(message);
        }
    });
}

function goToanotherPage(){
    window.location.href = "payment.html";
}


