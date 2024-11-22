const basePrice = parseFloat(document.getElementById('product-price').dataset.basePrice);
let totalPrice = basePrice;

// Функция для обновления цены
function updatePrice(servicePrice, isChecked) {
    servicePrice = parseFloat(servicePrice);
    totalPrice = isChecked ? totalPrice + servicePrice : totalPrice - servicePrice;

    document.getElementById('product-price').textContent = totalPrice.toFixed(2);
}


// Функция для установки куки
function setCookie(name, value, days = 7) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "; expires=" + date.toUTCString();
    document.cookie = name + "=" + value + expires + "; path=/";
}

// Функция для переключения валюты
function setupCurrencySwitcher() {
    const currencyItems = document.querySelectorAll('.header_wrapper_logo ul li');

    currencyItems.forEach(item => {
        item.addEventListener('click', function () {
            const selectedCurrency = this.getAttribute('data-id');

            // Устанавливаем куки с выбранной валютой
            setCookie('currency', selectedCurrency);

            // Перезагружаем страницу, чтобы применить изменения
            location.reload();
        });
    });
}

// Вызываем функцию переключения валют после загрузки страницы
document.addEventListener('DOMContentLoaded', setupCurrencySwitcher);
