import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine
window.Alpine.start()

const html = document.documentElement;
const logoTheme = document.getElementById('logo-theme');

// функция для сохранения выбранной темы в локальное хранилище
function saveThemePreference(isDarkMode) {
    localStorage.setItem('darkMode', JSON.stringify(isDarkMode));
}

// слушатели события кнопки переключения темы
logoTheme.addEventListener('click', function () {
    html.classList.toggle('dark');
    const isDarkMode = html.classList.contains('dark');
    saveThemePreference(isDarkMode);
});

// функция для загрузки сохраненной темы при загрузке страницы
function loadThemePreference() {
    const isDarkMode = JSON.parse(localStorage.getItem('darkMode'));
    if (isDarkMode) {
        html.classList.add('dark');
    } else {
        html.classList.remove('dark');
    }
}

// вызов функции загрузки сохраненной темы при загрузке страницы
document.addEventListener('DOMContentLoaded', loadThemePreference);

//------------------------------------------------------------------------------------------------//

document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.toggle-btn');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const collapsedContent = button.parentNode.nextElementSibling;
            collapsedContent.classList.toggle('hidden');
            if (collapsedContent.classList.contains('hidden')) {
                button.textContent = '▼';
            } else {
                button.textContent = '▲';
            }
        });
    });
});

//------------------------------------------------------------------------------------------------//