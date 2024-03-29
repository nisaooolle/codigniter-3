<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400, 600' rel='stylesheet' type='text/css'>
  <link rel='stylesheet' href='style.css'/>
</head>

<style>html, body {
    margin: 0;
    padding: 0;
  }
  
  .header {
    background-color:#333333;
  }
  
  .container {
    max-width: 940px;
    margin: 0 auto;
    padding: 0 10px;
  }
  
  .jumbotron {
    background: url(https://s3.amazonaws.com/codecademy-content/projects/broadway/bg.jpg);
    background-size:cover;
    background-position:center center;
    background-repeat:no-repeat;
    height: 800px;
  }
  
  .nav {
    margin: 0;
    padding: 20px 0;
  }
  
  .nav li {
    display:inline;
    color: #fff;
    font-family: 'Raleway', sans-serif;
    font-weight: 600;
    font-size: 12px;
    text-transform:uppercase;
    margin-left:10px;
    margin-right:10px;
  }
  
  .main {
    position: relative;
    top: 180px;
    text-align: center;
  }
  
  .main h1 {
    color: #333;
    font-family: 'Raleway', sans-serif;
    font-weight: 600;
    font-size: 70px;
    margin-top: 0;
    margin-bottom: 80px;
    text-transform: uppercase;
  }
  
  .btn-main {
    background-color: #333;
    color: #fff;
    font-family: 'Raleway', sans-serif;
    font-weight: 600;
    font-size: 18px;
    letter-spacing: 1.3px;
    padding: 16px 40px;
    text-decoration: none;
    text-transform: uppercase;
    border-radius: 20px;
  }
  
  .btn-default {
    color:#333;
    border:1px solid #333333;
    font-family: 'Raleway', sans-serif;
    font-weight: 600;
    font-size: 10px;
    letter-spacing: 1.3px;
    padding: 10px 20px;
    text-decoration: none;
    text-transform: uppercase;  
    display: inline-block;
    margin-bottom: 20px; 
    padding-right:50px;
    padding-left:50px;
  }
  
  .supporting {
    padding-top: 80px;
    padding-bottom: 100px;
  }
  
  .supporting .col {
    float: left;
    width: 33%;
    font-family: 'Raleway', sans-serif;
    text-align: center;
  }
  
  .supporting img {
    height: 32px;
  }
  
  .supporting h2 {
    font-weight: 600;
    font-size: 23px;
    text-transform: uppercase;
  }
  
  .supporting p {
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    padding: 0 50px;
    margin-bottom: 40px;
  }
  
  .clearfix {
    clear: both;
  }
  
  .footer {
    background-color: #333;
    color: #fff;
    padding: 30px 0;
  }
  
  .footer p {
    font-family: 'Raleway', sans-serif;
    text-transform: uppercase;
    font-size: 11px;
  }
  
  @media (max-width: 500px) {
    .main h1 {
      font-size: 50px;
      padding: 0 40px;
    }
  
    .supporting .col {
      width: 100%;
    }
  }</style>
<body>
    <!-- <h1 style="text-align: center;">Welcome to codeigniter 3</h1> -->
    <!-- <table border="1">
        <tr>
            <th>NO</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
        <?php $no=0; foreach($user as $row): $no++ ?>
        <tr>
            <th><?php echo $no ?></th>
            <th><?php echo $row->username ?></th>
            <th><?php echo $row->email ?></th>
        </tr>
        <?php endforeach ?>
    </table>
    <br>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Nama Siswa</th>
            <th>Nisn</th>
            <th>Gender</th>
            <th>Kelas</th>
        </tr>
        <?php $no=0; foreach($siswa as $row): $no++ ?>
        <tr>
            <th><?php echo $no ?></th>
            <th><?php echo $row->nama_siswa ?></th>
            <th><?php echo $row->nisn ?></th>
            <th><?php echo $row->gender ?></th>
            <th><?php echo tampil_full_kelas_byid($row->id_kelas) ?></th>
        </tr>
        <?php endforeach ?>
    </table> -->

    <div class="header">
      <div class="container">
        <ul class="nav">
          <li>About</li>
					<li>Work</li>
          <li>Team</li>
          <li>Contact</li>
        </ul>
      </div>
    </div>

    <div class="jumbotron">
      <div class="container">  
        <div class="main">
          <h1>Welcome to codeigniter 3</h1>
          <a href="auth" class="btn-main">Login</a>
          <a href="auth" class="btn-main">Register</a>
          
        </div>
      </div>
    </div>

    <div class="supporting">
      <div class="container">
        <div class="col">
          <img src="https://s3.amazonaws.com/codecademy-content/projects/broadway/design.svg">
          <h2>Design</h2>
          <p>Make your projects look great and interact beautifully.</p>
          <a href="#" class="btn-default">Learn More</a>
          
        </div>
        <div class="col">
          <img src="https://s3.amazonaws.com/codecademy-content/projects/broadway/develop.svg">
          <h2>Develop</h2>
          <p>Use modern tools to turn your design into a web site</p>
          <a href="#" class="btn-default">Learn More</a>
          
        </div>
        <div class="col">
          <img src="https://s3.amazonaws.com/codecademy-content/projects/broadway/deploy.svg">
          <h2>Deploy</h2>
          <p>Use modern tools to turn your design into a web site</p>
          <a href="#" class="btn-default">Learn More</a>
          
        </div>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="footer">
      <div class="container">
        <p>&copy; Broadway 2015</p>
      </div>
    </div>
</body>

</html>