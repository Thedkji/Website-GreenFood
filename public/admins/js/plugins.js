
if (document.querySelectorAll("[toast-list]") || 
    document.querySelectorAll("[data-choices]") || 
    document.querySelectorAll("[data-provider]")) {
    
    var toastifyScript = document.createElement('script');
    toastifyScript.src = 'https://cdn.jsdelivr.net/npm/toastify-js';
    document.head.appendChild(toastifyScript);
    
    var choicesScript = document.createElement('script');
    choicesScript.src = 'https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js';
    document.head.appendChild(choicesScript);
    
    var flatpickrScript = document.createElement('script');
    flatpickrScript.src = 'https://cdn.jsdelivr.net/npm/flatpickr';
    document.head.appendChild(flatpickrScript);
}
