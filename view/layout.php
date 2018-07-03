<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="asset/main.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="asset/verification.js"></script>
<!--      From https://chmln.github.io/flatpickr/getting-started/-->
<!--      Date picker-->
      <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
      <script src="https://unpkg.com/flatpickr"></script>



  </head>

  <body>
    <?php
      partial('navigation', $value);
      require('view/'.$content.'-view.php');
    ?>
  </body>
</html>
