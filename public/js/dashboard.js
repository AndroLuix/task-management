document.addEventListener("DOMContentLoaded", function() {
    var image = document.getElementById('movingImage');
    var hiddenText = document.getElementById('hiddenText');

    image.addEventListener('animationend', function() {
        hiddenText.style.opacity = '1';
    });
    
    image.classList.add('moveAnimation');
});

function closeAlert(idElement){

    document.getElementById(idElement).style.display = 'none'

}