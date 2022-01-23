document.addEventListener('DOMContentLoaded', function () {
    var modeSwitch = document.querySelector('.toggle-checkbox');
    var isLight = true;

    modeSwitch.addEventListener('click', function () {
        isLight = !isLight;
        console.log('Actual theme: ' + (isLight ? 'Light' : 'Dark'));
        document.documentElement.classList.toggle('dark');
    });

});