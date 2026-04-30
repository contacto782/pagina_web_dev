let observer=[];
const scripts = document.querySelectorAll('.api');
const iframe = document.querySelectorAll('iframe');
const video = document.querySelectorAll('video');
let innervideo = '';
const images = document.querySelectorAll('img');
const lazyElements = document.querySelectorAll('.lazy');
const options = {
  rootMargin: '0px',
  threshold: 0.1
};


const fetchImage = (url) => {
  return new Promise((resolve, reject) => {
    const image = new Image();
    image.src = url;
    image.onload = resolve;
    image.onerror = reject;
  });
}

const loadImage = (image) => {
  const src = image.dataset.src !== undefined ? image.dataset.src : image.src;
  fetchImage(src).then(() => {
    image.src = src;
  })
}

const handleIntersection = (entries, observer) => {
  entries.forEach(entry => {
    if(entry.intersectionRatio > 0 && entry.isIntersecting) {
      loadImage(entry.target)
    }
  })
}

const intersectionCallback = (entries) => {
  entries.forEach(function(entry) {
    if(entry.isIntersecting){
      let box = entry.target;
      let visiblePct = (Math.floor(entry.intersectionRatio * 100)) + "%";
    }
  });
}

const ScriptCallback = (entries) => {
  entries.forEach(function(entry) {
    let box = entry.target;
    if(box.dataset.exists === undefined && entry.isIntersecting ){
      let tag = document.createElement('script');
      tag.src = box.dataset.api;
      let firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
      box.dataset.exists = true;
    }
  });
}

const IframeCallback = (entries) => {
  entries.forEach(function(entry) {
    let box = entry.target;
    if(box.dataset.exists === undefined && entry.isIntersecting ){
      box.src = (box.dataset.src!==undefined) ? box.dataset.src : box.src;
      box.dataset.exists = true;
    }
  });
}
const VideoCallback = (entries) => {
  entries.forEach(function(entry) {
    let box = entry.target;
    if(box.dataset.exists === undefined && entry.isIntersecting && box.dataset.src!==undefined){
      innervideo = document.createElement('source')
      innervideo.src = box.dataset.src;
      innervideo.type = "video/mp4";
      box.appendChild(innervideo);
      box.dataset.exists = true;
    }
  });
}

if ('IntersectionObserver' in window) {
  // Observer code
  observer[0] = new IntersectionObserver(handleIntersection, options);
  images.forEach(img => {
    observer[0].observe(img);
  })
  observer[1] = new IntersectionObserver(intersectionCallback, options);
  lazyElements.forEach(e =>{
    observer[1].observe(e);
  })
  observer[2] = new IntersectionObserver(ScriptCallback);
  scripts.forEach(e =>{
    observer[2].observe(e);
  })
  observer[3] = new IntersectionObserver(IframeCallback);
  iframe.forEach(e =>{
    observer[3].observe(e);
  })
  observer[4] = new IntersectionObserver(VideoCallback);
  video.forEach(e =>{
    observer[4].observe(e);
  })
  
} else {
  // IO is not supported.
  // Just load all the images
   Array.from(images).forEach(image => loadImage(image));
}