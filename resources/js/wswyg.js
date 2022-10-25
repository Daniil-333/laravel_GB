import ClassicEditor from '@ckeditor/ckeditor5-build-classic/build/ckeditor';

const optionsLFM = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
}

const readyDocument = (callback) => {
    if (document.readyState !== "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}

readyDocument(() => {
    console.log(document.querySelector('meta'))
    ClassicEditor
        .create(document.querySelector('#descNews'))
        .then(editor => {
            console.log('Editor was inited', editor)
        })
        .catch(error => {
            console.log(`error`, error)
        });
});

// CKEDITOR.replace('descNews', optionsLFM);
