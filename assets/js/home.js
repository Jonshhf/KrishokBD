var slider = tns({
    container: '.home-slider',
    items: 1,
    slideBy: "page",
    mode: "gallery",
    autoplayButtonOutput: false,
    mouseDrag: true,
    autoplay: true,
    speed: 2000,
    controlsContainer: "#home-control"
});
var sliderEv = tns({
    container: '.event-slider',
    items: 4,
    gutter: 20,
    slideBy: 1,
    mouseDrag: true,
    autoplay: true,
    autoplayButtonOutput: false,
    controlsContainer: "#event-control",
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        768: {
            items: 4,
            nav: true,
            gutter: 16,
        },
        1440: {
            items: 4,
            gutter: 20,
        }
    }
});
new VenoBox({
    selector: '.my-video-links',
});

function eventUrl(url) {
    console.log('/event/' + url)
    window.location = '/event/' + url
}