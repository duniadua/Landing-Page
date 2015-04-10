var $ = jQuery;

var Product = {
    getListProductCatByParam : function(param, paramValue) {
  		All.set_disable_button();
		All.get_wait_message();
		if(paramValue !== "") {
			$.ajax({
	            url: All.get_url('admProduct/getListProductCatByParam/'+param+ "/" +paramValue) ,
	            type: 'GET',
				dataType: 'json',
	            success:
	            function(data){
	                if(data.response == "true") {
						alert("Double "+param+ " with value : " +paramValue);
					} else {
						All.set_enable_button();
					}
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
	                 alert(thrownError + ':' +xhr.status);
					 All.set_enable_button();
	            }
	        });
	   }      
  },
  
  saveInputProductCat : function() {
  	    All.set_disable_button();
		All.get_wait_message();
		$.post(All.get_url("admProduct/saveInputProductCat/") , $(All.get_active_tab() + " #formInputProductCat").serialize(), function(data)
        {  
            All.set_enable_button();
			if(data.response == "false") {
                All.set_error_message(".mainForm > .result", data.message);
            } 
            else {
                All.set_success_message(".mainForm > .result", data.message);
				All.reset_all_input();
            } 
            
        }, "json").fail(function() { 
            alert("Error requesting page"); 
            All.set_enable_button();
        });  
  },
  
  getUpdateProductCat : function(param) {
  	    All.set_disable_button();
		All.get_wait_message();
		var id = $(All.get_active_tab() + " #id" +param).val();
		$.ajax({
            url: All.get_url("admProduct/getListProductCatByParam/id/" +id+ "/json") ,
            type: 'GET',
			dataType: 'json',
            success:
            function(data){
                All.set_enable_button();
				if(data.response == "true") {
					//All.clear_div_in_boxcontent(".mainForm > .result");
  					//$(All.get_box_content() + ".mainForm > #formInputBlog").show();
					$(All.get_active_tab() + " #inp_btn").css('display', 'none');
					$(All.get_active_tab() + " #upd_btn").css('display', 'block');
					$(All.get_active_tab() + " #id").val(data.arraydata[0].id);
					$(All.get_active_tab() + " #prdcat_name").val(data.arraydata[0].prdcat_name);
					
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                 alert(thrownError + ':' +xhr.status);
				 All.set_enable_button();
            }
        });
  },
  
  cancelUpdateProductCat : function() {
  	  $(All.get_active_tab() + " #upd_btn").css('display', 'none');
	  $(All.get_active_tab() + " #inp_btn").css('display', 'block');
	  $(All.get_active_tab() + " #id").val(null);
	  All.reset_all_input();
  },
  
  deleteProductCat: function(param) {
   		All.set_disable_button();
		All.get_wait_message();
		var id = $(All.get_active_tab() + " #id" +param).val();
		$.ajax({
            url: All.get_url("admProduct/deleteProductCat/" +id) ,
            type: 'GET',
			dataType: 'json',
            success:
            function(data){
                All.set_enable_button();
                alert(data.message);
				if(data.response == "true") {
					All.getListData('admProduct/getListProductCat');
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                 alert(thrownError + ':' +xhr.status);
				 All.set_enable_button();
            }
        });
   },
  
  saveUpdateProductCat : function() {
   	  All.set_disable_button();
		All.get_wait_message();
		$.post(All.get_url("admProduct/saveUpdateProductCat/") , $(All.get_active_tab() + " #formInputProductCat").serialize(), function(data)
        {  
            All.set_enable_button();
			alert(data.message);
			Product.cancelUpdateProductCat();
			All.getListData('admProduct/getListProductCat');
            
        }, "json").fail(function() { 
            alert("Error requesting page"); 
            All.set_enable_button();
        });  
   },
	
	getProductByID : function(paramValue, nextField) {
		All.set_disable_button();
		All.get_wait_message();
		
		$.ajax({
            url: All.get_url('admProduct/getProductByID/' +paramValue) ,
            type: 'GET',
			dataType: 'json',
            success:
            function(data){
                if(data.response == "true") {
					alert("Double product code with value : " +paramValue);
					$(All.get_active_tab() + "#prdcd").focus();
				} else {
					All.set_enable_button();
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                 alert(thrownError + ':' +xhr.status);
				 All.set_enable_button();
            }
        });
	},
	
	refreshListProductCat: function(set_to) {
  		$.ajax({
            url: All.get_url('admProduct/getListProductCat/json') ,
            type: 'GET',
			dataType: 'json',
            success:
            function(data){
                    var arr = data.arraydata;  
	                $(All.get_active_tab() + set_to).html(null);
	                var rowhtml = "<option value=''>--Select Here--</option>";
	                $.each(arr, function(key, value) {
	                    rowhtml += "<option  value="+value.id+">"+value.prdcat_name+"</option>";
	                });
                	$(All.get_active_tab() + set_to).append(rowhtml);
				   
            },
            error: function (xhr, ajaxOptions, thrownError) {
                 alert(thrownError + ':' +xhr.status);
				 All.set_enable_button();
            }
        });
    },
	
	getListDataProduct : function(url) {
    	All.set_disable_button();
		All.get_wait_message();
		$.ajax({
            url: All.get_url(url) ,
            type: 'GET',
            success:
            function(data){
                All.set_enable_button();
                if(data !== "null") {
	                $(All.get_box_content() + ".mainForm > #formInputProduct").hide();
	                All.clear_div_in_boxcontent(".mainForm > .result");
					$(All.get_box_content() + ".mainForm > .result").html(data);
				} else {
					alert("Data is empty..!!");
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                 alert(thrownError + ':' +xhr.status);
				 All.set_enable_button();
            }
        });
  },
  
  backToFormProduct : function() {
  	All.clear_div_in_boxcontent(".mainForm > .result");
  	$(All.get_box_content() + ".mainForm > #formInputProduct").show();
  },
	
	saveInputProduct : function() {
		var formData = new FormData($(All.get_active_tab() + " #formInputProduct")[0]);
    
        $.ajax({
            url: All.get_url('admProduct/saveInputProduct'),
            type: 'POST',
            data: formData,
            dataType: 'json',
            async: false,
            success: function (data) {
                
                if(data.response == "false") {
                	All.set_error_message(".mainForm > .result", data.message);
	            } 
	            else {
	                All.set_success_message(".mainForm > .result", data.message);
					All.reset_all_input();
	            } 
            },
            cache: false,
            contentType: false,
            processData: false
        });
	},
	
	getUpdateProduct : function(param) {
		All.set_disable_button();
		All.get_wait_message();
		var id = $(All.get_active_tab() + " #id" +param).val();
		$.ajax({
            url: All.get_url("admProduct/getProductByID/" +id+ "/id/json") ,
            type: 'GET',
			dataType: 'json',
            success:
            function(data){
                All.set_enable_button();
				if(data.response == "true") {
					Product.backToFormProduct();
					$(All.get_active_tab() + " .fileExistingInfo").html(null);
	  				$(All.get_active_tab() + " .fileHiddenExistingInfo").val(null);
					$(All.get_active_tab() + " #inp_btn").css('display', 'none');
					$(All.get_active_tab() + " #upd_btn").css('display', 'block');
					
					$(All.get_active_tab() + " #id").val(data.arraydata[0].id);
					$(All.get_active_tab() + " #prdcd").val(data.arraydata[0].code);
					$(All.get_active_tab() + " #title").val(data.arraydata[0].title);
					$(All.get_active_tab() + " #category").val(data.arraydata[0].category);
					//$(All.get_active_tab() + " #description").val(data.arraydata[0].description);
					$(All.get_active_tab() + " #product_desc").val(data.arraydata[0].description).blur();
					$(All.get_active_tab() + " #act").val(data.arraydata[0].act);
										
					if(data.arrayimage !== null) {						
						$.each(data.arrayimage, function(key, value) {
		                    $(All.get_active_tab() + " #spanPic" +(key + 1)).append("Existing File Image : " +value.image);
							$(All.get_active_tab() + " #filename" +(key + 1)).val(value.image);
							$(All.get_active_tab() + " #imageTitle" +(key + 1)).val(value.title);
		                });      
					}
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                 alert(thrownError + ':' +xhr.status);
				 All.set_enable_button();
            }
        });
	},
	
	cancelUpdateProduct : function() {
   	  $(All.get_active_tab() + " #upd_btn").css('display', 'none');
	  $(All.get_active_tab() + " #inp_btn").css('display', 'block');
	  $(All.get_active_tab() + " #id").val(null);
	  $(All.get_active_tab() + " .fileExistingInfo").html(null);
	  $(All.get_active_tab() + " .fileHiddenExistingInfo").val(null);
	  $(All.get_active_tab() + " #product_desc").val(null).blur();
	  All.reset_all_input();
   },
   
   saveUpdateProduct: function() {
   		var formData = new FormData($(All.get_active_tab() + " #formInputProduct")[0]);
    
        $.ajax({
            url: All.get_url('admProduct/saveUpdateProduct'),
            type: 'POST',
            data: formData,
            dataType: 'json',
            async: false,
            success: function (data) {
                
                All.set_enable_button();
				alert(data.message);
				Product.cancelUpdateProduct();
				All.getListData('admProduct/getListProduct');
            },
            cache: false,
            contentType: false,
            processData: false
        }); 
   },
   
   deleteProduct: function(param) {
   	    All.set_disable_button();
		All.get_wait_message();
		var id = $(All.get_active_tab() + " #id" +param).val();
		$.ajax({
            url: All.get_url("admProduct/deleteProduct/" +id+ "/json") ,
            type: 'GET',
			dataType: 'json',
            success:
            function(data){
                All.set_enable_button();
                alert(data.message);
				if(data.response == "true") {
					All.getListData('admProduct/getListProduct')
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                 alert(thrownError + ':' +xhr.status);
				 All.set_enable_button();
            }
        });
   },
   
   refreshListProduct : function(set_to) {
   	   $.ajax({
            url: All.get_url('admProduct/getListProduct2/json') ,
            type: 'GET',
			dataType: 'json',
            success:
            function(data){
                    var arr = data.arraydata;  
	                $(All.get_active_tab() + set_to).html(null);
	                var rowhtml = "<option value=''>--Select Here--</option>";
	                $.each(arr, function(key, value) {
	                    rowhtml += "<option  value="+value.code+">"+value.title+"</option>";
	                });
                	$(All.get_active_tab() + set_to).append(rowhtml);
				   
            },
            error: function (xhr, ajaxOptions, thrownError) {
                 alert(thrownError + ':' +xhr.status);
				 All.set_enable_button();
            }
        });
   },
   
   saveInputRelatedProduct : function() {
		All.set_disable_button();
		All.get_wait_message();
		$.post(All.get_url("admProduct/saveInputRelatedProduct/") , $(All.get_active_tab() + " #formInputRelatedProduct").serialize(), function(data)
        {  
            All.set_enable_button();
			if(data.response == "false") {
                All.set_error_message(".mainForm > .result", data.message);
            } 
            else {
                All.set_success_message(".mainForm > .result", data.message);
				All.reset_all_input();
            } 
            
        }, "json").fail(function() { 
            alert("Error requesting page"); 
            All.set_enable_button();
        });  
	},
	
	getUpdateRelatedProduct : function(param) {
		All.set_disable_button();
		All.get_wait_message();
		var id = $(All.get_active_tab() + " #id" +param).val();
		$.ajax({
            url: All.get_url("admProduct/getUpdateRelatedProduct/" +id+ "/json") ,
            type: 'GET',
			dataType: 'json',
            success:
            function(data){
                All.set_enable_button();
				if(data.response == "true") {
					$(All.get_active_tab() + " .oke").val(null);
					$(All.get_active_tab() + " #inp_btn").css('display', 'none');
					$(All.get_active_tab() + " #upd_btn").css('display', 'block');
					$(All.get_active_tab() + " #code").val(id);
					$(All.get_active_tab() + " #code").attr("disabled", "disabled");
					//alert("isi id : " +id);
					$(All.get_active_tab() + " #id").val(id);  
					var arr = data.arraydata;  
	                
	                $.each(arr, function(key, value) {
	                   
	                   $(All.get_active_tab() + " #rel_code" +(key + 1)).val(value.rel_code); 
	                });
					
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                 alert(thrownError + ':' +xhr.status);
				 All.set_enable_button();
            }
        });
	},
	
	cancelUpdateRelatedProduct : function() {
		$(All.get_active_tab() + " #upd_btn").css('display', 'none');
	    $(All.get_active_tab() + " #inp_btn").css('display', 'block');
	    $(All.get_active_tab() + " .oke").val(null);
	    $(All.get_active_tab() + " #code").val(null); 
	    $(All.get_active_tab() + " #code").removeAttr("disabled");
	    $(All.get_active_tab() + " #id").val(null); 
	},
	
	saveUpdateRelatedProduct : function() {
		All.set_disable_button();
		All.get_wait_message();
		$.post(All.get_url("admProduct/saveUpdateRelatedProduct/") , $(All.get_active_tab() + " #formInputRelatedProduct").serialize(), function(data)
        {  
            All.set_enable_button();
			if(data.response == "false") {
                All.set_error_message(".mainForm > .result", data.message);
            } 
            else {
                All.set_success_message(".mainForm > .result", data.message);
				All.reset_all_input();
            } 
            
        }, "json").fail(function() { 
            alert("Error requesting page"); 
            All.set_enable_button();
        });  
	},
	
	deleteRelatedProduct: function(param) {
   		All.set_disable_button();
		All.get_wait_message();
		var id = $(All.get_active_tab() + " #id" +param).val();
		$.ajax({
            url: All.get_url("admProduct/deleteRelatedProduct/" +id) ,
            type: 'GET',
			dataType: 'json',
            success:
            function(data){
                All.set_enable_button();
                alert(data.message);
				if(data.response == "true") {
					All.getListData('admProduct/getListRelatedProduct');
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                 alert(thrownError + ':' +xhr.status);
				 All.set_enable_button();
            }
        });
   }

}