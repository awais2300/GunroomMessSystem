<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gunroom & Mess System</title>
 <script src="<?= base_url()?>assets/components/select2/dist/js/select2.min.js"></script>
<link href="<?= base_url()?>assets/components/select2/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<select class="select js-example-basic-multiple" multiple>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
  <option value="4">Four</option>
  <option value="5">Five</option>
  <option value="6">Six</option>
  <option value="7">Seven</option>
  <option value="8">Eight</option>
</select>
</body>
</html>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

    </script>