
function demo() {
  $('#pp').hide();

  //alert('hi');
}
function demo1() {

  $('#pp').show();
  //alert('hi');
}


// Add User page JS

function fndemo() {
  var x = $("#txtname").val();
  //alert(x);

  $("#demoerr").html(x);


}
function Validate() {

  var password = document.getElementById("txtpassword").value;
  var confirmPassword = document.getElementById("txtcpassword").value;

  if (password != "" && confirmPassword != "") {

    if (password != confirmPassword) {
      $('#msg1').show();

      $('#msg').hide();
      $('#errmsg').hide();
      $('#btnsubmit').prop('disabled', true);
      return false;
    }
    else {
      $('#msg').show();
      $('#errmsg').hide();
      $('#msg1').hide();
      $('#btnsubmit').prop('disabled', false);
    }
    return true;
  }
  else {
    //alert("Please Fill The Password details");
    $('#errmsg').show();
    $('#msg').hide();
    $('#msg1').hide();
    $('#btnsubmit').prop('disabled', true);
  }


}

function emailchecker()   //email checker validator
{
  //alert("test");
  var data = $("#txtemail").val();
  //alert(data);

  $.ajax({

    url: "my_ajax.php",
    type: "post",
    data: { emcheck: data },
    success: function (result) {
      //alert(result);
      $("#emailmsg").html(result);
    }
  });
}

var check = function () {
  if (document.getElementById('txtpassword').value ==
    document.getElementById('txtcpassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Confirm Password is matching to password';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Conform Password is not matching to password';
  }
}


// End User Page Js

// Ajax Registration data


function btncheck() {
  //alert("ok");

  $("#butsave").attr("disabled", "disabled");
  var name = $('#txtname').val();
  var email = $('#txtemail').val();
  var phone = $('#txtcontact').val();
  var city = $('#city').val();
  //alert(name);
  if (name != "" && email != "" && phone != "" && city != "") {
    $.ajax({
      url: "my_ajax.php",
      type: "POST",
      data: {
        name: name,
        email: email,
        phone: phone,
        city: city,
        status: '1'
      },
      cache: false,
      success: function (dataResult) {
        //var dataResult = JSON.parse(dataResult);
        //alert(dataResult);
        // if(dataResult.statusCode==200){
        // 	$("#butsave").removeAttr("disabled");
        // 	$('#fupForm').find('input:text').val('');
        // 	$("#success").show();
        // 	$('#success').html('Data added successfully !'); 						
        // }
        // else if(dataResult.statusCode==201){
        //    alert("Error occured !");
        // }
        if (dataResult == 1) {
          $("#butsave").removeAttr("disabled");
          $('#fupForm').find('input:text').val('');
          $("#success").show();
          $('#success').html('Data added successfully !');
        }
        else {
          alert("Error occured !");
        }

      }
    });
  }
  else {
    alert('Please fill all the field !');
    $("#butsave").attr("disabled", false);
  }
}

$(document).ready(function () {
  $('#butsave').on('click', function () {

  });
});


//Ajax Data Ends

//Ajax Data table code
$.ajax({
  url: "my_ajax.php",
  type: "POST",
  data: { tempid: '1' },
  cache: false,
  success: function (data) {
    //alert(data);
    $('#table').html(data);
  }
});


//===================================================================
function fndelete(id)     //Delete Employee data in Ajax Page
{
  //alert(id);
  if (confirm('Are u sure Want to Delete ?')) {


    $.ajax({

      url: "my_ajax.php",
      type: 'POST',
      data: { did: id },
      success: function (result) {

        //alert("trid_"+id);
        //alert(result);

        if (result == 1) {
          //alert("ok");
          $("#trid_" + id).hide("slow");
          //$("#trid_"+id).fadeOut().remove();
        }

      }
    })
  }
}


function fncatdelete(id) {
  if (confirm('Are You Sure ?')) {
    //alert(id);  

    $.ajax({

      url: "my_ajax.php",
      type: 'POST',
      data: { catdid: id },
      success: function (result) {
        //alert(result);

        if (result == 1) {
          $("#trcat_" + id).hide("slow");
        }
        else if (result == 0) {
          alert('This Category is used Please Check Products!!!');
        }
        else {
          alert("Something Went Wrong!!");
        }
      }

    });
  }

}

function fnprodelete(prodid) {
  //alert(prodid);
  if (confirm('are you sure delete ?')) {
    $.ajax({

      url: "my_ajax.php",
      type: 'POST',
      data: { prodid: prodid },
      success: function (result) {
        //alert(result);
        $("#trprod" + prodid).hide("slow");
      }

    });
  }
}

// Delete code Ends


function fnactive(cid) {
  //console.log($("#togleaction" + cid).html());
  //alert(status);
  //alert(cid);

  $.ajax({

    url: "my_ajax.php",
    type: 'POST',
    data: { cid: cid },
    success: function (result) {
      //alert(result);
      $("#togleaction" + cid).html(result);
    }
  });
}



function fnactivecat(catid) {
  //alert('test');
  //alert(catid);
  $.ajax({

    url: "my_ajax.php",
    type: 'POST',
    data: { catid: catid },
    success: function (result) {
      //alert(result);
      $("#toglecat" + catid).html(result);
    }

  });
}

function fncompany() {
  //alert("test");
  var comp = $("#ddcompany").val();
  //alert(comp);
  $('#ddcategory').prop('disabled', false);

  $.ajax({

    url: "my_ajax.php",
    type: 'POST',
    data: { compid: comp },
    success: function (result) {
      //alert(result);
      var dataresult = jQuery.parseJSON(result);
      $("#ddcategory").html(dataresult['category']);
      $("#txtproduct").val(dataresult['product']);
    }

  });
}


function fncategory() {
  //alert("done");
  if ($("#cbcat").is(":checked")) {
    $('#ddcat').attr("disabled", false);
    $('#ddcat').show();
  }
  else {
    $('#ddcat').attr("disabled", true);
    $('#ddcat').hide();

  }

}
function fncatcheck1()   //add category
{
  var cat = $("#txtcategory").val();
  if (cat != "") {
    $.ajax({

      url: "my_ajax.php",
      type: 'POST',
      data: { catadd: cat },
      success: function (result) {
        //alert(result);

        if (result == 1) {
          $("#catsuccess").show();
          $("#errmsgaddcat").hide();
          $("#catsuccess").html('category Add Successfully');
        }
        else if (result == 2) {
          $("#errmsgaddcat").show();
          $("#catsuccess").hide();
          $("#errmsgaddcat").html('Category is Already Exists');
        }
        else if (result == 3) {
          $("#errmsgaddcat").show();
          $("#catsuccess").hide();
          $("#errmsgaddcat").html('Check records and fill');
        }
        else {
          $("#errmsgaddcat").show();
          $("#catsuccess").hide();
          $("#errmsgaddcat").html('Something went wrong');
        }
      }

    })
  }
  else {
    $("#errmsgaddcat").show();
    $("#errmsgaddcat").html('Please Fill the details');
  }
}

function fncat() {
  var data = $("#ddcat").val();
  $('#txtcategory').val(data);

}

function userinsert() {

  var name = $("#txtname").val();
  var city = $("#city").val();
  var gender = $("#gender").val();
  var email = $("#txtemail").val();
  var contact = $("#txtcontact").val();
  var password = $("#txtpassword").val();
  var cpassword = $("#txtcpassword").val();


  if (name != "" && city != "" && gender != "" && email != "" && contact != "" && password != "" && cpassword != "") {
    //alert(name);
    $.ajax({
      url: "my_ajax.php",
      type: 'POST',
      data: { namedata: name, city: city, gender: gender, email: email, contact: contact, password: password, cpassword: cpassword },
      beforeSend: function () {
        $("#btnsend").show();
        //$("#btninsert").hide();
      },
      success: function (result) {
        //alert(result);
        if (result == 1) {
          $("#success").show();
          $('#errmsg').hide();
          $("#error").hide();
          $("#btninsert").show();
          $("#btnsend").hide();
          $('#fmreg').find('input:text').val('');
          $('#success').html('Record saved Successfully OTP send to your Email');
        }
        else if (result == 2) {
          $("#error").show();
          $("#success").hide();
          $("#btnsend").hide();
          $('#error').html('User is Already Exists!!');
          $("#txtpassword").val('');
          $("#txtcpassword").val('');
          $("#message").hide();
          $('#errmsg').hide();
        }
        else if (result == 3) {
          $("#error").show();
          $("#btnsend").hide();
          $("#success").hide();
          $('#error').html('Please Check Your Password It\'s not Match');
          $('#errmsg').hide();
        }
        else if (result == 4) {
          $("#error").show();
          $("#success").hide();
          $("#btnsend").hide();
          $('#error').html('Mail sending error');
          $('#errmsg').hide();
        }

        else {
          $("#error").show();
          $("#success").hide();
          $("#btnsend").hide();
          //$('#error').html('Something went wrong');
          $('#error').html(result);
          $('#errmsg').hide();
        }

      }

    });


  }
  else {
    //alert("Please Fill All the Details");
    $('#errmsg').show();
    $("#success").hide();
    $("#error").hide();
    $("#btnsend").hide();
    $('#errmsg').html('All fields are necessary');
  }
}

function InsertProduct() {
  var price = $("#txtprice").val();
  var product = $("#txtproduct").val();
  var category = $("#ddcategory").val();
  var desc = $("#txtdesc").val();

  var fd = new FormData();
  var files = $('#mainimg')[0].files[0];
  fd.append('product', product);
  fd.append('category', category);
  fd.append('desc', desc);
  fd.append('price', price);
  fd.append('file', files);

  if (price != "" && product != "" && category != "" && desc != "") {
    $.ajax({
      url: 'new_upload.php',
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function (response) {
        //alert(response);
        if (response == 1) {
          window.location.href = "manage_product.php";
        }
        else if (response == 2) {
          $('#errorproduct').show();
          $('#errorproduct').html('Product is Already Exists!!');
        }
        else if (response == 3) {
          $('#errorproduct').show();
          $('#errorproduct').html('only png jpg or jpeg files allowed');
        }
        else if (response == 0) {
          $('#errorproduct').show();
          $('#errorproduct').html('Something went wrong please try again!!');
        }
        else {
          $('#errorproduct').show();
          $('#errorproduct').html('Ajax file changed Error');
        }

      }
    });

  }
  else {
    $('#errorproduct').show();
    $('#errorproduct').html('All fields are necessary');
  }
}

function UpdateProduct() {
  var price = $("#txtprice").val();
  var product = $("#txtproduct").val();
  var category = $("#ddcategory").val();
  var hid = $("#hid").val();
  var desc = $("#txtdesc").val();

  if (price != "" && product != "" && category != "") {
    $.ajax({

      url: "my_update_ajax.php",
      type: 'POST',
      data: { price: price, product: product, category: category, hpid: hid, desc: desc },
      success: function (result) {
        //alert(result);
        if (result == 1) {
          $('#successproduct').show();
          $('#errorproduct').hide();
          $('#successproduct').html('Product Updated successfully');
        }
        else if (result == 2) {
          $('#errorproduct').show();
          $('#successproduct').hide();
          $('#errorproduct').html('please select the category');
        }
        else if (result == 3) {
          $('#errorproduct').show();
          $('#successproduct').hide();
          $('#errorproduct').html('This product exists with same category  !!');
        }
        else {
          $('#errorproduct').show();
          $('#successproduct').hide();
          $('#errorproduct').html(result);
        }
      }


    });
  }
  else {
    alert('Fill the details');
  }
}

function UpdateCategory() {
  var category = $("#txtcategory").val();
  var hcatid = $("#hcatid").val();
  if (category != "") {
    $.ajax({

      url: "my_update_ajax.php",
      type: 'POST',
      data: { category: category, hcatid: hcatid },
      success: function (result) {
        //alert(result);
        /*$('#msgcat').show();
        $("#txtcategory").val('');
        $('#msgcat').html('Record Updated successfully');*/
        if (result == 1) {
          window.location.href = "manage_category.php";
        }
        else if (result == 2) {
          $('#msgcat').show();
          $('#msgcat').html('category is Already Exists');
        }
        else {
          $('#msgcat').show();
          $('#msgcat').html('Something went wrong');
        }

      }
    });
  }
  else {
    $('#msgcat').show();
    $('#msgcat').html('Please Fill the Text box');
  }

}

function fncatupdate(catid) {
  //alert(catid);
  $.ajax({
    url: "editcat.php",
    type: 'POST',
    data: { catid: catid },

  });
}

function fnlogin() {
  var e = $("#txtemail").val();
  var p = $("#txtpassword").val();

  if (e != "" && p != "") {

    $.ajax({
      url: "my_ajax.php",
      type: 'POST',
      data: { emailadmin: e, password: p },
      success: function (result) {
        //alert(result);
        if (result == 1) {
          location.href = "dashboard.php";
        }
        else if (result == 0) {
          $('#errloginmsg').show();
          $('#errloginmsg').html('Username or Password Incorrect');
        }
        else if (result == 2) {
          $('#errloginmsg').show();
          $('#errloginmsg').html('Your ID is not Active');
        }

      }

    });
  }
  else {
    $('#errloginmsg').show();
    $('#errloginmsg').html('Please fill the Details');
  }
}


function btnUpdateUser() {
  var name = $("#txtname").val();
  var city = $("#city").val();
  var gender = $("#gender").val();
  var contact = $("#txtcontact").val();
  var hid = $("#hid").val();
  //alert(gender);

  if (name != "" && city != "" && gender != "" && contact != "" && hid != "") {
    $.ajax({
      url: "my_update_ajax.php",
      type: 'POST',
      data: { username: name, city: city, gender: gender, contact: contact, hid: hid },
      success: function (result) {
        alert(result);
        if (result == 1) {
          location.href = "view_data.php";
        }
        else if (result == 2) {
          $('#msgerruser').show();
          $('#msgerruser').html('Please select the city');
        }
        else {
          $('#msgerruser').show();
          //$('#msgerruser').html('Something Went Wrong!!');
          $('#msgerruser').html(result);
        }
      }

    });
  }
  else {
    $('#msgerruser').show();
    $('#msgerruser').html('Please fill the Details');
  }
}

// function fnjsondelete(jid)
// {
//   alert(jid);
// }

function savejsondata() {
  //alert("ok");
  $.ajax({

    url: "my_ajax.php",
    type: 'POST',
    data: { tempj: '1' },
    beforeSend: function () {
      $('#btnload').show();
      $('#btnsave').hide();
    },
    success: function (result) {
      //alert(result);
      console.log(result);
      if (result == 1) {
        $('#btnsave').show();
        $('#btnsave').val('Data Saved Successfully');
        $('#btnsave').addClass('btn btn-info');
        $('#btnload').hide();
        $('#btnsave').prop('disabled', true);
        alert("Data Inserted Successfully");
      }
      else {
        $('#btnsave').show();
        $('#btnsave').removeClass('btn btn-success');
        $('#btnsave').addClass('btn btn-danger');
        $('#btnsave').prop('disabled', true);
        $('#btnsave').val('Data is already Exists');
        $('#btnload').hide();
        //alert("Data is Already Stored");
      }
    }

  });
}

function filePreview(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      //$('#uploadForm + img').remove();
      $('#preview').html('<img src="' + e.target.result + '" width="100" height="100"/>');
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#mainimg").change(function () {
  filePreview(this);
});


//==============================================

$(document).ready(function () {

  //alert('reach dashboard');
  $("#but_upload").click(function () {

    var fd = new FormData();
    var files = $('#file')[0].files[0];
    fd.append('file', files);

    $.ajax({
      url: 'new_upload.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response != 0) {
          $("#img").attr("src", response);
          alert('image uploaded successfully');
        } else {
          alert('file not uploaded');
        }
      },
    });
  });
});

function fnpdf(uid) {
  alert(uid);

  // $.ajax({

  //   url: "my_ajax.php",
  //   type: 'POST',
  //   data: { uid: uid },
  //   success: function (result) {
  //     alert(result);
  //   }
  // })
}

//===================================

function fnadd() {
  // alert('okok');
  var i = 0;
  i++;
  $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="number"  name="number[]" placeholder="Enter your Price" id="price" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');


}


$(document).ready(function () {

  $(document).on('click', '.btn_remove', function () {
    var button_id = $(this).attr("id");

    $('#row' + button_id + '').remove();
  });
  $('#submit').click(function () {
    $.ajax({
      url: "my_ajax2.php",
      method: "POST",
      data: $('#add_name').serialize(),
      success: function (data) {
        alert(data);
        $('#add_name')[0].reset();
        $('#add_name')[1].reset();
      }
    });
  });
});  
