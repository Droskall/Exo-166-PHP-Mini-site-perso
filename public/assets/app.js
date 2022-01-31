console.log('js loaded');


const errorMessage = document.querySelector('.feedback-message');

if (errorMessage) {
    setTimeout(function () {
        errorMessage.remove();
    }, 5000);
}