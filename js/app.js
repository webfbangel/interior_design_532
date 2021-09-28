const handleHamburgerMenu = () => {
  const nav = document.querySelector("nav");
  const open = nav.className.includes("open");

  if (open) {
    nav.classList.remove("open");
  } else {
    nav.classList.add("open");
  }
};

// Form validation
const handleSubmit = (e) => {
  e.preventDefault();

  let messages = [];
  const successMessage = "Thank you";

  const form = e.target;
  var name = form.querySelector("input[name='name']");
  var email = form.querySelector("input[name='email']");
  var text = form.querySelector("textarea[name='message']");
  var submitMessage = form.querySelector("div.submitMessage");

  var errors = submitMessage.querySelector(".errors");
  var success = submitMessage.querySelector(".success");

  const re =
    /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

  const emailTest = re.test(email.value);

  if (!emailTest) {
    messages.push("This is an invalid email");
  }

  if (text.value.length < 10) {
    messages.push("The message should containt at least 10 characteres");
  }

  if (messages.length === 0) {
    name.value = "";
    email.value = "";
    text.value = "";
    success.innerText = successMessage;
  }

  errors.innerText = messages.join(". ");

  return false;
};
