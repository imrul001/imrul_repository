<link rel="stylesheet" href="/demo_butex_sis/css/topMenu.css" />
<link rel="stylesheet" href="/demo_butex_sis/css/jquery-ui.css" />
<script type="text/javascript" src="/demo_butex_sis/js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="/demo_butex_sis/js/jquery-ui.js" ></script>
<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
</script>

<style>
  #logoutButton{
    position: relative;
    bottom: 48px;
    left: 903px;
  }
  .welcomeMsg{
    padding-left: 5px;
    font-weight: normal;
  }
  #searchBox{
    left: 20px;
    position: relative;
    width: 266px;
    height: 27px;
    background: #f2f2f2;
  }
  /*  .btnSearch{
      background: transparent;
      width: 70px;
  
    }*/
  #fieldSearch{
    width: 185px;
  }
  .globalsprite {
    position: relative;
    top: -34px;
    left: 196px;
    background: url(/demo_butex_sis/img/bhSprite.png);
    font-weight: bold;
    background-position: -546px 56px;
    width: 80px;
    height: 42px;
    text-indent: -9999px;
    display: block;
    text-align: left;
    background-color: transparent;
  }
  #searchForm:hover{
    background-position: -546px 106px;
  }
  .studentIdLabel{
    font-weight: normal;
    line-height: 8px;
    margin-left: 180px;
    float: left;
  }
  #fieldsearch {
    left: 0px;
    position: relative;
    width: 185px;
  }

</style>
<div id="container">
  <h2 class="welcomeMsg">Welcome <?php echo $username; ?>! Successfully Logged In.</h2>
  <a id="logoutButton" href="home/logout">Logout</a>

  <div id="userOptionsContainer">
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">Search</a></li>
        <li><a href="#tabs-2">Add Student</a></li>
        <li><a href="#tabs-3">Summery</a></li>
      </ul>
      <div id="tabs-1">
        <p>
        <h3 class="studentIdLabel" style="float:left;">Stundent Id:</h3>
        <fieldset id="searchBox">
          <input type="text" autocomplete="off" id="fieldSearch" value="" class="" />
          <a id="searchForm" href="" class="globalSprite">
            <input type="hidden" value="Search" class="btnSearch" />
          </a> 
        </fieldset>
        </p>
      </div>
      <div id="tabs-2">
        <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
      </div>
      <div id="tabs-3">
        <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
        <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
      </div>
    </div>
  </div>
</div>
<div id="Footer">
  <?php include 'footer.php'; ?>
</div>
</div>
