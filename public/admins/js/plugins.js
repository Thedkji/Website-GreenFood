const PATH_ROOT = "http://datn-fall2024.test/GreenFood/public/admins";
(
    document.querySelectorAll("[toast-list]")||document.querySelectorAll("[data-choices]")||document.querySelectorAll("[data-provider]"))&&(document.writeln("<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'><\/script>"),
    document.writeln(`<script type='text/javascript' src='${PATH_ROOT}/libs/choices.js/public/assets/scripts/choices.min.js'><\/script>`),
    document.writeln(`<script type='text/javascript' src='${PATH_ROOT}/libs/flatpickr/flatpickr.min.js'><\/script>`)
);
