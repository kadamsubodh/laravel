$(document).ready(function(){
	$('#submit').click(function(){
var name=$('#categoryName').val();
if(name===""){
alert("Please Enter Category Name");
$('#categoryName').focus(); 
return false;
}
else if(!/^[a-zA-Z]*$/g.test(name))
{
alert("Only Aphabets are allowed");
$('#categoryName').focus();
return false; 
}
});
});

$(document).ready(function(){
$("#selectall").click(function(){
        //alert("just for check");
        if(this.checked){
            $('.checkboxall').each(function(){
                this.checked = true;
            })
        }else{
            $('.checkboxall').each(function(){
                this.checked = false;
            })
        }
    });
});

$(document).ready(function(){
	$('.delBtn').click(function(){
	var v=$(".checkboxall:checked").length;
	if(v==0)
	{
		alert("please select atleast one category");
		return false;
	}
	else{
		confirm("Caution! this action cannot be undone!! Are you sure wantt to delete this??");
		return true;
	}
			
});
});

$(document).ready(function(){
$(".checkboxall").click(function(){
	var v1=$('.checkboxall').length;
	var check=$('.checkboxall').filter(':checked').length;
	if(check==v1)
	{

		$('#selectall').prop("checked", true);
	}
	else{
		$('#selectall').prop("checked", false);
	}

});
});

$(document).ready(function(){
$('#frm1').submit(function(event){
 var ext=$('#file').val().split('.').pop().toLowerCase();
var name=$('#productName').val();
var price=$('#productPrice').val();
var category=$('#select').val();
var path="uploads/".concat($('#file').val());
if(name=="")
{
	$('#nameError').text("*This field required!");
	event.preventDefault();
}
else if(!/^[a-zA-Z0-9]*$/g.test(name))
{
	$('#nameError').text("*Only alphanuric value allowed!");
	event.preventDefault();
}
else if(price=="")
{
	$('#priceError').text("*This field required!");
	event.preventDefault();
}
else if(!/^[1-9]\d*(\.\d+)?$/g.test(price))
{
	$('#priceError').text("*only decimal values allowed");
	event.preventDefault();
}
else if(ext!="")
{
	if($.inArray(ext,['jpg','png'])=='-1')
	{
	$('#imgError').text("*Not valid image! only \'jpg\' and \'png\' images allowed ");
	event.preventDefault();
	}
}
// else if($.inArray(ext,['jpg','png'])=='-1')
// {
// 	$('#imgError').text("*Not valid image! only \'jpg\' and \'png\' images allowed ");
// 	event.preventDefault();
// }
else if(category=="")
{
	$('#selectError').text("Please select category ");
	event.preventDefault();
}
});
});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#product_image').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(document).ready(function(){
$("#file").change(function() {
  readURL(this);
});
});

$(document).ready(function(){
$(".delicon").click(function(){
	alert('Are you sure want to delete this?');
	$(this).find('form').submit();
});
});

$(document).ready(function(){
$(".editicon").click(function(){
	alert('Are you sure want to update this?');
	$(this).find('form').submit();
});
});