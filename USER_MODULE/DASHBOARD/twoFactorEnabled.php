<div class="row text-center">
  <div class="col">
    <span class="material-symbols-rounded" style="color: #8ac800;"><h1>task_alt</h1></span>
  </div>
</div>
<div class="row text-center">
  <div class="col">
    <h5 class="font-weight-bold">You have enabled Two-factor Authentication</h5>
  </div>
</div>
<div class="row text-center">
  <div class="col">
    <p>Two-factor authentication adds an additional layer of security
      to your account by requiring more than just a password to sign in.</p>
    <p class="font-weight-bold">Below is your selected alternate email</p>
  </div>
</div>
<div class="row text-center">
  <div class="col-2"></div>
  <div class="col-8">
    <div class="form-group">
      <input class="text-center" type="email" class="form-control" autocomplete="off" name="alternateEmail" disabled value="<?php echo $varAlternateEmail; ?>">
    </div>
  </div>
</div>
<div class="row text-center">
  <div class="col">
    <a class="btn btn-primary text-center" onclick="window.location.href='../DASHBOARD/change2FA.php'" id="enable2FABtn">Change</a>
  </div>
</div>
