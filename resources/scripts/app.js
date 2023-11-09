import domReady from '@roots/sage/client/dom-ready';
import FontFaceObserver from "fontfaceobserver";
import fitty from "fitty";

/**
 * Application entrypoint
 */
domReady(async () => {
  // Create a FontFaceObserver instance for your font
  const myFont = new FontFaceObserver('Unbounded');
  const player = document.querySelector("lottie-player");

  // Check if the font has loaded
  myFont.load().then(function () {
    fitty('.fit');
    player && player.play();
    document.querySelector('.js-fit-group').classList.remove('opacity-0');

    const fixedElement = document.querySelector('.js-fit-group');
    let windowHeight = window.innerHeight;
    const fixedElementHeight = fixedElement.offsetHeight;
    const lastFooterElement = document.querySelector('footer:last-of-type');
    const lastFooterElementHeight = lastFooterElement.clientHeight;
    let endPosition = windowHeight - (lastFooterElementHeight * 2 - fixedElementHeight);

    window.addEventListener('scroll', function () {
      const currentPosition = window.scrollY;
      const newPosition = (currentPosition / (document.body.clientHeight - windowHeight)) * endPosition;
      const transformFactor = currentPosition / (document.body.clientHeight - windowHeight);
      const translateY = (newPosition - fixedElement.clientHeight) * transformFactor;

      fixedElement.style.transform = `translateY(${translateY}px)`;
    });

    window.addEventListener('resize', function () {
      windowHeight = window.innerHeight;
      endPosition = windowHeight - (lastFooterElementHeight - fixedElementHeight);
    });
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) {
  import.meta.webpackHot.accept(console.error);
}
