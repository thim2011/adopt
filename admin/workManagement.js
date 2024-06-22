var myApp = {

    getOnePage : function(pageNo)
    {
        var category = $("input[name='category']").val();
		
        location.href = "workManagement.php?category=" + category + "&pageno=" + pageNo;
        return true;
    },

    deleteWork : function(id)
    {
        $.ajax({
            url: '../BLL/Work/delWork.php',
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
        myApp.deleteWork(id);
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        id = button.data('id')
    });

});