const confirmId = () => {
    var userid = document.getElementById("email");
    var result = document.getElementById('result');
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
      if(xhr.readyState == XMLHttpRequest.DONE){
        if(xhr.status == 200){
          let txt = xhr.responseText.trim();
          if(txt == "O"){
            result.style.display = "block";
            result.style.color = "green";
            result.innerHTML = "Available ID.";
          }
          else{
            result.style.display = "block";
            result.style.color = "Red";
            result.innerHTML = "The ID is not available.";
            userid.focus();
            //ID 재입력할 때,
            userid = addEventListener("keydown", function(){
              result.style.display = "none";
            });
          }
        }
      }
    }
    xhr.open("GET", "checkid.php?userid="+userid.value);
    xhr.send();
    }