tinymce.init({
    selector: 'textarea',
    language: 'ru',
    menubar: false,
    plugins: 'lists',
    toolbar: [
        { name: 'history', items: [ 'undo', 'redo' ] },
        { name: 'formatting', items: [ 'forecolor', 'bold', 'italic' , 'underline'] },
        { name: 'alignment', items: [ 'alignleft', 'aligncenter', 'alignright', 'alignjustify' ] },
        { name: 'indentation', items: [ 'outdent', 'indent' ] },
        { name: 'lists', items: [ 'numlist' , 'bullist' ] }

    ],
    branding: false
});

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