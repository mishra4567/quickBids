<?php
// Check if the language is selected
if (isset($_POST['language'])) {
    $_SESSION['language'] = $_POST['language'];
}

// Default language is English
$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'english';

// Translations for English and Hindi
$translations = [
    'english' => [
        'create_account' => 'Create an account',
        'your_name' => 'Your name',
        'your_email' => 'Your email',
        'manage' => 'Manage',
        'password' => 'Password',
        'terms_conditions' => 'Terms and Conditions',
        'already_have_account' => 'Already have an account?',
        'login_here' => 'Login here',
        'login'=>'Log In',
        'remember_me'=> 'Remember Me',
        'forgot_password'=> 'Forgot your password?',
        'sign_in'=> 'Sign In',
        'accept_the'=> 'I accept the',
    ],
    'hindi' => [
        'create_account' => 'खाता बनाएं',
        'your_name' => 'आपका नाम',
        'your_email' => 'आपका ईमेल',
        'manage' => 'प्रबंधित करें',
        'password' => 'पासवर्ड',
        'terms_conditions' => 'नियम और शर्तें',
        'already_have_account' => 'पहले से ही खाता है?',
        'login_here' => 'यहाँ लॉगिन करें',
        'login'=> 'लॉग इन करें',
        'remember_me'=> 'मुझे याद करो',
        'forgot_password' => 'अपना कूट शब्द भूल गए?',
        'sign_in'=> 'दाखिल करना',
        'accept_the' => 'मुझे स्वीकार है',
    ],
    'bangla'=>[
        'create_account' => 'একটি অ্যাকাউন্ট তৈরি করুন',
        'your_name' => 'আপনার নাম',
        'your_email' => 'আপনার ইমেইল',
        'manage' => 'পরিচালনা',
        'password' => 'পাসওয়ার্ড',
        'terms_conditions' => 'শর্তাবলী',
        'already_have_account' => 'ইতিমধ্যে একটি অ্যাকাউন্ট আছে?',
        'login_here' => 'এখানে লগইন করুন',
        'login' => 'লগ ইন',
        'remember_me' => 'আমাকে মনে রেখো',
        'forgot_password' => 'আপনার পাসওয়ার্ড ভুলে গেছেন?',
        'sign_in' => 'সাইন ইন করুন',
        'accept_the' => 'আমি গ্রহণ করি',
    ],
];
