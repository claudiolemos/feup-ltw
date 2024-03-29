let currentPassword = document.querySelector('#settings-update input[name=curr-pwd]');
let newPassword = document.querySelector('#settings-update input[name=new-pwd]');
let confPassword = document.querySelector('#settings-update input[name=conf-new-pwd]');
let currentEmail = document.querySelector('#settings-update input[name=curr-email]');


if(currentPassword != null){
  currentPassword.addEventListener('change', function(event) {
    let request = createRequest("actions/api_settings.php", {type: "password", value: currentPassword.value});
    console.log(currentPassword.value);

    request.onreadystatechange=function(){
      if (request.readyState==4 && request.status==200){
        switch (JSON.parse(request.responseText)) {
          case "valid":
            console.log("Valid!");
            break;
          case "password":
            // currentPassword.setCustomValidity("Incorrect password");
            break;
        }
      }
    }
  });
}

if(currentEmail != null){
  currentEmail.addEventListener('change', function(event) {
    let request = createRequest("actions/api_settings.php", {type: "email", value: currentEmail.value});

    request.onreadystatechange=function(){
      if (request.readyState==4 && request.status==200){
        switch (JSON.parse(request.responseText)) {
          case "valid":
            console.log("Valid!");
            break;
          case "email":
            console.log("Invalid!");
            break;
        }
      }
    }
  });
}

if(newPassword != null){
  newPassword.addEventListener('change', function() {
    updatePasswordIcons();
  });
}

if(confPassword != null){
  confPassword.addEventListener('change', function() {
    updatePasswordIcons();
  });
}

function updatePasswordIcons(){
  if(confPassword.value != newPassword.value && confPassword.value != ""){
    confPassword.setCustomValidity("Passwords don't match");
  }
  else if(confPassword.value == newPassword.value){
    confPassword.setCustomValidity("");
  }
}
