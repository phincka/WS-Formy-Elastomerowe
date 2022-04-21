export default class Urlify {
  init() {
    const urlify = text => {
      var urlRegex = /(([a-z]+:\/\/)?(([a-z0-9\-]+\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel|local|internal))(:[0-9]{1,5})?(\/[a-z0-9_\-\.~]+)*(\/([a-z0-9_\-\.]*)(\?[a-z0-9+_\-\.%=&amp;]*)?)?(#[a-zA-Z0-9!$&'()*+.=-_~:@/?]*)?)(\s+|$)/gi;
      return text.replace(urlRegex, function (url) {
        if (url.startsWith('http') || url.startsWith('https')) {
          return '<a href="' + url + '">' + url + '</a>';
        } else {
          return '<a target="_blank" href="https://' + url + '">' + url + '</a>';
        }
      })
    }

    if (document.querySelectorAll('.s2_joinUs__repeat__single__content--title')) {
      document.querySelectorAll('.s2_joinUs__repeat__single__content--title').forEach(element => {
        element.innerHTML = urlify(element.innerHTML)
      })
    }

    if (document.querySelectorAll('.s2_joinUs__repeat__single__content--text')) {
      document.querySelectorAll('.s2_joinUs__repeat__single__content--text').forEach(element => {
        element.innerHTML = urlify(element.innerHTML)
      })
    }
  }

} 

