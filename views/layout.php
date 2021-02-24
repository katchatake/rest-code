<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi sitio web</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
      <a href="/" class="navbar-brand h1">FW</a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="/" class="nav-link">Home</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <?php echo $content; ?>
    </div>
  </div>
</body>

</html>