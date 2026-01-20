const mobileButton = document.querySelector('.mobile_button');
const mobileMenu = document.querySelector('.mobile_menu');

window.addEventListener('DOMContentLoaded', () => {
    const messages = document.querySelectorAll('[id^="cart_message_"]');
    
    messages.forEach(msg => {
        if (msg.textContent.trim() !== '') {
            setTimeout(() => {
                msg.style.opacity = '0';
            }, 2000);
        }
    });
});



function showMobileMenu(){
  if(mobileMenu.classList.contains('show')){
    mobileMenu.classList.remove('show');
  }else{
    mobileMenu.classList.add('show');
  }
}

mobileButton.addEventListener('click', showMobileMenu);

