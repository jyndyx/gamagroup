/* 
 * Carousel Slider Functionality
 */
// Declare variables
let itemClassName = "slide-wrapper",
    items = document.getElementsByClassName(itemClassName),
    totalItems = items.length,
    slide = 0,
    moving = true;

// Set classes
function setInitialClasses() {
    items[totalItems - 1].classList.add("prev");
    items[0].classList.add("active");
    items[1].classList.add("next");
}

// Set event listeners
function setEventListeners() {
    let next = document.getElementsByClassName('carousel-button-next')[0],
        prev = document.getElementsByClassName('carousel-button-prev')[0];

    next.addEventListener('click', moveNext);
    prev.addEventListener('click', movePrev);
}

// Set navigation handlers
function moveNext() {
    if (!moving) {
        if (slide === (totalItems - 1)) {
            slide = 0;
        } else {
            slide++;
        }
        moveCarouselTo(slide);
        // console.log(slide);
    }
}

function movePrev() {
    if (!moving) {
        if (slide === 0) {
            slide = (totalItems - 1);
        } else {
            slide--;
        }
        moveCarouselTo(slide);
        console.log(slide);
    }
}

function disableInteraction() {
    // Set 'moving' to true for the same duration as our transition.
    moving = true;
    setTimeout(function(){
      moving = false;
    }, 500);
    
}

// Enable carousel transitions
function moveCarouselTo(slide) {
    if(!moving) {
        disableInteraction();
        let newPrevious = slide - 1,
            newNext = slide + 1,
            oldPrevious = slide - 2,
            oldNext = slide + 2;

        
        if (totalItems > 3) {
            if (newPrevious <= 0) {
              oldPrevious = (totalItems - 1);
            } else if (newNext >= (totalItems - 1)){
              oldNext = 0;
            }

            if (slide === 0) {
              newPrevious = (totalItems - 1);
              oldPrevious = (totalItems - 2);
              oldNext = (slide + 1);
            } else if (slide === (totalItems -1)) {
              newPrevious = (slide - 1);
              newNext = 0;
              oldNext = 1;
            }

            items[oldPrevious].className = itemClassName;
            items[oldNext].className = itemClassName;
            items[newPrevious].className = itemClassName + " prev";
            items[slide].className = itemClassName + " active";
            items[newNext].className = itemClassName + " next";
        } 
    }
}

// Init and call carousel
function initCarousel() {
    setInitialClasses();
    setEventListeners();
    moving = false;

    window.setInterval(function(){
        moveNext();
    }, 5500);
    
}
initCarousel();   