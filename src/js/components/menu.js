
export default class Menu {
  headerMenu() {
    //! Hidden menu desktop
    let openButton = document.querySelector('.menuButton')
    let nav = document.querySelector('.header__main')


    
    !nav ? nav = document.querySelector('.header__main') : null
    
    openButton.addEventListener('click', () => {
      nav.classList.toggle("header__main--active")
      openButton.classList.toggle("menuButton--active")
    })
    
    nav.querySelectorAll('.menu-item').forEach(element => {
      const elWidth = `${element.offsetWidth / 10 + 2.4}rem`
      element.style.setProperty('--beforeHeight', elWidth)
    });

    // let subMenuItems = document.querySelectorAll('.menu-item-has-children')

    // subMenuItems.forEach(menuItem => {
    //   menuItem.querySelector('button').addEventListener('click', () => {
    //     menuItem.querySelector('.sub-menu').classList.toggle('sub-menu--active')
    //   })
      
    //   menuItem.querySelector('.sub-menu').addEventListener('click', (event) => {
    //     // console.log(event.target)
    //     event.target.classList.toggle('sub-menu--active')
    //   })
    // });

    // const headerSticky = (bannerEl) => {
    //   var header = document.querySelector(".header");
    //   var navbar = bannerEl
    //   var sticky = navbar.offsetHeight - 200;

    //   document.addEventListener('scroll', event => {
    //     if (window.pageYOffset >= sticky) {
    //       header.classList.add("sticky")
    //     } else {
    //       header.classList.remove("sticky");
    //     }
    //   });
    // }


    // const homeBanner = document.querySelector('.s1_homepage--img')
    // if (homeBanner) headerSticky(homeBanner)

    // const pageHeaderBanner = document.querySelector('.pageHeader__img--img')
    // if (pageHeaderBanner) headerSticky(pageHeaderBanner)
  }

  
  init(){
    this.headerMenu()
  }
} 