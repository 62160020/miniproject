function myFunction() {
    var str = "The best things in life are free";
    var patt = new RegExp("e");
    var res = patt.test(str);
    document.getElementById("demo").innerHTML = res;
}

function addformValidation() {
    var title = document.addform.title;
    var body = document.addform.body;
    if (validate(title)) {
        // alert(body.value);
        if (validate(body)) {
            return true;
        }
    }
    return false;
}

function formValidation() {
    var uusername = document.registform.username;
    var upassword = document.registform.password;
    var uconfirmpassword = document.registform.confirmpassword;
    var uname = document.registform.name;
    var upenname = document.registform.penname;
    var uemail = document.registform.email;

    ch_all = false;
    if (validateUserName(uusername, 5, 45)) {
        if (validatePassword(upassword, uconfirmpassword, 5, 45)) {
            if (validateName(uname)) {
                if (validatePenName(upenname)) {
                    if (validateEmail(uemail)) {
                        // alert(!ch_all);
                        return !ch_all;
                    }
                }
            }
        }
    }
    // alert(ch_all);
    return ch_all;
}

function validateUserName(uusername, min, max) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
    // connect database //2 ตรวจสอบ username

    if (uusername.value == "") {
        uusername.style.background = 'White';
        error = "กรุณาป้อน User ID\n";
        alert(error);
        uusername.focus();
        return false;
    } else if ((uusername.value.length < min) || (uusername.value.length > max)) {
        uusername.style.background = 'White';
        error = "User ID ต้องมีความยาว" + min + "-" + max + " ตัวอักษร\n";
        alert(error);
        uusername.focus();
        return false;
    } else if (illegalChars.test(uusername.value)) {
        uusername.style.background = 'White';
        error = "User ID มีตัวอักษรที่ไม่ได้รับอนุญาต\n";
        alert(error);
        uusername.focus();
        return false;
        // }else if(user_duplicate){
        //     uusername.style.background = 'White';
        //     error = "มี User ID ชื่อว่า " + user_duplicate + " " + uusername.value + " อยู่แล้ว\n";
        //     alert(error);
        //     uusername.focus();
        //     return false;
    } else {
        uusername.style.background = 'White';
    }
    return true;
}

function validatePassword(upassword, uconfirmupassword, min, max) {
    var error = "";
    var illegalChars = /[\W_]/; // allow only letters and numbers

    if (upassword.value == "") {
        upassword.style.background = 'White';
        error = "กรุณาป้อน Password\n";
        alert(error);
        upassword.focus();
        return false;
    } else if ((upassword.value.length < min) || (upassword.value.length > max)) {
        error = "Password ต้องมีความยาว " + min + "-" + max + " ตัวอักษร\n";
        upassword.style.background = 'White';
        alert(error);
        upassword.focus();
        return false;
    } else if (illegalChars.test(upassword.value)) {
        error = "Password มีตัวอักษรที่ไม่ได้รับอนุญาต\n";
        upassword.style.background = 'White';
        alert(error);
        upassword.focus();
        return false;
    } else if ((upassword.value.search(/[a-zA-Z]+/) == -1) || (upassword.value.search(/[0-9]+/) == -1)) {
        error = "Password ต้องมีตัวเลข ตัวใหญ่ ตัวเล็กอย่างน้อย 1 ตัว\n";
        upassword.style.background = "White";
        alert(error);
        upassword.focus();
        return false;
    } else if (upassword.value != uconfirmupassword.value) {
        error = "Password ไม่ตรงกัน\n";
        upassword.style.background = "White";
        uconfirmupassword.style.background = "White";
        alert(error);
        upassword.focus();
        return false;
    } else {
        upassword.style.background = "White";
        uconfirmupassword.style.background = "White";
    }
    return true;
}

function validateName(uname) {
    var letters = /^[A-Za-z]+$/;
    if (uname.value == "") {
        uname.style.background = 'White';
        error = "กรุณาป้อนชื่อผู้ใช้\n";
        alert(error);
        uname.focus();
        return false;
    } else if (uname.value.match(letters)) {
        return true;
    } else {
        alert('Username ต้องเป็นตัวอักษรเท่านั้น');
        uname.focus();
        return false;
    }
}

function validatePenName(upenname) {
    var letters = /^[0-9a-zA-Z]+$/;
    if (upenname.value == "") {
        upenname.style.background = 'White';
        error = "กรุณาป้อนนามปากกาผู้ใช้\n";
        alert(error);
        upenname.focus();
        return false;
    } else if (upenname.value.match(letters)) {
        return true;
    } else {
        alert('Username ต้องเป็นตัวอักษรหรือตัวเลขเท่านั้น');
        upenname.focus();
        return false;
    }
}

function validateEmail(uemail) {
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (uemail.value == "") {
        uemail.style.background = 'White';
        error = "กรุณาป้อน Email\n";
        alert(error);
        uemail.focus();
        return false;
    } else if (!filter.test(uemail.value)) {
        alert('Email ไม่ถูกต้อง');
        uemail.focus();
        return false;
    } else {
        return true;
    }
}

function validate(utext) {
    var error = "";
    if (utext.value == "") {
        utext.style.background = 'White';
        error = "กรุณาป้อนข้อมูล\n";
        alert(error);
        utext.focus();
        return false;
    } else {
        utext.style.background = 'White';
    }
    return true;
}