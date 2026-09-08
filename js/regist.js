const checkId = () => {
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
}
const confirm_password = () => {
  if(password.value != password2.value){
    alert('The password is different from the confirm password.');
    password.focus();
    return false;
  }
}

const exam = () => {
  if(password.value != password2.value){
    alert('The password is different from the confirm password.');
    password.focus();
    return false;
  }

  if(password.value.length <8 || password.value.length > 20){
    alert('Password length is at least 8 characters long');
    password.focus();
    return false;
  }

  if(nickname.value.length > 20){
    alert('Nickname length must be less than 20.');
    nickname.focus();
    return false;
  }

  if(first_name.value.length > 20){
    alert('first name length must be less than 20.');
    first_name.focus();
    return false;
  }

  if(last_name.value.length > 20){
    alert('Last name length must be less than 20.');
    last_name.focus();
    return false;
  }

  if(userid.value.length > 30){
    alert('email length must be less than 30.');
    userid.focus();
    return false;
  }

  if(address.value.length > 45){
    alert('address length must be less than 45.');
    address.focus();
    return false;
  }
}
