const email = document.getElementById("mail");

email.addEventListener("input", (event) => {
  if (email.validity.typeMismatch) {
    email.setCustomValidity("I am expecting an email address!");
  } else {
    email.setCustomValidity("");
  }
});

const myform = document.getElementById("myForm")
myform.checkValidity()
console.log(myform.checkValidity()
  ) 