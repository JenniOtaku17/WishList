
<div class="container">
<div class="d-flex justify-content-center">
<div style="background-color: #fff; padding: 2%; margin-top:8%; width:60%;">
  <h2 style="text-align: center;">Sign Up</h2>
  

  <?= form_open('user/store') ?>
  <div class="form-group">
    <?php
        $name= array(
            'name' => 'name',
            'placeholder' => 'Please enter you name',
            'class' => 'form-control'
        );
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
        $confirm= array(
            'name' => 'confirm',
            'placeholder' => 'Please confirm you password',
            'type' => 'password',
            'class' => 'form-control'
        );
        ?>
        <?php
            echo $this->session->flashdata("error");
        ?><br>
        
        <?= form_label('Name:') ?>
        <?= form_input($name) ?>
        <br>
        <?= form_label('Email:') ?>
        <?= form_input($email) ?>
        <br>
        <?= form_label('Password:', 'password') ?>
        <?= form_input($password) ?>
        <br>
        <?= form_label('Confirm Password:', 'confirm') ?>
        <?= form_input($confirm) ?>
        <br>

        <div class="col text-center">
        <?= form_submit('', 'Register', 'class="btn btn-primary"') ?>
        </div>
        <?= form_close() ?>
  </div>

</div>
</body>
</html>