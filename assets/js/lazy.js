let lazyimages = [].slice.call(document.querySelectorAll('img.lazy'));

if("IntersectionObserver" in window){
    let observer = new IntersectionObserver((entrise,observer) =>{
        entrise.forEach(function(entry){
            if(entry.isIntersecting){
                let lazyimage = entry.target;
                lazyimage.src = lazyimage.dataset.src;
                lazyimage.srcset = lazyimage.dataset.srcset;
                lazyimage.classList.remove("lazy");
                observer.unobserve(lazyimage);
            }
        });
    }); 

    // loop
    lazyimages.forEach((lazyimage) => {
        observer.observe(lazyimage);
    });
}