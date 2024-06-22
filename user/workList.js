var myApp = {
    getOnePage : function(pageNo){
        var category = $("input[name='category']").val();
		
        location.href = "workList.php?category=" + category + "&pageno=" + pageNo;
        return true;
    }
}