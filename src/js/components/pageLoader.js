export default class PageLoader{
  loader() {
    const loaderEl = document.getElementsByClassName('fullpage-loader')[0];
      document.addEventListener('readystatechange', (event) => {
        // const readyState = "interactive";
        const readyState = "complete";
  
        if (document.readyState == readyState) {
          loaderEl.classList.add('fullpage-loader--invisible');

          setTimeout(() => {
            loaderEl.parentNode.removeChild(loaderEl);
          }, 500)
        }
      });
  }
}