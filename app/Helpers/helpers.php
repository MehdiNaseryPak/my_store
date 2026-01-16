<?php


function checkEmailOrMobile($id)
{
    if(preg_match('/^(98|\+98|0)?9\d{9}$/', $id))
        return 'mobile';
    elseif(filter_var($id, FILTER_VALIDATE_EMAIL))
        return 'email';
    else
        return false;
}

function generateCode()
{
    return rand(00000,99999);
}
