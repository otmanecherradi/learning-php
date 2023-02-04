<?php



function ig($key)
{
  return isset($_GET[$key]) && $_GET[$key] != '';
}
function ip($key)
{
  return isset($_POST[$key]) && $_POST[$key] != '';
}
function g($key)
{
  return $_GET[$key];
}
function p($key)
{
  return $_POST[$key];
}
function ic($key)
{
  return isset($_COOKIE[$key]) && $_COOKIE[$key] != '';
}
function c($key)
{
  return $_COOKIE[$key];
}
