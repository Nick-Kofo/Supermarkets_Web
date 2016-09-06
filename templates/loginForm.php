<div class="row">
    <br />
    <h5 class="center align">Login Form</h5>
    <br />
    <form class="col s12" action="logged.php" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email">
                <label for="email">Enter your email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">Enter your password</label>
            </div>
        </div>
        <div class="right align">
            <button class="btn waves-effect waves-light green accent-3 black-text" type="submit" name="action">Login
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>
