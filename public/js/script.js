const basePrice = parseFloat(document.getElementById('product-price').dataset.basePrice);
let totalPrice = basePrice;

function updatePrice(servicePrice, isChecked) {
    servicePrice = parseFloat(servicePrice);
    totalPrice = isChecked ? totalPrice + servicePrice : totalPrice - servicePrice;

    document.getElementById('product-price').textContent = totalPrice.toFixed(2);
}
