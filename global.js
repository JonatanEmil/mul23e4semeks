const dropupElement = document.querySelector('#searchbutt');
const input = document.querySelector('#dropupSearchInput');
dropupElement.addEventListener('shown.bs.dropdown', function () {
    input.focus();
});