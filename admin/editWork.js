var myApp = {

    onPost : function () {
        $('#save').val('0');
        $("#workForm").submit();
    },

    onSave : function () {
        $('#save').val('1');
        $("#workForm").submit();
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

    $('#content').summernote();
    
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

    document.getElementById('videoFile').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var url = URL.createObjectURL(file);

        document.getElementById('videoPreview').src = url;
    });
});