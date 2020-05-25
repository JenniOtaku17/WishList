<div class="container">
<div class="d-flex justify-content-center">
<div style="background-color: #fff; padding: 2%; margin-top:8%; width:50%;">
  <h2 style="text-align: center;">Welcome to the Login Page</h2>
  
  <?= form_open('user/processlogin') ?>
  <div class="form-group">
    <?php

        $email= array(
            'name' => 'email',
            'placeholder' => 'Please enter you email',
            'type' => 'email',
            'class' => 'form-control'
        );
        $password= array(
            'name' => 'password',
            'placeholder' => 'Please enter you password',
            'type' => 'password',
            'class' => 'form-control'
        );

        ?>

        <?php
            echo $this->session->flashdata("error");
        ?><br>

        <?= form_label('Email:', 'email') ?>
        <?= form_input($email) ?>
        <br>
        <?= form_label('Password:', 'password') ?>
        <?= form_input($password) ?>
        <br>
        
        <div class="col text-center">
        <?= form_submit('', 'Log In', 'class="btn btn-primary"') ?>
        </div>

  </div>
  <?= form_close() ?>
    </div>
    </div>
    </div>
</body>
</html>