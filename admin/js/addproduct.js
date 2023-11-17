// here add input with page addproduct
let locationtags = document.getElementById("tagsHere");

if(document.getElementById("addinput") != null){
    const addinput = document.getElementById("addinput");
    addinput.addEventListener("click",()=>{

        locationtags.innerHTML += '<input type="file" class="form-control mb-3 otherinput" name="files[]" accept=".png, .jpg, .jpeg">';
        
        if(document.getElementsByName("files[]").length > 10){
            addinput.style.display = "none";
        }
        
    });
}

// here toggle input
let input = document.getElementById("roleinput");
let isset = document.getElementById("inlineRadio1");
let notisset = document.getElementById("inlineRadio2");

isset.addEventListener("click",()=>{
    if(isset.checked == true){
       input.style.display = "block";
    }
});
notisset.addEventListener("click",()=>{
    if(isset.checked == false){
        input.style.display = "none";
    }
});
