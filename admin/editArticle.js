var myApp = {

    onPost : function () {
        $('#save').val('0');
        $("#artForm").submit();
    },

    onSave : function () {
        $('#save').val('1');
        $("#artForm").submit();
    }
}

//------------------------------------------------------------------------------

$(function () {

    $('#btnSave').click( function (e) {
        e.preventDefault();
        myApp.onSave();
    });

    $("#btnPos").click( myApp.onPost );

    let imageValue = $('#img').val();
    
    $('#image').fileinput({
        theme: 'fas',
        previewFileType: 'image',
        browseClass: 'btn btn-primary',
        showUpload: false,
        showRemove: false,
        showCaption: false,
        browseLabel: '選擇檔案',
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFileSize: 2048,
        language: 'zh-TW',
        initialPreview: [imageValue],
        initialPreviewAsData: true,
        initialPreviewFileType: 'image',
    });
    
    
    $('#content').summernote();
});