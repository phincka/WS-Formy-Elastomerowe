export default class Waypoints {
  screenElement() {
    const allScreenElements = document.querySelectorAll('.screenElement')

    allScreenElements.forEach(screenElement => {
      var waypoint = new Waypoint.Inview({
        element: screenElement,

        entered: () => {
          allScreenElements.forEach(element => {
            element.style.borderColor = 'var(--grey2)'
            screenElement.style.setProperty('--screenElementColor', '#2a2a2a')
          });

          screenElement.style.borderColor = 'var(--pcolor)'
          screenElement.style.setProperty('--screenElementColor', '#e5a928')
        },
        exited: () => {
          screenElement.style.borderColor = 'var(--grey2)'
          screenElement.style.setProperty('--screenElementColor', '#2a2a2a')
        },

        offset: '1000rem'
      })

    });
  }

  sectionHeader() {
    const allTitles = document.querySelectorAll('.sectionHeader--title')
    allTitles.forEach(title => {
      var waypoint = new Waypoint.Inview({
        element: title,

        entered: () => {
          const scrolledTitle = document.querySelector('.scrolledTitle')
          const regex = /<br\s*[\/]?>/gi;

          scrolledTitle.innerHTML = title.getAttribute('data-title').replace(regex, "&nbsp;")
        },

        offset: '1000rem'
      })

    });

  }


  sectionHeaderNav() {
    const allTitles = document.querySelectorAll('.sectionHeader--title')
    allTitles.forEach(title => {
      var waypoint = new Waypoint({
        element: title,

        handler: () => {
          const navTitles = document.querySelectorAll('.s1_begins__nav__list--single')

          navTitles.forEach(element => {
            element.classList.remove('s1_begins__nav__list--single--active')
          });

          navTitles.forEach(element => {
            if (title.getAttribute('data-title') == element.getAttribute('data-title')) {
              element.classList.add('s1_begins__nav__list--single--active')
            }
          });
        },

        offset: '500rem'
      })
    });
  }


  init() {
    document.querySelectorAll('.screenElement') ? this.screenElement() : null
    document.querySelector('.s2_homepage') ? this.sectionHeader() : null
    document.querySelector('.s1_begins__nav') ? this.sectionHeaderNav() : null
  }
} 