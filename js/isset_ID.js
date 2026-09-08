const exist_ID = () => {
    var userid = document.getElementById("email");
    var first = document.getElementById("first");
    var last = document.getElementById("last");
    var result = document.getElementById('result');
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
      if(xhr.readyState == XMLHttpRequest.DONE){
        if(xhr.status == 200){
          let txt = xhr.responseText.trim();
          if(txt == "O"){
            result.style.display = "block";
            result.style.color = "green";
            result.innerHTML = "The ID you are looking for is correct.";
          }
          else{
            result.style.display = "block";
            result.style.color = "Red";
            result.innerHTML = "This is not the ID you are looking for.";
            userid.focus();
            //ID 재입력할 때,
            userid = addEventListener("keydown", function(){
              result.style.display = "none";
            });
          }
        }
      }
    }
    xhr.open("GET", "isset_id.php?userid="+userid.value+"&first="+first.value+"&last="+last.value);
    xhr.send();
    }

