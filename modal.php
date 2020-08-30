<div id="popup-modal" class="popup-welcome modal fade">
  <div class="modal-welcome">
    <div class="content-popup">
      <div class="padding-popup">
        <div class="no-margin row">
          <!--<div class="title-popup">
            Create Your <span>Free</span> account now,<br><b>it takes only a few seconds</b>
          </div>-->
          <div class="w69 no-pad col-sm-7">
            <div class="no-pad col-sm-12">
            <div class="form-register col-sm-6">
              <form name="frmRegister" class="form" role="form" novalidate ng-submit="createFreeAccount(frmRegister)">
              <h3 class="color-yellow">No credit card required</h3>
              <div class="form-group">
                <label class="color-w"><i class="fa fa-envelope"></i> Email address:</label>
                <div class="error-register">
                  <span class="label label-danger" ng-show="frmRegister.$submitted && frmRegister.email.$error.required">Email is Required!</span>
                  <span class="label label-danger" ng-show="frmRegister.$submitted && frmRegister.email.$error.email">Not valid email!</span>
                  <span class="label label-danger" ng-show="frmRegister.email.$error.maxlength">Email Too long!</span>
                  <span class="label label-danger" ng-show="frmRegister.$submitted && errors"><% errors['email'][0] %></span>
                </div>
                <input type="email" class="form-control" ng-model="user.email" validate-email name="email" ng-required="true" ng-maxlength="40">
              </div>
              <div class="form-group">
                <label class="color-w"><i class="fa fa-user-circle"></i> Username:</label>
                <div class="error-register">
                  <span class="label label-danger" ng-show="frmRegister.$submitted && frmRegister.username.$error.required">Username is Required!</span>
                  <span class="label label-danger" ng-show="frmRegister.username.$error.maxlength">Username Too long!</span>
                  <span class="label label-danger" ng-show="frmRegister.$submitted && errors"><% errors['username'][0] %></span>
                </div>
                <input type="text" class="form-control" ng-model="user.username" name="username" ng-required="true" ng-maxlength="40">
              </div>
              <div class="form-group">
                <label class="color-w"><i class="fa fa-key"></i> Password:</label>
                <div class="error-register">
                  <span class="label label-danger" ng-show="frmRegister.$submitted && frmRegister.password.$error.required">Password is Required!</span>
                  <span class="label label-danger" ng-show="frmRegister.password.$error.minlength">Password Too short!</span>
                  <span class="label label-danger" ng-show="frmRegister.password.$error.maxlength">Password Too long!</span>
                  <span class="label label-danger" ng-show="frmRegister.$submitted && errors"><% errors['password'][0] %></span>
                </div>
                <input type="password" class="form-control" name="password" ng-model="user.password" ng-required="true" ng-minlength="6" ng-maxlength="32">
              </div>
              <div class="form-group">
                <div class="rem no-pad">
                    <input id="inlineCheckbox1" value="option1" checked="" type="checkbox" ng-required="true">
                    <label class="checkbox-inline color-w" for="inlineCheckbox1"><span>I am over 18 years old. I have read the </span><a href="#" target="_blank"><b class="color-yellow">Terms and Conditions.</b></a></label>
                </div>
              </div>

              <button class="btn btn-red btn-lg btn-block" type="submit" ng-disabled="formSubmitted" style="width:80%">Create Account</button>
              </form>
            </div>
            <div class="col-sm-6">
              <div class="title_free_tokens">¡Get <span class="bonus5">5</span> tokens<br>FREE!<br><span class="initial_bonus">Initial Bonus</span></div>
              <div class="model-cam">
                <span>Do you want to register as a performer?</span>
                <br><br>
                <a href="/register?type=model" class="btn-lrg btn btn-gold parpadea" style="width:60%">Click Here</a>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="no-register">
                <span>If you are over 18 and do not want to register</span>
                <a class="btn btn-gold parpadea" ng-click="cancel()" aria-label="Close">Enter</a>
                <span>If you are under 18, Please</span>
                <a href="javascript:history.go(-1)" class="btn btn-gold parpadea">Exit</a>
              </div>
            </div>
          </div>
          </div>
          <div class="w28 no-pad col-sm-5 img-welcome text-right">
            <div class="img-rg">
              <img src="https://www.angelitasonline.com/images/model.png" class="img-responsive">
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
