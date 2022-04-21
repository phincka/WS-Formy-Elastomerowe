export default class Cookies {
  cookies() {
    const cookiesEl = document.querySelector('.cookies')
    const cookiesButon = document.querySelector('.cookies_accept')

    if (!localStorage.cookies_accepted) cookiesEl.style.display = "flex"

    cookiesButon.addEventListener('click', () => {
      localStorage.cookies_accepted = true;
      cookiesEl.style.display = "none";
    })
  }

}