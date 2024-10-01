// const cryptoJS = require("crypto-js")
// import CryptoJS from "../../node_modules/crypto-js/index.js";
// import * as CryptoJS from "crypto-js";
// import { CryptoJS } from "crypto-js";
// import  cryptoJS  from "crypto-js";
async function hashPassword(password) {
  // Convert the password string to an ArrayBuffer
  const encoder = new TextEncoder();
  const data = encoder.encode(password);

  // Hash the password using SHA-256
  const hashBuffer = await crypto.subtle.digest("SHA-256", data);

  // Convert ArrayBuffer to hexadecimal string
  const hashArray = Array.from(new Uint8Array(hashBuffer));
  const hashHex = hashArray
    .map((b) => b.toString(16).padStart(2, "0"))
    .join("");

  return hashHex;
}
async function admin_register() {
  jQuery(".field_error").html("");
  let name = jQuery("#name").val();
  let email = jQuery("#email").val();
  let manage = jQuery("#manage").val();
  let password = jQuery("#password").val();
  // const hashPassword = CryptoJS.SHA256(password).toString();
  let is_error = false;
  if (name == "") {
    jQuery("#name_error").html("Please enter name");
    is_error = true;
    // alert ('Please enter name');
  } else if (email == "") {
    jQuery("#email_error").html("Please enter email");
    is_error = true;
    // alert ('Please enter email');
  } else if (manage == "") {
    jQuery("#manage_error").html("Please select manage");
    is_error = true;
    // alert ('Please select manage');
  } else if (password == "") {
    jQuery("#password_error").html("Please enter password");
    is_error = true;
    // alert ('Please enter password');
  }
  if (!is_error) {
    const hashHex = await hashPassword(password);
    console.log(name, email, manage, hashHex);
    jQuery.ajax({
      url: "inc/adminRegiSub.php",
      type: "post",
      data: {
        name: name,
        email: email,
        manage: manage,
        password: hashHex,
      },
      success: function (result) {
        result = result.trim();
        if (result == "present") {
          jQuery("#email_error").html("Email id already present");
        }
        if (result == "ensert") {
          jQuery(".register_msg p").html("Register Successfull");
          window.location.href = "./login.php";
        }
      },
    });
  }
}
async function admin_login() {
  jQuery(".field_error").html("");
  var email = jQuery("#login_email").val();
  var password = jQuery("#login_password").val();
  var is_error = "";
  if (email == "") {
    jQuery("#login_email_error").html("Please enter email");
    is_error = "Yes";
    // alert ('Please enter email');
  } else if (password == "") {
    jQuery("#login_password_error").html("Please enter password");
    is_error = "Yes";
    // alert ('Please enter password');
  }
  if (!is_error) {
    const hashHex = await hashPassword(password);
    console.log(email, hashHex);

    jQuery.ajax({
      url: "inc/adminLogSub.php",
      type: "post",
      data: "email=" + email + "&password=" + hashHex,
      success: function (result) {
        result = result.trim();
        if (result == "worng") {
          jQuery(".login_msg p").html("Enter Valid Login details");
        }
        if (result == "deactivated") {
          jQuery(".login_msg p").html("Account Deactivated");
        }
        if (result == "valid") {
          window.location.href = "index.php";
        }
      },
    });
  }
}
