var formValidate = false;

function validateEmail(email)
{
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

function validateProductInputs()
{
    var itemname = document.getElementById('name');
    var category = document.getElementById('category');
    var r_price = document.getElementById('r_price');
    var s_price = document.getElementById('s_price');
    var description = document.getElementById('description');

    let namevalue = itemname.value.trim();
    let categoryvalue = category.value.trim();
    let r_pricevalue = r_price.value.trim();
    let s_pricevalue = s_price.value.trim();
    let descvalue = description.value.trim();

    namevalue == '' ? errorInput(itemname, 'Please enter valid product name')
        : categoryvalue == '' ? errorInput(category, 'Please enter valid category')
        : (r_pricevalue == '' || /[a-z]/i.test(r_pricevalue)) ? errorInput(r_price, 'Please enter valid price')
        : (/[a-z]/i.test(s_pricevalue)) ? errorInput(s_price, 'Please enter valid price')
        : (s_pricevalue != '' & r_pricevalue < s_pricevalue) ? errorInput(s_price, 'Please enter valid price')
        : descvalue == '' ? errorInput(description, 'Please enter valid desc')
        : formValidate = true;
    
    var formField = new Array(itemname,category,r_price,s_price,description);
    removeError(formField);
}

function validateUserInputs()
{
    var username = document.getElementById('username');
    var password = document.getElementById('password');
    var cpassword = document.getElementById('cpassword');
    var email = document.getElementById('email');

    let usernamevalue = username.value.trim();
    let passwordvalue = password.value.trim();
    let cpasswordvalue = cpassword.value.trim();
    let emailvalue = email.value.trim();

    usernamevalue == '' ? errorInput(username, 'Please enter valid Username')
        : passwordvalue == '' ? errorInput(password, 'Please enter valid Pasword')
        : passwordvalue.length < 5 ? errorInput(password, 'Minimum 5 Character Required')
        : (cpasswordvalue == '' || passwordvalue != cpasswordvalue) ? errorInput(cpassword, 'Please confirm Password')
        : (emailvalue == '' || validateEmail(emailvalue) == false) ? errorInput(email, 'Please enter valid Email')
        : formValidate = true;
    
    var formField = new Array(username,password,cpassword,email);
    removeError(formField);
}

function removeError(formField)
{
    formField.forEach(function(item){
        item.addEventListener('input',(event)=>{
            successInput(item);
        })
    });
}

function errorInput(element, msg)
{
    element.nextElementSibling.classList.add('error');
    element.nextElementSibling.textContent = msg;
    formValidate = false;
}

function successInput(element)
{
    element.nextElementSibling.classList.remove('error');
    formValidate = true;
}


/*
* Add Product Data in Database;
*/

var add_product = document.getElementById('add_product');
if (add_product)
{
    add_product.addEventListener('submit',(event)=>{
        event.preventDefault();
        validateProductInputs();

        if (formValidate) {
            var formData = new FormData(add_product);
            formData.append('action', 'add_product');
            
            fetch('includes/ajax.php', {
                method: 'POST',
                body: formData,
            }).then(response=> {
                return response.json();
            }).then(response => {
                if (response['msg'] == 'success') {
                    let playerBox = document.getElementById('lottie_player');
                    playerBox.classList.add('active');
                    let player = document.querySelector("lottie-player");
                    player.play();
                    setTimeout(() => {
                        playerBox.classList.remove('active');
                    },2000);
                }
            }).catch(error=> {
                console.log(error);
            })
        }
    });
}

/*
* Login page
*/

var loginform = document.getElementById('login');
var username = document.getElementById('username');
var password = document.getElementById('password');

if (loginform)
{
    loginform.addEventListener('submit', (event) => {
        event.preventDefault();
        usernamevalue = username.value;
        passwordvalue = password.value;
        
        usernamevalue == '' ? errorInput(username, 'Please Enter Valid Username')
            : passwordvalue == '' ? errorInput(password, 'Please Enter Valid Password')
                : formValidate = true;
        
        if (formValidate) {

            var formdata = new FormData(loginform);
            formdata.append('action', 'login');

            fetch('includes/ajax.php', {
                method: 'POST',
                body: formdata,
            }).then(response => {
                return response.json();
            }).then(response => {
                if (response['msg'] == 'success') {
                    location.reload(); 
                } else {
                    var errorField = document.getElementById('login_error');
                    errorField.innerHTML = response['msg'];
                }
            }).catch(error=> {
                console.log(error); 
            });
        }
        var formField = new Array(username,password);
        removeError(formField);
    })
}

/*
* Logout
*/

var logoutbtn = document.getElementById('logout');

if (logoutbtn)
{
    logoutbtn.addEventListener('click', () => {
        var formData = new FormData();
        formData.append('action', 'logout');
        fetch('includes/ajax.php', {
            method: "POST",
            body: formData,
        }).then(response=> {
            return response.json();
        }).then(response => {
            if (response['msg'] == 'success') {
                location.reload();
            }
        }).catch(error=> {
            console.log(error);
        });
    })
}


/*
* Edit Popup Form
*/
function editForm(element, type)
{

    var itemID = element.id;
    var formData = new FormData();
    if (type == 'user') {
        formData.append('action', 'get_user_details');
        formData.append('user_id', itemID);
    }
    if (type == 'product') {
        formData.append('action', 'get_prodcut_details');
        formData.append('product_id', itemID);
    }
    fetch('includes/ajax.php', {
        method: 'POST',
        body:formData,
    }).then(response => {
        return response.json();
    }).then(response => {
        if (response['id'] != '') {
            for (var key in response) {
                if (key == 'id' || key == 'image' || key == 'password' || key == 'type') {
                    continue;
                }
                document.getElementById(key).value = response[key];
            }
            var modal = document.getElementById("update_model");
            if (type == 'user') {
                document.getElementById('user_id').value = response['id'];
            }
            if (type == 'product') {
                document.getElementById('product_id').value = response['id'];
            }
            modal.style.display = "block";
        }
    })
}

function deleteData(element, type)
{
    
    var itemID = element.id;
    var formData = new FormData();
    if (type == 'user') {
        formData.append('action', 'delete_user');
        formData.append('user_id', itemID);
    }
    if (type == 'product') {
        formData.append('action', 'delete_prodcut');
        formData.append('product_id', itemID);
    }
    fetch('includes/ajax.php', {
        method: 'POST',
        body:formData,
    }).then(response => {
        return response.json();
    }).then(response => {
        if (response['msg']) {
            var row = element.closest('tr');
            row.remove();
        } else {
            console.log('There is an error in Deleteing Data!');
        }
    })
}

/*
* Update Product
*/

var updateProduct = document.getElementById('update_product');

if (updateProduct)
{
    updateProduct.addEventListener('submit', (event) => {
        event.preventDefault();
        validateProductInputs();
        
        if (formValidate) {
            var formData = new FormData(updateProduct);
            formData.append('action', 'update_product');
            fetch('includes/ajax.php', {
                method: 'POST',
                body: formData,
            }).then(response => {
                return response.json();
            }).then(response => {
                if (response['msg']) {
                    var formData = new FormData();
                    formData.append('action', 'get_all_product');
                    fetch('includes/ajax.php', {
                        method: 'POST',
                        body: formData,
                    }).then(response => {
                        return response.json();
                    }).then(response => {
                        var productTable = document.querySelector('.product_list tbody')
                        productTable.innerHTML=  response['data'];
                    }).catch(error => {
                        console.log(error);
                    })
                }
                var modal = document.getElementById("update_model");
                modal.style.display = "none";
            }).catch(error => {
                console.log(error);
            })
        } else {
            
        }
    });
}

/*
* Add User
*/

var userForm = document.getElementById('add_user');

if (userForm)
{
    userForm.addEventListener('submit', (event) => {
        event.preventDefault();
        validateUserInputs();
        if (formValidate) {
            var formData = new FormData(userForm);
            formData.append('action', 'add_user');
            fetch('includes/ajax.php', {
                method: 'POST',
                body: formData,
            }).then(response => {
                return response.json();
            }).then(response => {
                if (response['msg'] == 'success') {
                    if (response['msg'] == 'success') {
                        let playerBox = document.getElementById('lottie_player');
                        playerBox.classList.add('active');
                        let player = document.querySelector("lottie-player");
                        player.play();
                        setTimeout(() => {
                            playerBox.classList.remove('active');
                        },2000);
                    }
                } else {
                    errorInput(username, 'Username Already Exist');
                }
            }).catch(error => {
                console.log(error);
            });
        }

    });
}

/*
* Update User
*/

var updateUser = document.getElementById('update_user');

if (updateUser)
{
    updateUser.addEventListener('submit', (event) => {
        event.preventDefault();
        validateUserInputs();
        
        if (formValidate) {
            var formData = new FormData(updateUser);
            formData.append('action', 'update_user');
            fetch('includes/ajax.php', {
                method: 'POST',
                body: formData,
            }).then(response => {
                return response.json();
            }).then(response => {
                if (response['msg']) {
                    var formData = new FormData();
                    formData.append('action', 'get_all_users');
                    fetch('includes/ajax.php', {
                        method: 'POST',
                        body: formData,
                    }).then(response => {
                        return response.json();
                    }).then(response => {
                        var usersTable = document.querySelector('.users_list tbody')
                        usersTable.innerHTML=  response['data'];
                    }).catch(error => {
                        console.log(error);
                    })
                }
                var modal = document.getElementById("update_model");
                modal.style.display = "none";
            }).catch(error => {
                console.log(error);
            })
        } else {
            
        }
    });
}


const closeModel = document.getElementById('model_close');
if (closeModel)
{
    closeModel.onclick = ((event) => {
        var modal = document.getElementById("update_model");
        modal.style.display = "none";
    });
}

const toggleSidebar = document.getElementById('toggle_sidebar');
if (toggleSidebar)
{
    toggleSidebar.onclick = ((event) => {
        const sidebar = document.getElementById('left_sidebar');
        sidebar.classList.toggle('active');
    });
}

if ((window.location.href).indexOf('setting') > -1) {
    fetch('includes/ajax.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body:'action=settings',
    }).then(response => {
        return response.json();
    }).then(response => {
        if (response) {
            document.getElementById('siteurl').value = response['siteurl'];
            document.getElementById('currency').value = response['currency'];
        }
    }).catch(error => {
        console.log(error);
    })
}

const setting_form = document.getElementById('update_settings');
if (setting_form) {
    setting_form.addEventListener('submit', (event) => {
        event.preventDefault();

        let formData = new FormData(setting_form);
        formData.append('action', 'update_settings');
        
        fetch('includes/ajax.php', {
            method: 'POST',
            body: formData,
        }).then(response =>response.json()).then(response => {
            if (response['msg'] == 'success') {
                let playerBox = document.getElementById('lottie_player');
                playerBox.classList.add('active');
                let player = document.querySelector("lottie-player");
                player.play();
                setTimeout(() => {
                    playerBox.classList.remove('active');
                },2000);
            }
        }).catch(error => {
            console.log(error);
        });
    });
}