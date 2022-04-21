import AOS from '../lib/aos';


export default class Animations {
  animation() {
    AOS.init({
      offset: 100,
      duration: 500,
      once: true,
    });
  }
}