export default class Video {
  ytPlayer() {
    const getYtID = url => {
      var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
      var match = url.match(regExp);
      return (match && match[7].length == 11) ? match[7] : false;
    }

    // Get the HTML elements
    const videoWrap = document.querySelector('.s5_project--video')
    const imageOverlay = document.getElementById('image-overlay')
    const playButton = document.getElementById('play')

    const ytVideoID = getYtID(videoWrap.getAttribute('data-url'))

    imageOverlay.setAttribute('src', `https://img.youtube.com/vi/${ytVideoID}/hqdefault.jpg`)

    playButton.addEventListener('click', e => {
      e.preventDefault();

      playButton.style.display = 'none';
      imageOverlay.style.display = 'none';

      const tag = document.createElement('script');
      tag.src = "https://www.youtube.com/player_api";
      const firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      let player;
      window.onYouTubePlayerAPIReady = function () {
        player = new YT.Player('ytplayer', {
          videoId: ytVideoID,
          events: {
            'onReady': onPlayerReady,
          },
          playerVars: {
            // 'controls': 0
          },
        });
      }

      function onPlayerReady() {
        player.playVideo();
      }
    })

  }


  init() {
    document.querySelector('.s5_project--video') ? this.ytPlayer() : null
  }
}