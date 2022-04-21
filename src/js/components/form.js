export default class From {
  register(){
    const mainNode = document.querySelector('.wpcf7-form')
    const form = document.querySelector('.wpcf7-form')

    const studentEmail = document.querySelector('input[name=student_email]');
    let mail = ''
    studentEmail.addEventListener('change', (event) => {
      mail = event.target.value
    });

    function callback(mutationsList, observer) {
      mutationsList.forEach(mutation => {
        if (mutation.target.getAttribute('data-status') == 'status' || mutation.target.getAttribute('data-status') == 'resetting') {
          const steps = form.querySelectorAll('.s1_form__form__header__step')

          steps.forEach(element => {
            element.classList.add('prevStep')
          });

          steps[steps.length - 1].classList.remove('prevStep')
          steps[steps.length - 1].classList.add('activeStep')


          const fromRows = form.querySelectorAll('.contact__row')

          fromRows.forEach(element => {
            element.style.display = 'none'
          });

          form.querySelector('.lastStepBottom').style.display = 'none'

          const contactWrap = form.querySelector('.lastStepWrap')
          const contactThankYou = document.querySelector('.contact__thankYou')

          contactThankYou.style.display = 'flex'
          contactWrap.style.justifyContent = 'center'
          contactWrap.style.alignItems = 'center'


          document.querySelector('#userMail').innerHTML = mail

          contactWrap.appendChild(contactThankYou)
        }
      })
    }

    const mutationObserver = new MutationObserver(callback)
    mutationObserver.observe(form, { attributes: true })
  }


  serviceFileType(inputName) {
    const fileInput = document.querySelector(inputName);

    fileInput.addEventListener('change', event => {
      const fileResult = event.target.parentNode.querySelector('.fileResult')
      const fileTitle = event.target.parentNode.querySelector('.fileTitle')
      const fileSize = event.target.parentNode.querySelector('.fileSize')
      const labelFile = event.target.parentNode.querySelector('.labelFile')
      const removeFile = event.target.parentNode.querySelector('.block__file--button')


      labelFile.style.display = 'none'
      fileResult.style.display = 'flex'

      const file = event.target.files.item(0)
      let size = file.size / 1024

      fileTitle.innerHTML = `${file.name}`
      fileSize.innerHTML = `${size.toFixed(2)} MB`

      removeFile.addEventListener('click', (e) => {
        event.target.value = '';

        labelFile.style.display = 'flex'
        fileResult.style.display = 'none'
      });
    });
  }


  init() {
    if (document.querySelector('.s1_form')) this.register()

    if (document.querySelector('input[name=student_photo]')) this.serviceFileType('input[name=student_photo]')
    if (document.querySelector('input[name=school_document]')) this.serviceFileType('input[name=school_document]')
    if (document.querySelector('input[name=other_document]')) this.serviceFileType('input[name=other_document]')
  }
} 