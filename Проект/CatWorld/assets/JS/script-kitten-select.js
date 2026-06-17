"use strict"

document.addEventListener('DOMContentLoaded', function () {
  // Модальное окно
  const popupLinks = document.querySelectorAll('.popup-link');

  let unlock = true;

  if(popupLinks.length > 0) {
    for (let index = 0; index < popupLinks.length; index++) {
      const popupLink = popupLinks[index];
      popupLink.addEventListener("click", function (e) {
        const popupName = popupLink.getAttribute('href').replace('#', '');
        const curentPopup = document.getElementById(popupName);
        popupOpen(curentPopup);
        e.preventDefault();
      });
    }
    
  }
  

  const popupCloseIcon = document.querySelectorAll('.popup-close');
  if(popupCloseIcon.length > 0) {
    for (let index = 0; index < popupCloseIcon.length; index++) {
      const el = popupCloseIcon[index];
      el.addEventListener("click", function (e) {
        popupClose(el.closest('.popup'));
        e.preventDefault();
      });
    }
    
  }
  function popupOpen(curentPopup) {
    if(curentPopup && unlock) {
      const popupActive = document.querySelector('.popup.open');
      if(popupActive) {
        popupClose(popupActive);
      }
    }
    curentPopup.classList.add('open');
    curentPopup.addEventListener("click", function (e) {
      if(e.targer.closest('.popup-content')) {
        popupClose(e.targer.closest('.popup'));
      }
    });

  }
  function popupClose(popupActive) {
    if(unlock) {
      popupActive.classList.remove('open');
    }
  }

  // Форма 
  const form = document.getElementById('form');
  form.addEventListener('submit', formSend);

  async function formSend(e) {
    e.preventDefault();

    let error = formValidate(form);

    let formData = new FormData(form);

    if(error === 0) {
      form.classList.add('_sending');
      let response = await fetch('sendmailreserved.php', {
        method: 'POST',
        body: formData
      });
      if(response.ok) {
        let result = await response.json();
        alert(result.message);
        form.reset();
        form.classList.remove('_sending');
        const popupActive = document.querySelector('.popup.open'); 
        popupActive.classList.remove('open');
        window.location.href = "http://localhost/Frontend/kittens.php";
      } else {
        alert('Ошибка отправки');
      }
    } else {
      alert('Заполните обязательные поля');
    }
  }

  function formValidate(form) {
    let error = 0;
    let formReq = document.querySelectorAll('._req');

    for (let index = 0; index < formReq.length; index++) {
      const input = formReq[index];
      formRemoveError(input);

      if(input.classList.contains('_email')) {
        if(emailTest(input)) {
          formAddError(input);
          error++;
        }
      } else {
        if(input.value === '') {
          formAddError(input);
          error++;
        }
      }
    }
    return error;
  }

  function formAddError(input) {
    input.parentElement.classList.add('_error');
    input.classList.add('_error');   
  }
  function formRemoveError(input) {
    input.parentElement.classList.remove('_error');
    input.classList.remove('_error');   
  }

  // Функция проверки Email
  function emailTest(input) {
    return !/^\w+([\.-]?\w+)*@\w+([[\.-]?\w+])*(\.\w{2,8})+$/.test(input.value);
  }

  const phoneMask = document.getElementById('formPhone');
  IMask(
    phoneMask,
    {mask: '+{7}(000)000-00-00'}
  );
});    