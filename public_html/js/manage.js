$(document).ready(function(){

	var DOMAIN = "http://localhost/asset_management/public_html";

//Manage Category
	manageCategory(1);
	function manageCategory(pn){
		$.ajax({
			url : DOMAIN + "/includes/process.php",
				method : "POST",
				data  : {manageCategory:1, pageno:pn}, 
				success : function(data)
				{
					$("#get_category").html(data);
				}
		})
	}
	$("body").delegate(".page-link", "click", function(){
		var pn = $(this).attr("pn");
		manageCategory(pn);
	})

	$("body").delegate(".del_cat", "click", function(){
		var did = $(this).attr("did");
		if (confirm("Are you sure? You want to delete")) 
		{
			$.ajax({
			url : DOMAIN + "/includes/process.php",
				method : "POST",
				data  : {deleteCategory:1, id:did}, 
				success : function(data)
				{
					var j;
					var res;
					for(j=0;j<String(data).length;j++)
					{
						if(String(data).charCodeAt(j) >= 65)
						{
							res = String(data).substring(j);
							break;
						}
					}
					data = res;
					if(data == "DEPENDENT_CATEGORY")
					{
						alert("Sorry! This is a parent category for some other category");
					}
					else if(data == "CATEGORY_DELETED")
					{
						alert("Deletion Successful");
						manageCategory(1);
					}
					else if(data == "DELETED")
					{
						alert("Deletion Successful");
					}
					else
					{
						alert(data);
					}
				}
		})
		}
		else
		{
		}
	})

	fetch_category();
	function fetch_category()
	{
		$.ajax({
			url : DOMAIN + "/includes/process.php",
			method  :"POST",
			data : {getCategory:1},
			success : function(data)
			{
				var root="<option value='0'>Root</option>";
				//var choose="<option value=''>Choose Category</option>";
				$('#parent_cat').html(root+data);
				//$('#select_cat').html(choose+data);
			}
		})
	}

	//Update Category
	$("body").delegate(".edit_cat", "click", function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN + "/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updateCategory:1, id:eid},
			success : function(data)
			{
				console.log(data);
				$("#cid").val(data["cid"]);
				$("#update_category").val(data["category_name"]);
				$("#parent_cat").val(data["parent_cat"]);
			}
		})
	})

	$("#update_category_form").on("submit", function(){
		if($("#update_category").val() == "")
		{
			$("#update_category").addClass("border-danger");
			$("#cat_error").html("<span class='text-danger'>Please enter category name</span>");
		}
		else
		{
			$.ajax({
				url : DOMAIN + "/includes/process.php",
				method : "POST",
				data  :$("#update_category_form").serialize(),
				success : function(data)
				{
					var j;
					var res;
					for(j=0;j<String(data).length;j++)
					{
						if(String(data).charCodeAt(j) >= 65)
						{
							res = String(data).substring(j);
							break;
						}
					}
					data = res;
					if(data == "CATEGORY_UPDATED")
					{
						alert("Updated Successfully..!!");
						window.location.href = "";
					}
					else
					{
						alert(data);
					}
					
				}
			})
		} 
	})

	//Manage Brand
	manageBrand(1);
	function manageBrand(pn){
		$.ajax({
			url : DOMAIN + "/includes/process.php",
				method : "POST",
				data  : {manageBrand:1, pageno:pn}, 
				success : function(data)
				{
					$("#get_brand").html(data);
				}
		})
	}
	$("body").delegate(".page-link", "click", function(){
		var pn = $(this).attr("pn");
		manageBrand(pn);
	})

	$("body").delegate(".del_brand", "click", function(){
		var did = $(this).attr("did");
		if (confirm("Are you sure? You want to delete")) 
		{
			$.ajax({
			url : DOMAIN + "/includes/process.php",
				method : "POST",
				data  : {deleteBrand:1, id:did}, 
				success : function(data)
				{
					var j;
					var res;
					for(j=0;j<String(data).length;j++)
					{
						if(String(data).charCodeAt(j) >= 65)
						{
							res = String(data).substring(j);
							break;
						}
					}
					data = res;
					
					if(data == "DELETED")
					{
						alert("Deletion Successful");
						manageBrand(1);
					}
					else
					{
						alert(data);
					}
				}
		})
		}
		else
		{
		}
	})

	$("body").delegate(".edit_brand", "click", function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN + "/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updateBrand:1, id:eid},
			success : function(data)
			{
				$("#bid").val(data["bid"]);
				$("#update_brand").val(data["brand_name"]);
			}
		})
	})

	$("#update_brand_form").on("submit", function(){
		if($("#update_brand").val() == "")
		{
			$("#update_brand").addClass("border-danger");
			$("#brand_error").html("<span class='text-danger'>Please enter brand name</span>");
		}
		else
		{
			$.ajax({
				url : DOMAIN + "/includes/process.php",
				method : "POST",
				data  :$("#update_brand_form").serialize(),
				success : function(data)
				{
					var j;
					var res;
					for(j=0;j<String(data).length;j++)
					{
						if(String(data).charCodeAt(j) >= 65)
						{
							res = String(data).substring(j);
							break;
						}
					}
					data = res;
					if(data == "BRAND_UPDATED")
					{
						alert("Brand Updated Successfully");
						window.location.href="";
						
					}
					else
					{
						alert(data);
					}
					
				}
			})
		} 
	})

	//******************Products***************
	manageProduct(1);
	function manageProduct(pn){
		$.ajax({
			url : DOMAIN + "/includes/process.php",
				method : "POST",
				data  : {manageProduct:1, pageno:pn}, 
				success : function(data)
				{
					$("#get_product").html(data);
				}
		})
	}
	$("body").delegate(".page-link", "click", function(){
		var pn = $(this).attr("pn");
		manageBrand(pn);
	})

	$("body").delegate(".del_product", "click", function(){
		console.log("Hello");
		var did = $(this).attr("did");
		if (confirm("Are you sure? You want to delete")) 
		{
			$.ajax({
			url : DOMAIN + "/includes/process.php",
				method : "POST",
				data  : {deleteProduct:1, id:did}, 
				success : function(data)
				{
					var j;
					var res;
					for(j=0;j<String(data).length;j++)
					{
						if(String(data).charCodeAt(j) >= 65)
						{
							res = String(data).substring(j);
							break;
						}
					}
					data = res;
					
					if(data == "DELETED")
					{
						alert("Deletion Successful");
						manageProduct(1);
					}
					else
					{
						alert(data);
					}
				}
		})
		}
		else
		{
		}
	})

	fetch_category1();
	function fetch_category1()
	{
		$.ajax({
			url : DOMAIN + "/includes/process.php",
			method  :"POST",
			data : {getCategory:1},
			success : function(data)
			{
				var root="<option value='0'>Root</option>";
				//var choose="<option value=''>Choose Category</option>";
				$('#update_product_cat').html(root+data);
				//$('#select_cat').html(choose+data);
			}
		})
	}

	fetch_brand();
	function fetch_brand()
	{
		$.ajax({
			url : DOMAIN + "/includes/process.php",
			method  :"POST",
			data : {getBrand:1},
			success : function(data)
			{
				
				//var choose = "<option value=''>Choose Brand</option>";
				$('#update_product_brand').html(data);
			}
		})
	}

	$("body").delegate(".edit_product", "click", function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN + "/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updateProduct:1, id:eid},
			
			success : function(data)
			{
				console.log(data);
				$("#pid").val(data["pid"]);
				$("#update_product").val(data["product_name"]);
				$("#update_product_price").val(data["product_price"]);
				$("#update_product_qty").val(data["product_stock"]);
				$("#update_product_cat").val(data["cid"]);
				$("#update_product_brand").val(data["bid"]);
			}
		})
	})

	$("#update_product_form").on("submit", function(){
		if($("#update_product").val() == "")
		{
			$("#update_product").addClass("border-danger");
			$("#product_error").html("<span class='text-danger'>Please enter product name</span>");
		}
		else
		{
			$.ajax({
				url : DOMAIN + "/includes/process.php",
				method : "POST",
				data  :$("#update_product_form").serialize(),
				success : function(data)
				{
					var j;
					var res;
					for(j=0;j<String(data).length;j++)
					{
						if(String(data).charCodeAt(j) >= 65)
						{
							res = String(data).substring(j);
							break;
						}
					}
					data = res;
					if(data == "PRODUCT_UPDATED")
					{
						alert("Product Updated Successfully");
						window.location.href="";
						
					}
					else
					{
						alert(data);
					}
					
				}
			})
		} 
	})


	//Search Product

	$("#search_product_form").on("submit", function(){

		//alert("Hi");
		if($("#search_title").val() == "")
		{
			$("#search_title").addClass("border-danger");
			$("#search_error").html("<span class='text-danger'>Please enter title</span>");
		}
		else
		{
			$.ajax({
				url : DOMAIN + "/includes/process.php",
				method : "POST",
				data  :$("#search_product_form").serialize(),
				success : function(data)
				{
					
						$("#product_result").html(data);
			
					
				}
			})
		} 
	})
})