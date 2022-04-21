// import Animations from './components/animations'
import Cookies from './components/cookies'
// import From from './components/form'
import Menu from './components/menu'
import PageLoader from './components/pageLoader'
import SwiperSliders from './components/swiper'
// import Urlify from './components/urlify'
// import GoogleMaps from './components/GoogleMaps'
// import RealizationsToggle from './components/.competitorsAnimated'
import Video from './components/video'
// import AjaxProductLoad from './components/.ajaxProductLoad'
// import Waypoints from './components/.waypoints'
// import DropDownPannels from './components/dropDown'
// import Popup from './components/popup'


new Menu().init()
new SwiperSliders().init()
// new Urlify().init()
new Video().init()
// new Waypoints().init()
// new Animations().animation()
new Cookies().cookies()
// new From().init()
new PageLoader().loader()
// new GoogleMaps().init()
// new RealizationsToggle().init()
// new AjaxProductLoad().init()
// new DropDownPannels().init()
// new Popup().init()


$(document).ready(function () {
  $('body').removeClass('preload');
});

if (document.querySelector('.gallery')) {
  new LiteBoxPro('.gallery');
}

$('.js-panel-toggle').on('click', 'button', function(event) {
  // Get panel to be opened
  var target = $(this).data('target');
  // Make all panels inactive
  $('.panel-toggle').removeClass('panel-toggle--active');
  $('.panel').hide();

  // Activate clicked panel
  $(this).addClass('panel-toggle--active');
  $(target).show();
  // Prevent default click event
  event.preventDefault();
});


// var waypoint = new Waypoint({
//   element: document.querySelector('.s2_homepage--video'),
//   handler: function () {
//     console.log('Basic waypoint triggered')
//   }
// })
// console.log(waypoint)







// document.querySelectorAll('.sectionHeader__scroll--belt').forEach( element => {
//   element.style.height = `${(element.parentNode.parentNode.childNodes[0].offsetHeight / 10) - 1.8}rem`
// })

// document.querySelectorAll('.s1_contact__single__header__scroll--belt').forEach(element => {
//   element.style.height = `${(element.parentNode.parentNode.childNodes[0].offsetHeight / 10) - 1.8}rem`
// })



// -----------------------------

// const getStartProgress = (heightElement, container) => {
//   let value = (heightElement.offsetHeight - 24) / (container.offsetHeight) * 100
//   return value
// }


// const aprogressbar = document.querySelector('progress')
// const aarticle = document.querySelector('.s2_homepage')
// const atitles = document.querySelectorAll('.sectionHeader--title')


// function getProgressbar(progressbar, rootElement, startElement) {

//   let isScrolling = false


//   progressbar.value = getStartProgress(startElement[0], rootElement)


//   progressbar.style.width = `${document.querySelector('.myScroll').offsetHeight}px`



//   document.addEventListener('scroll', (e) => isScrolling = true)

//   render()

//   function render() {

//     requestAnimationFrame(render)

//     if (!isScrolling) return


//     if (rootElement.offsetTop - (window.scrollY + 600) <= 0){

//       let elementnaekranieodzera = (rootElement.offsetTop - (window.scrollY + 600)) * -1

//       if (elementnaekranieodzera / (rootElement.offsetHeight) * 100 <= startElement[0].offsetHeight / (rootElement.offsetHeight) * 100){
//         progressbar.value = getStartProgress(startElement[0], rootElement)
//       }else{
//         progressbar.value = elementnaekranieodzera / (rootElement.offsetHeight) * 100
//       }
//     }


//     isScrolling = false

//   }

// }


// getProgressbar(aprogressbar, aarticle, atitles)


if (document.querySelector('.s2_joinUs__repeat__single')){
  document.querySelector('.s2_joinUs__wrap').style.height = `${(document.querySelectorAll('.s2_joinUs__repeat__single')[0].offsetHeight * 2) / 10}rem`
}


if (document.querySelector('.copyElement')) {
  document.querySelectorAll('.copyElement').forEach(element => {
    element.addEventListener('click', () => {
      let copyValue = element.querySelector('.copyValue');

      navigator.clipboard.writeText(copyValue.textContent);
    });
  });
}

// for (let index = 0; index < document.querySelector('#input_1_100').length; index++) {
//   document.querySelector('#a').insertAdjacentHTML('beforeend', document.querySelector('#input_1_100')[index].innerHTML + '<br>');
// }

// document.querySelectorAll('.block--wysiwyg').forEach(element => {
//   element.querySelectorAll('p').forEach(el => {
//     if (el.innerHTML == '&nbsp;') {
//       console.log(el.innerHTML)
//       el.style.lineHeight = '4.4rem'
//     }
//   });
// })

if (document.querySelector('.formHidden')) {
  document.querySelector('input[name="acceptance-12"]').addEventListener('change', function () {
    if (this.checked) {
      document.querySelector('.formHidden').style.display = 'block';
      document.querySelector('.formHidden').style.marginBottom = '5.2rem';
    } else {
      document.querySelector('.formHidden').style.display = 'none';
      document.querySelector('.formHidden').style.marginBottom = 0;
    }
  });
}


