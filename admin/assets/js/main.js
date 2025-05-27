"use strict";

/*=============== SHOW HIDE PASSWORD LOGIN ===============*/
const passwordAccess = (loginPass, loginEye) => {
  const input = document.getElementById(loginPass),
    iconEye = document.getElementById(loginEye)

  iconEye.addEventListener('click', () => {
    // Change password to text
    input.type === 'password' ? input.type = 'text'
      : input.type = 'password'

    // Icon change
    iconEye.classList.toggle('ri-eye-fill')
    iconEye.classList.toggle('ri-eye-off-fill')
  })
}
passwordAccess('password', 'loginPassword')

/*=============== SHOW HIDE PASSWORD CREATE ACCOUNT ===============*/
const passwordRegister = (loginPass, loginEye) => {
  const input = document.getElementById(loginPass),
    iconEye = document.getElementById(loginEye)

  iconEye.addEventListener('click', () => {
    // Change password to text
    input.type === 'password' ? input.type = 'text'
      : input.type = 'password'

    // Icon change
    iconEye.classList.toggle('ri-eye-fill')
    iconEye.classList.toggle('ri-eye-off-fill')
  })
}
passwordRegister('passwordCreate', 'loginPasswordCreate')

/*=============== SHOW HIDE LOGIN & CREATE ACCOUNT ===============*/
const loginAcessRegister = document.getElementById('loginAccessRegister'),
  buttonRegister = document.getElementById('loginButtonRegister'),
  buttonAccess = document.getElementById('loginButtonAccess')

buttonRegister.addEventListener('click', () => {
  loginAcessRegister.classList.add('active')
})

buttonAccess.addEventListener('click', () => {
  loginAcessRegister.classList.remove('active')
})

document.addEventListener('DOMContentLoaded',
  function () {
    const navItems = document
      .querySelectorAll('.nav-link');

    navItems.forEach(item => {
      item.addEventListener('click',
        function () {
          navItems.forEach(navItem => navItem
            .classList.remove('active'));
          this.classList.add('active');
        });
    });
  });

/* Send Contact Us */
function emailSend() {
  Email.send({
    Host: "s1.maildns.net",
    Username: "username",
    Password: "password",
    To: 'them@website.com',
    From: "you@isp.com",
    Subject: "This is the subject",
    Body: "And this is the body"
  }).then(
    message => alert(message)
  );
}



