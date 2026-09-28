document.addEventListener('submit', (event) => {
    const form = event.target;

    if (!(form instanceof HTMLFormElement) || !form.hasAttribute('data-confirm-delete')) {
        return;
    }

    const message = form.dataset.confirmMessage ?? '¿Confirmas la eliminación?';

    if (!window.confirm(message)) {
        event.preventDefault();
    }
});
