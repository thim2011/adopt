var myApp = {

    getOnePage : function(pageNo)
    {
        var category = $("input[name='category']").val();
		
        location.href = "articleManagement.php?category=" + category + "&pageno=" + pageNo;
        return true;
    },

    deleteArticle : function(id)
    {

        $.ajax({
            url: '../BLL/Article/delArticle.php',
            type: 'POST',
            data: {id: id},
            success: function(data){
                if(data == "success")
                    location.reload();
            }
        });
    }
}

//----------------------------------------------------------------------------------------------

$(function () {
    let id = ''; 

    $('#btnDel').click(function() {
        myApp.deleteArticle(id);
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        id = button.data('id')
    });

});