import initTinymce from './modules/tinymce.js';
import addListenersForButtonsGallery from './modules/copyToClipboard.js';

initTinymce();

addListenersForButtonsGallery(document.querySelectorAll('.btn-copy'));

