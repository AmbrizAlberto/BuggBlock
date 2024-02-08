var fileinput =document.getElementById("custom-file-input");
var filestatus=document.querySelector(".file-status");

fileinput.addEventListener('change',function(){
    filestatus.textContent=this.files[0].name;
});