export default class AjaxProductLoad {
  categoryFilter() {
    const adminAjax = document.querySelector('.s1_sales__content').getAttribute('data-ajaxurl')

    const categoryFilter = document.querySelector('#getSales')
    const location = document.querySelector('#locationSelect')

    categoryFilter.addEventListener("click", () => {
      if(location.value !== ''){
        $.ajax({
          type: "POST",
          dataType: "html",
          url: adminAjax,
          data: {
            action: "categoryFilter",
            location: location.value
          },
          beforeSend: () => {
            document.querySelector('.ajaxLoader').classList.remove('ajaxLoader--invisible');
            document.querySelector('.s1_sales__content__repeat').style.opacity = 0;
          },
          success: response => {
            $('.s1_sales__content__repeat').html(response);

            if (document.querySelector('.gallery')) {
              new LiteBoxPro('.gallery');
            }

            document.querySelector('.ajaxLoader').classList.add('ajaxLoader--invisible');
            document.querySelector('.s1_sales__content__repeat').style.opacity = 1;
          },
          error: error => { console.log(error) }
        });
      }
    })

    
  }


  init() {
    if (document.querySelector('#getSales')) this.categoryFilter()
  }
}