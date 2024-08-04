document.addEventListener('DOMContentLoaded', function() {
    const paymentBank = document.getElementById('payment-bank');
    const paymentCash = document.getElementById('payment-cash');
    const bankInfo = document.getElementById('bank-info');

    paymentBank.addEventListener('change', function() {
        if (paymentBank.checked) {
            bankInfo.style.display = 'block';
        }
    });

    paymentCash.addEventListener('change', function() {
        if (paymentCash.checked) {
            bankInfo.style.display = 'none';
        }
    });
});
