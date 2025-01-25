/* 
 * Mobile Menu Toggle Behavior
 */
function menuToggle(){
    const element = document.getElementById('menu-toggle');
    const body = document.getElementById('page');
    element.classList.toggle('active');
    body.classList.toggle('overlay-active');
}

// Accordion Submenus
let parentItems = document.querySelectorAll("#primary-menu li.menu-item-has-children");
parentItems.forEach(item => {
    let accordionArrow = document.createElement('div');
    accordionArrow.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.2828 4.89817"><path d="M4.64116,4.89817a.5001.5001,0,0,1-.34277-.13574L.15727.86448A.50018.50018,0,0,1,.84282.136L4.64116,3.71165,8.44.136a.50018.50018,0,0,1,.68555.72852L4.98393,4.76243A.5001.5001,0,0,1,4.64116,4.89817Z"></path>
        </svg>
    `;
    accordionArrow.classList.add('accordion-arrow');
    item.appendChild(accordionArrow);  
})
let arrowArray = document.querySelectorAll("#primary-menu .accordion-arrow");
console.log(arrowArray, 'arrows')

function openSubmenu({target}) {
    let listItem = target.closest("#primary-menu > li");
    console.log(listItem.classList, 'listitem');
    console.log(listItem.classList.contains('active'));
    if (listItem.classList.contains('active')){
      parentItems.forEach(item => {
        item.classList.remove('active');
      })
      listItem.classList.remove('active');
    } else {
      parentItems.forEach(item => {
        item.classList.remove('active');
      })
      listItem.classList.add('active');
    }
    
    
}

arrowArray.forEach(item => {
  item.addEventListener('click', openSubmenu);
})


/* 
 * jQuery
 */
jQuery(document).ready(function($) {
  // Get height values
  let footerHeight = $('#footer').height();
  let headerHeight = $('#header').height();
  

  // Footer reveal effect
  let mainContent = $('main#content');
  mainContent.css('margin-bottom', footerHeight);

  function getHeightsOnResize(){
    footerHeight = $('#footer').height();
    headerHeight = $('#header').height();
    contentSpace.css('margin-bottom', footerHeight);
  }
  window.addEventListener('resize', getHeightsOnResize);
});

