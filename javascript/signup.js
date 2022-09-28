const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text"),
overlay = document.querySelector("#overlay");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    overlay.style.display = 'flex';
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                errorText.style.display = "block";
                errorText.textContent = "SignUp Successful. Check your mail for Verification Link";
                overlay.style.display = 'none';
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
                overlay.style.display = 'none';
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

