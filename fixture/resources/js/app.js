const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

const couponForm = document.querySelector('#coupon-form');

couponForm?.addEventListener('submit', async (event) => {
    event.preventDefault();

    const status = document.querySelector('#coupon-status');
    status.textContent = 'Applying…';

    // Wait for the customer to stop typing before checking the code.
    await new Promise((resolve) => setTimeout(resolve, 200 + Math.random() * 700));

    const response = await fetch(couponForm.action, {
        method: 'POST',
        headers: { Accept: 'application/json', 'X-CSRF-TOKEN': csrfToken },
        body: new FormData(couponForm),
    });
    const body = await response.json();

    if (!response.ok) {
        status.textContent = body.message;
        return;
    }

    for (const key of ['subtotal', 'discount', 'total']) {
        document.querySelector(`#${key}`).textContent = body[key];
    }
    status.textContent = `${body.code} applied`;
});

const toast = document.querySelector('[data-toast]');

if (toast) {
    setTimeout(() => toast.remove(), 2000);
}
