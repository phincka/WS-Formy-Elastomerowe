export default class DropDownPannels {
  dropDown() {
    const collap = document.getElementsByClassName("collapsible");

    for (let i = 0; i < collap.length; i++) {
      collap[i].addEventListener("click", function () {
        this.classList.toggle("active-dropdown");

        let content = this.nextElementSibling;

        content.style.maxHeight ? content.style.maxHeight = null : content.style.maxHeight = content.scrollHeight + "px";
      });
    }
  }

  init() {
    if (document.querySelector('.dropDown')) this.dropDown()
  }
}