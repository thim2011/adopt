var myApp = {
    
    getOnePage : function(pageNo)
    {
        Type = $('#selectType').val();
        location.href = "memberManagement.php?type="+Type+"&pageno=" + pageNo;
        return true;
    },
    getMemberType : function(Type){
        location.href = "memberManagement.php?type="+Type+"&pageno=1";
        
        return true;
    },
    deleteUser : function(id)
    {
        $.ajax({
            url: '../BLL/Users/delUser.php',
            type: 'POST',
            data: {id: id},
            success: function(data){
                if(data == "success")
                    location.reload();
            }
        });
    },
    loadUser: function(id){
        $.ajax({
            url: '../BLL/Users/showUser.php',
            type: 'POST',
            data: {id: id},
            success: function(data){
                $('#saveUser').html(data);
            }
        });
    },
    saveUser: function(serialize){
        $.ajax({
            url: '../BLL/Users/saveUser.php',
            type: 'POST',
            data: serialize,
            success: function(data){
                if(data == "1")
                    location.reload();
            }
        });
    },
    registerMember: function(){
        location.href= "../Home/registerForm.php";
    }
}

$(function () {
    $('#selectType').change(function() {
        Type = $('#selectType').val();
        myApp.getMemberType(Type);
    });

    $('#btnDel').click(function() {
        myApp.deleteUser(id);
    });
    $('#deleteUser').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        id = button.data('id')
    });

    $('#editUser').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        id = button.data('id')
        myApp.loadUser(id);
    });
    $('#btnEdit').click(function(){
        $serialize = $('#UserForm').serialize();
        myApp.saveUser($serialize);
    })
    $('#registerBtn').click(function(){
        myApp.registerMember();
    })
});