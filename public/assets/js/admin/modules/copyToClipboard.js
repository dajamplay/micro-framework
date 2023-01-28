function addListenersForButtonsGallery(galleryButtons) {
    galleryButtons.forEach( (btn) => {
        btn.addEventListener('click', (event) => {
            let innerHtml = btn.innerHTML;
            btn.innerHTML = "<i>Ссылка скопирована</i>";
            setTimeout( () => {
                btn.innerHTML = innerHtml;
            }, 2000);
            copyToClipboard(btn.dataset.copy);
        })
    })
}

function copyToClipboard(textToCopy) {
    // navigator clipboard api needs a secure context (https)
    if (navigator.clipboard && window.isSecureContext) {
        // navigator clipboard api method'
        return navigator.clipboard.writeText(textToCopy);
    } else {
        // text area method
        let textArea = document.createElement("textarea");
        textArea.value = textToCopy;
        // make the textarea out of viewport
        textArea.style.position = "fixed";
        textArea.style.left = "-999999px";
        textArea.style.top = "-999999px";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        return new Promise((res, rej) => {
            // here the magic happens
            document.execCommand('copy') ? res() : rej();
            textArea.remove();
        });
    }
}

export default addListenersForButtonsGallery;