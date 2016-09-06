<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="login.php">Login</a></li>
  <li class="divider"></li>
  <li><a href="register.php">Register</a></li>
</ul>

<header>
  <nav class="green accent-3" role="navigation">
      <div class="nav-wrapper"><a id="logo-container" href="index.php" class="brand-logo black-text"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
          <ul class="right hide-on-med-and-down">
              <li>
                <a href = "javascript:history.back()"><i class="fa fa-long-arrow-left fa-2x" aria-hidden="true"></i></a>
              </li>
              <li>
                <a class="dropdown-button black-text" href="#" data-activates="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a>
              </li>
          </ul>
          <ul id="nav-mobile" class="side-nav">
              <!--Mobile Menu-->
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse black-text"><i class="material-icons">menu</i></a>
      </div>
  </nav>
</header>