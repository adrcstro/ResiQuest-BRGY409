const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button button");

form.onsubmit = (e)=>{
    e.preventDefault();
}


continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "Backend/signupBackend.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
              console.log(data);
            }
        }
    }
  
    xhr.send();
}