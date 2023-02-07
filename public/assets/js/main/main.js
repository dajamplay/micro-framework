(function() {

  // Mobile menu
  let menuToggle = document.querySelector('.menu_toggle');
  let menu = document.querySelector('.header_menu');

  menuToggle.addEventListener('click', (event) => {
    menu.classList.toggle('menu_show');
  })

  // Active menu item
  let leftMenu = document.querySelectorAll('.main__nav ul li');
  if(leftMenu.length > 0) {
    let currentCategoryId = document.location.pathname.split('/').slice(-1)[0];
    leftMenu.forEach( (element) => {
      if (currentCategoryId === element.getAttribute("data-id")) {
        element.classList.add('active_menu_item');
      }
    })
  }

})()