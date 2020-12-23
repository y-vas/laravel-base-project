<style>
  .sidenav ul li a{
    font-size:16px !important;
    text-decoration: none;
  }


  .sidenav ul li:not(:first-child){
    padding:2px;
  }

  .sidenav ul li:first-child a {
    color:black;
    font-weight: bold;
    padding:10px;
  }

  .sidenav ul li:not(:first-child) a {
    color:black;
    padding:10px;
  }

  .sidebar-but{
    position:fixed;
    z-index:9000;
    right:30px;
    bottom:40px;
    display:none;
    padding: 27px 27px 27px 27px;
    width:40px;
    height:40px;
    text-align: center;
    line-height: -20px;
    border-radius:50%;
    background-color:rgba(107,107,105, 0.8);;
  }

  .sidebar-but i{
    margin: auto;
    position:absolute;
    top:13px !important;
    right:15px !important;
    color: white;
  }

  .sidenav {
    width:15%;
    color:black;
    height: 100%;
    position:fixed;
    background-color: white;
    border-right: 1px solid #dee2e6;
    z-index:1000;
    height: 100%;
    overflow-y: scroll;
    overflow: hidden;
  }

  .sidenav ul {
    text-decoration: none;
    font-size: 20px;
    display: block;
    list-style: none;
    transition: 0.3s;
  }

  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }

  .main-head{
    width: 85%;
    right: 0px;
    height: 60px;
    position:fixed;
  }

  .main-btns {
    width: 100%;
  }

  .search {
    position: relative;
    float: right;
    margin-bottom: 3vh;
  }

  .main-btns button ,.search button, .main-btns a ,.search a , .btn-simple {
    min-width: 100px;
    margin: 10px;
  }

  .manten{
    width: 100%;
    padding: 80px 2.5% 2.5% 17.5%;
  }

  .contenidor{
    margin-top: 20px;
  }


  @media (max-width: 975px) {
    .sidenav {
      width:10%;
    }

    .sidenav ul{
      padding: 0% !important;
      text-align: center;
    }

    .menu-active {
      margin: 0px !important;
      display: block;
      padding-top: 10px !important;
      padding-bottom: 10px !important;
    }

    .menu-active i {
      color: white !important;
    }

    .sidenav ul li a{
      font-size: 0px !important;
      padding: 25% !important;
    }

    .sidenav ul li a i{
      font-size: 20px !important;
    }

    .manten{
      width: 100%;
      padding: 80px 2.5% 2.5% 15%;
    }

    .main-head{
      width: 90%;
    }
  }

  @media (max-width: 768px) {
    .sidenav {
      width:100%;
      z-index:1000;
      border:0px;
      padding-top:80px;
      background-color:white;
      display:none;
      height: 100%;
      overflow-y: scroll;


    }

    .logo{
      display: none;
    }

    .sidenav ul li a{
      font-size: 15px !important;
      padding: 0% !important;
    }

    .sidenav ul li a i{
      font-size: 15px !important;
      margin-right: 12px;
    }

    .manten{
      width: 100%;
      padding: 80px 2.5% 2.5% 5%;
    }

    .sidebar-but{
      display:block;
    }
    .main-head{
      width: 100%;
    }

  }

  .menu-active , .menu-active i {
    background-color: #17a2b8 !important;
  }

  .menu-active a,.menu-active i {
    color: white !important;
  }


  /*checkboxes */
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
