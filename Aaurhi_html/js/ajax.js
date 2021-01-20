function get_slider_data() {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "http://localhost/aaurhi/api/sliders/",
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showData").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_deal_data() {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_deal_product/",
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showDeal").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_deal_slide() {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_deal_slide/",
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showDealSlide").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_deal_list() {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_deal_list/",
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showDeal").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_category_data() {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_categories/",
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showCategory").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}


function get_category_products(id) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_category_products/" + id,
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showCategoryData").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_subcategory(id) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_subcategory/" + id,
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showSubCategory").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_subcategory_products(id) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_subcategory_products/" + id,
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showSubProducts").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_products() {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_products/",
        dataType: "HTML",
        success: function(result) {
            $("#showproduct").html(result);            
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_all_products() {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_all_products/",
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showproduct").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_upcomming() {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_uc_list/",
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showucproduct").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_all_upcomming() {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_uc_alllist/",
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#showproduct").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_product_details(id) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_product_details/" + id,
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#productdetails").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_product_image(id) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_product_image/" + id,
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#productimg").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_user_image(id){
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "http://localhost/aaurhi/users/show_picture/" + id,
        dataType: "HTML",
        success: function(result) {
            // console.log(result);
            $("#showimage").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("data");
        }
    });
}

function get_uc_details(id) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_uc_details/" + id,
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#productdetails").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_uc_image(id) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_uc_image/" + id,
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            $("#productimg").html(result);
            //console.log("hello");
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function check_login(email, password) {
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: { email: email, password: password },
        url: "https://aaurhi.com/api/check_login/",
        dataType: "HTML",
        success: function(result) {
            //console.log(result);
            //localStorage.setItem("user_id",'');
            localStorage.setItem("user_id", result);

            var datas = result;
            //alert(datas);
            var user_id = parseInt(datas);
            if (!isNaN(user_id)) {
                window.location.href = "home.html";
            } else {
                localStorage.removeItem('user_id');
                alert('login failed');
            }
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_user_data(userid) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_user_data/" + userid,
        dataType: "HTML",
        success: function(result) {
            var obj = JSON.parse(result);
            //alert(obj.username);
            document.getElementById("name").value = obj.username;
            document.getElementById("email").value = obj.email;
            document.getElementById("phone").value = obj.phone;
            document.getElementById("address").value = obj.address;
            //$("#productimg").html(result);
            //console.log("hello");
            //return result;
            //return datas;
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function get_user_info(userid) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "https://aaurhi.com/api/get_user_info/" + userid,
        dataType: "HTML",
        success: function(result) {
            var obj = JSON.parse(result);
            //alert(obj.username);
            document.getElementById("name").innerHTML = obj.username;
            document.getElementById("username").innerHTML = obj.username;
            document.getElementById("fullname").innerHTML = obj.username + " " + obj.surname;
            document.getElementById("surname").innerHTML = obj.surname;
            document.getElementById("email").innerHTML = obj.email;
            document.getElementById("phoneno").innerHTML = obj.phone;
            document.getElementById("address").innerHTML = obj.address + ", " + obj.city + ", " + obj.country;
            //$("#productimg").html(result);
            //console.log("hello");
            //return result;
            //return datas;
        },
        error: function(data) {
            console.log("error");
        }
    });
}

function save_order(products, name, email, phone, address,shping,userId) {
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: { products: products, name: name, email: email, phone: phone, address: address, shping:shping, userId : userId, },
        url: "https://aaurhi.com/api/complete_order/",
        dataType: "HTML",
        success: function(result) {
            alert("Oder Placed Successfully");
            window.location.href = "home.html";
            // console.log(result);
        },
        error: function(data) {
            console.log("error");
        }
    });
}