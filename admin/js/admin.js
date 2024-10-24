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
  // let manage = jQuery("#manage").val();
  let password = jQuery("#password").val();
  // const hashPassword = CryptoJS.SHA256(password).toString();
  let is_error = false;
  if (name == "") {
    jQuery("#name_error").html("Please enter name");
    is_error = true;
    // alert ('Please enter name');
  }
  if (email == "") {
    jQuery("#email_error").html("Please enter email");
    is_error = true;
    // alert ('Please enter email');
  } else if (!/^\S+@\S+\.\S+$/.test(email)) {
    jQuery("#email_error").html("Please enter a valid email");
    is_error = true;
  }
  // if (manage == "") {
  //   jQuery("#manage_error").html("Please select manage");
  //   is_error = true;
  //   // alert ('Please select manage');
  // }
  if (password == "") {
    jQuery("#password_error").html("Please enter password");
    is_error = true;
    // alert ('Please enter password');
  } else if (password.length < 6) {
    jQuery("#password_error").html("Password must be at least 6 characters");
    is_error = true;
  }
  if (!is_error) {
    const hashHex = await hashPassword(password);
    console.log(name, email, hashHex);
    jQuery.ajax({
      url: "inc/adminRegiSub.php",
      type: "post",
      data: {
        name: name,
        email: email,
        // manage: manage,
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
  } else if (!/^\S+@\S+\.\S+$/.test(email)) {
    jQuery("#login_email_error").html("Please enter a valid email");
    is_error = true;
  }
  if (password == "") {
    jQuery("#login_password_error").html("Please enter password");
    is_error = "Yes";
    // alert ('Please enter password');
  } else if (password.length < 6) {
    jQuery("#login_password_error").html(
      "Password must be at least 6 characters"
    );
    is_error = true;
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

$(document).ready(function () {
  // Capture the input event on the search bar
  $("#table_search").on("keyup", function () {
    var tableSearchQuery = $(this).val();
    // var searchPage = $("#profile").val(); // Get the profile value
    console.log(tableSearchQuery);
    // AJAX request
    if (tableSearchQuery != "") {
      $("#tableProfileVendor").css("display","none");
      $.ajax({
        url: "tableSearch.php", // PHP file to send request to
        type: "POST",
        data: { query: tableSearchQuery }, // Send both query and profile
        success: function (data) {
          // Update the table with the data returned from PHP
          $("#tableSearchResult").html(data);
        },
      });
    } else {
      $("#tableSearchResult").css("display", "none");
    }
  });
});
