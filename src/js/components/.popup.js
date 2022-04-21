export default class Popup {
  formPopup() {
    const popup = document.querySelector('.popup')

    popup.addEventListener('click', (e) => {
      if (e.target.classList[0] == 'exit') {
        popup.classList.remove('popup--active')
      }
    })
  }

  
  activeFormPopup() {
    const popup = document.querySelector('.popup')
    const jobsPage = document.querySelector('.s1_jobs')
    const blockFile = jobsPage.querySelectorAll('.block__file')

    blockFile.forEach(element => {
      element.href = "javascript:void(0)";

      element.addEventListener('click', (e) => {
        popup.classList.add('popup--active')
      })
    });
  }


  init() {
    document.querySelector('.popup__wrap--exit') ? this.formPopup() : null
    document.querySelector('.s1_jobs') ? this.activeFormPopup() : null
  }
} 

