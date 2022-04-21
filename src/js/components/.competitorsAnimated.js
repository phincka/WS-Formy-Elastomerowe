export default class competitorsAnimated {
  animation() {
    const competitorsAnimated = document.querySelectorAll('.competitorsAnimated')
    if (competitorsAnimated) {
      competitorsAnimated.forEach(singleAnimated => {
        singleAnimated.addEventListener("mouseenter", function (event) {

          const pics = [].slice.call(singleAnimated.childNodes, 1)

          pics.forEach((element, index) => {
            setTimeout(function () {
              if (element.style.opacity !== 1) {
                pics.forEach(el => {
                  el.style.opacity = 0
                })
              }
              element.style.opacity = 1
            }, 500 * index);
          });

        }, false);
      });
    }
  }

  
  init() {
    document.querySelector('.competitorsAnimated') ? this.animation() : null
  }
}