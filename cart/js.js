document.addEventListener('DOMContentLoaded', function () {
    const cartItems = document.querySelectorAll('.cart-item');
    const totalElement = document.querySelector('.cart-total p');
    const checkoutButton = document.querySelector('.checkout-btn');

    function updateTotal() {
        let total = 0;
        cartItems.forEach(item => {
            const price = parseFloat(item.getAttribute('data-price'));
            const quantity = parseInt(item.querySelector('.quantity-input').value);
            total += price * quantity;
        });

        totalElement.textContent = `Total: $${total.toFixed(2)}`;
    }

    function removeItem(item) {
        item.remove();
        updateTotal();
    }

    cartItems.forEach(item => {
        const quantityInput = item.querySelector('.quantity-input');
        const removeButton = item.querySelector('.remove-btn');

        quantityInput.addEventListener('input', function () {
            updateTotal();
        });

        removeButton.addEventListener('click', function () {
            removeItem(item);
        });
    });

    checkoutButton.addEventListener('click', function () {
        alert('Redirecting to checkout...');
    });

    updateTotal();
});
