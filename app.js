const mobileButton = document.querySelector('.mobile_button');
const mobileMenu = document.querySelector('.mobile_menu');

function showMobileMenu(){
  if(mobileMenu.classList.contains('show')){
    mobileMenu.classList.remove('show');
  }else{
    mobileMenu.classList.add('show');
  }
}

mobileButton.addEventListener('click', showMobileMenu);