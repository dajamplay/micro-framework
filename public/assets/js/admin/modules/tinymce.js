function initTinymce() {
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
}

export default initTinymce;