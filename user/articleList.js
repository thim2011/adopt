var myApp = {
    getOnePage : function(pageNo){
        var category = $("input[name='category']").val();
		
        location.href = "articleList.php?category=" + category + "&pageno=" + pageNo;
        return true;
    }
}