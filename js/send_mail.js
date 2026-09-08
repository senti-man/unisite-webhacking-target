const sendmail = () => {
  var email = document.getElementById("email2");
  var result = document.getElementById('send_result');
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
      if(xhr.readyState == XMLHttpRequest.DONE){
          if(xhr.status == 200){
              let txt = xhr.responseText.trim();
              if(txt == "O"){
                  result.style.display = "block";
                  result.style.color = "green";
                  result.innerHTML = "Your mail has been sent. Please check the code.";
              }
              else{
                  result.style.display = "block";
                  result.style.color = "Red";
                  result.innerHTML = "Failed to send mail.";
                  userid.focus();
                  //When re-entering ID,
                  userid = addEventListener("keydown", function(){
                      result.style.display = "none";
                  });
              }
          }
      }
  }
  xhr.open("POST", "../mail.php");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("email="+email.value);
}

